<?php
  //检查cookie中的passed是否为true
  $passed = $_COOKIE{"passed"};
	
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.htm
  if ($passed != "TRUE")
  {
    header("location:index.htm");
    exit();
  }
  //如果 cookie 中的 passed 變數等於 TRUE
  //表示已经登录网站，取得使用者资料	
  else
  {
    require_once("dbtools.inc.php");
		
    $manager_account = $_COOKIE{"manager_account"};
		
    //建立資料連接
    $link = create_connection();
				
    //執行 SELECT 陳述式取得使用者資料
    $sql = "SELECT * FROM manager Where manager_account = '$manager_account'";
    $result = execute_sql($link, "library2.0", $sql);
		
    $row = mysqli_fetch_assoc($result); //取得使用者管理员资料
}
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
         if (document.myForm.manager_account.value.length == 0)
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
        if (document.myForm.name.value.length == 0)
        {
          alert("姓名不能为空！");
          return false;
        }
       if (document.myForm.name.value.length > 10)
        {
          alert("姓名字段不能超过10个字符！");
          return false;
        }
        if (document.myForm.telephone.value.length == 0)
        {
          alert("手机号不能为空！");
          return false;
        }
       if (document.myForm.telephone.value.length != 11)
        {
          alert("手机号长度必须是11个字符！");
          return false;
        } 
        myForm.submit();          
      }
    </script> 
</head>
<body>
	<div align="center">
		<form method="post" action="sql_manage_modify_password.php" name="myForm"><br><br>
			用&nbsp;&nbsp;户&nbsp;&nbsp;名:<input type="text" readonly="readonly" name="manager_account" value="<?php echo($row["manager_account"]);  ?>"><br><br>
			原&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="text" name="old_password" value="<?php echo($row["manager_password"]);  ?>"><br><br>
			新&nbsp;&nbsp;密&nbsp;&nbsp;码：<input type="password" name="new_password"><br><br>
			确认新密码：<input type="re_password" name="re_password"><br><br>
			姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" name="manager_name" value="<?php echo($row["manager_name"]);  ?>"><br><br>
			联系方式：<input type="text" name="manager_telephone" value="<?php  echo($row["manager_telephone"]); ?>"><br><br>
      <input type="button" name="" value="确认修改" onclick="check_data()">
			<?php 
         //echo "<input type='button' name='' value='确认修改' onclick='check_data()'>";
       ?> 

		</form>

	</div>
</body>
</html>       