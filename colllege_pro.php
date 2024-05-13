<?php
$college='';
$pro='';
$collegeCount=0;
$proCount=0;
$collegeCompletedCount=0;
$proCompletedCount=0;
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$direct=$s->getDirectReferenceCount();
$i=0;
$sql="select * from college";
$res=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($res)){
	
	if($row['code']<'37'){
	$i=$i+1;
	$collegeCount=$collegeCount+$s->getCollegeWiseCount($row['short']);
	$collegeCompletedCount=$collegeCompletedCount+$s->getCollegeWiseCompletedCount($row['short']);
	$college .="<tr><td class='text-center'>$i</td><td>".$row['cname']." ( ".$row['short']." )</td><td class='text-center'><b>".$s->getCollegeWiseCount($row['short'])."</b></td><td class='text-center'><b>".$s->getCollegeWiseCompletedCount($row['short'])."</b></td></tr>";
	}else{
		if($row['code']==37){
			$i=0;
		}
		$i=$i+1;
		$proCount=$proCount+$s->getCollegeWiseCount($row['cname']." ".$row['short']);
		$proCompletedCount=$proCompletedCount+$s->getCollegeWiseCompletedCount($row['cname']." ".$row['short']);
		$pro .="<tr><td class='text-center'>$i</td><td>".$row['cname']." ".$row['short']."</td><td class='text-center'><b>".$s->getCollegeWiseCount($row['cname']." ".$row['short'])."</b></td><td class='text-center'><b>".$s->getCollegeWiseCompletedCount($row['cname']." ".$row['short'])."</b></td></tr>";
	}

}
$college .="<tr><th colspan=2 style='align-text:right;'>Total</th><th>".$collegeCount."</th><th>".$collegeCompletedCount."</th><tr>";
$pro .="<tr><th colspan=2 style='align-text:right;'>Total</th><th>".$proCount."</th><th>".$proCompletedCount."</th><tr>";

$direct1=$direct-$collegeCount-$proCount;

?>
<div class="row">
	<div class="col-lg-12">
		<table class="table table-bordered table-striped" style="width: 50%!important; margin: auto!important;">
			<thead>
				<tr class="text-center" style="background-color: orange;color: white;">
					<th>S.No</th>
					<th>Reference</th>
					<th>Count</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1.</td>
					<td>College</td>
					<td><b><?=$collegeCount?></b></td>
				</tr>
				<tr>
					<td>2.</td>
					<td>PRO</td>
					<td><b><?=$proCount?></b></td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Direct</td>
					<td><b><?=$direct1?></b></td>
				</tr>
			</tbody>
			<tfoot>
				<tr class="text-center" style="background-color: orange;color: white;">
					<th colspan="2">Total Count</th><th><?=$collegeCount+$proCount+$direct1?></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color: navy!important;color: white!important;">
        <b>Referred by College</b> 
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table class="table table-bordered table-striped">
        	<thead class="text-center">
        		<tr>
        			<th>S.No</th>
        			<th>College</th>
        			<th>Count</th>
					<th>Completed</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php
        		echo $college;
        		?>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: navy!important;color: white!important;">
        <b>Referred by PRO</b>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table class="table table-bordered table-striped">
        	<thead class="text-center">
        		<tr>
        			<th>S.No</th>
        			<th>PRO</th>
        			<th>Count</th>
        			<th>Completed</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php
        		echo $pro;
        		?>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>
	</div>
</div>