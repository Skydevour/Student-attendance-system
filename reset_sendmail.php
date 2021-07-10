<?php
 session_start();
// 引入PHPMailer的核心文件
require_once("class.phpmailer.php");
require_once("class.smtp.php");
require_once("PHPMailerAutoload.php");
 header("Content-type:text/html;charset=utf-8");

//邮箱
 $e=$_POST["reset_email"];

//生成4位随机数
$num = rand(1000,9999);
//保存
$_SESSION['number'] = $num;



//发送邮件函数
function sendmail($to,$content){
// 实例化PHPMailer核心类
$mail = new PHPMailer();
// 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
//$mail->SMTPDebug = 1;
// 使用smtp鉴权方式发送邮件
$mail->isSMTP();
// smtp需要鉴权 这个必须是true
$mail->SMTPAuth = true;
// 链接qq域名邮箱的服务器地址
$mail->Host = 'smtp.qq.com';
// 设置使用ssl加密方式登录鉴权
$mail->SMTPSecure = 'ssl';
// 设置ssl连接smtp服务器的远程服务器端口号
$mail->Port = 465;
// 设置发送的邮件的编码
$mail->CharSet = 'UTF-8';
// 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
$mail->FromName = 'cheng';
// smtp登录的账号 QQ邮箱即可
$mail->Username = '1441818790@qq.com';
// smtp登录的密码 使用生成的授权码
$mail->Password = 'hwnkqduxmduxbafa';
// 设置发件人邮箱地址 同登录账号
$mail->From = '1441818790@qq.com';
// 邮件正文是否为html编码 注意此处是一个方法
$mail->isHTML(true);
// 设置收件人邮箱地址
$mail->addAddress($to);
// 添加该邮件的主题
$mail->Subject = '验证码';
// 添加邮件正文
$mail->Body = "您的验证码是：$content,如果非本人操作无需理会！";
// 发送邮件 返回状态
$status=$mail->send();
	if($status)
        echo "验证码已发送至邮箱，请查收";
	else 
		echo "发送失败";
}
if(!$e)
    echo "邮箱不能为空";
elseif(!filter_input(INPUT_POST, "reset_email", FILTER_VALIDATE_EMAIL))
	echo "邮箱格式错误";
else 
    sendmail($e,$_SESSION['number']);
?>