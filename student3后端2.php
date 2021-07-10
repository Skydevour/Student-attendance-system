<?php
session_start();
$order=$_GET["order"];
echo $order;
$course_id=$_SESSION['course_id'];
$id=$_SESSION['id'];
//echo $id;
$date=$_SESSION['date'];//如果使用student前端2.php，那么此处$date=$_GET['date'];且将stu2页面链接到此页面

//根据id显示班级
function findclass(){
	global $id;
	global $date;
    $link = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($link, "face attendance");
    mysqli_set_charset($link, "utf8");
	$sql = "select * from student where  st_id='$id' " ;
$retval = mysqli_query( $link, $sql );
		if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($retval,MYSQLI_ASSOC); 
	echo $row['st_class'];
} 

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
//$date=$_GET['date'];
//echo $date;
$course="$year-$teacher_name-$course_name-$course_id";
//echo $course;
//读取检测照片

$img_attend="$course/$date/attendance/$id.jpg";
//echo $img_attend;
$img_photograph="$course/$date/2.jpg";
//echo $img_photograph;
$lines=file("$course/$date/detect/*.txt");
foreach ($lines as $value) {
$line=explode(" ",$value);
	if($line[0]==$id){
         $img_detected= "$course/$date/detect/$line[1]";
		//echo $img_detected;
	}
}
//if($order){
	//		$iscopy_1=myCopyFunc("$course_id/$date/detected_face/$order.jpg","$course_id/$date/attended_face/$id.jpg");
//}
		
/*			//自制拷贝文件的函数
	function myCopyFunc($res, $des) {
		if(file_exists($res)) {
			$r_fp=fopen($res,"r");
			
			//定位
			$pos=strripos($des,"\\");
			$dir=substr($des,0,$pos);
			if(!file_exists($dir)) {
				//可创建多级目录
				mkdir($dir,0777,true);
				echo "创建目录成功<br/>";
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
 
			echo "复制成功";
			return 1;
		} else {
			echo "源文件不存在";
			return 0;
		}
	}*/
function isattended(){
	global $course_id;
	global $date;
	global $id;global $course;
    $dir = "$course/$date/attendance/";
	//echo $dir;
    // Open a known directory, and proceed to read its contents
    if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
  //  echo "filename: $file : filetype: " . filetype($dir.$file) ;
		if($file==$id+".jpg"){
			//echo $file;
			return 1;
		}
    }
    closedir($dh);
	}
  }
}
?>
