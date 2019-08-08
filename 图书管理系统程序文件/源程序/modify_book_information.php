<?php
//获取表单
 	  $book_name = $_GET["book_name"];
    $class = $_GET["class"];
    $author = $_GET["author"];
    $publish_house = $_GET["publish_house"];
    $book_price = $_GET["book_price"];
  	$book_no = $_GET["book_no"];
   // $book_sum = $_GET["book_sum"];

  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<title>修改信息页面</title>
  </head>
  <body>
  	<div align="center">
  		<form method="post" action="sql_modify_book.php">
  			<?php 

        echo "书籍编号：<input type='text' name='book_no' value='$book_no'><br><br>";
  		//echo "书籍编号：<input type='text' name='book_no' value='$book_no'><br><br>";
		  echo "书籍名称：<input type='text' name='book_name' value='$book_name'><br><br>"; 
		  echo "书籍类别：<select name='class'>
							<option selected='selected' value='小说类'>小说类</option>
							<option value='历史类'>历史类</option>
							<option value='计算机类'>计算机类</option>
							<option value='文学类'>文学类</option>
              <option value='科学类'>科学类</option>
              <option value='社会类'>社会类</option>
              <option value='经济类'>经济类</option>
						</select><br><br>"; 

		echo "作者名称：<input type='text' name='author' value='$author'><br><br>";
		echo "出&nbsp;版&nbsp;社：<input type='text' name='publish_house' value='$publish_house'><br><br>";
		echo "价&nbsp;&nbsp;格：<input type='number' name='book_price' step='0.01' value='$book_price'><br><br>";
    //echo "总&nbsp;数&nbsp;量：<input type='number' name='book_sum'  value='$book_sum'><br><br>";
    setcookie("book_no",$book_no);
    echo "<input type='submit' name='' value='确认修改'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   
    echo "<td><input type='button' value='确认删除' onClick=\"javascript:window.open('sql_delete_book.php','_self')\">";
      
  	 ?>
  		</form>
  	</div>
  </body>
  </html>