<?php
 @session_start();
header('content-type:text/html;charset=utf-8');
 header("Content-type:text/html;charset=utf-8");
//链接数据库
 $link = mysqli_connect('localhost','root','123456','face attendance');
 if (!$link) {
 die("连接失败:".mysqli_connect_error());
 }

 $e=@$_POST['forget_email'];//邮箱
 $code=@$_POST['forget_code'];//验证码

//检查
 if($e==""||$code==""){
 echo "<script>alert('信息不能为空！请重新填写');window.location.href='login.html'</script>";exit(0);
 } 
  elseif (!filter_input(INPUT_POST, "forget_email", FILTER_VALIDATE_EMAIL)){
  echo "<script>alert('邮箱格式错误！请重新填写');window.location.href='login.html'</script>";exit(0);
  }
elseif($code != $_SESSION['forget_number']){
	echo "<script>alert('验证码错误！请重新填写');window.location.href='login.html'</script>";exit(0);
}
elseif($code==$_SESSION['forget_number']){
	mysqli_query($link , "set names utf8");
    $sql_st = "SELECT * FROM student where st_email='$e'"; 
    mysqli_select_db( $link, 'face attendance' );
    $retval_st = mysqli_query( $link, $sql_st );
    if(! $retval_st )
    {
        die('无法读取数据: ' . mysqli_error($link));
    }
	while($row = mysqli_fetch_array($retval_st,MYSQLI_ASSOC))
	{
		$password=$row["st_password"];
		echo "<script>alert('您的密码是:$password');window.location.href='login.html'</script>";exit(0);
	}
	

            $sql_te = "SELECT * FROM teacher where te_email='$e'"; 
            $retval_te = mysqli_query( $link, $sql_te );
            if(! $retval_te )
            {
                die('无法读取数据: ' . mysqli_error($link));
            }
		    while($row = mysqli_fetch_array($retval_te,MYSQLI_ASSOC)){
				$password=$row["te_password"];
			    echo "<script>alert('您的密码是:$password');window.location.href='login.html'</script>";exit(0);
			}
	if(!$row = mysqli_fetch_array($retval_st,MYSQLI_ASSOC) && !$row = mysqli_fetch_array($retval_te,MYSQLI_ASSOC)){
	    echo "<script>alert('未查找到该邮箱');window.location.href='login.html'</script>";exit(0);
	}
	
}

?>
