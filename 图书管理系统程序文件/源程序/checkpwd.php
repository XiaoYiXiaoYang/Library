<?php
  require_once("dbtools.inc.php");
  header("Content-type: text/html; charset=utf-8");
	
  //取得表单资料
  $account = $_POST["account"]; 	
  $password = $_POST["password"];
  $aselect = $_POST["aselect"];

  //建立资料
  $link = create_connection();

	if($aselect=='general'){//普通用户

  //检查账号密码是否正确
  $sql = "SELECT * FROM account WHERE user_account = '$account' AND user_password = '$password'";
  $result = execute_sql($link, "library2.0", $sql);

  //如果账号密码错误
  if (mysqli_num_rows($result) == 0)
  {
    //释放 $result 占用的内存
    mysqli_free_result($result);
  
    //关闭资料链接  
    mysqli_close($link);
    
    //显示讯息提示用户输入正确的账号密码
   echo "<script type='text/javascript'>";
    echo "alert('用户账号密码错误，请查明后再登录');";
    echo "history.back();";
    echo "</script>";
  }
  
  //如果账号密码正确
  else
  {
    //获取账号字段
    $account = mysqli_fetch_object($result)->user_account;
  
    //释放 $result 占用的内存  
    mysqli_free_result($result);
    
    //关闭资料链接  
    mysqli_close($link);

    //将使用者资料加入 cookies
    setcookie("user_account", $account);
    setcookie("passed", "TRUE");  

    header("location:user_main.php");    
  }

  }	
  else if($aselect=='manager'){//管理者用户

  //检查账号密码是否正确
  $sql = "SELECT * FROM manager WHERE manager_account = '$account' AND manager_password = '$password'";
  $result = execute_sql($link, "library2.0", $sql);

  //如果账号密码错误
  if(mysqli_num_rows($result) == 0)
  {
    //释放 $result 占用的内存
    mysqli_free_result($result);
  
    //关闭资料链接  
    mysqli_close($link);
    
    //显示讯息提示用户输入正确的账号密码
    echo "<script type='text/javascript'>";
    echo "alert('管理员账号密码错误，请查明后再登录');";
    echo "history.back();";
    echo "</script>";
  }
  
  //如果账号密码正确
  else
  {
    //获取管理员账号字段
    $account = mysqli_fetch_object($result)->manager_account;
  
    //释放 $result 占用的内存  
    mysqli_free_result($result);
    
    //关闭资料链接  
    mysqli_close($link);

    //将使用者资料加入 cookies
    setcookie("manager_account", $account);
    setcookie("passed", "TRUE"); 
     header("location:manage_Menu.php");    
  }
  }
  else
    echo "未知错误";
?>