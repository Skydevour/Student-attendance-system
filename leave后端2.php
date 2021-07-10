<?php
session_start();
$id=$_SESSION['id']; //获取id
$course_id=$_SESSION['course_id']; //获取course_id
//$course_id="201801";
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
$date=$_SESSION['date']; //获取date
//$date="2019-09-04";
$course="$year-$teacher_name-$course_name-$course_id";
$path="$course/$date"."/leave";
$path2="$course"."/leave";


//查看假条
//获取leave下的文件名
function getDirContent($path){
  if(!is_dir($path)){
    return false;
  }
  //readdir方法
  /* $dir = opendir($path);
  $arr = array();
  while($content = readdir($dir)){
    if($content != '.' && $content != '..'){
      $arr[] = $content;
    }
  }
  closedir($dir); */
 
  //scandir方法
  $arr = array();
  $data = scandir($path);
  foreach ($data as $value){
    if($value != '.' && $value != '..'){
      $arr[] = $value;
    }
  }
  return $arr;
}
?>
