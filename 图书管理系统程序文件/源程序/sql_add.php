
 	<?php
 	//读取注册信息，写入数据库
  require_once("dbtools.inc.php");
 	//获取表单
  $book_no =$_POST["book_no"];
	//建立连接
  $link = create_connection();
			
  //检查书籍是否存在
  $sql = "SELECT * FROM books Where book_no = '$book_no'";
  $result = execute_sql($link, "library2.0", $sql);

  //如果书籍已经存在
  if (mysqli_num_rows($result) != 0)
  {
    setcookie("book_no", $book_no); 
    header("location:sql_add_amount.php");
    //关闭连接	
  mysqli_close($link);
  }
  else
  {
  	setcookie("book_no", $book_no); 
    header("location:sql_add_others.php");
     //关闭连接	
  	mysqli_close($link);
  }

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>继续输入添加书籍信息</title>
 </head>
 <body>
 
 </body>
 </html>