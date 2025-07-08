<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql="select * from result";
$res=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($res)){
	echo "<iframe src='result1.php?t=".$row['id']."'></iframe>";
}



?>