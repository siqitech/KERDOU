<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录KERDOU管理平台</title>
<link href="/public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/public/common/jquery/jquery.min.js"></script>
<script src="/public/admin/js/cloud.js" type="text/javascript"></script>
<script src="/public/common/layer/layer.js" type="text/javascript"></script>
<script src="/public/common/jquery/jquery.validate.min.js" type="text/javascript"></script>
<script src="/public/common/jquery/jquery.metadata.js" type="text/javascript"></script>
<link rel="stylesheet" href="/public/common/font-awesome/css/font-awesome.min.css">
<style type="text/css" media="screen">
	body{background-color:#1c77ac; background-image:url(/public/admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;}
</style>
<script language="javascript">
	$(function(){
    	$('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
		$(window).resize(function(){  
	    	$('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	    })  
	});  
</script>
</head>
<body>
	<div id="mainBody">
		<div id="cloud1" class="cloud"></div>
		<div id="cloud2" class="cloud"></div>
	</div>
	<div class="logintop">
		<span>欢迎登录KERDOU管理平台</span>
		<ul>
			<li>
				<a href="/front/home">回首页</a>
			</li>
			<li>
				<a href="#">帮助</a>
			</li>
			<li>
				<a href="#">关于</a>
			</li>
		</ul>
	</div>
	<div class="loginbody">
		<span class="systemlogo"></span>
		<div class="loginbox">
			<ul>
			<form name="loginForm" id="loginForm" method="post">
				<li>
					<input name="loginuser" id="loginuser" required type="text" class="loginuser" value=""/><small class="errtip"></small>
				</li>
				<li>
					<input name="loginpwd" id="loginpwd" required type="password" class="loginpwd" value=""/><small class="errtip"></small>
				</li>
				<li>
					<input type="submit" class="loginbtn" value="登录" />
					<label>
						<input name="rememb" type="checkbox" value="" checked="checked" />
						记住密码
					</label>
					<label>
						<a href="#">忘记密码？></a>
					</label>
				</li>
			</form>
			</ul>
		</div>
	</div>
	<div class="loginbm">
		版权所有  &copy;2015
		<a href="http://www.udobe.cn">udobe.cn</a>
		Now Or Never !
	</div>
	<script type="text/javascript" charset="utf-8">
		$().ready(function() {
			$("#loginForm").validate({
				rules: {
					loginuser: {
						required: true,
						minlength: 5,
					},
					loginpwd: {
						required: true,
						minlength: 6,
					}
				},
				messages: {
					loginuser: {
						required: '<i style="color:#f00" class="fa fa-times"></i>',
						minlength: '<i style="color:#f00" class="fa fa-times"></i>',
					},
					loginpwd: {
						required: '<i style="color:#f00" class="fa fa-times"></i>',
						minlength: '<i style="color:#f00" class="fa fa-times"></i>',
					}
				},
				onfocus: true,　　　　
         		onkeyup: false,　
				errorPlacement: function(error, element) {  
				    error.appendTo(element.next('small'));  
				},
				submitHandler:function(form){ 
					var account  = $('#loginuser').val();
					var password = $('#loginpwd').val();
					$.post('/public/admin/Access/validatePasswd',{'account':account,'password':password},
						function(data){
							var data = jQuery.parseJSON(data);
							if (data.code == 1) {
								form.submit();
							} else {
								layer.alert('账号或密码错误，请重新输入！',{title:'温馨提示',icon:2});
							}
					}); 
		        }    
			})
		})
	</script>
</body>
</html>