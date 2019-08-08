<?php 
//获取表单
$user_account = $_GET["user_account"];

  require_once("dbtools.inc.php");
//建立连接
	$link = create_connection();

	//书写SQL语句，查询借阅记录
	$sql="SELECT * FROM book_borrow WHERE  book_borrow.user_account ='$user_account'";
	//得到结果集
	$result = execute_sql($link,"library2.0",$sql);
	if($result){
		echo "查询成功";
	}else{
		echo "查询失败";
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>用户详细借阅记录</title>
 </head>
 <body>
 	
 	<table align="center"  height="150" width="1000px">
 		<tr align="center" height="50" width="100">
 			<td>书籍编号</td>
 			<td>借书日期</td>
 			<td>应还书日期</td>
 			<td>是否归还</td>
 			<td>借阅人</td>
 		</tr>
 		<?php

 		$total_num = mysqli_num_rows($result);
 		for ($i=0; $i <$total_num ; $i++) { 
		//取得资料
		$row = mysqli_fetch_assoc($result);
		
		echo "<tr align='center'height='50' width='100'>";
		echo "<td>".$row["book_no"]."</td>";
		echo "<td>".$row["borrow_date"]."</td>";
		
		if($row["is_return"]){
			echo "<td>".$row["return_deadline"]."</td>";
			echo "<td>是</td>";
		}else{
			echo "<td> 未归还</td>";
			echo "<td>否</td>";
		}
		echo "<td>".$user_account."</td>";
		echo "</tr>";
	}

 		 ?>
 	</table>
 </body>
 </html>