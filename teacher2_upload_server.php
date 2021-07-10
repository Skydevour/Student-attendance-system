<?php 
session_start();
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
$date=$_GET['date'];
$_SESSION['date']=$date;
//echo $date;
$course="$year-$teacher_name-$course_name-$course_id";
$path="$course/$date";
//echo $path;
//$path_detect="$course/$date/detect";
$path_attendance="$course/$date/attendance";
//echo $path_attendance;
$path_total="$course/total";
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
mkdirs($path);
mkdirs($path_attendance);
mkdirs($path_total);
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20971520)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "<script>alert('错误');window.history.go(-1);</script>";
	}
	else
	{
		//echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		//echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		//echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		//echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
	/*	if (file_exists("$path/" . $_FILES["file"]["name"]))
		{
                    echo "<script>alert('文件已经存在');window.history.go(-1);</script>";			
		}
		else
		{*/
$new_filename = "1.jpg";
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
			if(move_uploaded_file($_FILES["file"]["tmp_name"], "$path/$new_filename")){
                $flag=1;
		$sql_3= "UPDATE teacher_course_attendance SET flag='$flag' WHERE course_id='$course_id' and date='$date' ";
		$retval_3 = mysqli_query( $link, $sql_3 );
if(! $retval_3 )
{
    die('无法读取数据: ' . mysqli_error($link));
}
			
	//调用demo.sh,人脸检测
    $var1="/var/www/html/$course/$date/1.jpg";
    $var2="/var/www/html/$course/$date";
    $var3="/var/www/html/$course/$date/detect";
    $shell = "bash pengqiyang/demo.sh ". $var1." ".$var2." ".$var3;
    exec($shell, $result, $status);
    $shell = "<font color='red'>$shell</font>";
		if( !$status ){
		echo "<script>alert('图片已上传,人脸检测成功!');window.history.go(-1);</script>";
		}
}
	   /* } */
	}
}
else
{
	echo "<script>alert('非法的文件格式');window.history.go(-1);</script>";	
}
 ?>
