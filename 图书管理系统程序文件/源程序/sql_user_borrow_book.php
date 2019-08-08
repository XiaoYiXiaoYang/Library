<?php 
//1.获取可借阅数量，等级，当前借阅数目
//2.判断可借阅数目大于0，等级与可借阅数目相适应
//3.借书，修改可借阅数目，加借书记录

//获取表单
$book_no = $_GET["book_no"];
//获取当前用户
$user_account=$_COOKIE["user_account"];

    //建立连接
    require_once("dbtools.inc.php"); 
    $link = create_connection();

    //获取当前用户的等级
  	$sql = "SELECT user_level FROM users WHERE user_account ='$user_account'";
  	$result = execute_sql($link, "library2.0", $sql);
	  $row = mysqli_fetch_assoc($result);//得到等级$row["user_level"]
	  if($result){
		  echo "获取当前用户等级成功<br>";
	  }else{
		  echo "获取当前用户等级失败<br>";
	  }

	//获取当前用户借阅数目
  $sql = "SELECT book_no FROM book_borrow where is_return = 0";
  $result = execute_sql($link, "library2.0", $sql);
  $present_borrow_num = mysqli_num_rows($result);//得到当前借阅数目
  if($result){
  	echo "获取当前用户借阅数目成功<br>";
  }else{
  	echo "获取当前用户借阅数目失败<br>";
  }
  
  //借书日期
	$borrow_date =date("Y-m-d");  
 //还书日期
  $return_deadline = date("Y-m-d",strtotime("+1 month"));

//借书
/*function borrow_book($user_account,$book_no,$borrow_date,$return_deadline,$link){

}

function update_book_amount($link){
	
}*/
//获取可借阅数量
$sql="SELECT borrow_amount FROM books WHERE book_no='$book_no'";
$result = execute_sql($link, "library2.0", $sql);
$temp = mysqli_fetch_assoc($result);
$borrow_amount = $temp["borrow_amount"];

if($borrow_amount > 0){  //可借阅数量大于0 可以借阅
   if($row["user_level"] ==1){
       if($present_borrow_num<=3){ //等级为1级，且一次借阅未超出三本
         
         $sql = "INSERT INTO book_borrow VALUES('$user_account','$book_no','$borrow_date','$return_deadline',0)";
         $result = execute_sql($link, "library2.0", $sql);
         if($result){
            echo "借书成功<br>";
            $sql="UPDATE books SET borrow_amount = borrow_amount-1 WHERE book_no='$book_no' ";
         $result = execute_sql($link, "library2.0", $sql);
        
          if($result){
             echo "可借阅数量修改成功<br>";
        }else{
             echo "1级用户一次最多借书3本";
        }
         }else{
            echo "借书失败";
      }
       }else{
           echo "可借阅数量修改失败";
       }



       
  }else if($row["user_level"] ==2){
    if($present_borrow_num <=5){
       $sql = "INSERT INTO book_borrow VALUES('$user_account','$book_no','$borrow_date','$return_deadline',0)";
        $result = execute_sql($link, "library2.0", $sql);
        if($result){
          echo "借书成功";

       $sql="UPDATE books SET borrow_amount = borrow_amount-1 WHERE book_no='$book_no'";
       $result = execute_sql($link, "library2.0", $sql);
       if($result){
        echo "可借阅数量修改成功";

        
    }else{
      echo "2级用户一次最多借书5本";
    }
        }else{
        echo "借书失败";
        }
       }else{
        echo "可借阅数量修改失败";
       }
     

}elseif ($row["user_level"] ==3) {

  if($present_borrow_num <= 10){

        $sql = "INSERT INTO book_borrow VALUES('$user_account','$book_no','$borrow_date','$return_deadline',0)";
        $result = execute_sql($link, "library2.0", $sql);
        if($result){
          echo "借书成功";

       $sql="UPDATE books SET borrow_amount = borrow_amount-1 WHERE book_no='$book_no'";
       $result = execute_sql($link, "library2.0", $sql);
       if($result){
        echo "可借阅数量修改成功";
       }else{
        echo "可借阅数量修改失败";
       }
        }else{
        echo "借书失败";
        }
      

  }else{
    echo "3级用户一次最多借书10本（最大值）";
  }
} 

}else{

    echo "可借阅数量不足，无法借阅";
}
 
//先查询这个读者当前借了几本，一级读者一次最多能借3本

//然后借书，在借书记录里加记录，把可借阅数量-1

//借阅成功判断是否升级该用户

 ?>