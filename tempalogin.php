<?php
session_start();
?>
<?php
require("conn.php");
$s=new DBCON();
$link=$s->linkarivu();
$s1=trim($_POST['uname']);
$pt=$_POST['pt'];
if($pt=='ptd'){
   $s2=trim($_POST['pass']); 
}
else{
    $s2=trim($_POST['pass1']);
}


 $sql    = "select * from student where (regno='".$s1."' or cno1='".$s1."' or cno2='".$s1."' or name='".$s1."' or sid='".$s1."')";
 //print $sql;
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo "DB Error, could not query the database\n";
     echo 'MySQL Error: ' . mysql_error();
    }
if($row = mysqli_fetch_assoc($result)) 
 { 
 if($row['dob']==$s2 or $row['cno1']==$s2 or $row['cno2']==$s2)
  { $tz=new DateTimeZone("Asia/Kolkata");
	$d = new DateTime();
	$d->setTimeZone($tz);
  	$dd=$d->format('M jS, y&H:i:s A');
  	$regno=$row['regno'];
  	$sql2="INSERT INTO `log`(`regno`, `sfrom`, `eto`) VALUES ('{$regno}','{$dd}','')";
  	$res2=mysqli_query($link,$sql2);
  	if(!$res2){
  	    //echo"error to store log";
  	}
  	else{
$scode=$row['preperence'];
if($scode=='VO' || $scode=='OT'){
    $scode='VO/OT';
}
$_SESSION['name']=$row['name'];
$_SESSION['branch']=$scode;
$_SESSION['lang']=$row['examlang'];
$_SESSION['sid']=$row['sid'];
$_SESSION['regno']=$row['regno'];
$_SESSION['atId']=$row['at_regno'];
header("location:testinst.php");  print"hi";
  }
  }
else {
    //  header("location:find.php");
    //  $_SESSION['regno']=$s1;
    //  $_SESSION['dob']=$s2;
    //  $_SESSION['id']=0;
    echo "Contact Technical helpline";

}

}
else
{
// header("location:find.php");
//      $_SESSION['regno']=$s1;
//      $_SESSION['dob']=$s2;
//     $_SESSION['id']=1;
echo "Contact Technical helpline";
} 

 ?>

 