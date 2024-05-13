<?php
// session_start();
include'includes/config.php';
require("conn.php");
$s=new DBCON();
$link=$s->linkarivu();
$s1=trim($_POST['uname']);
$s2=trim($_POST['pass']);
$obj=new Student();
$re=$obj->dbGroup();
 $sql    = "select * from user where uname='".$s1."' ";
 print $sql;
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo "DB Error, could not query the database\n";
     echo 'MySQL Error: ' . mysql_error();
    }
if($row = mysqli_fetch_assoc($result)) 
 { 
 if($row['pass']==$s2)
  {   
  	$_SESSION['name']=$row['Name'];
  	$_SESSION['user']="Staff";
	if($row['level']==1){
			header("location:home.php");
	}elseif($row['level']==2){
		header("location:welcome.php");
	}else{
		header("location:techSupport.php");
	}
  

  



	  
  }
       

else 
print "wrong pass";
}
else
{
print "no such user ";
} 

 ?>

 