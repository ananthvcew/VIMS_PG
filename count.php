
 <link href="assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
  <style type="text/css"> 
    .card{
        background-color: navy!important;
        color:white!important;
    }
  </style>
<div class='card'>Count</div>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr><th>S.No.</th><th>Subject</th><th>Count</th></tr>
    </thead>
    <tbody>
<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql="select * from branch";
$res=mysqli_query($link,$sql);
if(!$res){
    echo"Error to get details";
}$i=0;$toe=0;$tot=0;
while($row=mysqli_fetch_assoc($res)){
    $i=$i+1;
    $scode=$row['subcode'];
    if( $scode==''){
        $scode='VO/OT';
    }
    $sce=$s->getsubcount('English',$scode);
    $toe=$toe+$sce;
    // $sct=$s->getsubcount('Tamil',$scode);
    // $tot=$tot+$sct;
 print"<tr><td> $i</td><td>".$scode."</td><td class='text-center'>".$sce."</td></tr>";  
}
$i=$i+1;
print"<tr class='font-weight-bolder'><td><b>$i</b></td><td class='text-right font-weight-bolder'><b>Total</b></td><td class='text-center font-weight-bolder'><b>".$toe."</b></td></tr>";
$gt=$tot+$toe;
$i=$i+1;
// print"<tr class='font-weight-bolder'><td><b>$i</b></td><td  class='text-right font-weight-bolder'><b>Grand Total</b></td><td></td><td class='text-center font-weight-bolder'><b>".$gt."</b></td></tr>";


?>
</tbody>