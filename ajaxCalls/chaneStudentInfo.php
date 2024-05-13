<?php
include'../includes/config.php';
$obj=new Student();
$res=$obj->updateStudentData();
echo json_encode($res);
?>