<?php
  require_once("dbtools.inc.php");
		
    $user_account = $_COOKIE{"user_account"};
		
    //建立資料連接
    $link = create_connection();
				
    $sql = "SELECT * FROM account Where user_account = '$user_account'";
    $result = execute_sql($link, "library2.0", $sql);
		
    $row = mysqli_fetch_assoc($result); //取得使用者管理员资料

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员修改密码页</title>
  <script type="text/javascript"> 
    //用户名 密码 姓名 证件号 性别 电话 年龄
      function check_data()
      {
         if (document.myForm.user_account.value.length == 0)
        {
          alert("“账号”不能为空");
          return false;
        }
        if (document.myForm.old_password.value.length == 0)
        {
          alert("“原密码”不能为空");
          return false;
        }
        if (document.myForm.old_password.value.length > 10)
        {
          alert("“原密码”不能超过10 个字符");
          return false;
        }
         if (document.myForm.new_password.value.length == 0)
        {
          alert("“新密码”不能为空");
          return false;
        }
        if (document.myForm.new_password.value.length > 10)
        {
          alert("“新密码”不能超过10 个字符");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("“密码确认”不能为空");
          return false;
        }
        if (document.myForm.new_password.value != document.myForm.re_password.value)
        {
          alert("“密码确认”字段与“新密码”字段一定要相同");
          return false;
        }
        
        myForm.submit();          
      }
    </script> 
</head>
<body bgcolor="lightyellow">
	<div align="center">
		<form method="post" action="sql_user_modify_password.php" name="myForm"><br><br>
			用&nbsp;&nbsp;户&nbsp;&nbsp;名:<input type="text" readonly="readonly" name="user_account"  value="<?php echo($row["user_account"]);  ?>"><br><br>
			原&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="text" name="old_password" value="<?php echo($row["user_password"]);  ?>"><br><br>
			新&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="password" name="new_password"><br><br>
			确认新密码：<input type="re_password" name="re_password"><br><br>
			
      <input type="button" name="" value="确认修改" onclick="check_data()">
		</form>

	</div>
</body>
</html>       