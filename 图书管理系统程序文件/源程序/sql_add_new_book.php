<?php
 	//读取注册信息，写入数据库
  	require_once("dbtools.inc.php");
 	//获取表单
   
    $book_name = $_POST["book_name"];
    $class = $_POST["class"];
    $author = $_POST["author"];
    $publish_house = $_POST["publish_house"];
    $book_price = $_POST["book_price"];
  	$book_amount =$_POST["book_amount"];
	  $book_no = $_POST["book_no"];
   //建立连接
  	$link = create_connection();

  //添加这本书的数据
    //(book_no,book_name,book_type,author_name,publish_house,book_price,book_sum,borrow_amount) 
  $sql = "INSERT INTO books VALUES('$book_no','$book_name','$class','$author','$publish_house','$book_price','$book_amount','$book_amount')";
  $result = execute_sql($link, "library2.0", $sql);
  if($result){
    echo "添加成功";
  }
  else{
    echo "添加失败";  
  }
  //关闭连接	
  mysqli_close($link);




  ?>