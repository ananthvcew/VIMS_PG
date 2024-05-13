<link href="assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
  <style type="text/css"> 
    .card{
        background-color: navy!important;
        color:white!important;
    }
    label{
      /*padding-left: 25%;
      padding-top: 20%;*/
      font-weight: bolder;
      text-align: center;
      color:brown;
      font-size: 15pt;
    }
  </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class='card'>Vivekanandha Merit Scholarship Entrance Exam (Online)-<?=date('Y')?></div>


<?php
die();
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sqlTmark="select * from tmark where type='q'";
$resTmark=mysqli_query($link,$sqlTmark);
if(!$resTmark){
  echo"Error to get tmark Data";
}

while($rowTmark=mysqli_fetch_assoc($resTmark)){
  $tot=0;
  for($l=1;$l<=50;$l++){
    $qusNo="q".$l;
    $tot=$tot+$s->getResult($rowTmark['regno'],$rowTmark['scode'],$rowTmark['set'],$rowTmark['lang'],$qusNo,$rowTmark[$qusNo]);
  }
  $updateSql="update tmark set total='".($tot*2)."' where regno='".$rowTmark['regno']."'";
  $resUp=mysqli_query($link,$updateSql);
  if(!$resUp){
    echo "error to update Result";
  }
}

$sqlDelete="delete from result";
    $result=mysqli_query($link,$sqlDelete);
    if($result){
$sql="select * from tmark where `type`='a'  ";
//print $sql;
$res=mysqli_query($link,$sql);
if(!$res){
    echo"Error to get data";
}
$i=0;
while($row=mysqli_fetch_assoc($res)){
    $regno=$row['regno'];
  // print $regno;
    $name=$s->getstdetail2($regno,'name');
      $branch=$s->getstdetail2($regno,'branch');
    $dob=$s->getstdetail2($regno,'dob');
    $dt=$s->getstdetail2($regno,'district');
    $examlang=$s->getstdetail2($regno,'examlang');
    $cno1=$s->getstdetail2($regno,'cno1');
    $cno2=$s->getstdetail2($regno,'cno2');
    $phs=$s->getstdetail2($regno,'preperence');
      $com=$s->getstdetail2($regno,'community');
        $ref=$s->getstreference($regno,'ref');
    $refmobile=$s->getstreference($regno,'refmobile');
    $mark=($row['total']);      
    if($phs==''){
        $phs='any';
    }
    if($regno>0){
    $sql1="INSERT INTO `result`(`regno`, `name`, `branch`, `examlang`, `preperence`, `dob`, `district`, `cno1`, `cno2`, `mark`,`community`,`ref`,`length`,`grade`,`server`) VALUES ('{$regno}','{$name}','{$branch}','{$examlang}','{$phs}','{$dob}','{$dt}','{$cno1}','{$cno2}','{$mark}','{$com}','{$ref}','{$refmobile}','-','1')";
    $res1=mysqli_query($link,$sql1);
    if(!$res1){
        echo"Error to insert".$sql1;
    }
    else{
      $i=$i+1;
    }
  }
  }
echo "<div class='row'><div class='col-lg-12 text-center mt-2'><label>".$i." No.of Student Result Updated</label></div></div>";
  
    
}


?>
