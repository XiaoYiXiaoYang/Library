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
//获取表单
	$book_name = $_POST["book_name"];
//建立连接
	$link = create_connection();

	//书写SQL语句，匹配任意书籍名称带着个字，出版社带这个字，还有类别，作者带着个字

	$sql="SELECT * FROM books WHERE book_name like '%$book_name%' or book_type like '%$book_name%' or author_name like '%$book_name%' or publish_house like '%$book_name%'";
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
			echo "<td><input type='submit' value='修改/删除' onClick=\"javascript:window.open('modify_book_information.php','_self')\"></td>";
			echo "<tr>";
			echo "</form>";
		}
	}else{
		echo "查询失败,图书馆没有此书";
	}
//关闭连接
	mysqli_close($link);
 ?>
	</table>

</body>
</html>

