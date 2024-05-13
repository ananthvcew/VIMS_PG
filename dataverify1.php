<?php
include('top.php');
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
?>
<div class='headmenu'>Student Data Verification</div>
<div class='container' >
<?php
$regno=$_POST['regno'];
$sql="select * from student where regno=".$regno;
$res=mysqli_query($link,$sql);

if($row=mysqli_fetch_assoc($res)){
	$scode=$row['branch'];
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Student Name</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['name']."</div>";
	print"<div class='col-lg-2'></div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>+2 Register Number</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['regno']."</div>";
	print"<div class='col-lg-2'></div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Date of Birth</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['dob']." (YYYY-MM-DD)</div>";
	print"<div class='col-lg-2'></div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>+2 Group</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$scode." - ".$s->getsubname($scode)."</div>";
	print"<div class='col-lg-2'></div>";
	print"</div>";
	
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Exam Language</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['examlang']."</div>";
	print"<div class='col-lg-2'></div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Exam Completion Status</div>";
	print"<div class='col-lg-5 font-weight-bold'>";$rno=$row['regno'];
	$st=$s->getexst($rno);
	if($st=='pending'){
		print "<font color='Yellow' class='btn btn-primary'>Partially Completed</font>";
	}
	elseif($st=='completed'){
		print "<font  class='btn btn-success'>Completed</font>";
	}
	else{
		print"<font class='btn btn-danger'>".$st."</font>";
	}
	
	print"</div>";
	print"<div class='col-lg-2'></div>";
	print"</div>";
	print "<div class='col-lg-12 text-center'><br><a href='dataverify.php' class='btn btn-primary'>Go Back</a></div>";
	
}
else{
	echo"<br><br><br><br><br><h3>Multiple Entry Found / No Entry Found  <br>Kindly send your details to below mentioned Whatsapp Number</h3> <br><br><br><br><br>";
}



?>
</div>

<?php
include('foot2.php');

?>