<?php

function createdate($startdate,$id)
{
$link = mysqli_connect("localhost", "root",'123456','face attendance');
mysqli_select_db($link, "face attendance");
mysqli_set_charset($link, "utf8");
					     for($i=0,$j=0;$i<119;$i+=14,$j++)    //学期总天数
						{
						    $date=" ".date("Y-m-d",strtotime("+$i day",strtotime("$startdate")))." ";
							 echo $date;
							 $sql = "insert into  teacher_course_attendance(course_id,date)  values('$id','$date')";   
							 if(!(mysqli_query($link,$sql))){
                                  echo "失败";
								 print_r(error_get_last());
                                  }
							 else{
                                  echo  "成功"; 
                                  }
						 }
}

//连接数据库
$link = mysqli_connect("localhost", "root",'123456','face attendance');
mysqli_select_db($link, "face attendance");
mysqli_set_charset($link, "utf8");
$sql = "select * from course_timetable" ;
$retval = mysqli_query( $link, $sql);
		if(! $retval)
{
    die('无法读取数据: ' . mysqli_error($link));
}
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
	if($row["weekorder"]==1)
	{
		$startdate="2019-09-02";
		switch($row["day"])
		{
				case(1):
				        createdate($startdate,$row["course_id"]);
				break;
				case(2):
				        $startdate=" ".date("Y-m-d",strtotime("+1 day",strtotime("$startdate")))." ";
				       	createdate($startdate,$row["course_id"]);
				break;
				case(3):
				         $startdate=" ".date("Y-m-d",strtotime("+2 day",strtotime("$startdate")))." ";
						createdate($startdate,$row["course_id"]);
				break;
				case(4):
				         $startdate=" ".date("Y-m-d",strtotime("+3 day",strtotime("$startdate")))." ";
					     createdate($startdate,$row["course_id"]);
				break;
				case(5):
				         $startdate=" ".date("Y-m-d",strtotime("+4 day",strtotime("$startdate")))." ";
					   	 createdate($startdate,$row["course_id"]);
				break;
		}
	}
	else
	{
		$startdate="2019-09-09";
		switch($row["day"])
		{
				case(1):
				        createdate($startdate,$row["course_id"]);
				break;
				case(2):
				        $startdate=" ".date("Y-m-d",strtotime("+1 day",strtotime("$startdate")))." ";
				        createdate($startdate,$row["course_id"]);
				break;
				case(3):
				         $startdate=" ".date("Y-m-d",strtotime("+2 day",strtotime("$startdate")))." ";
						 createdate($startdate,$row["course_id"]);
				break;
				case(4):
				         $startdate=" ".date("Y-m-d",strtotime("+3 day",strtotime("$startdate")))." ";
					     createdate($startdate,$row["course_id"]);
				break;
				case(5):
				        $startdate=" ".date("Y-m-d",strtotime("+4 day",strtotime("$startdate")))." ";
					   createdate($startdate,$row["course_id"]);
				break;
		}
	}
}
?>
