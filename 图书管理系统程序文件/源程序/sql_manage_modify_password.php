<?php 
	//获取表单
	$manager_account = $_POST["manager_account"];
	$manager_password = $_POST["new_password"];
	$manager_name = $_POST["manager_name"];
	$manager_telephone = $_POST["manager_telephone"];

	//连接数据库
	require_once("dbtools.inc.php");
	$link = create_connection();
				
    //执行sql语句更新管理员资料
    $sql = "UPDATE manager SET manager_name='$manager_name',manager_password='$manager_password', manager_telephone ='$manager_telephone' WHERE manager_account='$manager_account'";
    $result = execute_sql($link, "library2.0", $sql);
    if($result){
    	echo "修改成功";
    }else{
    	echo "修改失败";
    }
 ?>