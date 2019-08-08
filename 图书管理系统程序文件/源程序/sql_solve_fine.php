<?php 
//获取表单
$user_account = $_GET["user_account"];
$book_no = $_GET["book_no"];

//连接
require_once("dbtools.inc.php");
$link = create_connection();
$sql = "UPDATE fine SET is_deal = 1 WHERE user_account='$user_account' AND book_no='$book_no'";  //超期未还的图书
  $result = execute_sql($link, "library2.0", $sql);
  if($result){
  	echo "处理罚单成功";
  }else{
  	echo "处理罚单失败";
  }

 ?>