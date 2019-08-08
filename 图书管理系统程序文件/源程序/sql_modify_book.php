<?php 
//读取注册信息，写入数据库
  require_once("dbtools.inc.php");
//获取表单信息
  	$book_name = $_POST["book_name"];
    $class = $_POST["class"];
    $author = $_POST["author"];
    $publish_house = $_POST["publish_house"];
    $book_price = $_POST["book_price"];
    $book_no = $_POST["book_no"];
	//$book_sum=$_POST["book_sum"];
//建立连接
  $link = create_connection();


  $sql = "UPDATE books SET book_name='$book_name',book_type='$class',author_name='$author',publish_house='$publish_house',book_price='$book_price' WHERE book_no='$book_no'";
	$result = execute_sql($link, "library2.0", $sql);
	if($result){
		echo "修改成功";
	}else{
		echo "修改失败";
	}
 //关闭连接	
  mysqli_close($link);

 ?>