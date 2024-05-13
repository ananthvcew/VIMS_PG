<?php
session_start();
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$name=strtoupper(trim($_POST['name']));
$add1=rand(5000,9999);
$add2='63'.$add1;
$st=$_POST['st'];
if($st=='TN'){
	$dt=trim($_POST['dts']);
}
else{
	$dt=trim($_POST['dt']);
}

$g2=$_POST['2g'];
$cno2=$_POST['cno2'];
$lang=$_POST['lang'];
$dob=$_POST['dob'];
$regno=$_POST['regno'];
$tz=new DateTimeZone("Asia/Kolkata");
$d = new DateTime();
$d->setTimeZone($tz);
$count=$s->getcount($lang);
$count=$count+1;
$dd2=$d->format('His');
$dd1='050520';
$dd=$dd1.$dd2;
$date='2020-05-05';
if($lang=='Tamil'){
	if($count<10){
		$sid=$dd."T000".$count;
	}
	elseif($count<100){
		$sid=$dd."T00".$count;
	}
	elseif($count<1000){
		$sid=$dd."T0".$count;
	}
	elseif($count>=1000){
		$sid=$dd."T".$count;
	}
}
else{
	if($count<10){
		$sid=$dd."E000".$count;
	}
	elseif($count<100){
		$sid=$dd."E00".$count;
	}
	elseif($count<1000){
		$sid=$dd."E0".$count;
	}
	elseif($count>=1000){
		$sid=$dd."E".$count;
	}
}
$id=$_SESSION['id'];
//print $id;
if($id==1){
$sql="INSERT INTO `studentfinal`(`sid`, `name`, `add2`, `district`, `branch`, `cno2`,`dor`, `dob`, `examlang`, `regno`) VALUES ('{$sid}','{$name}','{$add2}','{$dt}','{$g2}','{$cno2}','{$date}','{$dob}','{$lang}','{$regno}')";
$res=mysqli_query($link,$sql);
if(!$res){
    	echo"No Such User";	
    	print $sql;
    
}
else{
    
  	$dd=$d->format('M jS, y&H:i:s A');
  	$sql2="INSERT INTO `log`(`regno`, `sfrom`, `eto`) VALUES ('{$regno}','{$dd}','')";
  	$res2=mysqli_query($link,$sql2);
  	if(!$res2){
  	    //echo"error to store log";
  	}
  	else{
  	    
header("location:testinst.php");
$scode=$g2;
if($scode=='VO' || $scode=='OT'){
    $scode='VO/OT';
}
$_SESSION['name']=$name;
$_SESSION['branch']=$scode;
$_SESSION['lang']=$lang;
$_SESSION['sid']=$sid;
$_SESSION['regno']=$regno;
  }
}
}
elseif($id==0){

 $sql    = "select * from studentfinal where regno='".$regno."' ";
 //print $sql;
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo "DB Error, could not query the database\n";
     echo 'MySQL Error: ' . mysql_error();
    }
if($row = mysqli_fetch_assoc($result)) 
 { 
 if($row['regno']==$regno)
  { $tz=new DateTimeZone("Asia/Kolkata");
	$d = new DateTime();
	$d->setTimeZone($tz);
  	$dd=$d->format('M jS, y&H:i:s A');
  	$regno=$row['regno'];
  	$sql2="INSERT INTO `log`(`regno`, `sfrom`, `eto`) VALUES ('{$regno}','{$dd}','')";
  	$res2=mysqli_query($link,$sql2);
  	if(!$res2){
  	    //echo"error to store log";
  	}
  	else{
$scode=$row['branch'];
if($scode=='VO' || $scode=='OT'){
    $scode='VO/OT';
}
$_SESSION['name']=$row['name'];
$_SESSION['branch']=$scode;
$_SESSION['lang']=$row['examlang'];
$_SESSION['sid']=$row['sid'];
$_SESSION['regno']=$row['regno'];
header("location:testinst.php");  
  }
  }
else {
     echo"error";

}

}


}
				


?>



<footer class="headmenu">
	<div class="contauner text-center ">
		<div class="row">
			<div class='col-lg-12'>
				For Help /உதவிக்கு தொடர்புகொள்ளவும் 	</div>
	</div>
	<div class="row">
			<div class='col-lg-12'>
				Cell:94437 34670, 99655 34670,<br>94433 16540, 94437 34417 <br> Web site: <a href="http://www.vivekanandha.ac.in/"><font color='yellow'>www.vivekanandha.ac.in</a></font>
		</div>
	</div>
</footer>
<br>
<div>
    <center>Website Developed & Maintained by Software Development Cell / VCEW</center>
</div>