<?php
session_start();
$id=$_SESSION_['id'];
$course_id=$_GET['course_id'];
$_SESSION['course_id']=$course_id;
$id=$_SESSION['id'];
//连接数据库
$array = array();
$link = mysqli_connect("localhost", "root",'123456','face attendance');
mysqli_select_db($link, "face attendance");
mysqli_set_charset($link, "utf8");
$today = date("Y-m-d");
$sql = "select * from student_course_attendance where course_id='$course_id'  and date<='$today'  and student_id='$id'  order  by date    desc" ;
$retval = mysqli_query( $link, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}
while($row= mysqli_fetch_object($retval)) {$array[] = $row;}
return $array;
?>
