<?php 
session_start();
$id=$_SESSION['id'];
//获取course_id
$course_id=$_SESSION['course_id'];
//根据course_id从数据库获取course_name
$link = mysqli_connect("localhost", "root",'123456','face attendance');
mysqli_select_db($link, "face attendance");
mysqli_set_charset($link, "utf8");
$sql = "select * from teacher_course where course_id='$course_id' " ;
$retval = mysqli_query( $link, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}
while($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)){
	$year=$row["year"];
	$course_name=$row["course_name"];
	$teacher_id=$row["teacher_id"];
}
$sql_1 = "select * from teacher where te_id='$teacher_id' " ;
$retval_1 = mysqli_query( $link, $sql_1 );
while($row_1 = mysqli_fetch_array($retval_1,MYSQLI_ASSOC)){
	$teacher_name=$row_1["te_name"];
}
//echo $course_id;
$date=$_SESSION['date'];
//echo $date;
$course="$year-$teacher_name-$course_name-$course_id";
$path="$course/$date/attendance";
//创建多级目录
function mkdirs($path){
if(!is_dir($path)){
	mkdirs(dirname($path));
	if(!mkdir($path,0777)){
		return false;
	}
}
	return true;
}
	header("content-type:text/html;charset=utf-8");
	//设置时区
	date_default_timezone_set('PRC');
	//获取文件名
	$filename = $_FILES['file']['name'];
	//获取文件临时路径
	$temp_name = $_FILES['file']['tmp_name'];
	//获取大小
	$size = $_FILES['file']['size'];
	//获取文件上传码，0代表文件上传成功
	$error = $_FILES['file']['error'];
	//判断文件大小是否超过设置的最大上传限制
	if ($size > 2*1024*1024){
		//
		echo "<script>alert('文件大小超过2M大小');window.history.go(-1);</script>";
		exit();
	}
	//phpinfo函数会以数组的形式返回关于文件路径的信息 
	//[dirname]:目录路径[basename]:文件名[extension]:文件后缀名[filename]:不包含后缀的文件名
	$arr = pathinfo($filename);
	//获取文件的后缀名
	$ext_suffix = $arr['extension'];
	//设置允许上传文件的后缀
	$allow_suffix = array('jpg','gif','jpeg','png');
	//判断上传的文件是否在允许的范围内（后缀）==>白名单判断
	if(!in_array($ext_suffix, $allow_suffix)){
		//window.history.go(-1)表示返回上一页并刷新页面
	 //   echo "<script>alert('上传的文件类型只能是jpg,gif,jpeg,png');window.history.go(-1);</script>";
		//exit();
	}
	//检测存放上传文件的路径是否存在，如果不存在则新建目录
    var_dump(mkdirs($path));
	//为上传的文件新起一个名字，保证更加安全
	$new_filename = "$id".'.'.$ext_suffix;
	//将文件从临时路径移动到磁盘
	if (move_uploaded_file($temp_name, "$path/".$new_filename)){
		echo "<script>alert('考勤成功！');window.history.go(-1);</script>";
		 $link2 = mysqli_connect("localhost", "root",'123456','face attendance');
                 mysqli_select_db($link2, "face attendance");
                 mysqli_set_charset($link2, "utf8");
	          $sql2 = "update student_course_attendance set ifattend='1'   where date='$date'  and  student_id='$id'" ;
                 $retval2= mysqli_query( $link2, $sql2 );
               
   
		/*echo "<script>alert('文件上传成功！$path');window.history.go(-1);</script>";*/
	}else{
		echo "<script>alert('考勤失败，图片上传失败,错误码：$error');</script>";
	}
 ?>

