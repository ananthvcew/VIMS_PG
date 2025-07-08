<?php
session_start();
require("conn.php");
$s=new DBCON();
$link=$s->linkarivu();
$s1=trim($_POST['uname']);
$s2=trim($_POST['pass']);

 $sql    = "select * from student where (regno='".$s1."' or cno1='".$s1."' or cno2='".$s1."' or name='".$s1."' or sid='".$s1."')";
 //print $sql;
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo "DB Error, could not query the database\n";
     echo 'MySQL Error: ' . mysql_error();
    }
if($row = mysqli_fetch_assoc($result)) 
 { 
 if($row['dob']==$s2)
  {   
	
 header("location:home.php"); 
  
$_SESSION['name']=$row['name'];
$_SESSION['branch']=$row['brance'];
$_SESSION['sid']=$row['sid'];
$_SESSION['regno']=$row['regno'];
$_SESSION['user']="STUDENT";
	  
  }
       

else 
print "<h3> wrong password... Check your Password";
}
else
{
print "You are not Registered.. Go back... and Register  ";
} 

 ?>

 