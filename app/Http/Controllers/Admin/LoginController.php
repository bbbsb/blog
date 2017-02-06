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
        session(['login_captcha' => $builder->getPhrase()]);
    }

    public function login(Request $request)
    {
        if($input = $request->all()) {
            if(!session('login_captcha') || strtoupper(session('login_captcha')) != strtoupper($request->get('code'))) {
                return back()->with('error_msg', '验证码错误');
            }
        }
    }
}
