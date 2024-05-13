<?php
include('top.php');
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
?>
<div class='headmenu'>
    Registration Report - Vivekanandha Merit Scholarship Exam - 2021
</div>
<div class="contaner">
    <div class="road row">
        <div class="col-lg-12">
            <table class='table'>
    <thead>
        <tr>
            <th colspan='3' class='text-center'>Total No.of Student Registered  : <?php
            print $s->gettotal();
            ?></th> 
        </tr>
        <tr>
            <th>S.No</th><th>DISTRICT</th><th>STUDENT COUNT</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="select * from tndt ";
        $res=mysqli_query($link,$sql);
        if(!$res){
            echo"error to get report";
        }
        $i=0;
        $tot=0;
        while($row=mysqli_fetch_assoc($res)){
            $i=$i+1;
            $dt=$row['dt'];
            $cdt=$s->gettotal1($dt);
            $tot=$tot+$cdt;
            print"<tr><td>$i</td><td>$dt</td><td>".$cdt."</td></tr>";
        }
        print"<t><td colspan='2'><b>Total Registration in Tamilnadu</td><td><b>".$tot."</td></tr>";
       $tt= $s->gettotal();
       $ot=$tt-$tot;
        print"<tr><td colspan='2'> <b>Others</td><td><b>".$ot."</td></tr></tbody>";
        ?>
   
</table>
        </div>
    </div>
</div>



