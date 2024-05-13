<?php
include('top.php');
?>








<div class='card'>Reference Count</div>
<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
//$rname=trim($_POST['rname']);
//$rmob=trim($_POST['rmob']);
$sql="select * from studentdup where regno in (select distinct regno from tmark_final)";
$res=mysqli_query($link,$sql);
if(!$res)
{
    echo"Error to get college details";
}
while($row=mysqli_fetch_assoc($res)){
    $rno=$row['regno'];
  $sql1="update studentdup set remarks='yes'  where regno ='".$rno."'"; 
  $res1=mysqli_query($link,$sql1);
}
?>
