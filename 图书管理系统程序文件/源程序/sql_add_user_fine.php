<!DOCTYPE html>
<html>
<head>
	<title>罚单页面</title>
</head>
<body bgcolor="lightyellow">
	<table align="center" width="500" height="300">
		<tr align="center" width='500' height="30">
			<td>用户名</td>
			<td>书籍编号</td>
			<td>超出时间</td>
			<td>罚款金额</td>
      <td>操作</td>
		</tr>
		<?php 
		$date=date("Y-m-d"); //今天

		require_once("dbtools.inc.php");
		$link = create_connection();
		$sql = "SELECT * FROM book_borrow WHERE return_deadline <'$date' AND is_return = 0";  //超期未还的图书
  	$result = execute_sql($link, "library2.0", $sql);
  		if($result){
  			echo "查询超期未还图书成功<br>";
  		}else{
  			echo "查询超期未还图书失败";
  		}
  		$total_num = mysqli_num_rows($result);
  		for ($i=0; $i <$total_num; $i++) { 
  			$row = mysqli_fetch_assoc($result);
  			$book_no = $row["book_no"];
  			$user_account = $row["user_account"];
  			$return_deadline = $row["return_deadline"];
        echo ($book_no);
        echo ($return_deadline);

        $over_days = floor((strtotime($date) - strtotime($return_deadline))/86400) ;  //超出天数
        $fine_num = $over_days * 0.3;
        

  			$sql="SELECT * FROM fine WHERE book_no = '$book_no' AND user_account ='$user_account' AND is_deal=0";
  			$result = execute_sql($link, "library2.0", $sql);
  			if(mysqli_num_rows($result) == 0){
  				//插入记录
  				$sql = "INSERT INTO fine VALUES ('$user_account','$book_no','$over_days','$fine_num',0)";
  				$result = execute_sql($link, "library2.0", $sql);
  				if($result){
  					echo "新的罚单插入执行成功";
  				}else{
  					echo "新罚单插入执行失败";
  				}
   			}else{
   				//更新记录
   				$sql="UPDATE fine SET over_days='$over_days',fine_num='$fine_num' WHERE user_account = '$user_account' AND book_no = '$book_no' ";
   				$result = execute_sql($link, "library2.0", $sql);
  				if($result){
  					echo "更新罚单执行成功";
  				}else{
  					echo "更新罚单执行失败";
  				}
   			}
  		}

  		//查询出所有罚单
  		$sql = "SELECT * FROM fine WHERE is_deal=0";
  		$result = execute_sql($link, "library2.0", $sql);
  		if(mysqli_num_rows($result) !=0){
      		$total_num = mysqli_num_rows($result);
      		for ($i=0; $i <$total_num ; $i++) { 
      		  	$row = mysqli_fetch_assoc($result);
      		    echo "<form method ='post' action='sql_solve_fine.php?book_no=".$row["book_no"]."&user_account=".$row["user_account"]."&over_days=".$row["over_days"]."&fine_num=".$row["fine_num"]."'>";
      		    echo "<tr align='center' height='30'>";
      		    echo "<td>".$row["user_account"]."</td>";
      		    echo "<td>".$row["book_no"]."</td>";
      		   // echo "<td>".$row[book_name]."</td>";
      		    echo "<td>".$row["over_days"]."</td>";
      		    echo "<td>".$row["fine_num"]."</td>";
      		    echo "<td><input type = 'submit' value = '交罚款'></td>";
      		    echo "</tr>";
      		    echo "<form>";
      		}
   		 }else{
     	 echo "无超期未还图书，未产生罚单";
    	}
		 ?>
	</table>

</body>
</html>