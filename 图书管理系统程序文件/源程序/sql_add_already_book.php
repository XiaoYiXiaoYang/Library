<?php
 	//读取注册信息，写入数据库
  	require_once("dbtools.inc.php");
 	//获取表单
 	$book_no = $_POST["book_no"];
  	$book_amount =$_POST["book_amount"];
	//建立连接
  	$link = create_connection();
		
  //更新书籍数量

  $sql1 = "UPDATE books SET borrow_amount=borrow_amount+$book_amount Where book_no = '$book_no'"; 

  $result = execute_sql($link, "library2.0", $sql1);
  if($result){
    echo "可借阅数量添加成功";
  } else{
    echo "添加失败";
  }
   $sql2 = "UPDATE books SET book_sum=book_sum+$book_amount Where book_no = '$book_no'";
 
  $result = execute_sql($link, "library2.0", $sql2);
  //关闭连接
  if($result){
    echo "总数量添加成功";
  } else{
    echo "添加失败";
  }

  mysqli_close($link);
  


  ?>