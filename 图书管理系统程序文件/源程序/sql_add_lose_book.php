<?php 
//获取表单
$user_account =$_GET["user_account"];
$book_no =$_GET["book_no"];
$borrow_date =$_GET["borrow_date"];

require_once("dbtools.inc.php");
  $link = create_connection();
//得到价格
$sql="SELECT book_price FROM books WHERE book_no ='$book_no'";
$result = execute_sql($link, "library2.0", $sql);
$row = mysqli_fetch_assoc($result); 
$lose_price =$row["book_price"];

$log_date = date("Y-m-d");  //登记日期

  $sql = "INSERT INTO lose VALUES('$book_no','$user_account','$lose_price',0,'$log_date')";  //增加遗失记录
    $result = execute_sql($link, "library2.0", $sql);
    if($result){
      echo "登记成功<br>";
    }else{
      echo "登记失败";
    }


 ?>