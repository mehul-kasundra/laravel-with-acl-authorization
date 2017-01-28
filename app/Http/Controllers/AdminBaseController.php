<?php

namespace App\Http\Controllers;

use View;
use App\Models\Language;
use AppHelper;

class AdminBaseController extends AppBaseController
{

    /**
     * External packages must set to false
     *
     * @var bool
     */
    protected $app_model = true;

    public function __construct()
    {
        /*
         * !! Not to remove !!
         */
        parent::__construct();
    }

    /**
     * Delete confirmation for list pages
     *
     * @param $pk
     * @return View
     */
    protected function getModalDelete($pk)
    {
        $error = null;

        $model = $this->model;
        $data = $model::ByActiveLang()->pk($pk)->first();

        $modal_title = trans($this->trans_path . 'dialog.delete-confirm.title');
        $modal_cancel = trans('general.button.cancel');
        $modal_ok = trans('general.button.ok');
        $modal_name = isset($data->name) ? $data->name : $data->title;
        $modal_route = route($this->base_route . '.delete', array('id' => $data->primary_key));

        $modal_body = trans($this->trans_path . 'dialog.delete-confirm.body', ['id' => $data->primary_key, 'name' => $modal_name]);

        return view('modal_confirmation', compact('error', 'modal_route',
            'modal_title', 'modal_body', 'modal_cancel', 'modal_ok'));

    }

    /**
     * Assign variables to passed view and
     * return passed view path
     *
     * @param $view_path View to which value is to be assigned
     * @param array $params
     * @return mixed
     */
    protected function loadDefaultVars($view_path, $params = [])
    {
        try {

            View::composer($view_path, function ($view) use ($view_path, $params) {

                //$transPath = AppHelper::getTransPathFromViewPath($view_path, true);
                $file_name = AppHelper::getFileNameFormViewPath($view_path);

                //  Make Translation Path from passed View Path
                $view->with('trans_path', $this->trans_path);

                // Make View Path available to view
                $view->with('view_path', AppHelper::getBasePathFromViewPath($view_path, true));
                // Make route prefix available
                $view->with('base_route', $this->base_route);

                // Image path
                $view->with('image_path', $this->imagePath);

                // Site Configuartion array
                $view->with('infos', $this->site_infos);

                // Page Title
                $view->with('page_title', trans($this->trans_path . 'general.page.' . $file_name . '.title'));
                // Page Description
                $view->with('page_description', trans($this->trans_path . 'general.page.' . $file_name . '.description'));



            });

            return $view_path;

        } catch (\Exception $e) {
            AppHelper::exceptionHandler($e);
        }
    }
    

}
