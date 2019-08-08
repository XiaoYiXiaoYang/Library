<!DOCTYPE html>
<html>
<head>
	<title>继续输入数量进行添加</title>
</head>
<body>
	<div align="center" >
		<form method="post" action="sql_add_already_book.php">
			<?php
			$book_no = $_COOKIE["book_no"];  
			echo "请输入书籍编号：<input type='text' name='book_no' value='$book_no'><br><br>"; ?>
			请输入添加数量：<input type="number" name="book_amount"><br><br>
			<input type="submit" name="" value="提交">
		</form>
	</div>
	

</body>
</html>