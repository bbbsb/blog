<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends CommonController
{
    public function index()
    {
        return view('admin.login');
    }
}
