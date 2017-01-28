<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\AdminBaseController;
use App\Models\Page;
use Illuminate\Support\Facades\Request;
use AppHelper;
use Flash;
use App\Models\Menu;
use App\Models\Menu_Page;

class PageApiController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $page['pages'] = Menu::with(array('pages' => function ($query) {
//            $query->orderBy('sort_order', 'asc');
//        }))->find($id);

        $menu = Menu::find($id);
        $page['pages'] = $menu->pages()->orderBy('sort_order', 'asc')->get();

        $page['all'] = Page::select('pages.*')
            ->leftJoin('menu_page', 'menu_page.page_id', '=', 'pages.id')
            ->whereNotIn(
                'id', Menu_Page::select('page_id as id')
                ->where('menu_id', '=', $id)
                ->get()
            )->groupBy('id')
            ->get();

        return $page;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $nodes = Request::input('data');

        $return = array();
        $count = -1;
        $page_id = [];
        array_walk_recursive($nodes, function ($a, $key) use (&$return, &$count) {
            if ($key == 'id') {
                $count++;
            }
            $return[$count][$key] = $a;
        });

        foreach ($return as $r) {
            $page_id[$r['page_id']] = [
                'parent_id' => $r['parent_id'],
                'sort_order' => $r['sort_order']
            ];
        }
        $menu = Menu::find($id);
//        $menu->pages()->detach();
        if ($menu->pages()->sync($page_id)) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    /**
     * change details like title and status
     * in menu_page of specific page
     * override the main page title and status
     */

    public function updatePageDetails(Request $request, $id)
    {
        $title = Request::input('title');
        $menu_page = Menu_Page::where('pivot_id', $id);

        if ($menu_page->update(['title' => $title])) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    public function enableOrDisablePage(Request $request, $id)
    {
        $status = Request::input('status') == 1 ? 0 : 1;

        $menu_page = Menu_Page::where('pivot_id', $id);

        if ($menu_page->update(['status' => $status])) {
            return 'success';
        } else {
            return 'fail';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
