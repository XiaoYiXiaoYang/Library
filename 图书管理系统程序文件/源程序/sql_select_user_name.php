<!DOCTYPE html>
<html>
<head>
	<title>任意字查询显示页面</title>
</head>
<body>
	<table align="center" height="150" width="1000px" >
		<tr height="50px" width="1000px" >
			<th>读者证件</th>
			<th>读者账号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>年龄</th>
			<th>电话</th>
			<th>vip级别</th>
			<th>详细记录</th>
		</tr>

<?php 

  require_once("dbtools.inc.php");
//获取表单
	$user_name = $_POST["user_name"];
//建立连接
	$link = create_connection();

	//书写SQL语句，匹配任意姓名 证件号 电话
	$sql="SELECT user_id,user_account,user_name,user_sex,user_age,user_telephone,user_level FROM users WHERE user_id like '%$user_name%' or user_name like '%$user_name%' or user_telephone like '%$user_name%'";
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
			echo "<form method='post' action='select_user_details.php?user_id=".$row["user_id"]."&user_name=".urlencode($row["user_name"])."&user_account=".$row["user_account"]."&user_sex=".$row["user_sex"]."&user_telephone=".$row["user_telephone"]."&user_age=".$row["user_age"]."&user_level=".$row["user_level"]."'>";
			echo "<tr width='1000px' height='50px' align='center'>";
			echo "<td>"."$row[user_id]"."</td>";
			echo "<td>"."$row[user_account]"."</td>";
			echo "<td>"."$row[user_name]"."</td>";
			echo "<td>"."$row[user_sex]"."</td>";
			echo "<td>"."$row[user_age]"."</td>";
			echo "<td>"."$row[user_telephone]"."</td>";
			echo "<td>"."$row[user_level]"."</td>";
			echo "<td><input type='submit' value='详细' ></td>";
			echo "<tr>";
			//onClick=\"javascript:window.open('select_user_details.php','_self')\"
			echo "</form>";
		}
	}else{
		echo "查询失败,读者中无此人相关信息，请检查后再查";
	}
//关闭连接
	mysqli_close($link);
 ?>
	</table>

</body>
</html>

