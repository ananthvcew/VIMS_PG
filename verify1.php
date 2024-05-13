<?php
session_start();
include('top.php');
$regno=$_SESSION['regno'];
print"<div class='card'>Contact Number Verification</div>";
    print"<form action='verify.php' name='f1' method='post'><div class='container'><div class='road row'><div class='col-lg-4'>Contact Number / தொடர்பு எண்</div><div class='col-lg-4'>"; 
    print"<input type='hidden' name='regno' value='".$regno."'><input type='text' class='form-control' id='cno1' name='cno1' minlength='10' maxlength='10' onkeyup=chkcno1() required></div><div class='col-lg-4'><input type='submit' name='save' class='btn btn-primary' value='Verify'></div></div></div></form>";
    ?>