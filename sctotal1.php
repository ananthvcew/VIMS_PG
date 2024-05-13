<?php
include('top.php');
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
?>
<div class='headmenu'>
   VIMS Scholarship Registration Report 2021
</div>
<div class="contaner">
    <div class="road row">
        <div class="col-lg-12">
            <table class='table'>
    <thead>
        <tr>
            <th colspan='3' class='text-center'>Total No.of Student Registered  : <?php
            $dt1=$_GET['cc'];
            print $s->getsctotal1($dt1);
            ?></th> 
        </tr>
        <tr>
            <th>S.No</th><th>DEPARTMENT</th><th>STUDENT COUNT</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="select * from department where ccode=$dt1 ";
        $res=mysqli_query($link,$sql);
        if(!$res){
            echo"error to get report";
        }
        $i=0;
        $tot=0;
        while($row=mysqli_fetch_assoc($res)){
            $i=$i+1;
            $dt=$row['dcode'];
            $cdt=$s->getsctotal2($dt1,$dt);
            $tot=$tot+$cdt;
            print"<tr><td>$i</td><td>".$row['branch']."</td><td>".$cdt."</td></tr>";
        }
    //     print"<t><td colspan='2'><b>Total Registration in Tamilnadu</td><td><b>".$tot."</td></tr>";
    //   $tt= $s->gettotal();
    //   $ot=$tt-$tot;
    //     print"<tr><td colspan='2'> <b>Others</td><td><b>".$ot."</td></tr></tbody>";
        ?>
   
</table>
        </div>
    </div>
</div>



