<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>考勤系统</title>
	<?php session_start();if(!$_SESSION['id']) {
	echo "<script>alert('会话已过期,请重新登录');window.location.href='login.html'</script>";exit(0);}?>
	<link rel="stylesheet" type="text/css" href="static/css/admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="static/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="static/css/global_style.css">
	<link rel="Shortcut Icon" href="ico.ico">
	<style>
		input {width: 200px; height: 28px; border: 1px solid #98AFB7; border-radius:2px;}
		button1 {
			    right: 2 px;
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
</head>
<body>
	<div class="tm-tpl tpl-white-hn small-item" style-name="tpl-white-hn">
		<!--导航栏-->
		<div class="tpl-left-sidebar">
			<ul>
				<li class="logo">
					<img class="user-upload" src="static/images/4a251abe82900c79733daa753664f701.jpg" alt="admin" title="admin">
					<span>LeoAdmin</span>
				</li>
				<li class="nav-item">
					<a href="stu1.php" class="a-item"><i class="fa fa-home nav-icon"></i><span>首页</span></a>
				</li>
				<li class="nav-item">
					<a href="关于我们.html" class="a-item"><i class="fa fa-home nav-icon"></i><span>关于我们</span></a>
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
								<li><a href="个人中心.html">上一页</a></li>
								<li><a href="exit.php" class="logout"><i class="fa fa-power-off"></i>退出登录</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="tpl-content">
					<div class="tpl-pannel">
						<div class="tpl-h-title">
							<a>请上传假条图片</a>
						        <form action="leave后端1.php" method="post" enctype="multipart/form-data">
				                               <input type="hidden" name="max_file_size" value="1048576">
				                               <input type="file" name="file">
				                               <input type="submit" name="上传" id="upload"  >		
							</form>
		<script type="text/javascript"> 
			function show(i)
			{ var s = document.getElementById(i); 
			 s.style.display="block"; 
			} 
			function hide(i){ 
				var h = document.getElementById(i); 
				h.style.display = "none"; 
			} 
//在这里,虽然说定义的变量s和h的意义是一样的,但是不能提取出来,这涉及到了文件的加载,如果提出出来的话,在定义这个变量时是我们还没有这个id属性,是加载不到的,如果一定要提取出来的话,就必须把整个JavaScript的代码放到放到body的最后面 
		</script> 
						</div>
						 
						<table class="layui-table" lay-even="" lay-skin="row" >
						<form name="form1" id="form1" method="post" action="">
							<colgroup>
								<col width="240">
								<col width="240">
								<col width="240">
                                                                <col width="240">
								<col width="240">
								<col width="240">
							</colgroup>
							<thead>
								<tr>
									<th>学号</th>
								    	<th>课程</th>
									<th>日期</th>
									<th>查看假条</th>
									<th>收起假条</th>
									<th>删除假条</th>
								</tr> 
							</thead>
							<?php require_once("leave后端2.php");
								$arr=array();
								$arr=getDirContent($path2);
								for($i=0;$i<count($arr);$i++){
									$arr1=array();
								    $arr1=explode("-",$arr[$i]);
									if($arr1[0]==$id){
							?>
							<tbody>
								<tr>									
								<td><?php echo $arr1[0];;?></td>
								<td><?php echo $course_id;?></td>
								<td><?php echo $arr1[2]."-".$arr1[3]."-".substr($arr1[4],0,2);?></td>
								<td><input type="button" value="查看假条" onClick="show(<?php echo $i;?>)"> </td>
								<td><input type="button" value="隐藏" onClick="hide(<?php echo $i;?>)"></td>
								<td><a href="deleteNote.php?path1=<?php echo $course."/leave/".$arr[$i];?>&path2=<?php echo $course."/".$arr1[2]."-".$arr1[3]."-".substr($arr1[4],0,2)."/leave/".$arr[$i];?>">删除</a></td>
									 		<img src="<?php echo $path2."/".$arr[$i]; ?>" id="<?php echo $i;?>" style="display:none">
								</tr>


									<?php 
									}
								}
								?>
							</tbody>
							</form>		
						</table>
						
							
							
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
	<script type="text/javascript" src="static/layui/layui.js"></script>
	<script type="text/javascript" src="static/js/admin.js"></script>
</body>
</html>

				
