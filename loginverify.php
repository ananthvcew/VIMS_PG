<?php
include('top.php');
?>

<div class='card'>Registration Count</div>
<table class='table table-bordered'>
    <thead>
        <tr><th>S.No.</th><th>Reg.No</th><th>Name</th><th>AT_Reg.Number</th><th>Reference</th></tr>
    </thead>
    <tbody>
<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$rname=trim($_POST['rname']);
$rmob=trim($_POST['rmob']);
$sql="select * from student where regno=$rname or cno1 like '%".$rmob."%' or  cno2 like '%".$rmob."%' ";
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
    $tot=$tot +1;
    echo"<tr><td>$i</td><td>".$row['regno']." </td><td>".$row['name']."</td><td>".$row['at_regno']."</td>";
    $sql1="select * from reference  where regno='".$rname."'";
//print $sql1;
$res1=mysqli_query($link,$sql1);
if($row1=mysqli_fetch_assoc($res1)){
     echo"<td>".$row1['ref']."</td>";
}
echo "</tr>";
}
?>
</tbody>
<tfoot><tr><th colspan='2' class='text-right'>Total</th><th><?=$tot?></th></tr></tfoot>