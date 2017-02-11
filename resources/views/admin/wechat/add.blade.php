<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('public/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('public/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" src="{{asset('public/third-party/uploadify/jquery.uploadify.js')}}"> </script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="#" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="">
                                <option value="">==请选择==</option>
                                <option value="19">精品界面</option>
                                <option value="20">推荐界面</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="title">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" name="author">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>封面：</th>
                        <td><input type="file" name="cover" id="upload_thumb"></td>
                    </tr>
                    <tr>
                        <th>详细内容：</th>
                        <td>
                            <textarea class="lg" name="content" id="content"></textarea>
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <script>
        var ue = UE.getEditor('content', {
            initialFrameWidth:800,  //初始化编辑器宽度,默认1000
            initialFrameHeight:300
        });
    </script>
    <script>
        $(function() {
            $("#upload_thumb").uploadify({
                height        : 30,
                swf           : "{{asset('public/third-party/uploadify/uploadify.swf')}}",
                uploader      : "{{asset('public/third-party/uploadify/uploadify.php')}}",
                width         : 120,
                'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                    alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
                }
            });
        });
    </script>
</body>
</html>