<?php 
//获取表单
$user_account = $_POST["account"];
$user_id =$_POST["id"];
$user_name = $_POST["name"];
$user_sex = $_POST["sex"];
$user_age= $_POST["age"];
$user_telephone = $_POST["telephone"];

//连接数据库
	require_once("dbtools.inc.php");
	$link = create_connection();
				
  //执行sql语句更新用户资料
  $sql = "UPDATE users SET user_name='$user_name',user_sex='$user_sex',user_age ='$user_age',user_id ='$user_id',user_telephone ='$user_telephone' WHERE user_account='$user_account'";
  $result = execute_sql($link, "library2.0", $sql);
  if($result){
    echo "<h4 align='center'>修改成功</h4>";
  }else{
  	echo "<h4 align='center'>修改失败</h4>";
  }

 ?>