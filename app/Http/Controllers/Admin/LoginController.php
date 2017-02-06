<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends CommonController
{
    public function index()
    {
        return view('admin.login');
    }

    public function captcha()
    {
        $builder = new CaptchaBuilder();
        $builder->build();
        $builder->output();
    }
}
