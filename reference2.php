<?php
include('top.php');
?>

<div class='card'>Reference Count</div>
<table class='table table-bordered'>
    <thead>
        <tr><th>S.No.</th><th>Reg.No</th><th>Student Name</th><th>Branch</th><th>Phone Number</th><th>whatsapp Number</th><th>Native</th><th>District</th><th>Ref.Name</th><th>Ref.Mobile</th><th>Exam Status</th></tr>
    </thead>
    <tbody>
<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$rname=trim($_POST['rname']);
$rmob=trim($_POST['rmob']);
$sql="select * from reference where ref like '%".$rname."%' or refmobile like '%".$rmob."%' group by regno";
//print $sql;
$res=mysqli_query($link,$sql);
if(!$res)
{
    echo"Error to get college details";
}
$i=0;
$tot=0;

while($row=mysqli_fetch_assoc($res)){
    $i=$i+1;
   // $count=$s->getCollegeWiseCount($row['short']);
   
    $st=$s->getexst($row['regno']);
    
         $tot=$tot +1;
    echo"<tr><td>$i</td><td>".$row['regno']." </td><td>".$s->getstudentInfo($row['regno'],'name')."</td><td>".$s->getstudentInfo($row['regno'],'branch')."</td><td>".$s->getstudentInfo($row['regno'],'cno1')."</td><td>".$s->getstudentInfo($row['regno'],'cno2')."</td><td>".$s->getstudentInfo($row['regno'],'add1')."</td><td>".$s->getstudentInfo($row['regno'],'district')."</td><td>".$row['ref']."</td><td>".$row['refmobile']."</td><td>";
    
	if($st=='completed'){
		print "<font  class='btn btn-success'>Completed</font>";
	}elseif($st=='pending'){
	    print "<font  class='btn btn-Primary'>Partially Completed</font>";
	}
	else{
		print"<font class='btn btn-danger'>".$st."</font>";
	}
    echo"</td></tr>";
    
}
?>
</tbody>
<tfoot><tr><th colspan='2' class='text-right'>Total</th><th><?=$tot?></th></tr></tfoot>