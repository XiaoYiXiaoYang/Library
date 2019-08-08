<?php 
//获取表单
$user_account =$_GET["user_account"];
$book_no =$_GET["book_no"];
$borrow_date =$_GET["borrow_date"];
$return_deadline = $_GET["return_deadline"];

$temp = strtotime($return_deadline);

$new_date=date('Y-m-d',strtotime("+15 day",$temp));//新的还书日期
echo($new_date);


require_once("dbtools.inc.php");
$link = create_connection();

//将还书日期改为应该还书的15天后
$sql = "UPDATE book_borrow SET return_deadline ='$new_date' WHERE user_account='$user_account' AND book_no = '$book_no' AND borrow_date ='$borrow_date' ";  
$result = execute_sql($link, "library2.0", $sql);
 
 if($result){
   echo "续借成功<br>";
 }else{
   echo "续借失败<br>";
 }
 ?>