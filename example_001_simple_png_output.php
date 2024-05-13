<?php
include('phpqrcode/qrlib.php');
error_reporting(E_ALL);
 // outputs image directly into browser, as PNG stream
 QRcode::png("https://13.200.56.135/vims/result.php?t=".$_GET['t']);

    
?>