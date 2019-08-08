<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>注册页面</title>
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
        if (document.myForm.password.value.length == 0)
        {
          alert("“密码”不能为空");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
          alert("“密码”不能超过10 个字符");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("“密码确认”不能为空");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("“密码确认”字段与“密码”字段一定要相同");
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
        if (document.myForm.tellphone.value.length == 0)
        {
          alert("手机号不能为空！");
          return false;
        }
       if (document.myForm.tellphone.value.length != 11)
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

	<h2 align="center">请填写注册信息</h2>
	<div align="center">
		
	<form method="post" action="addmember.php" name="myForm">
     <?php $date=date("Ymd")  ?>
   
    账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：<input type="text" name="account" value='<?php echo($date); ?>'><br><br>
    
		
		密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"><br><br>
		密码确认：								<input type="re_password" name="re_password"><br><br>
		姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" name="name"><br><br>
		证&nbsp;&nbsp;件&nbsp;&nbsp;号：<input type="text" name="id" value="学号即可"><br><br>
		性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<input type="radio" name="sex" checked="checked" value="男">男
												  <input type="radio" name="sex" value="女">女    <br><br>
		年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：<input type="number" name="age"><br><br>
		电&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话：<input type="text" name="tellphone"><br><br>
		<?php 
      //echo"<input type='button' name='' value='注册' onclick='check_data()'>";
     ?>
     <input type="button" name="" value="&nbsp;注册&nbsp;" onclick="check_data()">

	</form>
	</div>
	
</body>
</html>