<?php
include'includes/config.php';
error_reporting(E_ALL);
$obj=new Student();
//$res=$obj->studentNamelistFromDataList();
$res1=$obj->getSlNoOpenSlot();
 $res2=$obj->getSlot();
// if($_GET){
// 	echo"<input type='hidden' id='page' name='page' value='".$_GET['page']."'>";
// }else{
// 	echo"<input type='hidden' id='page' name='page' value='0'>";
// }

?>
<div class="row">
	<div class="col-lg-12">
		<button class="btn btn-primary ssal" id='stud_all'>Student Allotment</button>
		<button class="btn btn-primary ssal" id='slw'>Student List (Slot Wise) </button>
		<button class="btn btn-primary ssal" id='abli'>Absentice List Slot Wise </button>
	</div>
</div>
<div class="row stud_div" id="stud_all_div">
	<div class="col-lg-12" >
		<h5>Student Allotment</h5>

		<table class="table table-bordered table-striped">
			<tr class="text-center"><th>Particular</th><th>Numbers</th></tr>
			<tr><td>Open Slot Starting Id</td><td class="text-center"><b><?=$res1['min(id)']?></td></tr>
			<tr><td>Open Slot Last Id</td><td class="text-center"><b><?=$res1['max(id)']?></td></tr>
		</table>
		<form id="slot">
			<div class="row">
				<div class="col-lg-3">
					<i>Slot Date</i>
					<input type="date" id="date" name="date" class="form-control">
				</div>
				<div class="col-lg-3">
					<i>Slot Time</i>
					<input type="time" id="time" name="time" class="form-control">
				</div>
				<div class="col-lg-2">
					<i>Slot Starting Id </i>
					<input type="number" id="sno" name="sno" class="form-control">
				</div>
				<div class="col-lg-2">
					<i>Slot Ending Id </i>
					<input type="number" id="eno" name="eno" class="form-control">
				</div>
				<div class="col-lg-2 mt-4">
					<button type="button" class="btn btn-primary" id="save">Save</button>
				</div>
			</div>
			
		</form>

	</div>
</div>
<div class="row stud_div" id="slw_div">
	<div class="col-lg-12" >
		<h5>Student List (Slot Wise)</h5>
		<div class="row">
			<div class="col-lg-3">
				<i>Slot</i>
				<select name="slotList" id="slotList" class="form-control">
					<option>All</option>
					<?php
					foreach($res2 as $row){
						echo"<option>".$row['slot']."</option>";
					}
					?>
				</select>
		</div>
		<div class="col-lg-3 mt-4">
			<button class="btn btn-primary" id='search' type="button">Search</button>
		</div>

	</div>
	<div class="row mt-4">
		<div class="col-lg-12" id="slotStudentNameList">
		</div>
	</div>
</div>
</div>
<div class="row stud_div" id="abli_div">
	<div class="col-lg-12" >
		<h5>Absentice List Slot Wise</h5>
			<div class="row">
			<div class="col-lg-3">
				<i>Slot</i>
				<select name="slotABList" id="slotABList" class="form-control">
					<option>All</option>
					<?php
					foreach($res2 as $row){
						echo"<option>".$row['slot']."</option>";
					}
					?>
				</select>
		</div>
		<div class="col-lg-3 mt-4">
			<button class="btn btn-primary" id='abSearch' type="button">Search</button>
		</div>

	</div>
	<div class="row mt-4">
		<div class="col-lg-12" id="slotAbStudentNameList">
		</div>
	</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
			$(".stud_div").hide();
			$(".ssal").removeClass("Active");
			$("#stud_all").addClass("Active");
			$("#stud_all_div").show();
		$(".ssal").click(function(){
			var id=this.id;
			$(".ssal").removeClass("Active");
			$("#"+id).addClass("Active");
			$(".stud_div").hide();
			$("#"+id+"_div").show();		
		})
		$("#save").click(function(){
			$.ajax({
				type:"POST",
				url:"ajaxCalls/saveSlot.php",
				dataType:"json",
				data:$("#slot").serialize(),
				success:function(res){
					if(res.status=="Done"){
						var url="slotAllotment.php";
						$(".pageLoad").load(url);
					}
				}
			})
		 })
		$("#search").click(function(){
			var slot=$("#slotList").val();
			var url="selectStudnetList.php?t=msg&slot="+slot;
			$("#slotStudentNameList").load(url);

		})
		$("#abSearch").click(function(){
			var slot=$("#slotABList").val();
			var url="selectStudnetList1.php?t=AB&slot="+slot;
			$("#slotAbStudentNameList").load(url);

		})
	})
</script>