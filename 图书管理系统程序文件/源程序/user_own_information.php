<?php 
//获取当前用户
$user_account = $_COOKIE["user_account"];

require_once("dbtools.inc.php");
$link = create_connection();
$sql = "SELECT * FROM users WHERE user_account ='$user_account'";
$result = execute_sql($link, "library2.0", $sql);
if($result){
	echo "查询成功<br>";
}else{
	echo "查询失败<br>";
}
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>个人信息展示</title>
</head>
<body bgcolor="lightyellow">
	<table height="50">
		<tr height="50"></tr>
	</table>
	<div align="center">
		用户名：<label><?php echo $row["user_account"]; ?></label> <br><br>
		姓&nbsp;&nbsp;&nbsp;&nbsp;名：<label><?php echo $row["user_name"]; ?></label>	<br><br>
		年&nbsp;&nbsp;&nbsp;&nbsp;龄：<label><?php echo $row["user_age"]; ?></label>	<br><br>
		电&nbsp;&nbsp;&nbsp;&nbsp;话：<label><?php echo $row["user_telephone"]; ?></label>	<br><br>
		等&nbsp;&nbsp;&nbsp;&nbsp;级：<label><?php echo $row["user_level"]; ?></label>	<br><br>
	</div>
</body>
</html>