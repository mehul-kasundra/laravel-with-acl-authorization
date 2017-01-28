<?php

namespace App\Http\Controllers\Admin\Menu;

//use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;
use App\Models\Page;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use AppHelper;
use Flash;
use App\Models\Menu;

class MenuController extends AdminBaseController
{

    /**
     * Name of Model
     *
     * @var string
     */
    protected $model = '\\App\\Models\\Menu';

    /**
     * @var view location path
     */
    protected $view_path = 'admin.menu';

    /**
     * Name of folder used to store flag images
     *
     * @var string
     */
    protected $folder_name = 'admin.menu';

    protected $admin_pagination_limit = 5;

    public function __construct()
    {
        parent::__construct();

        $this->base_route = 'admin.menu';

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
        $data['page_title'] = trans($this->trans_path . 'general.page.list');
        $data['add_btn_html'] = view($this->loadDefaultVars($this->view_path . '.partials._page_add_button'))->render();

        //get Menu list to show in select box
        $menus = Menu::paginate(AppHelper::getConfigValue('ADMIN-PAGINATION-LIMIT'));
        $pages = Page::all();

        return view($this->loadDefaultVars($this->view_path . '.index'), compact('menus', 'pages', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = trans($this->trans_path . 'general.page.create.description');
        $data['add_btn_html'] = view($this->loadDefaultVars($this->view_path . '.partials._add_form_button'))->render();

        return view($this->loadDefaultVars($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (Request::input('status') != null) {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($page = Menu::create([
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
        $menu = Menu::find($id);

        $data['page_title'] = trans($this->trans_path . 'general.page.edit.description');
        $data['add_btn_html'] = view($this->loadDefaultVars($this->view_path . '.partials._add_form_button'))->render();


        return view($this->loadDefaultVars($this->view_path . '.edit'), compact('menu', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (Request::input('status') != null) {
            $status = 1;
        } else {
            $status = 0;
        }

        $menu = Menu::find($id);
        $menu->update([
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
    public function destroy($id)
    {
        Menu::destroy($id);
        Flash::success(trans($this->trans_path . 'general.status.deleted'));
        return redirect('/admin/menu');
    }

    public function destroyAll(Request $request)
    {
        if (Request::input('id') != null) {

            foreach (Request::input('id') as $id) {

            if (Menu::destroy($id)) {
                $retVal = 'ok';
            } else {
                $retVal = 'error';
            }
        }
        } else {
            $retVal = 'nodata';
        }
        return $retVal;
    }


    public function enable($id, $req_type = null)
    {
        $menu = Menu::find($id);
        $menu->status = 1;
        $menu->save();

        if ($req_type = 'bulk') {
            return 'ok';
        }

        Flash::success(trans($this->trans_path . 'general.status.enabled'));

        return redirect(route($this->base_route));
    }

    public function disable($id)
    {
        $menu = Menu::find($id);

        $menu->status = 0;
        $menu->save();

        if ($req_type = 'bulk') {
            return 'ok';
        }

        Flash::success(trans($this->trans_path . 'general.status.disabled'));

        return redirect(route($this->base_route));
    }

    public function enableAll(Request $request)
    {
        foreach (Request::input('id') as $id) {
            $retVal = $this->enable($id, 'bulk');
        }
        return $retVal;
    }

    public function disableAll(Request $request)
    {
        foreach (Request::input('id') as $id) {
            $retVal = $this->disable($id, 'bulk');
        }
        return $retVal;
    }


    public function getModalDelete($id)
    {
        $error = null;

        $menu = Menu::find($id);

        $modal_title = trans($this->trans_path . 'dialog.delete-confirm-menu.title');
        $modal_cancel = trans('general.button.cancel');
        $modal_ok = trans('general.button.ok');

        $modal_route = route('admin.menu.delete', array('id' => $menu->id));

        $modal_body = trans($this->trans_path . 'dialog.delete-confirm-menu.body', ['id' => $menu->id, 'title' => $menu->title]);

        return view('admin.modal_confirmation', compact('error', 'modal_route',
            'modal_title', 'modal_body', 'modal_cancel', 'modal_ok'));

    }

    public function getBulkModalDelete()
    {
        $error = null;

        $modal_title = trans($this->trans_path . 'dialog.delete-bulk-confirm-menu.title');
        $modal_cancel = trans('general.button.cancel');
        $modal_ok = trans('general.button.ok');

        $modal_route = route('admin.menu.delete');

        $modal_body = trans($this->trans_path . 'dialog.delete-bulk-confirm-menu.body');

        return view($this->loadDefaultVars($this->view_path . '.partials._modal_body_bulk_delete'), compact('error', 'modal_route',
            'modal_title', 'modal_body', 'modal_cancel', 'modal_ok'));

    }


    public function checkSlug()
    {
        $slug = Request::input('slug');
        $addUpdate = Request::input('id');
        if ($slug) {
            if ($addUpdate == 'add') {
                $check = Menu::where('slug', "=", $slug)->get();
            } else {
                $check = Menu::where('slug', "=", $slug)
                    ->where('id', '!=', $addUpdate)
                    ->get();
            }
            if (count($check) == 1) {
                return 'no';
            } else {
                return 'yes';
            }
        } else {
            return 'empty';
        }
    }
}
