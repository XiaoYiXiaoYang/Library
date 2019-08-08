<!DOCTYPE html>
<html>
<head>
	<title>继续加入新书籍</title>
</head>
<body>
	<div align="center">
		<form method="post" action="sql_add_new_book.php">
		<?php
		$book_no = $_COOKIE["book_no"];  
		echo "请输入书籍编号：<input type='text' name='book_no' value='$book_no'><br><br>"; ?>
		请输入书籍名称：<input type="text" name="book_name"><br><br>
		请选择书籍类别：<select name="class">
							<option selected="selected" value="小说类">小说类</option>
							<option value="历史类">历史类</option>
							<option value="计算机类">计算机类</option>
							<option value="文学类">文学类</option>
							<option value="社会类">社会类</option>
							<option value="经济类">经济类</option>
							<option value="文学类">文学类</option>
						</select><br><br>
		请输入作者名称：<input type="text" name="author"><br><br>
		请&nbsp;输&nbsp;入&nbsp;出&nbsp;版&nbsp;社：<input type="text" name="publish_house"><br><br>
		请&nbsp;输&nbsp;入&nbsp;价&nbsp;&nbsp;格：<input type="number" name="book_price" step="0.01"><br><br>
		请&nbsp;输&nbsp;入&nbsp;数&nbsp;&nbsp;量：<input type="number" name="book_amount"><br><br>
		<input type="submit" name="" value="提交">
		</form>

	</div>
		
</body>
</html>