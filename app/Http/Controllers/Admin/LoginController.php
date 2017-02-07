<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Model\User;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

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
            $rst = User::where('name', $input['username'])->first();
            if(!$rst) {
                return back()->with('error_msg', '用户名不存在');
            }
            if(Crypt::decrypt($rst->password) != $input['password']) {
                return back()->with('error_msg', '密码不正确');
            }
            session(['uid' => $rst->id, 'username' => $rst->name]);
            return redirect('admin/index');
        }
    }
}
