<?php
session_start();
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
include('top.php');
date_default_timezone_get('Asia/Kolkata');
ini_set('date.timezone', 'Asia/Kolkata');
$date=date('Y-m-d H:i:s');
// die();
$regno=$_SESSION['regno'];
$mark10=$_POST['10mark'];
$mark11=$_POST['11mark'];
$mark12=$_POST['12mark']!=''?$_POST['12mark']:0;
$occupation=$_POST['occupation'];
$ai=$_POST['ai'];
$phs=$_POST['phs'];
$college=$_POST['college'];
$course=$_POST['course'];
$hscyear=$_POST['hscyear'];
$hscmark=$_POST['hscmark'];
if(!$hscmark)
$hscmark =0;
$sql1="select regno from scholarship where regno=".$regno;
$res1=mysqli_query($link,$sql1);
// print_r($res1);
//print $occupation;
if(mysqli_num_rows($res1)>0){
    echo"Scholarship form already Submited Successfully for this Register Number";
}  
else{
$sql="INSERT INTO `scholarship`(`regno`, `mark_10`, `mark_11`, `doj`, `occup`, `a_income`, `phs`, `college`, `course`, `yearhsc`, `hscmark`,`created_at`) VALUES (".$regno.",".$mark10.",".$mark11.",'".$mark12."','".$occupation."','".$ai."','".$phs."','".$college."','".$course."',".$hscyear.",".$hscmark.",'".$date."' )";
//print $sql;
$res=mysqli_query($link,$sql);
if($res){
   //echo" <h5> Scholarship from Submited Successfully. You Will get the intimation Soon...</h5>";
   ?>
   <div class="card">
  <div class="card-header">Scholarship form Submited Successfully</div>
  <div class="card-body">
    <table class='table table-bordered' style='width:50%; margin:auto;'>
        <thead><tr><th colspan='2' class='text-center'><?=strtoupper('Acknowledgement Detail')?></th></tr></thead>
        <tbody>
            <tr><td>Candidate Name</td><td><?=$s->getstdetail2($regno,'name')?></td></tr>
            <tr><td>VIMS Unique Number</td><td><?=$s->getstdetail2($regno,'at_regno')?></td></tr>
            <tr><td>Applied Date</td><td><?=$date?></td></tr>
        </tbody>
    </table>
  </div>
  <div class='card-footer'>
      You Will get the intimation Soon...
  </div>
</div>
<?
}
else{
    echo"Scholarship form not Submited, Contact Admission office";
}  
}  



?>