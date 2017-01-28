<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\AdminBaseController;
use App\Models\Menu;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AppBaseController;
use AppHelper;
use Flash;
use App\Models\Page;
use Yajra\Datatables\Datatables;
use App\Http\Requests\Admin\Pages\CreatePagesValidationRequest;
use App\Http\Requests\Admin\Pages\EditPagesValidationRequest;


class PageController extends AdminBaseController
{


    /**
     * Name of Model
     *
     * @var string
     */
    protected $model = '\\App\\Models\\Page';

    /**
     * @var view location path
     */
    protected $view_path = 'admin.pages';

    /**
     * Name of folder used to store flag images
     *
     * @var string
     */
    protected $folder_name = 'admin.pages';

    protected $admin_pagination_limit = 10;

    public function __construct()
    {
        parent::__construct();

        $this->base_route = 'admin.page';

        // Generate Translation Dir path
        $this->trans_path = AppHelper::getTransPathFromViewPath($this->view_path);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['page_title'] = trans($this->trans_path.'general.page.list');
        $data['add_btn_html'] = view($this->loadDefaultVars($this->view_path. '.partials._page_add_button'))->render();

        return view($this->loadDefaultVars($this->view_path . '.index'), compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = trans($this->trans_path.'general.page.create.description');
        $data['add_btn_html'] = view($this->loadDefaultVars($this->view_path . '.partials._add_form_button'))->render();

        return view($this->loadDefaultVars($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePagesValidationRequest $request)
    {
        if (Request::input('status') != null){
            $status = 1;
        } else {
            $status = 0;
        }
        if ($page = Page::create([
            'title' => Request::input('title'),
            'description' => Request::input('description'),
            'status' => $status,
            'slug' => Request::input('slug')
        ])
        )
            Flash::success(trans($this->trans_path . 'general.status.created'));
        $this->redirectToRoute();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        $data['page_title'] = trans($this->trans_path.'general.page.edit.description');
        $data['add_btn_html'] = view($this->loadDefaultVars($this->view_path . '.partials._add_form_button'))->render();


        return view($this->loadDefaultVars($this->view_path . '.edit'), compact('page', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPagesValidationRequest $request, $id)
    {
        $page = Page::find($id);

        if (Request::input('status') != null){
            $status = 1;
        } else {
            $status = 0;
        }

        $page->update([
            'title' => request('title'),
            'description' => request('description'),
            'status' => $status,
            'slug' => request('slug')
        ]);


        Flash::success(trans($this->trans_path . 'general.status.updated'));
        $this->redirectToRoute($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Request::input('bulk') == 'bulk') {

            foreach (Request::input('id') as $id) {

                $page = Page::find($id);

                if($page->delete()) {
                    $retVal =  'ok';
                } else {
                    $retVal = 'error';
                }
            }

        } else {

            $page = Page::find(Request::input('id'));

            if($page->delete()) {
                $retVal =  'ok';
            } else {
                $retVal = 'error';
            }

        }

        return $retVal;
    }

    public function getModalDelete($id)
    {
        $error = null;

        $page = Page::find($id);

        $modal_title = trans($this->trans_path . 'dialog.delete-confirm-page.title');
        $modal_cancel = trans('general.button.cancel');
        $modal_ok = trans('general.button.ok');

        $modal_route = route('admin.page.delete', array('id' => $page->id));

        $modal_body = trans($this->trans_path . 'dialog.delete-confirm-page.body', ['id' => $page->id, 'title' => $page->title]);

        return view('admin.modal_confirmation', compact('error', 'modal_route',
            'modal_title', 'modal_body', 'modal_cancel', 'modal_ok'));

    }

    public function checkSlug()
    {
        $slug = Request::input('slug');
        $addUpdate = Request::input('id');
        if ($slug) {
            if ($addUpdate == 'add') {
                $check = Page::where('slug', "=", $slug)->get();
            } else {
                $check = Page::where('slug', "=", $slug)
                    ->where('id', '!=', $addUpdate)
                    ->get();
            }

            if (count($check) >= 1) {
                return 'no';
            } else {
                return 'yes';
            }
        } else {
            return 'empty';
        }
    }
    
    public function enable($id, $req_type = null)
    {
        $page = Page::find($id);
        $page->status = 1;
        $page->save();

        if ($req_type = 'bulk') {
            return 'ok';
        }

        Flash::success(trans($this->trans_path . 'general.status.enabled'));

        return redirect(route($this->base_route));
    }

    public function disable($id)
    {
        $page = Page::find($id);

        $page->status = 0;
        $page->save();

        if ($req_type = 'bulk') {
            return 'ok';
        }

        Flash::success(trans($this->trans_path . 'general.status.disabled'));

        return redirect(route($this->base_route));
    }

    public function enableAll(Request $request){
        foreach (Request::input('id') as $id){
            $retVal = $this->enable($id, 'bulk');
        }
        return $retVal;
    }

    public function disableAll(Request $request){
        foreach (Request::input('id') as $id){
            $retVal = $this->disable($id, 'bulk');
        }
        return $retVal;
    }
    
    public function getDescriptionViewModal($id)
    {
        $page = Page::select(['title', 'description'])->find($id);
        $getView = view($this->loadDefaultVars($this->view_path. '.partials._description_modal_view'), compact('page'))->render();
        return $getView;
    }
    
    public function search(Request $request)
    {
        $page = Page::select(['id', 'slug', 'title', 'description', 'status']);
        return Datatables::of($page->get())
            ->editColumn('id', function ($page) {
                $data = view($this->loadDefaultVars($this->view_path . '.partials._action_fields'), compact('page'))->render();
                return $data;
            })
            ->editColumn('description', function ($page) {
                if (!isset($page->description)) {
                    return "";
                }

                $view = '<a href="' . route('admin.page.getDescriptionViewModal', $page->id) . '" class="viewDesc">' .
                    trans($this->trans_path.'general.columns.view') .
                    '</a>';

                return $view;
            })
            ->editColumn('status', function ($page) {
                if ($page->status === 1) {
                    return "<span class='text-success'> " .
                    '<i class="fa fa-check-circle-o text-info"></i>' .
                    "</span>";
                }
                return "<span class='text-danger'>  " .
                '<i class="fa fa-ban text-danger"></i>' .
                "</span>";
            })
            ->make(true);
    }
}
