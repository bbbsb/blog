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
        $responses = [];
        foreach($arr as $v) {
            $responses[$v['name']] = $v['content'];
        }
        if(empty($responses)) {
            $responses['text'] = '亲的文字信息我收到了';
            $responses['event'] = '谢谢亲的关注了';
            $responses['image'] = '亲的图片信息我收到了';
            $responses['video'] = '亲的视频信息我收到了';
            $responses['voice'] = '亲的声音信息我收到了';
            $responses['link'] = '亲的链接信息我收到了';
            $responses['picture-article'] = '亲的文字信息我收到了';
            $responses['article'] = '亲的文字信息我收到了';
            $responses['default'] = '亲的信息我收到了';
            $responses['location'] = '亲的定位信息我收到了';
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

    private function getContent($name)
    {
        $content = WechatResponse::where('name', $name)->first();
        $rst = '';
        if($content) {
            $rst= $content->toArray();
            $rst = $rst['content'];
        }
        return $rst;
    }

    public function wxl()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            $tmp = '';
            switch ($message->MsgType) {
                case 'event':
                    $tmp =  $this->getContent('event') ? : '谢谢亲的关注了';
                    break;
                case 'text':
                    $tmp = $this->getContent('text') ? : '亲的文字信息我收到了';
                    break;
                case 'image':
                    $tmp = $this->getContent('image') ? : '亲的图片信息我收到了';
                    break;
                case 'voice':
                    $tmp = $this->getContent('voice') ? : '亲的声音信息我收到了';
                    break;
                case 'video':
                    $tmp = $this->getContent('video') ? : '亲的视频信息我收到了';
                    break;
                case 'location':
                    $tmp = $this->getContent('location') ? : '亲的定位信息我收到了';
                    break;
                case 'link':
                    $tmp = $this->getContent('link') ? : '亲的链接信息我收到了';
                    break;
                // ... 其它消息
                default:
                    $tmp = $this->getContent('default') ? : '亲的信息我收到了';
                    break;
            }
            return $tmp;
        });
        return $wechat->server->serve();
    }
}
