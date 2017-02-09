<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;

use App\Http\Requests;

class WechatArticleController extends CommonController
{
    public function index()
    {
        return view('admin/wechat/index');
    }

    public function create()
    {
        return view('admin/wechat/add');
    }
}