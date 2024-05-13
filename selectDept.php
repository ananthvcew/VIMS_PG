<?php
session_start();
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
echo"<option value=''>Select Department</option>";
$sql="select * from department  where ccode=".$_POST['college'];
$res=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($res)){
    echo"<option value='".$row['dcode']."'>".$row['branch']."</option>";
}


?>