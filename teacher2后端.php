<?php
@session_start();
$id=$_SESSION['id'];
//获取teacher1传来的course_id
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
//echo $date;
$course="$year-$teacher_name-$course_name-$course_id";


//如果inputfind不为空，则数据库中查找
$input=@$_POST['inputfind'];
if($input!=""){ 
    $link = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($link, "face attendance");
    mysqli_set_charset($link, "utf8");
	$sql = "select * from teacher_course_attendance where date='$input' and course_id='$course_id' " ;
$retval = mysqli_query( $link, $sql );
		if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}
}
//显示请假人数
function leavenum($date){
	global $course;
    $dir = "$course/$date/leave/";     //201802应为$_SESSION['course_id']
    // Open a known directory, and proceed to read its contents
    $leaveNum=0;
    if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
//    echo "filename: $file : filetype: " . filetype($dir.$file) ;
		$leaveNum++;
    }
    closedir($dh);
	return $leaveNum-=2;
    }
    }
	else{
		$leaveNum=0;
		return $leaveNum;
	}
}
//显示已考勤人数
function attendednum($date){
	global $course;
    $dir = "$course/$date/attendance/";     //201802应为$_SESSION['course_id']
    // Open a known directory, and proceed to read its contents
$attendedNum=0;
    if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
//    echo "filename: $file : filetype: " . filetype($dir.$file) ;
		$attendedNum++;
    }
    closedir($dh);
	return $attendedNum-=2;
    }
    }
}

//显示该课程总人数
    $link_1 = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($link_1, "face attendance");
    mysqli_set_charset($link_1, "utf8");
	$sql_1= "select * from teacher_course where course_id='$course_id' " ;    //201802应为$_SESSION['course_id']
$retval_1 = mysqli_query( $link_1, $sql_1 );
		if(! $retval_1 )
{
    die('无法读取数据: ' . mysqli_error($link_1));
}
$row_1 = mysqli_fetch_array($retval_1,MYSQLI_ASSOC); 
	
	$arr=array();
	$arr=explode("-",$course);
	$cid=$arr[3];


//显示日期
function showdate(){
					  $nowdate=date("Y-m-d");
	$array=array();
					  					  $course_id=$_SESSION['course_id'];
					      $coon = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($coon, "face attendance");
    mysqli_set_charset($coon, "utf8");
	$nowdate=date("Y-m-d");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from teacher_course_attendance where course_id='$course_id' and date<='$nowdate' order by date DESC ";
    $r = mysqli_query($coon, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
	return  $array;
}
$array=showdate();
//分页的函数
/*function news($pageNum = 1, $pageSize = 3)
{
global $course_id;
			if(!$course_id){echo "kong";}
	else{ echo "exist";}

    $array = array();
    $coon = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($coon, "face attendance");
    mysqli_set_charset($coon, "utf8");
	$nowdate=date("Y-m-d");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from teacher_course_attendance where course_id='$course_id' limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($coon, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    mysqli_close($coon,"face attendance");
    return $array;
}

//显示总页数的函数
function allNews()
{
global $course_id;
			if(!$course_id){echo "kong";}
	else{ echo "exist";}
    $coon = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($coon, "face attendance");
    mysqli_set_charset($coon, "utf8");
	$nowdate=date("Y-m-d");
    $rs = "select count(*) num from teacher_course_attendance where course_id='$course_id'  " ; //可以显示出总页数
    $r = mysqli_query($coon, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($coon,"face attendance");
    return $obj->num;
}
    @$allNum = allNews();
    @$pageSize = 3; //约定每页显示几条信息
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize); //总页数
    @$array = news($pageNum,$pageSize);
*/
?>
