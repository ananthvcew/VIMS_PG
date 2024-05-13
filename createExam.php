<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
?>
<link href="assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
    <style type="text/css"> 
  	.card{
  		background-color: navy!important;
  		color:white!important;
  	}
  </style>
<div class="card">Create Exam</div>
<form id='examData'>
	<div class="row">
		<div class="col-lg-3">
			<i>Exam Name</i>
			<input type="text" name="examName" id="examName" class="form-control">
		</div>
		<div class="col-lg-3">
			<i>Exam Starting Date</i>
			<input type="date" name="esd" id="esd" class="form-control">
		</div>
		<div class="col-lg-3">
			<i>Exam End Date</i>
			<input type="date" name="eed" id="eed" class="form-control">
		</div>
		<div class="col-lg-3">
			<br>
			<button class="btn btn-success" type="button" id='saveDate'>SAVE</button>
			<button class="btn btn-danger" type="button" id='getBackup'>Clear the Database</button>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-lg-12">
		<table class="table table-bordered table-striped">
			<thead>
				<tr class="text-center bg-info">
					<th>S.No</th>
					<th>Discription</th>
					<th>Exam Starting Date</th>
					<th>Exam End Date</th>
					<th>Registration Status</th>
					<th>Exam Status</th>
					<th>Result Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$status=["0"=>"Active","1"=>"Closed"];
				$sql="select * from examination_date order by id DESC";
				$res=mysqli_query($link,$sql);
				$i=0;
				while($row=mysqli_fetch_assoc($res)){
					$i=$i+1;
					echo "<tr><td>$i</td><td>".$row['disc']."</td><td>".date("d-M-Y",strtotime($row['es_date']))."</td><td>".date("d-M-Y",strtotime($row['ee_date']))."</td><td>".$row['r_status']."</td><td>".$status[$row['status']]."</td><td>".$row['result']."</td><td class='text-center'><button class='btn btn-warning btn-sm' type='button' data-id='".$row['id']."' onclick='myEdit(this)'>Edit</button></td></tr>";
				}


				?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body bg-success text-white text-center">
        <i>Database backup and Database reset process successfully completed</i>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

function myEdit(elem){
	var id=$(elem).data('id');
	$.ajax({
		type:"POST",
		url:"ajaxCalls/editExamDate.php",
		dataType:"json",
		data:{"id":id},
		success:function(res){
			$("#exampleModalCenter").modal("show");
			$("#exampleModalCenter .modal-body").html(res.data);

		}
	})
}
function saveUpdate(){
	$.ajax({
		type:"POST",
		url:"ajaxCalls/updateExamDate.php",
		dataType:"json",
		data:$("#editExamdate").serialize(),
		success:function(res){
			$("#exampleModalCenter").modal("hide");
			$(".pageLoad").load("createExam.php");
		}
	})
}

	$(document).ready(function(){
		$("#saveDate").click(function(){
			if($("#examName").val()==""){
				$("#examName").css("border","1px solid red");
				$("#examName").focus();
				return false;
			}else{
				$("#examName").css("border","1px solid green");
			}
			if($("#esd").val()==""){
				$("#esd").css("border","1px solid red");
				$("#esd").focus();
				return false;
			}else{
				$("#esd").css("border","1px solid green");
			}
			if($("#eed").val()==""){
				$("#eed").css("border","1px solid red");
				$("#eed").focus();
				return false;
			}else{
				$("#eed").css("border","1px solid green");
			}
			$.ajax({
				type:"POST",
				url:"ajaxCalls/saveExamDate.php",
				dataType:"json",
				data:$("#examData").serialize(),
				success:function(res){
					 $(".pageLoad").load("createExam.php");
				}

			})
		})
		 $("#getBackup").click(function(){
		 		$.ajax({
		 			type:"POST",
		 			url:"ajaxCalls/getBackup.php",
		 			dataType:"json",
		 			success:function(res){
		 				if(res.status=="Done"){
		 					$("#exampleModal").modal("show");
		 					setTimeout(function(){
		 						$("#exampleModal").modal("hide");
		 					},4000);
		 				}
		 			}
		 		})
		 })
	})
</script>