<?php
include'../includes/config.php';
$obj=new Tmark();
$res=$obj->updateTimeTmark();
echo json_encode($res);
?>