<?php
session_start();
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
echo"<option value=''>Select College</option>";
$sql="select * from college  where cam_code=".$_POST['phs'];
$res=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($res)){
    echo"<option value='".$row['ccode']."'>".$row['short']." - ".$row['cname']."</option>";
}


?>