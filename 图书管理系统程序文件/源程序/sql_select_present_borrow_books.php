<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>当前借阅显示</title>
 </head>
 <body bgcolor="lightyellow">
 	<table align="center"  height="150" width="1000px">
 		<tr align="center" height="50" width="100">
 			<td>书籍编号</td>
 			<td>书籍名称</td>
 			<td>借书日期</td>
 			<td>应还日期</td>
 			<td>借阅人</td>
 			<td>操作</td>
 		</tr>
<?php 
//取得当前用户
$user_account=$_COOKIE["user_account"];

require_once("dbtools.inc.php");
  //建立连接
  $link = create_connection();
  //获取当前用户的等级
  	$sql = "SELECT books.book_no,book_name,borrow_date,return_deadline,user_account FROM book_borrow,books WHERE is_return = 0 AND book_borrow.book_no = books.book_no AND user_account='$user_account'";
  	$result = execute_sql($link, "library2.0", $sql);

	$total_num = mysqli_num_rows($result);
	if($result){
		echo "总共查询到当前借阅".$total_num."条记录";
	}else{
		echo "查询当前借阅失败";
	}
	for ($i=0; $i <$total_num ; $i++) { 
		//取得资料
		$row = mysqli_fetch_assoc($result);
		echo "<form method='post' action='sql_renewal_book.php?&book_no=".$row["book_no"]."&book_name=".$row["book_name"]."&borrow_date=".$row["borrow_date"]."&return_deadline=".$row["return_deadline"]."&user_account=".$row["user_account"]."'>";
		echo "<tr align='center'height='50' width='100'>";
		echo "<td>".$row["book_no"]."</td>";
		echo "<td>".$row["book_name"]."</td>";
		echo "<td>".$row["borrow_date"]."</td>";
		echo "<td>".$row["return_deadline"]."</td>";
		echo "<td>".$row["user_account"]."</td>";
		echo "<td><input type ='submit' value ='续借'></td>";
		echo "</tr>";
		echo "</form>";
	}
 ?>
 	</table>
 </body>
 </html>