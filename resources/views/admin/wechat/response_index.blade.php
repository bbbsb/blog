<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('public/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('public/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/js/ch-ui.admin.js')}}"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/')}}">首页</a> &raquo; <a href="#">微信自动回复</a>
    </div>
    <!--面包屑导航 结束-->
    <!--搜索结果页面 列表 开始-->
    <form action="{{url('admin/wechat/response/update')}}" method="post">
        {{csrf_field()}}
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
        <div class="result_wrap">
            文本消息回复：
            <textarea name="text" id="" cols="20" rows="8">{{$responses['text']}}</textarea>
        </div>
        <div class="result_wrap">
            图片消息回复：
            <textarea name="image" id="" cols="20" rows="8">{{$responses['image']}}</textarea>
        </div>
        <div class="result_wrap">
            视频消息回复：
            <textarea name="video" id="" cols="20" rows="8">{{$responses['video']}}</textarea>
        </div>
        <div class="result_wrap">
            声音消息回复：
            <textarea name="voice" id="" cols="20" rows="8">{{$responses['voice']}}</textarea>
        </div>
        <div class="result_wrap">
            链接消息回复：
            <textarea name="link" id="" cols="20" rows="8">{{$responses['link']}}</textarea>
        </div>
        <div class="result_wrap">
            坐标消息回复：
            <textarea name="position" id="" cols="20" rows="8">{{$responses['position']}}</textarea>
        </div>
        <div class="result_wrap">
            图文消息回复：
            <textarea name="picture-article" id="" cols="20" rows="8">{{$responses['picture-article']}}</textarea>
        </div>
        <div class="result_wrap">
            文章消息回复：
            <textarea name="article" id="" cols="20" rows="8">{{$responses['article']}}</textarea>
        </div>
        <div class="result_wrap">
            <b>默认回复消息：</b>
            <textarea name="default" id="" cols="20" rows="8">{{$responses['default']}}</textarea>
        </div>
        <div class="result_wrap">
            <input type="submit" value="提交更新">
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->



</body>
</html>