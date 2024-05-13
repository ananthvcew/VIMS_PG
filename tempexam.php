<?php
include('top.php');
error_reporting(0);
session_unset();
session_destroy();
?>
<html>
<script>
    $(document).ready(function(){
    //   $('#mob').hide();
       $('#ptd').click(function(){
          $('#mob').hide();
          $('#mob').attr('disapled','disapled');
          $('#date').show();
       });
       $('#ptm').click(function(){
          $('#date').hide();
          $('#date').attr('disapled','disapled');
          $('#mob').show();
       });
       
    });
</script>
<div class="bod "><br>
<div class='headmenu'>
	Online Vivekanandha Merit Scholarship Entrance Exam <?=date('Y')?> / விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - <?=date('Y')?><br> (Only for Girls/மாணவிகள் மட்டும்)
</div>
<?php
require('conn.php');
				$s=new DBCON();
				$link=$s->linkarivu();
				$sql="select * from examination_date where year_of_exam='".date("Y")."' and status='0'";
				$res=mysqli_query($link,$sql);
				$row=mysqli_fetch_assoc($res);
				if(date("Y-m-d",strtotime($row['es_date']))>date('Y-m-d') || date("Y-m-d",strtotime($row['ee_date']))<date('Y-m-d') ){
					echo"<br><br><div style='background-color:purple;color: white;font-weight: bolder; font-size: 20;padding: 30px;box-shadow: 15px 15px 15px gray;border-radius: 30px;text-align: center;'> The Exam Closed. The Next Exam will be Announced Soon <br> தேர்வு முடிந்தது. அடுத்த தேர்வு விரைவில் அறிவிக்கப்படும்</div><br><br>";
				}else{

?>
			<br>
			
	 	<div class="login">
	 <!--	<form action="" method="post">-->
	 	    	<form action="tempalogin.php" method="post">
	 	  <div class="container">
	 	        <div class="road row">
	 	            <div class="col-lg-12">Username/பயனர்பெயர்
	 	            <br><input type="text" class="form-control" name="uname"  placeholder='+2 Register Number'/></div>
	 	        </div>
	 	        <!--<div class="road row">-->
	 	        <!--    <div class="col-lg-12">Select Password Type<br>-->
	 	        <!--        <input type='radio' name='pt' id='ptd' value='ptd' > Date of Birth    <input type='radio' name='pt' id='ptm' value='ptm' > Mobile No-->
	 	        <!--    </div>-->
	 	        <!--</div>-->
	 	        <div class="road row">
	 	            <div class="col-lg-12">Password/கடவுச்சொல்
	 	            <!--<br><input placeholder="Your Date of Birth"  class="form-control" name="pass" type="date"  min='1997-01-01' max='2005-12-31' onfocus="(this.type='date')" id="date">--><input type='text' class='form-control' name='pass1' id='mob' placeholder='Mobile No'></div>
	 	        </div>
	 	         <div class="road row">
	 	            <div class="col-lg-12 text-center"><center><input type="submit" class="btn btn-primary "  name="save" value="Login"/></center><div>
	 	            
	 	        </div>
	 	    </div>
	 	    </div> <br>
	 	    <!--<table class="table table-borderless align-content-center">
	 			<tbody>
	 				<tr>
	 					<td>Username<br>பயனர்பெயர்</td><td><input type="text" class="form-control" name="uname" placeholder="Username"/></td>
	 				</tr>
	 				<tr>
								<td>Password<br>கடவுச்சொல்</td><td><input type="date" class="form-control" name="pass" placeholder="Password"/></td>
	 				</tr>
	 				<tr>
								<td colspan=2>
									<center><input type="submit" class="btn btn-primary " align="right" name="save" value="Login"/></center></td>
	 				</tr>
	 			</tbody>
	 		</table>-->
		</form>
	 	</div>
	 	 </div>
	 	 <br> <br><br>
	 	 <?php
}
	 	 ?>
<?php
include'foot.html';
?>
	</body>
</html>
