<?php  
//建立连接
require_once("dbtools.inc.php");
$link = create_connection();
$sql="SELECT * FROM books WHERE 1";
$result = execute_sql($link, "library2.0", $sql);
if($result){
	echo "查询全部书籍成功<br>";
	echo "查询结果".mysqli_num_rows($result)."条记录";
}else{
 	echo "查询全部书籍失败<br>";
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>书籍全览</title>
</head>
<body bgcolor="lightyellow">
	<table align="center" width="800" height="300">
		<tr align="center" width="800" height="30">
			<td>书籍编号</td>
			<td>书籍名称</td>
			<td>书籍类别</td>
			<td>书籍作者</td>
			<td>出版社</td>
			<td>可借阅数量</td>
			<td>操作</td>
		</tr>
		
			<?php 
			$total_num = mysqli_num_rows($result);
			
			for ($i=0; $i <$total_num ; $i++) { 
				//取得书籍信息
				$row = mysqli_fetch_assoc($result);

				echo "<form method='post' action='sql_user_borrow_book.php?&book_no=".$row["book_no"]."&book_name=".urlencode($row["book_name"])."&class=".$row["book_type"]."&author=".$row["author_name"]."&publish_house=".$row["publish_house"]."&book_amount=".$row["borrow_amount"]."' >";
				echo "<tr width='300' height='30' align='center'>";
				echo "<td>".$row["book_no"]."</td>";
				echo "<td>".$row["book_name"]."</td>";
				echo "<td>".$row["book_type"]."</td>";
				echo "<td>".$row["author_name"]."</td>";
				echo "<td>".$row["publish_house"]."</td>";
				echo "<td>".$row["borrow_amount"]."</td>";
				echo "<td><input type='submit' value='借阅'></td>";
				echo "</tr>";
				echo "</form>";
			}
			 ?>
	</table>

</body>
</html>