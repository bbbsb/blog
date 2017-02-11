<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Model\WechatArticle;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

use App\Http\Requests;

class WechatArticleController extends CommonController
{
    public function index()
    {
        $articles = WechatArticle::all();
        return view('admin/wechat/index', compact('articles'));
    }

    public function create()
    {
        return view('admin/wechat/add');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rst = WechatArticle::create([
           'title' => $input['title'],
            'cover' => '123',
            'content' => $input['content'],
            'author' => $input['author']
        ]);
        if($rst) {
            return redirect('admin/wechat/article/index');
        } else {
            return back()->with('msg', '添加文章失败');
        }
    }

    public function publish()
    {
        $app = $this->app();
        $userService = $app->user;
        dd($userService->lists());
    }

    public function app()
    {
        $cfg = [
            'debug' => true,
            'app_id'  => env('WECHAT_APP_ID'),         // AppID
            'secret'  => env('WECHAT_SECRET'),     // AppSecret
            'token'   => env('WECHAT_TOKEN'),          // Token
            //'aes_key' => env('WECHAT_AES_KEY'),                    // EncodingAESKey，安全模式下请一定要填写！！！

            'log' => [
                'level'      => 'debug',
                'permission' => 0777,
                'file'       => '/tmp/easywechat.log',
            ],
        ];
        return new Application($cfg);
    }
}
