<?php
include('top.php');
?>

<div class='card'>Count</div>
<table class='table table-bordered'>
    <thead>
        <tr><th>S.No.</th><th>College</th><th>Count</th></tr>
    </thead>
    <tbody>
<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql="select * from college ";
$res=mysqli_query($link,$sql);
if(!$res)
{
    echo"Error to get college details";
}
$i=0;
$tot=0;

while($row=mysqli_fetch_assoc($res)){
    $i=$i+1;
    $count=$s->getCollegeWiseCount($row['short']);
    $tot=$count+$tot;
    echo"<tr><td>$i</td><td>".$row['cname']." (".$row['short'].")</td><td>".$count."</td></tr>";
}
?>
</tbody>
<tfoot><tr><th colspan='2' class='text-right'>Total</th><th><?=$tot?></th></tr></tfoot>