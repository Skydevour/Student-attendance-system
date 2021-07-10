<?php
 session_start();
header('content-type:text/html;charset=utf-8');
 header("Content-type:text/html;charset=utf-8");
//链接数据库
 $link = mysqli_connect('localhost','root','123456','face attendance');
 if (!$link) {
 die("连接失败:".mysqli_connect_error());
 }

$id=$_SESSION['id'];
 $password = @$_POST['reset_password'];
 $confirm = @$_POST['reset_repassword'];//确认密码
 $e=@$_POST['reset_email'];//邮箱
 $code=@$_POST['reset_code'];//验证码

//检查
 if($password == "" || $confirm == "" ||$e==""||$code==""){
 echo "<script>alert('信息不能为空！请重新填写');window.location.href='reset_password.html'</script>";exit(0);
 } 
elseif($id==$password){
 echo "<script>alert('密码不可与学号相同！请重新填写');window.location.href='reset_password.html'</script>";exit(0);
 //判断密码长度
 }
elseif(strlen($password) < 5){
 echo "<script>alert('密码至少5位！请重新填写');window.location.href='reset_password.html'</script>";exit(0);
 //判断密码长度
 }
elseif($password != $confirm) {
 echo "<script>alert('两次密码不相同！请重新填写');window.location.href='reset_password.html'</script>";exit(0);
 //检测两次输入密码是否相同
 } 
  elseif (!filter_input(INPUT_POST, "reset_email", FILTER_VALIDATE_EMAIL)){
  echo "<script>alert('邮箱格式错误！请重新填写');window.location.href='reset_password.html'</script>";exit(0);
  }
elseif($code != $_SESSION['number']){
	echo "<script>alert('验证码错误！请重新填写');window.location.href='reset_password.html'</script>";exit(0);
}


//teacher
if($_SESSION['id']<10000000){

// 设置编码，防止中文乱码
mysqli_query($link , "set names utf8");
 
$sql = 'SELECT te_id, te_password 
        FROM teacher';
 
mysqli_select_db( $link, 'face attendance' );
$retval = mysqli_query( $link, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}

$sql2= "UPDATE teacher SET te_password='$password',te_email='$e'  WHERE te_id='$id'";
 //插入数据库
 if(!(mysqli_query($link,$sql2))){
 echo "<script>alert('完善信息失败');window.location.href='reset_password.html'</script>";
 }
 else{
 echo  "<script>alert('完善信息成功！欢迎进入考勤系统!');window.location.href='teacher1.php'</script>";
 }
}
//student
else{
	// 设置编码，防止中文乱码
mysqli_query($link , "set names utf8");
 
$sql = 'SELECT st_id, st_password 
        FROM student';
 
mysqli_select_db( $link, 'face attendance' );
$retval = mysqli_query( $link, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($link));
}

$sql2= "UPDATE student SET st_password='$password',st_email='$e'  WHERE st_id='$id'";
 //更新数据库
if(!(mysqli_query($link,$sql2)))  {
	echo "<script>alert('完善信息失败');window.location.href='reset_password.html'</script>";//.mysqli_error($link);
}
else{
 echo  "<script>alert('完善信息成功，欢迎进入考勤系统!');window.location.href='stu1.php'</script>";
 }
mysqli_close($link);
}
?>
