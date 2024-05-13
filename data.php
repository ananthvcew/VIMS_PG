<?php
header('Content-Type: application/json');
require('conn.php');
$s=new DBCON();
$link=$s->linkquiz();
 $sql    = "select regno,mark from  tmark";
 $result = mysqli_query($link, $sql);  
if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
	$data=array();
while ($row= mysqli_fetch_assoc($result)) 
 { $data[] =$row;


   }
   print json_encode($data);
   ?>