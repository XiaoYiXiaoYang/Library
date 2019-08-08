<?php
//读取注册信息，写入数据库
  require_once("dbtools.inc.php");
  
  //获取表单
  $account =$_POST["account"];
  $password = $_POST["password"]; 
  $name = $_POST["name"]; 
  $id = $_POST["id"];
  $sex = $_POST["sex"];
  $tellphone = $_POST["tellphone"];
  $age = $_POST["age"];


  //建立连接
  $link = create_connection();
			
  //检查账号是否有人申请
  $sql = "SELECT * FROM account Where user_account = '$account'";
  $result = execute_sql($link, "library2.0", $sql);

  
  //如果账号已经有人使用
  if (mysqli_num_rows($result) != 0)
  {
    //释放 $result 占用的内存
    mysqli_free_result($result);
		
    //显示讯息请求用户更换账号
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的账号已经有人使用，请使用其它账号');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果账号沒人使用
  else
  {
    //释放 $result 占用的内存
   mysqli_free_result($result);
		
    //执行 SQL 命令，新增此账号
    $sql1 = "INSERT INTO account(user_account, user_password) VALUES ('$account','$password')";

    $sql2="INSERT INTO users VALUES ('$id','$account','$name','$sex','$age','$tellphone',1)";//新注册用户等级都是1级
    $result = execute_sql($link, "library2.0", $sql1);
    $result = execute_sql($link, "library2.0", $sql2);
    if($result){
      echo "注册成功";
    }else{
      echo "注册失败";
    }
  }
	
  //关闭连接	
  mysqli_close($link);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>新增账号成功</title>
  </head>
  <body bgcolor="#FFFFFF">
    <table height="150">
      
    </table>
    <p align="center">       
    <p align="center">恭喜您已经注册成功了，您的资料如下：<br>
      账号：<font color="#FF0000"><?php echo $account ?></font><br>
      密码：<font color="#FF0000"><?php echo $password ?></font><br>       
      请记下您的账号及密码，欢迎<a href="login.html">登录网站</a>。
    </p>
  </body>
</html>