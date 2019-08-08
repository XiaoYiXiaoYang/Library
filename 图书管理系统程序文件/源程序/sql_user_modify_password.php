<?php 
	//获取表单
	$user_account = $_POST["user_account"];
	$user_password = $_POST["new_password"];

	//连接数据库
	require_once("dbtools.inc.php");
	$link = create_connection();
				
    //执行sql语句更新管理员资料
    $sql = "UPDATE account SET user_password='$user_password' WHERE user_account='$user_account'";
    $result = execute_sql($link, "library2.0", $sql);
    if($result){
    	echo "修改成功";
    }else{
    	echo "修改失败";
    }
 ?>