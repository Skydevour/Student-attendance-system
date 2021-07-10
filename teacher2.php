<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>teacher2</title>
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
	<?php @session_start();$_SESSION['course_id']=$_GET['course_id'];  ?>
</head>
<body>

	<div class="tm-tpl tpl-white-hn small-item" style-name="tpl-white-hn">
		<!--导航栏-->
		<div class="tpl-left-sidebar">
			<ul>
				<li class="logo">
					<img class="user-upload" src="static/images/4a251abe82900c79733daa753664f701.jpg" alt="admin" title="admin">
					<span></span>
				</li>
				<!--<li class="nav-item active">
				<a href="index.html" class="a-item"><i class="fa fa-home nav-icon" aria-hidden="true"></i><span>首页</span></a>
				</li>
				 -->
				<li class="nav-item">
					<a href="teacher1.php" class="a-item"><i class="fa fa-home nav-icon"></i><span>首页</span></a>
				</li>
				<li class="nav-item">
					<a href="关于我们.html" class="a-item"><i class="fa fa-users nav-icon"></i><span>关于我们</span></a>
					
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
                               					<li><a href="teacher1.php">上一页</a></li>
								<li><a href="exit.php" class="logout"><i class="fa fa-power-off"></i>退出登录</a></li>
							</ul>
						</div>
					</div>
				</div>


			<!--内容-->
				<div class="tpl-content">
					<div class="tpl-pannel clearfix">
						<div class="tpl-h-title">
					
			                    <form id="form" class="form-search" name="form" method="post">
				                <!--<h3>
					                <strong>查询考勤</strong>
				                </h3>-->

						
										
				                <p>
					                  <input class="input-medium search-query" type="text" id="inputfind" name="inputfind" placeholder="按考勤日期搜索" required="required"/>
					                  <button><button1  id="select" name="submit" class="btn" type="submit" onClick="" >查找</button1></button> 									
				                </p>
			                    </form>
					<div id="div"></div>
		                        </div>
	                  
                        <!--表格-->
						<table class="layui-table" lay-even="" lay-skin="row" id="table">
							<colgroup>
								<col width="230">
								<col width="230">
								<col width="230">
								<col width="230">
								<col width="230">
								<col width="230">
							</colgroup>
							<thead>
								<tr>
									<th>考勤日期</th>
									<th>是否已上传照片</th>
									<th>上传照片</th>
									<th>请假人数</th>
									<th>已考勤人数/总人数</th>
									<th>查看已上传照片</th>
								</tr> 
							</thead>
							<?php 	
				 require_once("teacher2后端.php");
				  $input=@$_POST['inputfind'];
                  //查询
	              if(isset($input)){
                  while($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)){ ?>
					        		<td class="item-a" data-id="2" id="date"><?php echo $row["date"] ?></td>
                                    <td class="item-a" data-id="2" id="isupload"><?php  if($row["flag"]==1)  {echo "是";}  else { echo "否";} ?></td>
                                    <td class="item-a" data-id="2" id="upload">上传照片
							   				    <form action="teacher2_upload_server.php?date=<?php echo $row["date"];?>" method="post" enctype="multipart/form-data">
	<label for="file"></label>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="提交">
</form></td>
									<td class="item-a" data-id="2" id="leaveNum"><?php $leaveNum=leavenum($row["date"]);echo $leaveNum."人";?></td>
									<td class="item-a" data-id="2" id="attendedNum"><?php $attendedNum=attendednum($row["date"]); echo $attendedNum."人/".$row_1["student_number"]."人";?></td>
														   <td class="item-a" data-id="2" id="date"><a href="showImgphotograph.php?date=<?php echo $row["date"]?>">查看</a></td>
                              <?php } } else {
						foreach($array as $key=>$values)   {
							?>
	                       <tr>
		                            <td class="item-a" data-id="2" id="date"><?php echo $values->date;?></td>
                                    <td class="item-a" data-id="2" id="isupload"><?php  if($values->flag==1)  {echo "是";}  else { echo "否";}?></td>
                                    <td class="item-a" data-id="2" id="">上传照片
							   		           <form action="teacher2_upload_server.php?date=<?php echo $values->date;?>" method="post" enctype="multipart/form-data">
	<label for="file"></label>
	<input type="file" name="file" id="file"><br>
	<input type="submit" name="submit" value="提交">
</form>
</td>
									<td class="item-a" data-id="2" id="leaveNum"><?php $leaveNum=leavenum($values->date);echo $leaveNum."人";?></td>
									<td class="item-a" data-id="2" id="attendedNum"><?php $attendedNum=attendednum($values->date); echo $attendedNum."人/".$row_1["student_number"]."人";?></td>
							   <td class="item-a" data-id="2" id="date"><a href="showImgphotograph.php?date=<?php echo $values->date?>">查看</a></td>
	                       </tr>
							  <?php } }?>
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
						<a class="f-item-text">SNNU</a>
						<a class="fitem-texy">2019 ©</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="static/layui/layui.js"></script>
	<script type="text/javascript" src="static/js/jquery.min.js"></script>
	<script type="text/javascript" src="static/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="static/js/admin.js"></script>
			<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="js/jquery-1.8.0.min.js"></script>
		<script  type="text/javascript">
	/*			$(function(){
    $(".layui-table tr").click(function(){
var td = $( this ).find( "td" );
	var	d = td.eq( 0 ).html();//提取第一个数据
//$.ajax("teacher2_upload_server.php?date="+date);
//$.post("teacher2_upload_server.php",{date:date});
	//	alert(date);
//date = JSON.stringify(date);
		                          //      var str= JSON.stringify(date);//数组转string
                                //alert(typeof(str));
		var date=d;
                                $.ajax({
                                  url:'showImgphotograph.php',
                                  type:'GET',
                                  data:{date:date},
                                  success:function(data){alert(data);}
                                 // error:function(){alert('php页面有错误！');}
                              });
		return False;
});
				});*/
	</script>  
</body>
</html>
