<?php
require("conn.php");
$s=new DBCON();
$link=$s->linkarivu();
 $sql    = "select * from student1" ;
 //print $sql;
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo "DB Error, could not query the database\n";
     echo 'MySQL Error: ' . mysql_error();
    }
while($row = mysqli_fetch_assoc($result)) 
 { 
 $sql1="Update student set name='".$row['name']."'  where regno='".$row['regno']."'";
 $result1 = mysqli_query($link, $sql1);
 print$sql1;
 }
 ?>