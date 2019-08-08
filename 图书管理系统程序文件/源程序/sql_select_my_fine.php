<?php 
//取得用户
$user_account = $_COOKIE["user_account"];
require_once("dbtools.inc.php");
 //建立连接
$link = create_connection();
$sql="SELECT user_account,fine.book_no,book_name,over_days,fine_num FROM fine,books WHERE user_account='$user_account' AND fine.book_no = books.book_no AND is_deal=0";
$result = execute_sql($link, "library2.0", $sql);
if($result){
	echo "查询罚单成功<br>";
}else{
 	echo "查询罚单失败<br>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>我的罚单页面</title>
</head>
<body>
	<table align="center" width="500">
		<tr>
			<td>借阅人</td>
			<td>书号</td>
			<td>书名</td>
			<td>超出时间</td>
			<td>罚款 </td>
		</tr>
		<tr>
			<?php 
			$total_num = mysqli_num_rows($result);
			if($total_num ==0){
				echo "暂无罚单记录";
			}else{
				for ($i=0; $i <$total_num ; $i++) { 
				$row = mysqli_fetch_assoc($result);
				echo "<td>".$row["user_account"]."</td>";
				echo "<td>".$row["book_no"]."</td>";
				echo "<td>".$row["book_name"]."</td>";
				echo "<td>".$row["over_days"]."</td>";
				echo "<td>".$row["fine_num"]."</td>";
				echo "请尽快联系管理员进行处理";
			}
			}
			 ?>
		</tr>
	</table>
</body>
</html>