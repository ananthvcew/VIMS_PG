<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql1="select * from ques";
$res1=mysqli_query($link,$sql1);
$qans=[];
while($row1=mysqli_fetch_assoc($res1)){
   $qans[$row1['subcode'].$row1['tcode'].$row1['qset'].$row1['qno']]=$row1['cans']; 
}
$sql="select * from tmark where type='q' ";
$res=mysqli_query($link,$sql);
if(!$res){
    echo"error to get data";
}
$mark=[];
while($row=mysqli_fetch_assoc($res)){
  $tot1=0;

      for($i=1;$i<=50;$i++){
        $qno="q".$i;
        $aq="q".$i;
       $sql2="select ".$aq." from tmark where regno='".$row['regno']."' and scode='".$row['scode']."' and lang='".$row['lang']."' and type='a'  ";
     // print $sql2;
        $res2=mysqli_query($link,$sql2);
        while($row2=mysqli_fetch_assoc($res2)){
            if($qans[$row['scode'].$row['lang'].$row['set'].$row[$qno]]==$row2[$aq]){
               $tot1=$tot1+2; 
            }else{
                $tot1=$tot1+0;
            }            
        }
    }

    $sql3="update tmark set total=$tot1 where regno='".$row['regno']."' and scode='".$row['scode']."' and lang='".$row['lang']."'";
     $res3=mysqli_query($link,$sql3);
     
    $mark[$row['regno']]=[$tot1];
    
}
if($res3){
 print_r($mark);   
}


?>



