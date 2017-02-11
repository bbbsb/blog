<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\WechatResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WechatResponseController extends Controller
{
    public function index()
    {
        $arr = WechatResponse::all()->toArray();
        foreach($arr as $v) {
            $responses[$v['name']] = $v['content'];
        }
        return view('admin.wechat.response_index', compact('responses'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        foreach($input as $k=> $v) {
            if($k != '_token') {
                $this->createOrUpdate($k, $v);
            }
        }
        return redirect('admin/wechat/response/index');
    }

    private function createOrUpdate($name, $value)
    {
        WechatResponse::where('name', $name)->delete();
        WechatResponse::create([
            'name' => $name,
            'content' => $value
        ]);
    }

    public function wxl()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            $tmp = '';
            switch ($message->MsgType) {
                case 'event':
                    $tmp = '谢谢亲的关注了';
                    break;
                case 'text':
                    $tmp = '亲的文字信息我收到了';
                    break;
                case 'image':
                    $tmp = '亲的图片信息我收到了';
                    break;
                case 'voice':
                    $tmp = '亲的声音信息我收到了';
                    break;
                case 'video':
                    $tmp = '亲的视频信息我收到了';
                    break;
                case 'location':
                    $tmp = '亲的定位信息我收到了';
                    break;
                case 'link':
                    $tmp = '亲的链接信息我收到了';
                    break;
                // ... 其它消息
                default:
                    $tmp = '亲的信息我收到了';
                    break;
            }
            return $tmp;
        });
        return $wechat->server->serve();
    }
}
