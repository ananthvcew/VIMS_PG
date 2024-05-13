<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$q='q20';
$sql="select * from tmarkfinalfine where $q='' or $q='z' ";
$res=mysqli_query($link,$sql);
if(!$res){
	echo"error piosbkasjfbkjdfsb ljns VLshBDvljhbs dv";
}
print"<table>";
$i=0;
while($row=mysqli_fetch_assoc($res)){
	$regno=$row['regno'];
//	$q1=$row['q1'];
	$q50=$row[$q];
	$i=$i+1;
	$ans=rand(1,4);
	if($ans==1){
		$ans='A';
	}
	elseif($ans==2){
		$ans='B';
	}
	elseif($ans==3){
		$ans='C';
	}
	elseif($ans==4){
		$ans='D';
	}
	if(($q50=='' or $q50=='z')) {
		$sql1="update tmarkfinalfine set $q='".$ans."' where regno='".$regno."' and `type`='ans' ";
		$res1=mysqli_query($link,$sql1);
		if($res){
			print "<tr><td colspan='4'>".$sql1."</td></tr>";
			
		}
	}
	print"<tr><td>$i</td><td>".$row['regno']."</td><td>".$q50."</td><td>".$ans."</td></tr>";
	
}
?>