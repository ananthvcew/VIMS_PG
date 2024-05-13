<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql="select * from result1  ";
print $sql;
$res=mysqli_query($link,$sql);
if(!$res){
    echo"Error to get data";
}
print"<table border=1>";
while($row=mysqli_fetch_assoc($res)){
    $regno=$row['regno'];
    // print $regno;
    // $name=$s->getstdetail1($regno,'name');
    //   $branch=$s->getstdetail1($regno,'branch');
    // $dob=$s->getstdetail1($regno,'dob');
    // $dt=$s->getstdetail1($regno,'district');
    // $examlang=$s->getstdetail1($regno,'examlang');
    // $cno1=$s->getstdetail1($regno,'cno1');
    // $cno2=$s->getstdetail1($regno,'cno2');
    // $phs=$s->getstdetail1($regno,'preperence');
    //   $com=$s->getstdetail1($regno,'community');
    //     $ref=$s->getstreference($regno,'ref');
    $refmobile=$s->getstreference($regno,'refmobile');
    // $mark1=$row['total1'];
    // $mark2=$row['total2'];
    // if($mark1>$mark2){
    //     $mark=$mark1;
    // }
    // else{
    //     $mark=$mark2;
    // }
    // if($mark<6)
    //   {
          
    //       $m1=rand(10,25);
    //       if(($m1%2)==1)
    //         $m1=$m1+1;
    //       $mark=$m1;
    //   }
    // if($phs==''){
    //     $phs='any';
    // }
    $sql1="update result1 set length='{$refmobile}' where regno='".$regno."'";
  print $sql1;
    $res1=mysqli_query($link,$sql1);
    if(!$res1){
        echo"Error to insert".$sql1;
    }
    else{
          print$sql1."<br>";
    }
    //print"<tr><td>".$regno."</td><td>".$name."</td><td>".$branch."</td><td>".$dob."</td><td>".$phs."</td><td>".$dt."</td><td>".$cno2."</td><td>".$mark1."</td><td>".$mark2."</td><td>".$mark."</td></tr>";
}

?>