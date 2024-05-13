<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql="select * from result where community=''";
$res=mysqli_query($link,$sql);
if(!$res){
    echo"Error to get data";
}
print"<table border=1>";
while($row=mysqli_fetch_assoc($res)){
    $regno=$row['regno'];
    $name=$s->getstdetail($regno,'community');
    
    $sql1="update result set community='".$name."' where regno='".$regno."'";
    $res1=mysqli_query($link,$sql1);
    if(!$res1){
        echo"Error to insert";
    }
    else{
          print$sql1."<br>";
    }
    //print$sql1."<br>";
    //print"<tr><td>".$regno."</td><td>".$name."</td><td>".$branch."</td><td>".$dob."</td><td>".$phs."</td><td>".$dt."</td><td>".$cno2."</td><td>".$mark1."</td><td>".$mark2."</td><td>".$mark."</td></tr>";
}

?>