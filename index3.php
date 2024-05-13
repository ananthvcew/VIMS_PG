<!DOCTYPE html>
<html>
<?php
include('top.php');
?>
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
<div class="bod ">
<div class='headmenu'>
	Online Vivekanandha Merit Scholarship Entrance Exam 2021 / விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - 2021<br> (Only for Girls/மாணவிகள் மட்டும்)
</div>

			<br>
			
	 	<div class="login">
	 <!--	<form action="" method="post">-->
	 	    	<form action="index4.php" method="post">
	 	  <div class="container">
	 	        <div class="road row">
	 	            <div class="col-lg-12 text-center">Username/பயனர்பெயர்  <br> (+2 Register Number)
	 	            <br><input type="text" class="form-control" name="uname"  placeholder='+2 Register Number'/></div>
	 	        </div>
	 	        	         <div class="road row">
	 	            <div class="col-lg-12 text-center"><center><input type="submit" class="btn btn-primary "  name="save" value="Proceed to Exam"/></center><div>
	 	            
	 	        </div>
	 	    </div>
	 	    </div> <br>
	 	    <form>
	 	</div>
	 	 </div>
	 	 <br> <br><br>
<footer class="headmenu">
	<div class="contauner text-center ">
		<div class="row ">
			<div class='col-lg-12'>
				For Help /உதவிக்கு தொடர்புகொள்ளவும் 
		</div>
	</div>
	<div class="row ">
			<div class='col-lg-12'>
				Cell: 99526 65114 , 70109 88861, 90877 85321 & 99765 66233 <br> Web site: <a href="http://www.vivekanandha.ac.in/"><font color='yellow'>www.vivekanandha.ac.in</a></font>
		</div>
	</div>
</footer>
<br>
<div>
    <center>Website Developed & Maintained by Software Development Cell / VCEW</center>
</div>
	</body>
</html>
