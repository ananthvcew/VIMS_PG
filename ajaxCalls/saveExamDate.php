<?php
include'../includes/config.php';
$obj=new ExamDate();
$res=$obj->addExamDate();
echo json_encode($res);
?>