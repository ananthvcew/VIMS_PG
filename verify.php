<?php
session_start();
require("conn.php");
$s=new DBCON();
$link=$s->linkarivu();
$s1=$_POST['regno'];
$s2=$_POST['cno1'];

 $sql    = "select * from student where regno='".$s1."'";
// print $sql;
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo "DB Error, could not query the database\n";
     echo 'MySQL Error: ' . mysql_error();
    }
if($row = mysqli_fetch_assoc($result)) 
 { 
 if(($row['cno1']==$s2 || $row['cno2']==$s2) )
  {   
	
 $tz=new DateTimeZone("Asia/Kolkata");
	$d = new DateTime();
	$d->setTimeZone($tz);
  	$dd=$d->format('M jS, y&H:i:s A');
  	$regno=$row['regno'];
  	$sql2="INSERT INTO `log`(`regno`, `sfrom`, `eto`) VALUES ('{$regno}','{$dd}','')";
  	$res2=mysqli_query($link,$sql2);
  	if(!$res2){
  	    echo"error to store log";
  	}
  	else{
 header("location:testinst.php"); 
$scode=$row['branch'];

if($scode=='VO' || $scode=='OT'){
    $scode='VO/OT';
}
  
$_SESSION['name']=$row['name'];
$_SESSION['branch']=$scode;
$_SESSION['lang']=$row['examlang'];
$_SESSION['sid']=$row['sid'];
$_SESSION['regno']=$row['regno'];
}
	  
  }
       

else 
print "<h3> wrong password... Check your Password";
}
else
{
print "You are not Registered.. Go back... and Register  ";
} 

 ?>

 