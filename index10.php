<!DOCTYPE html>
<html>
<?php
include('top.php');
?>
<style>
    	.headleft{
		background-color:lightyellow;
		color:#cc0066;
		text-align: left;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 5px;
		
	}
	.headright{
		background-color:#DBC7DE ;
		color:navy;
		text-align: left;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 5px;
	
	
	}
	.headmenu1{
		background-color: #6D0743  ;
		color:white;
		text-align: center;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 5px;
	}
		.headmenu2{
		background-color: navy    ;
		color:white;
		text-align: center;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 5px;
	}
	.headmenu3{
		background-color: #ccffcc   ;
		color:white;
		text-align: center;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 5px;
		width:500px;
	}
	.col-lg-6{
		padding: 10px!important;
	}
</style>
<div class="bod "><br>
<div class='headmenu'>
	 Vivekanandha Merit Scholarship Entrance Exam(Online) <?=date('Y')?> /  விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - <?=date('Y')?>  <br> (Only for Girls/மாணவிகள் மட்டும்)
</div>
<br>
    <div class='row'>
<div class='col-lg-12 headmenu3 text-center'> <a href="#" target=_balnk()>
Instructions to Write the Exam/   தேர்வு வழிமுறைகள்
</a></div></div>
<br>
<div class="row">
	<div class="col-lg-6" style="background-color: lightyellow;font-size: 12pt;font-weight: bolder;color: #cc0066;border-radius: 30px 0px 0px 30px;box-shadow: 10px 10px 10px gray;padding: 30px;">
		    <div class='headmenu2'>
	 Registered User<br> ஏற்கனவே பதிவு செய்தவர் </div> <br>
		<?php
				require('conn.php');
				$s=new DBCON();
				$link=$s->linkarivu();
				$sql="select * from examination_date where year_of_exam='".date("Y")."'";
				$res=mysqli_query($link,$sql);
				while($row=mysqli_fetch_assoc($res)){
					$sdate=$row['es_date']."09.30.00";
					$edate=$row['ee_date']."18.00.00";
					if(date("Y-m-d H:i:s",strtotime($edate))<date('Y-m-d H:i:s')){
						echo $row['disc']." Exam Completed.<br> <font color=green>".$row['disc']." தேர்வு முடிந்தது.</font><br><br>";
					}elseif(date("Y-m-d H:i:s",strtotime($sdate))<=date('Y-m-d H:i:s') && date("Y-m-d H:i:s",strtotime($edate))>=date('Y-m-d H:i:s') ){
						echo "<center><font color=green><u>".$row['disc']."</u></font></center>";
						?>
						1. The Exam duration is  1 hour(60 Minutes)
	 	            <br> 2. Total questions to be answered is 50
	 	            <br><font color=green> 3.  username : Your +2 Registration Number 
	 	            <br> 4. Password : Your Mobile Number </font>
	 	            <br>
	 	               1.தேர்வு காலம் 1 மணி நேரம் (60 நிமிடங்கள்)
	 	         <br>  2.பதிலளிக்க வேண்டிய மொத்த கேள்விகள் 50 ஆகும்
	 	        <br><font color=green> 3.பயனர்பெயர்: 	 உங்கள் பதிவு எண்
	 	       <br> 4. கடவுச்சொல்:	 உங்கள் கைபேசி எண்   </font>      <br><br>
	 
	 	            <div class="col-lg-12 text-center"><center><a href='tempexam.php'> <button type="button" class="btn btn-primary ">Proceed with Exam <br> தேர்வைத் தொடரவும்</button></a></center></div>
						<?php

					}
					elseif($row['result']=="Open"){
						header('location:res.php');
					}
				}


				?>
	</div>
	<div class="col-lg-6" style="background-color: lightyellow;font-size: 12pt;font-weight: bolder;color: #cc0066;border-radius: 0px 30px 30px 0px;box-shadow: 10px 10px 10px gray;padding: 30px;">
		<div class='headmenu1'> New Registration <br>  பதிவு செய்யாதவர் </div> 
		<?php
			$sql="select * from examination_date where year_of_exam='".date("Y")."'";
			$res=mysqli_query($link,$sql);
			$i=0;$j=0;
			while($row=mysqli_fetch_assoc($res)){
				if($row['result']=='Open'){
					$j=1;
				}
				if($row['r_status']=="Active"){

					echo "<br> 1. Click the button to Fill the Registration Form<br>";
					echo "<font color=green> 1. கொடுக்கப்பட்ட பதிவு படிவத்தை நிரப்பவும்</font><br><br>";
					echo "<center><a href='registrationForm.php'> <button type='button' class='btn btn-primary '>Proceed to Registration <br> பதிவு செய்ய தொடரவும்</button></a></center><br>";
					$i=1;
				}else{
					
					if($i==0){
						$i=1;
					echo "<br> 1. Registration will be open Soon<br>";
					echo "<font color=green> 1. பதிவு விரைவில் திறக்கப்படும்</font><br>";	
						}
				}
			}
		?>
	</div>
</div>
<?php
	if($j==1){

		echo "<a href='res.php' class='btn btn-success'>View Result</a>";
	}
?>
</div><br>
	 	
	 	 <?php
include('foot.html');
?>

	</body>
</html>
