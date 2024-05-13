<?php
session_start();
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
include('top.php');
?>
<div class="headmenu">
	<?=strtoupper('Scholarship Application')?>
	</div>
<form action='scholarship1.php' method="POST" id='scholarship'>
	<div class="container">
		<div class="road row">
			<div class='col-lg-3'>
			10th Mark / <font color=" #7c045f">10 வது மதிப்பெண்
				
		</font> </div>
			<div class='col-lg-3'><input type="number" name='10mark' id='10mark' class="form-control"></div>
			<div class='col-lg-3'>11th Mark / <font color=" #7c045f">11 வது மதிப்பெண்	
		</font> </div>
			<div class='col-lg-3'><input type="number" name='11mark' id='11mark' class="form-control"></div>
		</div>
		<div class="road row">
			<!--<div class='col-lg-3'>12th Mark (if available)<br> <font color=" #7c045f">12 வது மதிப்பெண் (இருந்தால்)</font></div>-->
			<!--<div class='col-lg-3'><input type="number" name='12mark' id='12mark' class="form-control"></div>-->
		
			<div class="col-lg-3">Parents Occupation<br><font color=" #7c045f">பெற்றோரின் தொழில்</font></div>
			<div class="col-lg-3"><input type="text" name="occupation" id='occupation' class="form-control"></div>
			<div class="col-lg-3">Annual Income in Rs<br><font color=" #7c045f">
ஆண்டு வருமானம்</font></div><div class="col-lg-3"><input type="text" name="ai" id='ai' class="form-control"></div>
		
		</div>
		<div class="road row">
			<div class="col-lg-3">Date of Admission <br><font color=" #7c045f"> சேர்க்கை தேதி
</font></div><div class="col-lg-3"><input type="date" name="12mark" id='12mark' class="form-control"></div>
		
				<div class="col-lg-3">Admitted Course /<font color=" #7c045f"> நீங்கள் படிக்க விரும்பும் துறை </font>	</div>
			<div class="col-lg-3">
				<select name='phs' id='phs' class="form-control" >
					<option value=''>Select Your Option</option>
					<option value="1">Paramedical (துணை மருத்துவம்)</option>
					<option value='2'>Engineering (பொறியியல்) </option>
					<option value="3">Arts and Science (கலை மற்றும் அறிவியல்) </option>
				</select>
			</div>
			</div>
		<div class="road row">
			<div class="col-lg-3">
				College <br><font color="#7c045f">
				கல்லூரி
		</font>	</div>
			<div class="col-lg-3"> <select name='college' id='college' class="form-control" >
// 			<?php
// 			$sql="select * from college where 1";
// $res=mysqli_query($link,$sql);
// while($row=mysqli_fetch_assoc($res))
// {         $cc=$row['ccode'];
// 	     $cc1=$row['short'];
// 		$cc2=$row['cname'];
// 	print"<option value='".$cc."'> ". $cc1."-".$cc2."</option>";
		
// 	}
// 	?>
	</select>	</div>
		
				<div class="col-lg-3">
				Preference Course for Study <br><font color=" #7c045f">
				நீங்கள் படிக்க விரும்பும் பாடப்பிரிவு
		</font>	</div>
			<div class="col-lg-3">
			    <select name="course" id='course' class="form-control"></select>
				<!--<input type="text" name="course" id='course' class="form-control">-->
			</div>
			
		</div>
			<div class="road row">
			<div class='col-lg-3'>
			Year of HSC Completion / <font color=" #7c045f">12வது  நிறைவு செய்யப்பட்ட ஆண்டு
				
		</font> </div>
			<div class='col-lg-3'><select name='hscyear' id='hscyear' class="form-control"><option value='2021'> 2021</option><option value='2020'> 2020</option></select></div>
			<div class='col-lg-3'>12th Mark(if available) / <font color=" #7c045f">12 வது மதிப்பெண்	
		</font> </div>
			<div class='col-lg-3'><input type="number" name='hscmark' id='hscmark' class="form-control"></div>
		</div>
		<div class="road row">
		    <div class="col-lg-12">
				<input type=checkbox id='cond'  value='Yes'> I assure that above information are correct and also agree to college Terms & Conditions / <font color="#7c045f">
மேலே உள்ள தகவல்கள் சரியானவை என்றும் கல்லூரி விதிமுறைகள் மற்றும் நிபந்தனைகளுக்கு ஒப்புக்கொள்கிறேன் என்றும் நான் உறுதியளிக்கிறேன்</font>
			</div>
			</div>
		<div class="road row">
			<div class="col-lg-12 text-center">
				<button class="btn btn-info" type='button' id='save'>SUBMIT</button>
			</div>
		</div>
	</form>
	<br>
	<?php
include('foot2.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
         $("#save").attr('disabled','disabled');
		$("#cond").click(function(){

			$("#save").attr('disabled',!$("#save").attr('disabled'));	
		})
        $("#save").click(function(){
           if($("#10mark").val()==''){
             $("#10mark").css("border","1px solid red");
           $("#10mark").focus();
           return false;
       }
       else{ 
          
            $("#10mark").css("border","1px solid lightgray");
       } 
    //   if($("#11mark").val()==''){
    //       $("#11mark").css("border","1px solid red");
    //       $("#11mark").focus();
    //       return false;
    //   }
    //   else{
    //         $("#11mark").css("border","1px solid lightgray");
    //   } 
       if($("#occupation").val()==''){
           $("#occupation").css("border","1px solid red");
           $("#occupation").focus();
           return false;
       }
       else{
            $("#occupation").css("border","1px solid lightgray");
       } 
       if($("#ai").val()==''){
           $("#ai").css("border","1px solid red");
           $("#ai").focus();
           return false;
       }
       else{
            $("#ai").css("border","1px solid lightgray");
       } 
       if($("#phs").val()==''){
           $("#phs").css("border","1px solid red");
           $("#phs").focus();
           return false;
       }
       else{
            $("#phs").css("border","1px solid lightgray");
       } 
       if($("#college").val()==''){
          
           $("#college").css("border","1px solid red");
           $("#college").focus();
           return false;
       }
       else{  
            $("#college").css("border","1px solid lightgray");
       }
       if($("#course").val()==''){
           $("#course").css("border","1px solid red");
           $("#course").focus();
           return false;
       }
       else{
            $("#course").css("border","1px solid lightgray");
       } 
       $("#scholarship").submit();
        });
       
    $("#phs").on("change",function(){
       var phs=$(this).val();
       $.ajax({
           type:"POST",
           url:"selectCollege.php",
           data:{"phs":phs},
           success: function(res){
               $("#college").html(res);
           }
       });
    });
    $("#college").on("change",function(){
       var college=$(this).val();
       $.ajax({
           type:"POST",
           url:"selectDept.php",
           data:{"college":college},
           success: function(res){
               $("#course").html(res);
           }
       });
    });
    });
</script>