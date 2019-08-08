<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>查询统计</title>
</head>
<body bgcolor="lightyellow">
	<table align="center" width="500" height="100" >
	
	<tr>
	 <td align="center" >图书类别</td>
	 <td align="center" >库内图书</td>
	</tr>
	<?php 
	require_once("dbtools.inc.php");
	$link = create_connection();
	$sql = "SELECT book_type, count(*) FROM books group by book_type"; //找书 计算书的总数
	$result = execute_sql($link,"library2.0",$sql);

	 if (mysqli_num_rows($result) !=0) {
	 	//总行数
		$total_num = mysqli_num_rows($result);
		for ($i=0; $i <$total_num ; $i++) { 
		//获取书籍信息
		$row=mysqli_fetch_row($result);
		echo "<tr align='center' height='50'>";
		echo "<td>".$row[0]."</td>";
		echo "<td>本类书目共有".$row[1]."本</td>";
		echo "</tr>";
		}
	}else{
		echo "统计失败";
	}
//关闭连接
	mysqli_close($link);
	 ?>
</table>
</body>
</html>