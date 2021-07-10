<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>考勤</title>
	<?php session_start();if(!$_SESSION['id']) {
	echo "<script>alert('会话已过期,请重新登录');window.location.href='login.html'</script>";exit(0);}?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="static/css/admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="static/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="static/css/global_style.css">
	<link rel="Shortcut Icon" href="ico.ico">
		
<script type="text/javascript">
	<?php session_start(); require_once("stu3h.php"); $date=$_GET['date']; $_SESSION['date']=$date;  ?>
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
  xmlhttp.open("GET","test.php?q="+str,true);
  xmlhttp.send();

}
</script>
</head>
<!--功能实现-->
<body>
	<style>
		input {width: 200px; height: 28px; border: 1px solid #98AFB7; border-radius:2px;}
		button {
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
	<div class="tm-tpl tpl-white-hn small-item" style-name="tpl-white-hn">
		<!--导航栏-->
		<div class="tpl-left-sidebar">
			<ul>
				<li class="logo">
					<img class="user-upload" src="static/images/4a251abe82900c79733daa753664f701.jpg" alt="admin" title="admin">
					<span></span>
				</li>
				<li class="nav-item">
					<a href="stu1.php" class="a-item"><i class="fa fa-home nav-icon"></i><span>首页</span></a>
				</li>
				<li class="nav-item">
					<a href="关于我们.html "class="a-item"><i class="fa fa-users nav-icon"></i><span>关于我们</span></a>	
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
								<li><a href="student2.php?course_id=<?php echo $_SESSION['course_id']?>">上一页</a></li>
								<li><a href="exit.php" class="logout"><i class="fa fa-power-off"></i>退出登录</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!--内容-->

		<div class="tpl-content">
				<div class="tpl-pannel clearfix">
						<!--kaoqing.jpg-->
					<div class = "center-block">
						<?php require_once("stu3h.php");
						echo '<a href="'.$img_photograph.'"><img src="'.$img_photograph.'" width="100%" height="auto" /></a>';  ?>
					</div>				
            <div class="left">      <a><style=margin-top:0.75rem >
             <form method="post">
			<input style=margin-top:0.75rem  class="input-medium search-query"  type="text" class="input-medium search-query"     id="order"  name="order"  placeholder="请输入你的序号"  required="required">
			&nbsp; 
			</form>
				
				<div>
				&nbsp; 
				</div>
				
			<div class ="left">
		    <button type="button"  id="no" name="no" onClick="no()"  >提交</button>
				<div class="center" style="color:#00FF00">
								 <a  href="找不到序号.html"><font color="red">找不到序号？上传截取的人脸图片</font></a>  
					</div>
			</div>
		       <div class = "center-block">
					
					&nbsp; 
					&nbsp; 	&nbsp; 	&nbsp; 
				<a><h4>您选择的图片是：</h4></a>
							<?php require_once("stu3h.php");
							echo '<a href="'.$image_show.'"><img src="'.$image_show.'" width="10%" height="20%" /></a>';  ?>
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
	
