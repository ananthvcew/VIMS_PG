<?php
include'includes/config.php';
$obj=new Student();
$obj1=new Tmark();
$res=$obj->regCount();
$res1=$obj1->getExamCount();
$res2=$obj1->getAbsentCount();
?>

<table class='table table-bordered' style='width:80%!important; margin:auto;'>
	<thead class='text-center bg-info'>
		<tr>
			<th>S.No</th>
			<th>Particular</th>
			<th>Count</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1.</td>
			<td>Number of Candidates Registered</td>
			<td class='text-end'><b><?=$res['count(regno)']?></b></td>
		</tr>
		<?php
$i=1;
			foreach ($res1 as $value) {
            $i=$i+1;
					if($value['remarks']==0){
						echo "<tr><td>$i</td><td>Number of Candidates Writing the Exam</td><td class='text-end'><b>".$value['count(regno)']."</b></td></tr>";
					}else{
						echo "<tr><td>$i</td><td>Number of Candidates Completed the Exam</td><td class='text-end'><b>".$value['count(regno)']."</b></td></tr>";

					}
			}
		?>
	</tbody>
</table><br><br>
        
        <!-- <table class='table table-bordered' style='width:80%!important; margin:auto;'>
	<thead class='text-center bg-info'>
        <tr><th Colspan="3">Phase - II</th></tr>
		<tr>
			<th>S.No</th>
			<th>Particular</th>
			<th>Count</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1.</td>
			<td>Number of Candidates Registered <br>(Phase - I Absent Students + Phase - II Registered Student) </td>
			<td class='text-end'><b><?=(($res['count(regno)']-3235)+1128) ?></b></td>
		</tr>
		<?php
$i=1;
			foreach ($res1 as $value) {
            $i=$i+1;
					if($value['remarks']==0){
						echo "<tr><td>$i</td><td>Number of Candidates Writing the Exam</td><td class='text-end'><b>".$value['count(regno)']."</b></td></tr>";
					}else{
						echo "<tr><td>$i</td><td>Number of Candidates Completed the Exam</td><td class='text-end'><b>".($value['count(regno)']-2107)."</b></td></tr>";

					}
			}
		?>
	</tbody>
</table> -->
        