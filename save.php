<?php
include('top.php');
require('conn.php');
error_reporting(0);
$s=new DBCON();
$link=$s->linkarivu();
$remove[] = "'";
$remove[] = '"';
$name=strtoupper(str_replace( $remove, "",trim($_POST['name'])));
$fname=strtoupper(str_replace( $remove, "",trim($_POST['fname'])));
$dob=$_POST['dob'];
$community=$_POST['community'];
$add1=$_POST['add1'];
$add2=$_POST['add2'];
$tk=trim($_POST['tk']);
$st=$_POST['st'];
if($st=='TN'){
	$dt=trim($_POST['dts']);
}
else{
	$dt=trim($_POST['dt']);
};
$school_name=str_replace( $remove, "",$_POST['school_name']);
$uni_name=str_replace( $remove, "",$_POST['uni_name']);
$sst=$_POST['school_st'];
if($sst=='TN'){
	$sdt=trim($_POST['school_dts']);
}
else{
	$sdt=trim($_POST['school_dt']);
}

$g2=$_POST['2g'];
$g21=$_POST['2g1'];
$phs=$_POST['phs'];
$phs=$_POST['phs'];
$cno1=$_POST['cno1'];
$cno2=$_POST['cno2'];
$lang=$_POST['lang'];
$mode=$_POST['mode'];
$regno=$_POST['regno'];
$mail=$_POST['mail'];
$tz=new DateTimeZone("Asia/Kolkata");
$d = new DateTime();
$d->setTimeZone($tz);
$count=$s->getcount($lang);
$atcount=$s->getmaxcount();
$count=$count+1;
$atcount=$atcount+1;
$dd=$d->format('dmyHis');
$date=$d->format('Y-m-d');
$year=$d->format('Y');
if($atcount<10){
    $at_regno="ATAPG05".$year."0000".$atcount;
}
elseif($atcount<100){
    $at_regno="ATAPG05".$year."000".$atcount;
}
elseif($atcount<1000){
    $at_regno="ATAPG05".$year."00".$atcount;
}
elseif($atcount<10000){
    $at_regno="ATAPG05".$year."0".$atcount;
}
elseif($atcount>=10000){
    $at_regno="ATAPG05".$year."".$atcount;
}
if($lang=='Tamil'){
	if($count<10){
		$sid=$dd."T0000".$count;
	}
	elseif($count<100){
		$sid=$dd."T000".$count;
	}
	elseif($count<1000){
		$sid=$dd."T00".$count;
	}
	elseif($count<10000){
		$sid=$dd."T0".$count;
	}
	elseif($count>=10000){
		$sid=$dd."T".$count;
	}
}
else{
	if($count<10){
		$sid=$dd."E0000".$count;
	}
	elseif($count<100){
		$sid=$dd."E000".$count;
	}
	elseif($count<1000){
		$sid=$dd."E00".$count;
	}
	elseif($count<10000){
		$sid=$dd."E0".$count;
	}
	elseif($count>=10000){
		$sid=$dd."E".$count;
	}
}
$sql4="select * from student where regno='".$regno."'";
$res4=mysqli_query($link,$sql4);
if(mysqli_num_rows($res4)==0){
 $sql="INSERT INTO `student`(`at_regno`, `sid`, `name`, `fathername`, `add1`, `add2`, `city`, `district`, `branch`, `community`, `cno1`, `cno2`,`dor`, `preperence`, `dob`, `examlang`, `regno`, `hall_ticket`, `s_name`, `place`, `school_st`, `school_tk`, `school_dt`,`mail`,`slot`,`degree`,`university`) VALUES ('{$at_regno}','{$sid}','{$name}','{$fname}','{$add1}','{$add2}','{$tk}','{$dt}','{$g21}','{$community}','{$cno1}','{$cno2}','{$date}','{$phs}','{$dob}','{$lang}','{$regno}','0', '{$school_name}', '{$_POST['school_place']}', '{$_POST['school_tk']}', '{$_POST['school_st']}', '{$sdt}','{$mail}','Open','{$g2}','{$uni_name}')";

$res=mysqli_query($link,$sql);
if(!$res){
    print"This Register Number Already Exist Kindly Contact Technical Help Desk";
    print"இந்த பதிவு எண் ஏற்கனவே உள்ளது.  தயவுசெய்து தொழில்நுட்ப உதவி மையத்தை தொடர்பு கொள்ளுங்கள்";
}
else{
	if($_POST['ref_staff']=='' && $_POST['ref_mobile']==''){
		$_POST['ref_college']='';
	}
   $sql1="INSERT INTO `reference`(`regno`, `ref`, `refmobile`,`college`,`dept`) VALUES ('{$regno}', '{$_POST['ref_staff']}', '{$_POST['ref_mobile']}','{$_POST['ref_college']}','{$_POST['ref_dept']}')";
    $res1=mysqli_query($link,$sql1);
    
    $sql2="select * from examination_date where status=0";
    $res3=mysqli_query($link,$sql2);
    $row=mysqli_fetch_assoc($res3);
		
    			print"<div class='card'>";
		print"<div class='card-header'>";
		print"<h3>Thank You / நன்றி <br> Ms.$name($regno) </h3>";
		print"</div>";
		print"<div class='card-body text-left'>";
		
		print"You have successfully completed registration to write <b> Vivekanandha Merit Scholarship Entrance Exam(Online) ".date('Y')." </b> ";
		print"<br><font color='#7c045f'><b>Username :".$regno." (Your UG register number) ";
		print"<br>Password  : ".$cno1." (Your Mobile Number) </font>";
		// if(date('Y-m-d',strtotime($row['es_date']))>=date("Y-m-d") || date('Y-m-d',strtotime($row['ee_date']))<=date("Y-m-d") ){
		 // Print"<br> You can write your exam today (".date("d-M-Y").") from 10:00AM to 6:00PM  <br>The Exam Link : <a href='https://vcewsdc.in/VIMS_PG/index.php'>www.vcewsdc.in/VIMS_PG/</a><br> ";
		//  }else{
			Print"<br></b></font>Exam Link will be send your registered mobile number  ";
		//}
		
		print"<br>  ஆன்லைன்  விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - ".date('Y')." க்கு<br> வெற்றிகரமாக பதிவு செய்துள்ளீர் ";
		print"<br><font color='#7c045f'><b>பயனர்பெயர் : ".$regno." (உங்கள் UG பதிவு எண்)"; 
		print"<br>கடவுச்சொல்  : ".$cno1." (உங்கள் தொடர்பு எண்)</font></b>";

		// if(date('Y-m-d',strtotime($row['es_date']))>=date("Y-m-d") || date('Y-m-d',strtotime($row['ee_date']))<=date("Y-m-d") ){
		 // Print"<br> இன்று (".date("d-M-Y").") காலை 10:00 மணி முதல் மாலை 6:00 மணி வரை உங்கள் தேர்வை எழுதலாம். <br>தேர்வுக்கான லிங்க் :  <a href='https://vcewsdc.in/VIMS_PG/index.php'>www.vcewsdc.in/VIMS_PG/</a>";
		//  }else{
			print"<br>தேர்வுக்கான இணைய முகவரி தங்களது பதிவு செய்யப்பட்ட தொலைபேசி எண்ணுக்கு அனுப்பப்படும் ";
		//}
		print"</div>";
		print"</font><div class='card-footer'>ACK.No: ".$sid;	
		print "<br> Registration Number / பதிவு எண் : ".$at_regno;
		print"</div></div>";
	
}

}else{
	print"<br><br><div style='background-color:purple;color: white;font-weight: bolder; font-size: 20;padding: 30px;box-shadow: 15px 15px 15px gray;border-radius: 30px;text-align: center;'>This Register Number Already Exist Kindly Contact Technical Help Desk<br>இந்த பதிவு எண் ஏற்கனவே உள்ளது.  தயவுசெய்து தொழில்நுட்ப உதவி மையத்தை தொடர்பு கொள்ளுங்கள்</div><br><br></font>";
}				


?>
<?php
include('foot.html');
?>

<style>
    .headmenu1{
		background-color: #CFEE45;
		color:white;
		text-align: center;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 5px;
	}
</style>