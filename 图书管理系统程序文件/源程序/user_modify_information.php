<?php 
 require_once("dbtools.inc.php");
		
  $user_account = $_COOKIE{"user_account"};
		
  //建立資料連接
  $link = create_connection();
				
  //執行 SELECT 陳述式取得使用者資料
  $sql = "SELECT * FROM users Where user_account = '$user_account'";
  $result = execute_sql($link, "library2.0", $sql);	
  $row = mysqli_fetch_assoc($result); //取得使用者管理员

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户修改资料</title>
  <script type="text/javascript"> 
    //用户名 密码 姓名 证件号 性别 电话 年龄
      function check_data()
      {
         if (document.myForm.account.value.length == 0)
        {
          alert("“账号”不能为空");
          return false;
        }
         if (document.myForm.account.value.length != 10)
        {
          alert("“账号”必须是10个字符");
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
         if (document.myForm.id.value.length == 0)
        {
          alert("证件号不能为空！");
          return false;
        }
          if (document.myForm.id.value.length !=10)
        {
          alert("证件号字段必须是10个字符！");
          return false;
        }
         if (document.myForm.age.value.length == 0)
        {
          alert("年龄不能为空！");
          return false;
        }
         if (document.myForm.age.value.length > 3)
        {
          alert("年龄不能超过3个字符！");
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
<body bgcolor="lightyellow">
	<table height="150">
		
	</table>

	
	<div align="center">
		
	<form method="post" action="sql_user_modify_information.php" name="myForm">
     <?php $date=date("Ymd")  ?>
   
    账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：<input type="text" name="account" readonly="readonly" value='<?php echo($row["user_account"]); ?>'><br><br>
    
		姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" name="name" value="<?php echo($row["user_name"]);  ?>"><br><br>
		证&nbsp;&nbsp;件&nbsp;&nbsp;号：<input type="text" name="id" value="<?php echo($row["user_id"]); ?>" ><br><br>
		性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<input type="radio" name="sex" checked="checked" value="男">男
												  <input type="radio" name="sex" value="女">女    <br><br>
		年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<input type="number" name="age" value="<?php echo($row["user_age"]);  ?>"><br><br>
	电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：<input type="text" name="telephone" value="<?php echo($row["user_telephone"]);  ?>"><br><br>
		
     <input type="button" name="" value="&nbsp;确认修改&nbsp;" onclick="check_data()">
    
     

	</form>
	</div>
	
</body>
</html>