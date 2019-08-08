<?php 
//获取表单
$user_account = $_POST["user_account"];
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$user_age = $_POST["user_age"];
$user_telephone = $_POST["user_telephone"];

require_once("dbtools.inc.php");
$link = create_connection();
$sql = "SELECT user_password FROM users,account WHERE users.user_account ='$user_account' AND user_id = '$user_id' AND user_name='$user_name' AND user_age ='$user_age' AND user_telephone ='$user_telephone'";
$result = execute_sql($link, "library2.0", $sql);

if(mysqli_num_rows($result) !=0 ){
	$row = mysqli_fetch_assoc($result);
	echo "<table height='150'><tr height='150'></tr></table>";
	echo "<h4 align='center'>找回密码成功<h4>";
	echo "<h4 align='center'>您的账号".$user_account."<h4>";
	echo "<h4 align='center'>您的密码".$row["user_password"]."<h4>";
}else{
	    //显示讯息请求用户更换账号
    echo "<script type='text/javascript'>";
    echo "alert('输入信息有误，无法找回密码');";
    echo "history.back();";
    echo "</script>";
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>找回密码</title>
 </head>
 <body bgcolor="lightyellow">
 	<div align="center">
 		<a href="login.html">返回首页</a>
 	</div>
 </body>
 </html>