<?php
include'../includes/config.php';
$obj=new ExamDate();
$res=$obj->getExamDetails();
$out="";
$r_status=array("Active","Closed");
$result=array("Open","Closed");
$status=["0"=>"Active","1"=>"Closed"];
$out .="<div class='row'><div class='col-lg-12'><h5>Edit Exam Information</h5></div></div>";
$out .="<form id='editExamdate'>";
$out .="<div class='row'>
		<div class='col-lg-12'>
			<i>Exam Name</i>
			<input type='hidden' name='id' id='id' value='".$res['id']."' class='form-control'>
			<input type='text' name='editName' id='editName' value='".$res['disc']."' class='form-control'>
		</div>
		</div>
		<div class='row'>
		<div class='col-lg-12'>
			<i>Exam Starting Date</i>
			<input type='date' name='editesd' id='editesd' value='".$res['es_date']."' class='form-control'>
		</div>
		</div>
		<div class='row'>
		<div class='col-lg-12'>
			<i>Exam End Date</i>
			<input type='date' name='editeed' id='editeed' value='".$res['ee_date']."' class='form-control'>
		</div>
		</div>
		<div class='row'>
		<div class='col-lg-12'>
			<i>Registration Status</i>
			<select name='r_status' id='r_status' class='form-control'>";
			foreach($r_status as $key => $value){
				if($res['r_status']==$value){
					$out .="<option selected>$value</option>";
				}else{
					$out .="<option>$value</option>";
				}
			}

		$out .="</select></div></div><div class='row'>
		<div class='col-lg-12'>
			<i>Exam Status</i>
			<select name='e_status' id='e_status' class='form-control'>";
			foreach($status as $key => $value){
				if($res['status']==$key){
					$out .="<option value='".$key."' selected>$value</option>";
				}else{
					$out .="<option value='".$key."'>$value</option>";
				}
			}

		$out .="</select></div></div><div class='row'>
		<div class='col-lg-12'>
			<i>Result Status</i>
			<select name='rs_status' id='rs_status' class='form-control'>";
			foreach($result as $key => $value){
				if($res['result']==$value){
					$out .="<option selected>$value</option>";
				}else{
					$out .="<option>$value</option>";
				}
			}

		$out .="</select></div></div></form>
		<div class='row'>
		<div class='col-lg-12 text-center'><br>
			<button class='btn btn-success' type='button' onclick='saveUpdate()'>Update</button>
		</div>
		</div>";

$output=["data"=>$out];
echo json_encode ($output);
?>
