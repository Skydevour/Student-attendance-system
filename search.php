<?php
//根据id显示班级
session_start();
$date=$_GET['date'];
$_SESSION['date']=$date;
$course_id=$_GET['course_id'];
$id=$_SESSION['id'];
function findclass(){
   $link = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($link, "face attendance");
    mysqli_set_charset($link, "utf8");
 $course_id=$_GET['course_id'];   
	$_SESSION['course_id']=$course_id;
$sql2 = "select * from student_course where course_id=$course_id " ;
$retval2= mysqli_query( $link, $sql2 );
if(! $retval2)
{
    die('无法读取数据: ' . mysqli_error($link));
}
while($row2 = mysqli_fetch_array($retval2,MYSQLI_ASSOC)){
	$year=$row2["year"];
	$course_name=$row2["course_name"];
	$teacher_name=$row2["te_name"];
} 
 $course="$year-$teacher_name-$course_name-$course_id";  
    
$sql = "select * from student where  st_id='$id' " ;
$retval = mysqli_query( $link, $sql );
		if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($retval,MYSQLI_ASSOC); 
	//echo $row['st_class'];
    return $course;
}


$course=findclass();
$img_photograph="$course/$date/1.jpg";
?>