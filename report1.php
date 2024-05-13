<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$group=$_POST['2g'];
$cat=$_POST['cat'];
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Disposition: attachment;Filename='".$group."-".$cat."'.xls");

if($cat==50){
    if($group=='VO/OT'){
        $sql="select * from result where (branch='VO' or branch='OT') and mark<=25 and mark>=0";
    }
    else{
       $sql="select * from result where branch='".$group."' and mark<=25 and mark>=0"; 
    }
}
elseif($cat==74){
    if($group=='VO/OT'){
        $sql="select * from result where (branch='VO' or branch='OT') and mark<=37.5 and mark>=25.5";
    }
    else{
       $sql="select * from result where branch='".$group."' and mark<=37.5 and mark>=25.5";
    }
}
elseif($cat==90){
      if($group=='VO/OT'){
        $sql="select * from result where (branch='VO' or branch='OT') and mark<=45 and mark>=38";
    }
    else{
       $sql="select * from result where branch='".$group."' and mark<=45 and mark>=38";
    }
}
elseif($cat==94){
     if($group=='VO/OT'){
        $sql="select * from result where (branch='VO' or branch='OT') and mark<=47 and mark>=45.5";
    }
    else{
       $sql="select * from result where branch='".$group."' and mark<=47 and mark>=45.5";
    }
}
elseif($cat==95){
     if($group=='VO/OT'){
        $sql="select * from result where (branch='VO' or branch='OT') and mark>=47.5";
    }
    else{
       $sql="select * from result where branch='".$group."' and mark>=47.5";
    }
}
//print$sql;
$res=mysqli_query($link,$sql);
if(!$res){
    echo"Error to get report";
}
echo"<b><center><font size='5'>VIVEKANANDHA EDUCATIONAL INSTITUTIONS</font><br>Online Arivuthiran Exam 2020 - Result<br>".$group." - ".$s->getsubname($group)."<br>";
if($cat==50){
    echo"Rang of Mark : 0 - 50";
}
elseif($cat==74){
    echo"Rang of Mark : 51 - 75";
}
elseif($cat==90){
    echo"Rang of Mark : 76 - 90";
}
elseif($cat==94){
    echo"Rang of Mark : 91 - 94";
}
elseif($cat==94){
    echo"Rang of Mark : 95 - 100";
}
echo"</center></b>";
    echo"<table border=1>";
    echo"<tr><th>S.No</th><th>Register No</th><th>Student Name</th><th>AT Mark</th><th>Branch</th><th>Exam Language</th><th>Preference</th><th>Date of Birth</th><th>District</th><th>Contact No</th><th>Whatsapp no</th></tr>";
   $i=0;
while($row=mysqli_fetch_assoc($res)){
    $i=$i+1;
    $mark1=$row['mark'];
    $mark=$mark1*2;
    echo"<tr><td>$i</td><td>".$row['regno']."</td><td>".$row['name']."</td><td>".$mark."</td><td>".$row['branch']."</td><td>".$row['examlang']."</td><td>".$row['preference']."</td><td>".$row['dob']."</td><td>".$row['district']."</td><td>".$row['cno1']."</td><td>".$row['cno2']."</td></tr>";

}
?>