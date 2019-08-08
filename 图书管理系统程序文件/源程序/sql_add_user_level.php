<?php 
//获取表单
$user_level =$_GET["user_level"];
$sum_book = $_GET["sum_book"];

if($user_level==1){
	if($sum_book >= 10){
		$sql="UPDATE users SET user_level =user_level+1 WHERE user_account='$user_account'";
		$result = execute_sql($link, "library2.0", $sql);
		if($result){
  		 	echo "<h3 align='center'>升级成功<h3>";
  		 }else{
  		 	echo "<h3 align='center'>升级失败</h3>";
  		 }		
	}else{
		echo "<h3 align='center'>借阅数量不足10本，无法升级</h3>";
	}
}else if($user_level ==2){
	if($sum_book >= 20){
		$sql="UPDATE users SET user_level =user_level+1 WHERE user_account='$user_account'";
		$result = execute_sql($link, "library2.0", $sql);
		if($result){
  		 	echo "<h3 align='center'>升级成功</h3>";
  		 }else{
  		 	echo "<h3 align='center'>升级失败</h3>";
  		 }		
	}else{
		echo "<h3 align='center'>借阅数量不足20本，无法升级</h3>";
	}
}else if($user_level == 3){
	if($sum_book == 50){
		$sql="UPDATE users SET user_level =user_level+1 WHERE user_account='$user_account'";
		$result = execute_sql($link, "library2.0", $sql);
		if($result){
  		 	echo "<h3 align='center'>升级成功</h3>";
  		 }else{
  		 	echo "<h3 align='center'>升级失败</h3>";
  		 }		
	}else{
		echo "<h3 align='center'>借阅数量不足50本，无法升级</h3>";
	}
}
else{
	echo "等级达到最高，无法升级";
}
 ?>
