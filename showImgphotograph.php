<!DOCTYPE html>
<html>
	<body>
<?php
session_start();
$course_id=$_SESSION['course_id'];
		$date=$_GET['date'];
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
$course="$year-$teacher_name-$course_name-$course_id";	
$img_photograph="$course/$date/2.jpg";
echo '<img src="'.$img_photograph.'" width="100%" height="auto" /> ';
?>
    </body>
</html>
