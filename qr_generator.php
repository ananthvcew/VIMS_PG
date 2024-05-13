<?php
require_once("phpqrcode/phpqrcode-master/qrlib.php");

QRcode::png($_GET['code']);
?>