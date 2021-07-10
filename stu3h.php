<?php
//根据id显示班级
session_start();
$date=$_SESSION['date'];
$id=$_SESSION['id'];


   $link = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($link, "face attendance");
    mysqli_set_charset($link, "utf8");
 $course_id=$_SESSION['course_id'];   
$sql2 = "select * from student_course   where course_id='$course_id'  and  student_id='$id'" ;
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




session_start();
$order=@$_POST['order'];

//读取检测照片
$img_photograph="$course/$date/2.jpg";
$image_show="$course/$date/detect/$order.jpg";
$isexist="$course/$date/attendance/$id.jpg";
if($order) { $iscopy_1=myCopyFunc("$course/$date/detect/$order.jpg","$course/$date/attendance/$id.jpg");}	
			//自制拷贝文件的函数
function myCopyFunc($res, $des) {
		if(file_exists($res)) {
			$r_fp=fopen($res,"r");		
			//定位
			$pos=strripos($des,"\\");
			$dir=substr($des,0,$pos);
			if(!file_exists($dir)) {
				//可创建多级目录
				mkdir($dir,0777,true);
				//echo "创建目录成功<br/>";
			}
 
			$d_fp=fopen($des,"w+");
			//$fres=fread($r_fp,filesize($res));
			//边读边写
			$buffer=1024;
			$fres="";
			while(!feof($r_fp)) {
				$fres=fread($r_fp,$buffer);
				fwrite($d_fp,$fres);
			}
			fclose($r_fp);
			fclose($d_fp);
			//echo "复制成功";
			return 1;
		} else {
			//echo "源文件不存在";
			return 0;
		}
	}
function isattended(){
    $course=findclass();
    $course_id=$_GET['course_id'];
    $date=$_GET['date'];
    $id=$_SESSION['id'];
    $dir = "$course/$date/attendance/";
    //echo $dir;
    // Open a known directory, and proceed to read its contents
    if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
  //  echo "filename: $file : filetype: " . filetype($dir.$file) ;
		if($file==$order+".jpg"){
			//echo $file;
			return 1;
		}
    }
    closedir($dh);
     }
  }
}
?>
