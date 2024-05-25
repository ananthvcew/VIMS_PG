<?php
require('conn.php');
error_reporting(0);
$s=new DBCON();
$link=$s->linkarivu(); 
$sql="select * from tmark where regno='".$_POST['regno']."' and scode='".$_POST['scode']."' and type='a'";
$res=mysqli_query($link,$sql);
if(!$res){
    echo"error to get data";
}
$tot1=0;
$tot2=0;
$tot11=0;
$tot12=0;
$ans=$_POST['ans']!=''?$_POST['ans']:'q';
$rtime=$_POST['time1'];

// $ti=time();
// $te=$ti-$_SESSION['qintime'];
// $te1=$te/60;
// $te1=$te1-$_SESSION['pqin'];
if($rtime<=0) 
  header('test4.php');
while($row=mysqli_fetch_assoc($res)){
    $remark=$row['remarks'];
    for($i=1;$i<=50;$i++){
        $qno='q'.$i;
        if($row[$qno]!='' and $row[$qno]!='q'){
          $tot1=$tot1+1;
        }
        
    }
    if($remark==3){
    	$result=["remark"=>'3'];
    }else{
        $sql1="update tmark set ".$_POST['qs']."='".$ans."' , rtime=".$rtime." where scode='".$_POST['scode']."' and type='a' and regno='".$_POST['regno']."'"; 
           $res1=mysqli_query($link,$sql1);
            if(!$res1){
            	$report= "error to store";
            }
            else{
            $report="Done";
           
            $sql2="select * from tmark where regno='".$_POST['regno']."' and scode='".$_POST['scode']."' and type='a'";
			$res2=mysqli_query($link,$sql2);
            while($row2=mysqli_fetch_assoc($res2)){
            	//$remark=$row2['remarks'];
    for($i=1;$i<=50;$i++){
        $qno='q'.$i;
        if($row2[$qno]!='' and $row2[$qno]!='q'){

          $tot11=$tot11+1;
          
           
        }

    }
            
       $report1 ="No. Of Questions Answered: ".$tot11;
       
    $result=["status"=>$report,"quesBal"=>$report1,"ans"=>$_POST['ans'],"tot"=>$tot11];
}
                
            }
        
    }
}
echo json_encode($result);



?>