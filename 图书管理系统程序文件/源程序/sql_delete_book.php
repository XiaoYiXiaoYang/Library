<?php 
//获取表单
$book_no = $_COOKIE["book_no"];

require_once("dbtools.inc.php");
//建立连接
  $link = create_connection();


  	$sql = "DELETE FROM books WHERE book_no='$book_no'";
	$result = execute_sql($link, "library2.0", $sql);
	if($result){
		echo "删除成功";
	}else{
		echo "删除失败";
	}
 //关闭连接	
  mysqli_close($link);
  
 ?>