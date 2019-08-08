<!DOCTYPE html>
<html>
<head>
	<title>任意字查询显示页面</title>
</head>
<body>
	<table align="center" height="150" width="1000px" >
		<tr height="50px" width="1000px" >
			<th>书籍编号</th>
			<th>书名</th>
			<th>类别</th>
			<th>作者</th>
			<th>出版社</th>
			<th>价格</th>
			<th>总数</th>
			<th>可借阅数量</th>
			<th>修改/删除</th>
		</tr>

<?php 

  require_once("dbtools.inc.php");

//建立连接
	$link = create_connection();

	$sql="SELECT * FROM books WHERE 1";
	//得到结果集
	$result = execute_sql($link,"library2.0",$sql);
	//如果库中有这本书
	if (mysqli_num_rows($result) !=0) {
		
		echo "查询结果".mysqli_num_rows($result)."条记录";
		//总行数
		$total_num = mysqli_num_rows($result); 

		
		for ($i=0; $i <$total_num ; $i++) { 
		//获取书籍信息
		$row=mysqli_fetch_assoc($result);
			echo "<form method='post' action='modify_book_information.php?book_no=".$row["book_no"]."&book_name=".urlencode($row["book_name"])."&class=".$row["book_type"]."&author=".$row["author_name"]."&publish_house=".$row["publish_house"]."&book_price=".$row["book_price"]."&book_sum=".$row["book_sum"]."&book_amount=".$row["borrow_amount"]."'>";
			echo "<tr width='1000px' height='50px' align='center'>";
			echo "<td>"."$row[book_no]"."</td>";
			echo "<td>"."$row[book_name]"."</td>";
			echo "<td>"."$row[book_type]"."</td>";
			echo "<td>"."$row[author_name]"."</td>";
			echo "<td>"."$row[publish_house]"."</td>";
			echo "<td>"."$row[book_price]"."元</td>";
			echo "<td>"."$row[book_sum]"."本</td>";
			echo "<td>"."$row[borrow_amount]"."本</td>";
			echo "<td><input type='submit' value='修改/删除' ></td>";
			//onClick=\"javascript:window.open('modify_book_information.php','_self')\"
			echo "<tr>";
			echo "</form>";
		}
	}else{
		echo "获取全部书籍信息失败";
	}
//关闭连接
	mysqli_close($link);
 ?>
	</table>

</body>
</html>

