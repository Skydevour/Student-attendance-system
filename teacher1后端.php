<?php
@session_start();
$id=$_SESSION["id"];
//连接数据库
$link = mysqli_connect("localhost", "root",'123456','face attendance');
mysqli_select_db($link, "face attendance");
mysqli_set_charset($link, "utf8");
$sql = "select * from teacher_course where teacher_id='$id' and time='1'" ;
$retval = mysqli_query( $link, $sql );
		if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}

//如果inputfind不为空，则数据库中查找
$input=@$_POST['inputfind'];
//如果inputfind不为空，则数据库中查找
if($input!=""){ 
	$array_1 = array();
    $link_1 = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($link_1, "face attendance");
    mysqli_set_charset($link_1, "utf8");
	$sql_1 = "select * from teacher_course where course_name='$input' and teacher_id='$id' " ;
$retval_1 = mysqli_query( $link_1, $sql_1 );
		if(! $retval_1 )
{
    die('无法读取数据: ' . mysqli_error($link_1));
}
	while($row_1 = mysqli_fetch_object($retval_1)){
		$array_1[] = $row_1;}
}

//分页的函数
function news($pageNum = 1, $pageSize = 3)
{
	$id=$_SESSION["id"];
	//echo $id;
    $array = array();
    $coon = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($coon, "face attendance");
    mysqli_set_charset($coon, "utf8");
	$nowdate=date("Y-m-d");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from teacher_course where teacher_id='$id' and time='1' limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
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
	$id=$_SESSION["id"];
	//echo $id;
    $coon = mysqli_connect("localhost", "root",'123456','face attendance');
    mysqli_select_db($coon, "face attendance");
    mysqli_set_charset($coon, "utf8");
	$nowdate=date("Y-m-d");
    $rs = "select count(*) num from teacher_course where teacher_id='$id' and time='1' " ; //可以显示出总页数
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

?>
