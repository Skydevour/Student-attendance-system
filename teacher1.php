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
					<img src="static/images/4a251abe82900c79733daa753664f701.jpg" >
					
				</li>
				
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
						<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>导入课表</h4></a></button></td>
						<div class="tpl-userbar">
							<ul>
								<li><a href="javascript:;" class="dashboard" tag="style-bar"><i class="fa fa-dashboard"></i></a></li>
								<li><a href="login.html">上一页</a></li>
								<li><a href="exit.php" class="logout"><i class="fa fa-power-off"></i>退出登录</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!--内容-->
				<div class="tpl-content">
					<div class="tpl-pannel clearfix">
						<div class="tpl-h-title">
							<a>本周课程表</a>
						</div>
						<table class="layui-table" lay-even="" lay-skin="row">
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
									<th>节数</th>
									<th>星期一</th>
									<th>星期二</th>
									<th>星期三</th>
									<th>星期四</th>
									<th>星期五</th>
								</tr> 
							</thead>
							<tbody>
								<tr>
									<td>一、二节</td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>人工智能  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>大学体育  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>软件工程  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>电路基础  上传照片</h4></a></button></td>
                                    					<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>Java  上传照片</h4></a></button></td>
								</tr>
								<tr>
									<td>三、四节</td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>数据库原理  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>电子技术基础  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>计算机组织与结构  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>数据库原理  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>计算机组织与原理  上传照片</h4></a></button></td>
								</tr>
                                				<tr>
									<td>五、六节</td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>电路基础  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>软件工程  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>Java  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>软件工程  上传照片</h4></a></button></td>
                                    					<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>Java  上传照片</h4></a></button></td>
								</tr>
								<tr>
									<td>七、八节</td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>数据库原理  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>数字逻辑  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>计算机组织与结构  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>数据库原理  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>计算机组织与结构  上传照片</h4></a></button></td>
								</tr>
                                <tr>
									<td>九、十节</td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>数据库原理  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>电子技术基础  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>计算机组织与结构  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>数据库原理  上传照片</h4></a></button></td>
									<td><button class="btn btn-info" type="button"><a href="student2.html"><h4>计算机组织与原理  上传照片</h4></a></button></td>
									
								</tr>

							</tbody>
						</table> 
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
										<input 	 type="text" class="input-medium search-query"   name="inputfind" id="inputfind" placeholder="按课程名搜索" required="required"/>
											<button><button1  type="submit"   >查找</button1></button>
									</p>
								</form>
							</a>							     
						</div>
						<table class="layui-table" lay-even="" lay-skin="row">
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
									<th>年份</th>
									<th>学期</th>
									<th>课程名</th>
									<th>班级名</th>
									<th>已上传照片数/应上传照片数</th>
									<th>查看考勤情况</th>
								</tr> 
							</thead>
							<tbody>
								<?php 
								require_once("teacher1后端.php");
								$input=@$_POST['inputfind'];
								//如果查找为空
	                            if(!isset($input)){								
								foreach($array as $key=>$values){  ?>
								<tr>
									<td><?php echo $values->year;?></td>
									<td><?php if($values->time==1) echo "第一学期";else echo "第二学期";?></td>
									<td><?php echo $values->course_name;?></td>
									<td><?php echo $values->class;?></td>
									<td>
								        <?php 
											$factNum=0;$totalNum=0;$nowdate=date("Y-m-d");
											$course_id=$values->course_id;																					 
											$sql_1 = "select * from teacher_course_attendance where course_id='$course_id'" ;
                                            $retval_1 = mysqli_query( $link, $sql_1 );
		                                       if(! $retval_1 )
                                               {die('无法读取数据: ' . mysqli_error($link));}																					 
                                            while($row_1 = mysqli_fetch_array($retval_1,MYSQLI_ASSOC)){
												if($row_1["date"]<=$nowdate){ 
													$totalNum++;
												    if($row_1["flag"]==1) { $factNum++;}
												}
											}
											echo $factNum."次/".$totalNum."次";																					 
									    ?>
									</td>
									<td class="item-a">
									    <a href="teacher2.php?course_id=<?php echo $course_id;?>" ><h4>进入</h4></a>
										<a href="excel.php?cid=<?php echo $course_id;?>"><h4>下载课程总体考勤情况</h4></a>
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
									<td><?php echo $values->class;?></td>
									<td class="item-a">
								        <?php 
											$factNum=0;$totalNum=0;$nowdate=date("Y-m-d");
											$course_id=$values->course_id;																					 
											$sql_3 = "select * from teacher_course_attendance where course_id='$course_id'" ;
                                            $retval_3 = mysqli_query( $link, $sql_3 );
		                                       if(! $retval_3 )
                                               {die('无法读取数据: ' . mysqli_error($link));}																					 
                                            while($row_3 = mysqli_fetch_array($retval_3,MYSQLI_ASSOC)){
												if($row_3["date"]<=$nowdate){ 
													$totalNum++;
												    if($row_3["flag"]==1) { $factNum++;}
												}
											}
											echo $factNum."次/".$totalNum."次";																					 
									    ?>
									</td>
									<td>
									    <a href="teacher2.php?course_id=<?php echo $course_id;?>"><h4>进入</h4></a>
										<a href="excel.php?cid=<?php echo $course_id;?>"><h4>下载课程总体考勤情况</h4></a>
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
</body>
</html>
