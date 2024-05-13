<?php
include('top.php');
?>

<div class='card'>Reference Count</div>
<table class='table table-bordered'>
    <thead>
        <tr><th>S.No.</th><th>Reg.No</th><th>Ref.Name</th><th>Ref.Mobile</th></tr>
    </thead>
    <tbody>
<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$rname=trim($_POST['rname']);
$rmob=trim($_POST['rmob']);
$sql="select * from reference where ref like '%".$rname."%' or refmobile like '%".$rmob."%' group by regno";
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
    $tot=$tot +1;
    echo"<tr><td>$i</td><td>".$row['regno']." </td><td>".$row['ref']."</td><td>".$row['refmobile']."</td></tr>";
}
?>
</tbody>
<tfoot><tr><th colspan='2' class='text-right'>Total</th><th><?=$tot?></th></tr></tfoot>