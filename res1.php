<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
include('top.php');
?>
<div class='headmenu'>Online Arivuthiran Exam 2020 - Result</div>
<?php
$regno=$_POST['regno'];

$sql="select * from result where regno='".$regno."' or cno1='".$regno."' or cno2='".$regno."'";
$res=mysqli_query($link,$sql);
if(!$res){
	echo"Error to get data";
}
if($row=mysqli_fetch_assoc($res)){
	$regno=$row['regno'];
	$name=$row['name'];
	$branch=$row['branch'];
	if($branch=='OT' or $branch=='VO'){
		$branch='VO/OT';
	}
	$examlang=$row['examlang'];
	$dob=$row['dob'];
	$mark1=$row['mark'];
	$mark=$mark1*2;
	if($mark<=50){
		$grade='E';
	}
	elseif($mark>50 || $mark<=75){
		$grade='D';
	}
	elseif($mark>75 || $mark<=90){
		$grade='C';
	}
	elseif($mark>90 || $mark<=94){
		$grade='B';
	}
	elseif($mark>94 || $mark<=100){
		$grade='A';
	}
	print"<div class='container'>";
		print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-10'>Register Number :<b> ". $regno ." </b></div></div>";
       print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-10'>Student Name&nbsp;&nbsp;&nbsp;&nbsp; : <b> ". $name ." </b> </div></div>";
      print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-10'>HSC Group &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b>".$s->getsubname($branch)." </b></div><div class='col-lg-2'></div></div>";
     print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-10'>Exam Language &nbsp;: <b> ".$examlang. "</b></div><div class='col-lg-2'></div></div>";
     $date=date('d-M-Y',strtotime($dob));
   print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-10'>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<b> " .$date. "</b> </div><div class='col-lg-2'></div></div>";
	print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-10 font-weight-bolder'>Marks &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  <font color='red' weight='bolder' class='btn btn-Primary font-weight-bolder'>$mark</font></div><div class='col-lg-2'></div></div>";
	
//	print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-3'>Register Number</div><div class='col-lg-5 font-weight-bolder'>$regno</div><div class='col-lg-2'></div></div>";
//	print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-3'>Student Name</div><div class='col-lg-5 font-weight-bolder'>$name</div><div class='col-lg-2'></div></div>";
//	print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-3'>HSC Group</div><div class='col-lg-5 font-weight-bolder'>".$s->getsubname($branch)."</div><div class='col-lg-2'></div></div>";
//	print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-3'>Exam Language</div><div class='col-lg-5 font-weight-bolder'>$examlang</div><div class='col-lg-2'></div></div>";
//	$date=date('d-M-Y',strtotime($dob));
//	print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-3'>Date of Birth</div><div class='col-lg-5 font-weight-bolder'>$date</div><div class='col-lg-2'></div></div>";
//	print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-3 font-weight-bolder'>Marks</div><div class='col-lg-5'><font color='red' weight='bolder' class='btn btn-Primary font-weight-bolder'>$mark</font></div><div class='col-lg-2'></div></div>";
	//print"<div class='road row'><div class='col-lg-2'></div><div class='col-lg-3'>Reference Detail</div><div class='col-lg-5 font-weight-bolder'>".$row['ref']."</div><div class='col-lg-2'></div></div>";
	print "<div class='road row'><div class='col-lg-12'><h5>Cutoff Marks & Fees Concession</h5></div></div>";
	print "<div class='road row'><div class='col-lg-12 text-center'><table width=60% class='table table-bordered text-center'><thead class='bor'><tr><th rowspan='2' class='align-middle'>Course</th><th colspan='5'>Cutoff Marks  & Fee Concession details</th></tr>";
	print "<tr><th>1-50</th><th>51-75</th><th>76-90</th><th>91-94</th><th>95-100</th></thead><tbody>";
	print "<tr><td>Engineering</td><td>Rs.10000<sup>*</sup></td><td>Rs.12000<sup>*</sup></td><td>Rs.14000<sup> * </sup></td><td>Rs.16000<sup> * </sup></td><td>Full Tuition Fees Free(for 4 years)</td></tr>";
		print "<tr><td>Arts and Science</td><td>Rs.4000/-<sup> * </sup></td><td>Rs.5000/-<sup> * </sup></td><td>Rs.6000/-<sup> * </sup></td><td>Rs.7000/-<sup> * </sup></td><td>Full Tuition Fees Free(for 3 years)</td></tr>";
	print "<tr><td>Paramedical</td><td colspan=5> Diploma in Optometry - FREE Hostel for all eligible Candidates </td></tbody></table></div></div>";
	print "<div class='road row'><div class='col-lg-12 text-center'> * - One time Fee Consession in First Term <br> <a href='res.php' class='btn btn-primary'>Go Back</a></div></div>";
}
print"<br>";
include('foot.html');



?>