<?php
//连接
require_once("dbtools.inc.php");
$link = create_connection();
$sql = "SELECT book_borrow.book_no,book_name,count(*) counts FROM book_borrow,books WHERE books.book_no = book_borrow.book_no GROUP BY book_no";
$result = execute_sql($link, "library2.0", $sql);
if($result){
	echo "查询结果".mysqli_num_rows($result)."条记录";
}else{
	echo "查询失败";
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>热门推荐书籍</title>
 </head>
 <body bgcolor="lightyellow">
 	<table align="center" >
 			<table align="center"  height="150" width="1000px">
 		<tr align="center" height="50" width="100">
 			<td>书籍编号</td>
 			<td>书籍名称</td>
 			<td>借阅次数</td>
 		</tr>
 		<?php
 			$total_num = mysqli_num_rows($result);
 			for ($i=0; $i <$total_num ; $i++) { 
 				$row = mysqli_fetch_assoc($result);
 				echo "<tr align='center'>";
 				echo "<td>".$row["book_no"]."</td>";
 				echo "<td>".$row["book_name"]."</td>";
 				echo "<td>".$row["counts"]."</td>";
 				echo "</tr>";
 			}
 		 ?>
 	</table>
 </body>
 </html>