<?php 
//升级
function add_level(){
		
}
//然后看是否阅读超过 10本书，给他升二级，二级读者（20本）一次可以借5本 3级读者（50本）一次可以借10本
//获取这个用户总共借阅了多少本书
//取得当前用户
$user_account = $_COOKIE["user_account"];


 //建立连接
require_once("dbtools.inc.php"); 
 $link = create_connection();

  $sql ="SELECT count(*) FROM book_borrow WHERE user_account='$user_account'";
  $result = execute_sql($link, "library2.0", $sql);
  $sum_book = mysqli_fetch_row($result);
if($result){
	echo "获取当前用户借阅总数成功<br>";
}else{
	echo "获取当前用户借阅总数失败";
}

//获取当前用户的等级
  	$sql = "SELECT user_level FROM users WHERE user_account ='$user_account'";
  	$result = execute_sql($link, "library2.0", $sql);
	$row = mysqli_fetch_assoc($result);//得到等级$row["user_level"]
	if($result){
		echo "获取当前用户等级成功<br>";
	}else{
		echo "获取当前用户等级失败";
	}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>升级前确认页面</title>
 </head>
 <body>
 	<div>
 		<?php 
			echo "<form method='post' action='sql_add_user_level.php?&user_level=".$row["user_level"]."&sum_book=".$sum_book[0]."'>";
 		 ?>
 			<table height="100" width="500" align="center" >
 				<tr align="center" height="30">
 					<td>当前用户等级</td>
 					<td>当前用户借阅总数</td>
 					<td>申请升级</td>
 				</tr>
 				<tr align="center" height="30">
 					<?php 
 					echo "<td>".$row["user_level"]."</td>";
 					echo "<td>".$sum_book[0]."</td>";
 					 ?>
 					 <td><input type="submit" name="" value="升级"> </td>
 				</tr>
 			</table>
 		</form>
 	</div>
 	
 </body>
 </html>