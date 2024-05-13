<?php 
session_start();
$_SESSION['exno']=$_SESSION['exno']+1;
$_SESSION['var']=1;
header("location:viewques.php");
?>