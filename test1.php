	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>考勤系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="static/css/admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="static/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="static/css/global_style.css">
	<link rel="Shortcut Icon" href="ico.ico">
<script type="text/javascript">
	function no()
{
		      alert("jjj");
  var str=document.getElementById("order").value;
  var xmlhttp;
  if (str.length==0)
  { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest)
  {
    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      alert(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","test.php?q="+str,true);
  xmlhttp.send();

}
</script>
	</head>
	<body>
	<input style=margin-top:0.75rem type="text" class="input-medium search-query"     id="order"  name="order"  placeholder="请输入你的序号"  required="required">
					<button  type="button"     id="no" name="no" onClick="no()"   style="margin-top:0.75rem">提交</button>
	</body>
</html>