<?php
include'includes/config.php';
$obj=new Student();
if($_GET['t']=="msg"){
	$res=$obj->getStudentNameList();
}else{
	$res=$obj->getAbsentStudentNameList();
}
?>
<table class="table table-bordered table-striped" id='studList1'>
	<thead>
		<tr>
			<th>S.No</th>
			<th>AT Regno</th>
			<th>Register No</th>
			<th>Student Name</th>
			<th>WhatsApp No</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i=0;
		foreach ($res as $key ) {
			$i=$i+1;
			echo "<tr><td>".$i."</td><td>".$key['at_regno']."</td><td>".$key['regno']."</td><td>".$key['name']."</td><td>".$key['cno2']."</td></tr>";
		}

		?>
	</tbody>
	
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$("#studList1").DataTable({
		      "responsive": true, "lengthChange": false, "autoWidth": false,
		      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		    }).buttons().container().appendTo('#studList1_wrapper .col-md-6:eq(0)');
	})
</script>