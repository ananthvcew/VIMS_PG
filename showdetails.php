<?php
session_start();
?>
<?php
include('top.php');
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
?>
<div class='headmenu'>Student Data Verification for Scholarship</div>
<div class='container' >
<?php
$regno=$_SESSION['regno'];
$sql="select * from student27 where regno=".$regno;
//print $sql;
$res=mysqli_query($link,$sql);

if($row=mysqli_fetch_assoc($res)){
	$scode=$row['branch'];
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Student Name</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['name']."</div>";
	print"</div>";
		print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Parents Name</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['fathername']."</div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>+2 Register Number</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['regno']."</div>";
	print"<div class='col-lg-2'></div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>VIMS Reg.No</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['at_regno']."</div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Date of Birth</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['dob']." (YYYY-MM-DD)</div>";
	print"</div>";
    print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Community</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['community']." </div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>+2 Group</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$scode." - ".$s->getsubname($scode)."</div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Exam Language</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['examlang']."</div>";
	print"</div>";
	print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Address</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['add1'].",".$row['add2'].",".$row['city'].",".$row['district']."</div>";
	print"</div>";
		print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Phone Number</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['cno1'].",".$row['cno2']."</div>";
	print"</div>";
		print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>School Name</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$row['s_name']."</div>";
	print"</div>";
		print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>School Address</div>";
		print"<div class='col-lg-5 font-weight-bold'>".$row['place'].",".$row['school_st'].",".$row['school_tk'].",".$row['school_dt']."</div>";
	print"</div>";
	 $ref=$s->getstreference($regno,'ref');
    $refmobile=$s->getstreference($regno,'refmobile');
		print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Reference Details</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$ref."-".$refmobile."</div>";
	print"</div>";
	 $grade=$s->getgrade($regno);
		print"<div class='road row'>";
	print"<div class='col-lg-2'></div>";
	print"<div class='col-lg-3'>Grade Obtained</div>";
	print"<div class='col-lg-5 font-weight-bold'>".$grade."</div>";
	print"</div>";
	if(!$grade)
	print "<div class='col-lg-12 text-center'><br><a href='login.php' class='btn btn-primary'>Thanks for Visiting</a></div><br>";
	if($grade=='E')
		print "<div class='col-lg-12 text-center'><br><a href='login.php' class='btn btn-primary'>Thanks for Visiting, Your Scholarship Application Submitted for E grade</a></div><br>";
	else
		print "<div class='col-lg-12 text-center'><br><a href='scholarship.php' class='btn btn-primary'>Proceed with Scholarship Application</a></div><br>";
}
else{
	echo"<br><br><br><br><br><h3>Multiple Entry Found / No Entry Found  <br>Kindly send your details to below mentioned Whatsapp Number</h3> <br><br><br><br><br>";
}



?>

<?php
include('foot2.php');

?>