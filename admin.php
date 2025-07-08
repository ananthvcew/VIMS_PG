<!DOCTYPE html>
<html>
<?php
include('top.php');
?>

<div class="bod "><br>
<div class='headmenu'>
	Online Arivuthiran Exam <?=date('Y')?>/ ஆன்லைன் அறிவுத்திறன் தேர்வு <?=date('Y')?> <br> (Only for Girls/மாணவிகள் மட்டும்)
</div>
<br>

<br>
			<br>
			
	 	<div class="login">
	 	<form action="adminlogin.php" method="post">
	 	  <div class="container">
	 	        <div class="road row">
	 	            <div class="col-lg-12">Username/பயனர்பெயர்
	 	            <br><input type="text" class="form-control" name="uname"  /></div>
	 	        </div>
	 	        <div class="road row">
	 	            <div class="col-lg-12">Password/கடவுச்சொல்
	 	            <br><input type='password' class="form-control" name="pass" ></div>
	 	        </div>
	 	         <div class="road row">
	 	            <div class="col-lg-12 text-center"><center><input type="submit" class="btn btn-primary "  name="save" value="Login"/></center><div>
	 	            
	 	        </div>
	 	    </div>
	 	    </div>
	 	    <br><br><br>
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
	 	 <br><br><br>
	 	 <?php
// include('foot.html');
?>

	</body>
</html>
