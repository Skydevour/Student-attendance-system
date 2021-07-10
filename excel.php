<?php require_once 'Classes/PHPExcel.php';
session_start();
//根据course_id从数据库获取course_name
$course_id=$_GET['cid'];
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
//echo $course;

$objPHPExcel=new PHPExcel();
//一些关于excel文件的描述。在Classes/PHPExcel/DocumentProperties.php中有更多选项
$prop = $objPHPExcel->getProperties();
$prop->setCreator('sweat_xiaoMa');
$prop->setLastModifiedBy('xiaoma');
$prop->setTitle('Office 2007 XLSX Document');
$prop->setSubject('Office 2007 XLSX Document');
$prop->setDescription('Document for Office 2007 XLSX, generated using PHP classes.');
$prop->setKeywords('office 2007 openxml php');
$prop->setCategory('Result file');
//设置使用的当前的工作表的索引
$objPHPExcel->setActiveSheetIndex(0);
//然后就可以设置单元格上的内容了。
$activeSheet = $objPHPExcel->getActiveSheet();
$activeSheet->setCellValue('A1','学号');
$activeSheet->setCellValue('B1','考勤系数');
$activeSheet->setCellValue('C1','请假次数');

$dirname="/var/www/html/$course/total";
$leave="/var/www/html/$course/leave";
$sm=2;
$dir=opendir($dirname);
while($folders=readdir($dir)){
//判断是否为系统隐藏的文件.和..  如果是则跳过否则就继续往下走，防止无限循环再这里
     if($folders=='.'||$folders=='..')
      {
       continue;
      }
       $sl=0;
       $sn=0;

      //遍历total文件夹
       $newfile=$dirname."/".$folders; 
       $newfiles=opendir($newfile);
       while($filenames=readdir($newfiles))
       {
		    if($filenames=='.'||$filenames=='..')
      {
       continue;
      }else{
           $sl++;   
			}
       }     
       closedir($newfiles);
       //遍历leave文件夹
       $dirone=opendir($leave);
       while($leavefile=readdir($dirone))
        {
           $stuname=explode('-',$leavefile);
           if($stuname[0]==$folders)
             {
                $sn++;
              }
         }
        closedir($dirone);
        $activeSheet->setCellValue('A'.strval($sm),$folders);
        $activeSheet->setCellValue('B'.strval($sm),$sl);
        $activeSheet->setCellValue('C'.strval($sm),$sn);
        $sm++;   
}
closedir($dir);
//给当前使用的工作表设置标题。
$activeSheet->setTitle('工作表1');
//文件名字。下面的header中用到。
$filename = '学生信息统计表_'.date('Y-m-dHis');
/*
*生成xlsx文件
*/
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
// header('Cache-Control: max-age=0');
// $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
/*
*生成xls文件
*/
ob_end_clean();
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
