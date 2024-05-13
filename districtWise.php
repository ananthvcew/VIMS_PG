<?php
//include('top.php');
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
?>
 <link href="assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      
  <style type="text/css"> 
  	.card{
  		background-color: navy!important;
  		color:white!important;
  	}
  </style>
<div class="card">District Wise Count</div>
<table id="example1" class="table table-bordered table-striped">
	<thead><tr><th>S.No</th><th>Date</th><th>Count</th></tr></thead>
	<tbody>
		<?php
		$sql="select distinct district from student order by district ASC";
		$res=mysqli_query($link,$sql);
		if(!$res){
			echo"Error to print";
		}$i=0;$tot=0;
		while($row=mysqli_fetch_assoc($res)){
			$district=$row['district'];
			if($district!=''){
			$i=$i+1;
			//$date1=date('d-m-Y',strtotime($date));
			$dc=$s->getdistrictc($district);
			$tot=$tot+$dc;
			
			echo "<tr><td>$i</td><td>$district</td><td>$dc</td></tr>";
			}
		}
		echo "<tr><th><th>Total</th><th>$tot</th></tr>";
		?>
	</tbody>
	
</table>