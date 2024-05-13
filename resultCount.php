 <link href="assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
  <style type="text/css"> 
    .card{
        background-color: navy!important;
        color:white!important;
    }
  </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class='card'>Vivekanandha Merit Scholarship Entrance Exam (Online)-<?=date('Y')?></div>
<table class='table table-bordered'>
    <thead>
        <tr><th rowspan=2>S.No.</th><th rowspan=2>Group (Question Paper Category)</th><th rowspan=2>No.of Student Written Exam</th><th rowspan=2>No.of Student taken in Topper List ( 60 and Above) </th><th colspan='4'>Course Preference Given by Topper Students</th></tr>
        <tr>
            <th>Engineering</th>
            <th>Arts</th>
            <th>Any</th>
            <th>Paramedical</th>
        </tr>
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
}$i=0;$toe=0;$tot=0;$tot1=0;$tot2=0;$tot3=0;$tot4=0;
while($row=mysqli_fetch_assoc($res)){
    $i=$i+1;
    $scode=$row['subcode'];
    if( $scode==''){
        $scode='VO/OT';
    }
    
 print"<tr><td> $i</td><td>".$scode." - ".$row['subname']."</td><td class='text-center'>".$s->countoftopper1($scode,0,0)."</td><td class='text-center'>".$s->countoftopper1($scode,1,0)."</td><td class='text-center'>".$s->countoftopper($scode,1,'engg')."</td><td class='text-center'>".$s->countoftopper($scode,1,'Arts')."</td><td class='text-center'>".$s->countoftopper($scode,1,'Any')."</td><td class='text-center'>".$s->countoftopper($scode,1,'paramedi')."</td></tr>"; 
 $sce=$s->countoftopper1($scode,0,0);
    $toe=$toe+$sce;
    $sct=$s->countoftopper1($scode,1,0);
    $tot=$tot+$sct; 
    $tot1=$tot1+$s->countoftopper($scode,1,'engg');
    $tot2=$tot2+$s->countoftopper($scode,1,'Arts');
    $tot3=$tot3+$s->countoftopper($scode,1,'Any');
    $tot4=$tot4+$s->countoftopper($scode,1,'paramedi');
}
print"<tr class='font-weight-bolder'><td colspan='2' class='text-right'>Total</td><td class='text-center'>".$toe."</td><td class='text-center'>".$tot."</td><td class='text-center'>".$tot1."</td><td class='text-center'>".$tot2."</td><td class='text-center'>".$tot3."</td><td class='text-center'>".$tot4."</td></tr>";



?>
</tbody>