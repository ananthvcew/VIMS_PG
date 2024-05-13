<?php
session_start(); 
header('Content-Type: application/json');
$s1=$_SESSION['start_date'];
$s2 = (new DateTime());
$diff  	= date_diff( $s1, $s2 );
$m=$diff->format('%i');
$s=$diff->format('%s');
$du=$_SESSION['duration'];
$s4=$m.":".$s;
$s5=$m*60+$s;
$s6=$du*60;
$s6=$s6-$s5;
$m1=floor($s6/60);
$s1=($s6%60);
$s4=$m1.":".$s1;
$_SESSION['dur']=$m1;
//$since_start = $start_date->diff(new DateTime());
  print json_encode($s4);
//$data = $_SESSION['duration'];

 //  print json_encode($data);
   ?>