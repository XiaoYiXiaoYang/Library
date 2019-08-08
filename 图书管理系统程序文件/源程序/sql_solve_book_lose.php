<?php 
//获取表单
$user_account = $_GET["user_account"];
$book_no =$_GET["book_no"];

require_once("dbtools.inc.php");
$link = create_connection();
$sql = "UPDATE lose SET is_deal = 1 WHERE user_account = '$user_account' AND book_no = '$book_no'";  //修改状态为已经赔偿
  $result = execute_sql($link, "library2.0", $sql);
  if($result){
  	echo "赔偿成功<br>";
  }else{
  	echo "赔偿失败";
  }


 ?>