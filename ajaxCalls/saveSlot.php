<?php
include'../includes/config.php';
$obj=new Student();
$res=$obj->saveSlot();
echo json_encode($res);
?>