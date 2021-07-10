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
	    <style type="text/css">
        body { font:14px/1.5 "microsoft yahei","\5FAE\8F6F\96C5\9ED1",tahoma,arial }
        ul_1,li_1,div {
            margin: 0;
            padding: 0;
        }
        ul_1,li_1 { list-style: none; }
        li_1 {
            float: left;
            margin-left: 5px;
            padding: 0 8px;
            border: 1px solid #999;
            color: #000;
            line-height: 24px;
        }

    </style>
</head>
<body>
	<div class="tm-tpl tpl-white-hn small-item" style-name="tpl-white-hn">
		<!--导航栏-->
		<div class="tpl-left-sidebar">
			<ul>
				<li class="logo">
					<img  src="static/images/4a251abe82900c79733daa753664f701.jpg" >
					<span>Welcome</span>
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
								<li><a href="login.php">上一页</a></li>
							<li><a href="exit.php" class="logout"><i class="fa fa-power-off"></i>退出登录</a></li>
							</ul>
						</div>
					</div>
				</div>
				
		
				<!--历史考勤-->
				
				<!--内容-->
				<div class="tpl-content">
					<div class="tpl-pannel clearfix">
						<div class="tpl-h-title">
							<a>
								<form class="form-search" method="post">
									<p>
										<input 
											 type="text" class="input-medium search-query"   name="inputfind" id="inputfind" placeholder="按课程名搜索" required="required">
											<button1  type="submit"   >查找</button1>
									</p>
								</form>
							</a>


														     
						</div>
							<table class="layui-table" lay-even="" lay-skin="row">
							<colgroup>
								<col width="276">
								<col width="276">
								<col width="276">
								<col width="276">
								<col width="276">
							</colgroup>
							<thead>
								<tr>
									<th>年份</th>
									<th>学期</th>
									<th>课程名</th>
									<th>教师</th>
									<th>进入考勤</th>
								</tr> 
							</thead>
							<tbody>
								<?php 
								require_once("stu1h.php");
								$input=@$_POST['inputfind'];
								//如果查找为空
	                            if(!isset($input)){								
								foreach($array as $key=>$values){  ?>
								<tr>
									<td><?php echo $values->year;?></td>
									<td><?php if($values->time==1) echo "第一学期";else echo "第二学期";?></td>
									<td><?php echo $values->course_name;?></td>
									<td><?php echo $values->te_name;?></td>
									<td class="item-a">
									    <a href="student2.php?course_id=<?php echo $values->course_id;?>" >进入</a>
									</td>
								</tr>
								<?php  } } 
								//如果查找不空
								else {
							     foreach($array_1 as $key=>$values){
								?>
								<tr>
									<td><?php echo $values->year;?></td>
									<td><?php if($values->time==1) echo "第一学期";else echo "第二学期";?></td>
									<td><?php echo $values->course_name;?></td>
									<td><?php echo $values->te_name;?></td>
									<td class="item-a">
									    <a href="student2.php?course_id=<?php echo $values->course_id;;?>" >进入</a>
									</td>
								</tr>
								<?php } }?>
							</tbody>
						</table>
					<!--翻页,如果查找为空才显示分页-->
					<?php if(!isset($input)){ ?>
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span12">
								<div class="pagination pagination-centered">
				<ul_1>
					<li_1><a href="?pageNum=1">首页</a></li_1>
						<li_1><a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1);?>"> 上一页</a></li_1>
						<?php for($i=1;$i<=$endPage;$i++){ ?>						
					<li_1><a href="?pageNum=<?php echo $i; ?>"><?php echo $i;?></a></li_1>
						<?php   }  ?>
					<li_1><a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1);?>">下一页</a></li_1>
					<li_1 ><a href="?pageNum=<?php echo $endPage;?>">尾页</a></li_1>
				</ul_1>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
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
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
