<?php 
require_once("student3后端2.php");
$q=$_GET["q"];
if($q=="yes"){ //若$q=="yes",则检测到的人脸正确
    if(copy("$img_detected","$img_attend")){
	     echo "考勤成功";
    } 
	else{
	     echo "考勤失败";
    }
}
else{ //否则检测到的人脸错误,$q为该生选择的序号
	  $img_correct="$course/$date/detect/$q.jpg";
      if(copy("$img_correct","$img_attend")){
	       echo "考勤成功";
      } 
	  else{
	       echo "考勤失败";
      }
}
?>

