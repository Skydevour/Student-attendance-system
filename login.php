<?php
 
	//开启Session
	session_start();
	header("Content-type:text/html;charset=utf-8");
 
$dbhost = 'localhost:3306';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$link = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $link )
{
    die('连接失败: ' . mysqli_error($link));
}
 
	//接受提交过来的用户名及密码
	$username = @$_POST["login-username"];//用户名
	$password = @$_POST["login-password"];//密码
    //$_SESSION['username']=$username;//保存学号以便在下一页区分
	if($username == "")
	{
	 //echo "请填写用户名<br>";
	 echo"<script type='text/javascript'>alert('请填写用户名');location='login.html'; </script>";exit(0);
	}
 
	if($password == "")
	{
	 //echo "请填写密码<br><a href='login.html'>返回</a>"; 
	 echo"<script type='text/javascript'>alert('请填写密码');location='login.html';</script>";exit(0);
	}

if($username<10000000){

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

while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
   if ($username == $row["te_id"] && $password == $row["te_password"]&&$username!=$password) {
	   
		 //echo "验证成功！<br>";
	   $_SESSION['id']=$username;
		 echo "<script type='text/javascript'>alert('登陆成功');location='teacher1.php';</script>";exit(0);
   }
	elseif($username == $row["te_id"] && $password == $row["te_password"]&&$username==$password) {
	   
		$_SESSION['id'] = $username;
		 //echo "设置新密码！<br>";
		 echo "<script type='text/javascript'>location='reset_password.html';</script>";exit(0);
   }
}
		//echo "验证失败！<br>";
		 echo "<script type='text/javascript'>alert('用户名或密码错误');location='login.html';</script>";exit(0);
}
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

while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
   if ($username == $row["st_id"] && $password == $row["st_password"]&&$username!=$password) {
 
		 //echo "验证成功！<br>";
	   	   $_SESSION['id']=$username;
		 echo "<script type='text/javascript'>alert('登陆成功');location='stu1.php';</script>";exit(0);
		} 
	elseif($username == $row["st_id"] && $password == $row["st_password"]&&$username==$password) {
	   
		$_SESSION['id'] = $username;
		 //echo "设置新密码！<br>";
		 echo "<script type='text/javascript'>location='reset_password.html';</script>";exit(0);
   }
}
		//echo "验证失败！<br>";
		 echo "<script type='text/javascript'>alert('用户名或密码错误');location='login.html';</script>";exit(0);
}
?>
