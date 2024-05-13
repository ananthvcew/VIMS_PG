<?php
include'../includes/config.php';
$obj=new Tmark();
$res=$obj->updateTmark();
echo json_encode($res);
?>