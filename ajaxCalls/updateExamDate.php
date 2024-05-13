<?php
include'../includes/config.php';
$obj=new ExamDate();
$res=$obj->updateExamDate();
echo json_encode($res);
?>