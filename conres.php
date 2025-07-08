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
$sqlTmark="select * from student where regno in (select regno from tmark group by regno) ";
$resTmark=mysqli_query($link,$sqlTmark);
if(!$resTmark){
  echo"Error to get tmark Data";
}$j=0;
while($rowTmark=mysqli_fetch_assoc($resTmark)){

  $sql1="select * from tmark where regno='".$rowTmark['regno']."'";
  $resTmarkR=mysqli_query($link,$sql1);
  if(!$resTmarkR){
    echo"Error to get tmark Data";
  }
  $resRow=[];
  while($resRow1=mysqli_fetch_assoc($resTmarkR)){
    if($resRow1['type']=="q"){
      $resRow[0]=$resRow1;
    }else{
      $resRow[1]=$resRow1;
    }
  }
  $tot=0;
  for($i=1;$i<=50;$i++){
    $qno="q".$i;
   $sql2="select * from ques where subcode='".$resRow[0]['scode']."' and tcode='".$resRow[0]['lang']."' and qset='".$resRow[0]['set']."' and qno='".$resRow[0][$qno]."'";
   $res1=mysqli_query($link,$sql2);
   $ans=mysqli_fetch_assoc($res1);
    if($ans['cans']==$resRow[1][$qno]){
      $tot +=1;
    }else{
      $tot +=0;
    }
  }
  $updateSql="update tmark set total='".($tot*2)."' where regno='".$resRow[1]['regno']."'";
  $resUp=mysqli_query($link,$updateSql);
  if(!$resUp){
    echo "error to update Result";
  }
  else{
    $sqlDelete="delete from result where regno='".$resRow[1]['regno']."'";
    $result=mysqli_query($link,$sqlDelete);
    if($result){
      $regno=$resRow[1]['regno'];
      $name=$rowTmark['name'];
      $branch=$rowTmark['branch'];
      $dob=$rowTmark['dob'];
      $dt=$rowTmark['district'];
      $examlang=$rowTmark['examlang'];
      $cno1=$rowTmark['cno1'];
      $cno2=$rowTmark['cno2'];
      $phs=$rowTmark['preperence'];
      $com=$rowTmark['community'];
      $ref=$s->getstreference($regno,'ref');
      $refmobile=$s->getstreference($regno,'refmobile');
      $mark=$tot*2;      
      if($phs==''){
        $phs='any';
      }
      if($regno>0 && $dob!="0"){
        $sql3="INSERT INTO `result`(`regno`, `name`, `branch`, `examlang`, `preperence`, `dob`, `district`, `cno1`, `cno2`, `mark`,`community`,`ref`,`length`,`grade`,`server`) VALUES ('{$regno}','{$name}','{$branch}','{$examlang}','{$phs}','{$dob}','{$dt}','{$cno1}','{$cno2}','{$mark}','{$com}','{$ref}','{$refmobile}','-','1')";
        $res1=mysqli_query($link,$sql3);
        if(!$res1){
          echo"Error to insert".$sql3;
        }
        else{
          $j=$j+1;
        }
      }
    }
  }
}


echo "<div class='row'><div class='col-lg-12 text-center mt-2'><label>".$j." No.of Student Result Updated</label></div></div>";
  
    


?>
