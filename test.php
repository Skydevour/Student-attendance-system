  <?php 
session_start();
require_once("stu3h.php");
$q=$_GET["q"];
$image="$course/$date/detect/$q.jpg";
$dir="$course/total/$id";
	if(!file_exists($dir)){
mkdir($dir);
	}
$isexist2="$course/total/$id/$date.jpg";
  if(copy("$image","$isexist")&&copy("$image","$isexist2")){
	     echo "考勤成功";
	 $link = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($link, "face attendance");
    mysqli_set_charset($link, "utf8");
	  $sql = "update student_course_attendance set ifattend='1'   where date='$date'  and  student_id='$id'" ;
  $retval= mysqli_query( $link, $sql );
      if(! $retval)
       {
         die('无法读取数据: ' . mysqli_error($link));
            }
    } 
	else{
	     echo "考勤失败,$date";
    }
	?>
