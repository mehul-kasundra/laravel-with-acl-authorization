<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignController extends AdminBaseController
{
    public function error_page()
    {
        return view($this->loadDefaultVars('design.404'));
    }
}
