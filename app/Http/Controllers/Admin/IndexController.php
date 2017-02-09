<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Request;

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

    public function resetPassword()
    {
        return view('admin.resetpassword');
    }

    public function passwordHandle(Request $request)
    {
        $input = $request->all();
        $validate = $this->validate($request, [
            'password_orginal' => 'required|min:6|max:255',
            'password' => 'required|min:6|max:255',
            'password_c' => 'required|min:6|max:255',
        ]);
        $user = User::find(session('uid'));
        if(Crypt::decrypt($user->password) == $input['password_orginal']) {
            $user->password = Crypt::encrypt($input['password']);
            $user->update();
            return back()->with('msg', '更新密码成功');
        } else {
            return back()->withErrors($validate);
        }
    }
}
