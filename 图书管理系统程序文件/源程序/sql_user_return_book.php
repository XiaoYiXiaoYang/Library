<?php 
//获取表单
$book_no = $_GET["book_no"];
$book_name = $_GET["book_name"];
$borrow_date = $_GET["borrow_date"];
$return_deadline = $_GET["return_deadline"];
$user_account =$_GET["user_account"];

//1.可借阅数量加1  借书表是否归还写归还 还书表加记录
$return_date=date("Y-m-d");
//建立连接 
require_once("dbtools.inc.php"); 
$link = create_connection();
$sql="UPDATE books SET borrow_amount = borrow_amount+1 WHERE book_no='$book_no'";
$result = execute_sql($link, "library2.0", $sql);
if($result){
		echo "<h2 align='center'>修改可借阅数量成功</h2><br>";

		//可能一个人借一本书好几次 ，还的时候要注意日期
		$sql="UPDATE book_borrow SET is_return=1 WHERE book_no='$book_no' AND borrow_date='$borrow_date'";  
		$result = execute_sql($link, "library2.0", $sql);
		if($result){
			echo "<h2 align='center'>修改是否归还成功</h2><br>";

		$sql ="INSERT INTO book_return VALUES('$user_account','$book_no','$return_date')";
		$result = execute_sql($link, "library2.0", $sql);
		if($result){
  		echo "<h2 align='center'>还书成功</h2><br>";
  		}else{
   		echo "<h2 align='center'>还书失败</h2>";
  		 }	
		}else{
			echo "<h2 align='center'>修改是否归还失败</h2><br>";
		}
	}else{
		echo "<h2 align='center'>修改可借阅数量失败</h2><br>";
	}
		

	
 ?>