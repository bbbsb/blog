<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }
}
