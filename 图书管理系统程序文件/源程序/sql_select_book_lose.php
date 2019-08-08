<?php 
require_once("dbtools.inc.php");
  $link = create_connection();
  $sql = "SELECT * FROM lose WHERE 1";  //超期未还的图书
    $result = execute_sql($link, "library2.0", $sql);
    if($result){
      echo "查询丢失信息成功<br>";
    }else{
      echo "查询丢失信息失败";
    }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>丢失信息一览</title>
</head>
<body bgcolor="lightyellow">
	<table align="center" width="500" height="">
		<tr align = "center" width ="500" height="30">
			<td>用户名</td>
			<td>书籍编号</td>
			<td>价格</td>
			<td>赔偿</td>
		</tr>
	
	<?php 
  		if(mysqli_num_rows($result) == 0){
        echo "查询到".mysqli_num_rows($result)."条记录<br>";
  			echo "暂无丢失信息";
  		}else{
  			$total_num = mysqli_num_rows($result);
  			for ($i=0; $i <$total_num ; $i++) { 
  				$row = mysqli_fetch_assoc($result);
  				echo "<form method='post' action ='sql_solve_book_lose.php?&user_account=".$row["user_account"]."&book_no=".$row["book_no"]."&price=".$row["price"]."'>";
  				echo "<tr align='center' width='500' height='30'>";
  				echo "<td>".$row["user_account"]."</td>";
  				echo "<td>".$row["book_no"]."</td>";
  				echo "<td>".$row["price"]."</td>";
  				echo "<td><input type='submit' value='赔偿'></td>";
  				echo "</tr>";
  			}
  		}
	 ?>
</table>
</body>
</html>