<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('public/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('public/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			@if(session('error_msg'))
			<p style="color:red">{{session('error_msg')}}</p>
			@endif
			<form action="" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/captcha')}}" alt="验证码" onclick="this.src='{{url('admin/captcha')}}'+'?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="{{url('/')}}">返回首页</a> &copy; {{date('Y')}} Powered by 包包不是包</p>
		</div>
	</div>
</body>
</html>