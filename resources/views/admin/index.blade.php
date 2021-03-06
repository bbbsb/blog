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
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：admin</li>
				<li><a href="{{url('admin/resetpassword')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/logout')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>常用操作</h3>
                <ul class="sub_menu">
                    <li><a href="wechat/add.blade.php" target="main"><i class="fa fa-fw fa-plus-square"></i>添加页</a></li>
                    <li><a href="list.html" target="main"><i class="fa fa-fw fa-list-ul"></i>列表页</a></li>
                    <li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>
                    <li><a href="img.blade.php" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">
                    <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
                    <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>微信文章</h3>
                <ul class="sub_menu" style="display: block">
                    <li><a href="{{url('admin/wechat/article/index')}}" target="main"><i class="fa fa-fw fa-cubes"></i>微信文章列表</a></li>
                    <li><a href="{{url('admin/wechat/article/create')}}" target="main"><i class="fa fa-fw fa-database"></i>添加文章</a></li>
                    <li><a href="{{url('admin/wechat/response/index')}}" target="main"><i class="fa fa-fw fa-database"></i>微信回复</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="element.blade.php" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © {{date('Y')}} Powered By 包包不是包
	</div>
	<!--底部 结束-->
</body>
</html>