<?php
//include('top.php');
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
<div class="card">Date Wise Count</div>
<table id="example1" class="table table-bordered table-striped">
	<thead><tr><th>S.No</th><th>Date</th><th>Count</th></tr></thead>
	<tbody>
		<?php
		$sql="select distinct dor from student order by dor";
		$res=mysqli_query($link,$sql);
		if(!$res){
			echo"Error to print";
		}$i=0;$tot=0;
		while($row=mysqli_fetch_assoc($res)){
			$date=$row['dor'];
			$i=$i+1;
			$date1=date('d-m-Y',strtotime($date));
			$dc=$s->getdatec($date);
			$tot=$tot+$dc;
			print"<tr><td>$i</td><td>$date1</td><td>$dc</td></tr>";	
		}
		$i=$i+1;
		print"<tr><th>$i</th><th>Total</th><th>$tot</th>";
		?>
	</tbody>
	
</table>