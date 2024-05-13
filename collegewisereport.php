<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();

$sql="SELECT * FROM `college`";
echo"<table>";
$res=mysqli_query($link,$sql);
if(!$res){
    echo"Error";
}

while($row=mysqli_fetch_assoc($res)){
    echo"<tr><td><center>".$row['cname']."</center></td>";
}

?>