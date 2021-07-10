<?php
//删除假条
    $path2=$_GET['path2'];
    $path1=$_GET['path1'];//把传过来的参数值赋给变量$i
    //根据参数值执行相应的删除操作
if(unlink($path1) and unlink($path2)){
	 echo"<script type='text/javascript'>alert('删除成功');location='newleave.php';</script>";
}
else{
     	 echo"<script type='text/javascript'>alert('删除失败');location='newleave.php';</script>";
}
?>