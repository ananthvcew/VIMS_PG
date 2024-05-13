<?php
$rno=trim($_POST['uname']);
if(($rno%2)==0)
 header("Location:http://15.207.28.15/vims/tempexam.php");
else
 header("Location:http://13.127.40.253/vims/tempexam.php");
?>