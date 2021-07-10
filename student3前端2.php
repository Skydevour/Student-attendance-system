<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>考勤系统</title>
			<?php session_start();require_once("student3后端2.php");
	if(!$_SESSION['id']){
			 echo"<script type='text/javascript'>alert('请重新登陆');location='login.html';</script>";exit(0);
	} ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Le styles -->
<link href="css/bootstrap-combined.min.css" rel="stylesheet">
<link href="css/layoutit.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="static/css/admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="static/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="static/css/global_style.css">
	<link rel="Shortcut Icon" href="ico.ico">
		<html lang="en"></html>
	<script>
function isattend(){
		"<?php if(isattended()){ ?>"
		alert("已考勤成功,请勿重复考勤"); 
		document.getElementById("no").setAttribute("disabled","true" );exit(0);
	"<?php } ?>"
}
function yes()
{
	"<?php if(isattended()){ ?>"
		alert("已考勤成功,请勿重复考勤"); 
		document.getElementById("yes").setAttribute("disabled","true" );exit(0);
	"<?php } ?>"
  var str="yes";
  var xmlhttp;
  if (str.length==0)
  { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest)
  {
    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      alert(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","student3_copy.php?q="+str,true);
  xmlhttp.send();
}
function no()
{
  var str=document.getElementById("order").value;
  var xmlhttp;
  if (str.length==0)
  { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest)
  {
    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      alert(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","student3_copy.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
	<style>
		input { width: 200px; height: 28px; border: 1px solid #98AFB7; border-radius:2px;}
		button1 {
			    right: 2px;
			    display: inline-block;
			    height: 28px;
			    line-height: 28px;
			    padding: 0 18px;
			    background-color: #009688;
			    color: #fff;
			    text-align: center;
			    font-size: 14px;
			    border: none;
			    border-radius: 2px;
			    cursor: pointer;
			}
	</style>	
 	
<body>
	<div class="tm-tpl tpl-white-hn small-item" style-name="tpl-white-hn">
		<!--导航栏-->
		<div class="tpl-left-sidebar">
			<ul>
				<li class="logo">
					<img class="user-upload" src="static/images/4a251abe82900c79733daa753664f701.jpg" alt="admin" title="admin">
					<span></span>
				</li>
				<li class="nav-item">
					<a href="login.html" class="a-item"><i class="fa fa-home nav-icon"></i><span>首页</span></a>
				</li>
				<li class="nav-item">
					<a href="auth_index.html" class="a-item"><i class="fa fa-users nav-icon"></i><span>关于我们</span></a>
					
				</li>
			</ul>
		</div>
		<!--右侧内容-->
		<div class="tpl-right-item">
			<div class="tpl-body">
				<!--头部-->
				<div class="tpl-header">
					<div class="tpl-header-fluid">
						<div class="tpl-userbar">
							<ul>
								<li><a href="javascript:;" class="dashboard" tag="style-bar"><i class="fa fa-dashboard"></i></a></li>
								<li><a href="newleave.php">请假</a></li>
								<li><a href="student2.php">上一页</a></li>
								<li><a href="exit.php" class="logout"><i class="fa fa-power-off"></i>退出</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!--内容-->

				<div class="tpl-content">
					<div class="tpl-pannel clearfix">
						<!--kaoqing.jpg-->
						<div class = "center-block">
						<?php require_once("student3后端2.php");
						echo '<a href="'.$img_photograph.'"><img src="'.$img_photograph.'" width="100%" height="auto" /></a>';  ?>
						</div>				
                                                <div class="tpl-h-title">
							<a><style=margin-top:0.75rem >
								<form class="layui-form layui-col-md7" method="post">
					<p>
						<strong>这张照片是你吗？</strong>
					</p>
					<?php 
							echo '<a href="'.$img_detected.'"><img src="'.$img_detected.'" width="20%" height="20%" /></a>'; 
                    ?>
								</form>
							</a>								     
						</div>

								<div class="col-lg-3">
<!-- 按钮触发模态框 否-->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" name="no" id="no" onClick="isattend()">
	否
</button>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog" style="z-index : 1200" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					手动选择你的序号
				</h4>
			</div>
			<!-- 输入框代码-->
			<div style="padding: 100px 100px 10px;">
	<form class="bs-example bs-example-form" role="form" method="post">
		<div class="input-group">
			<span class="input-group-addon">@</span>
			<input type="text" class="form-control" placeholder="请输入你的序号" id="order" name="order">
		</div>
		<br>
		<br>
	</form>
</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onClick="no()" name="submit" id="submit">提交
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>		
						<div class="col-lg-5"> 
					<!-- 按钮触发模态框 是 -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModa2" onClick="yes()" id="yes" name="yes" >
	是
	</button>
    </div>
    <div class="ma0 clearfix small-wrapper" style="max-width: 7000px; width: 100%; ">
	</div>
				

						<div class="center" style="color:#00FF00">
								 <a  href="找不到序号.html"><font color="red">找不到序号？上传截取的人脸图片</font></a>  
						</div>
				</div>
                </div>
           
				<!--配色方案-->
				<div class="right-bar style-bar">
					<div class="right-bar-fluid">
						<div class="tpl-header-text">配色方案</div>
						<ul class="style-item clearfix" id="style-list">
							<li data-style="tpl-black-n">
								<div class="header-style"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-black-hn">
								<div class="header-style black-child"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-red-hn">
								<div class="header-style red-child"></div>
								<div class="left-style red">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-red-n">
								<div class="header-style"></div>
								<div class="left-style red">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-blackred-hn">
								<div class="header-style red"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-blackgreen-hn">
								<div class="header-style green"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-green-hn">
								<div class="header-style green-child"></div>
								<div class="left-style green">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-green-n">
								<div class="header-style"></div>
								<div class="left-style green">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-white-hn">
								<div class="header-style"></div>
								<div class="left-style white">
									<div class="logo-style"></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!--用户信息-->
				<div class="right-bar user-bar">
					<div class="right-bar-fluid">
						<div class="tpl-card">
							<div class="card-pannel">
								<div class="user-item">
									<img class="user-upload" src="static/images/4a251abe82900c79733daa753664f701.jpg">
									<h4 class="user-name">admin</h4>
									<div class="user-tips">
										<a href="javascript:;" data-tips="13138003682"><i class="fa fa-phone"></i></a>
										<a href="javascript:;" data-tips="you can goin!"><i class="fa fa-star"></i></a>
										<a href="javascript:;" data-tips="547720744"><i class="fa fa-qq"></i></a>
										<a href="javascript:;" data-tips="Mr.LIU"><i class="fa fa-wechat"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--尾部-->
				<div class="tpl-footer">
					<div class="tpl-footer-fluid">
						<a class="f-item-text">厚德积学 励志敦行</a>
						<a class="f-item-text">snnu</a>
						<a class="fitem-texy">2019 ©</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	



