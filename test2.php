<?php 
session_start();
$_SESSION['scode']=$_POST['scode'];
$_SESSION['tcode']=$_POST['tcode'];
$_SESSION['qq']=$_POST['qq'];
$_SESSION['nxt']=$_POST['nxt'];
$_SESSION['set']=$_POST['set'];
$_SESSION['hi']=1;
require('conn.php');
$s=new DBCON();
//$ref=$_POST['ref'];
//$refm=$_POST['refmobile'];
$regno= $_SESSION['regno']; 
//$_SESSION['ref']=$ref;
//$_SESSION['refm']=$refm;
$sqln="select * reference where regno='$regno'";
$l=$s->linkarivu();
$result = mysqli_query($l,$sqln);  
if ($row= mysqli_fetch_assoc($result)) 
  {$ref=$_row['ref'];
   $refm=$_row['refmobile'];
  }
  $_SESSION['start_date'] = new DateTime();
header("location:retest.php");
?>