<?php
  //检查 cookie 中的 passed 变量是否等于 TRUE
  $passed = $_COOKIE["passed"];
	
  /*  如果 cookie 中的 passed 变量不等于 TRUE
      表示尚未登入网站，将使用这导向首頁 login.html	*/
  if ($passed != "TRUE")
  {
    header("location:login.html");
    exit();
  }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>图书借阅系统——主菜单</title>
  </head>
  

 <frameset rows="180,*" frameborder="0">  <!--两行 第一行60 第二行*-->
      <frame name="top" noresize scrolling="no" src="user_show_link.html"></frame>
      <frameset cols="150,*">
          <frame name="left" noresize scrolling="no" src="mylibrary.html"></frame>
          <frame name="right" noresize   src="sql_user_select_all_book.php"></frame>
      </frameset>
  </frameset>

</html>