<?php
include('top.php');
$hsc=array("M.A Tamil","M.A English","M.A Political Science","M.Sc Computer Science","M.Sc Microbiology","M.Sc Biochemistry","M.Sc Biotechnology","M.Sc Medical Biochemistry","M.Sc Nutrition & Dietetics","M.Sc Mathematics","M.Sc Physics","M.Sc Chemistry","M.Sc Botany","M.Sc Zoology","M.Sc Applied Psychology","M.Sc Costume Design & Fashion","M.Com","M.B.A","M.C.A");
?>
<script>
    $(document).ready(function(){
        $("#save").attr('disabled','disabled');
		$("#c1").click(function(){

			$("#save").attr('disabled',!$("#save").attr('disabled'));	
		})
    })
</script>
<script>

	function mySave(){
		var a1=$("#name").val();
		if(a1==''){
			$("#name").addClass('newinput');
		}
		var a2=$("#fname").val();
		if(a2==''){
			$("#fname").addClass('newinput');
		}
		var a3=$("#dob").val();
		if(a3==''){
			$("#dob").addClass('newinput');
		}
		var a4=$("#community").val();
		if(a4==''){
			$("#community").addClass('newinput');
		}
		var a5=$("#add1").val();
		if(a5==''){
			$("#add1").addClass('newinput');
		}
		var a6=$("#add2").val();
		if(a6==''){
			$("#add2").addClass('newinput');
		}
		var a7=$("#tk").val();
		if(a7==''){
			$("#tk").addClass('newinput');
		}
		var a15=$('#st').val();
		if(a15=='TN'){
			var a8=$("#dts").val();
		if(a8==''){
			$("#dt").addClass('newinput');
		}
		
		}
		else{
			var a8=$("#dt").val();
		if(a8==''){
			$("#dt").addClass('newinput');
		}
		}
		
		var a9=$("#cno1").val();
		if(a9==''){
			$("#cno1").addClass('newinput');
		}
		var a10=$("#cno2").val();
		if(a10==''){
			$("#cno2").addClass('newinput');
		}
		var a11=$("#2g").val();
		if(a11==''){
			$("#2g").addClass('newinput');
		}
		var a12=$("#phs").val();
		if(a12==''){
			$("#phs	").addClass('newinput');
		}
		
		var a13=$("#lang").val();
		if(a13==''){
			$("#lang").addClass('newinput');
		}
		var a14=$("#regno").val();
		if(a14==''){
			$("#regno").addClass('newinput');
		}

				
				if(a1!=''&&a3!=''&&a6!=''&&a7!=''&&a8!=''&&a10!=''&&a11!=''&&a13!=''&&a14!=''){
				     if((document.f1.add2.value.length)!=6)
				     {
				       alert('Check your Pincode');  
				     }
				     else
				     {
				            if((document.f1.cno2.value.length)!=10)
				            {
				               alert('Check your Whatsapp Number');  
				            }
				            else
				            {
				    if((document.f1.regno.value.length)<7) 
				            {
				               alert('Check your Register Number');  
				            }
				            else
				            {
					document.f1.action="save.php";
					document.f1.submit();}
				} }
				}
				else{
					alert('Fill the alert colums');
				}
				
				
				
				
	}
</script>
<script>
function chkname()
{ 
     var letters = /^[A-Za-z ./:-]+$/;
      if(document.f1.name.value.match(letters))
      {    }
      else
      {
          if(document.f1.name.value!="")
          {
      alert('Please input alphabet characters only');
      document.f1.name.value="";
      document.f1.name.focus();
      }}
      
}
function chkfname()
{ 
     var letters = /^[A-Za-z .]+$/;
      if(document.f1.fname.value.match(letters))
      {    }
      else
      {
          if(document.f1.fname.value!="")
          {
      alert('Please input alphabet characters only');
      document.f1.fname.value="";
      document.f1.fname.focus();
      }}
      
}
function chktk()
{ 
     var letters = /^[A-Za-z .]+$/;
      if(document.f1.tk.value.match(letters))
      {    }
      else
      {
          if(document.f1.tk.value!="")
          {
      alert('Please input alphabet characters only');
      document.f1.tk.value="";
      document.f1.tk.focus();
      }}
      
}

function chkdt()
{ 
     var letters = /^[A-Za-z .]+$/;
      if(document.f1.dt.value.match(letters))
      {    }
      else
      {
          if(document.f1.dt.value!="")
          {
      alert('Please input alphabet characters only');
      document.f1.dt.value="";
      document.f1.dt.focus();
      }}
      
}

function chkadd1()
{ 
     var letters = /^[A-Za-z .]+$/;
      if(document.f1.add1.value.match(letters))
      {    }
      else
      {
          if(document.f1.add1.value!="")
          {
      alert('Please input alphabet characters only');
      document.f1.add1.value="";
      document.f1.add1.focus();
      }}
      
}
function chkadd2()
{ 
     var letters = /^[0-9]+$/;
      if(document.f1.add2.value.match(letters))
      {    }
      else
      {
          if(document.f1.add2.value!="")
          {
      alert('Please input Numeric characters only');
      document.f1.add2.value="";
      document.f1.add2.focus();
      }}
      
}

function chkcno1()
{ 
     var letters = /^[0-9]+$/;
      if(document.f1.cno1.value.match(letters))
      {    }
      else
      {
          if(document.f1.cno1.value!="")
          {
      alert('Please input Numeric characters only');
      document.f1.cno1.value="";
      document.f1.cno1.focus();
      }}
      
}

function chkcno2()
{ 
     var letters = /^[0-9]+$/;
      if(document.f1.cno2.value.match(letters))
      {    }
      else
      {
          if(document.f1.cno2.value!="")
          {
      alert('Please input Numeric characters only');
      document.f1.cno2.value="";
      document.f1.cno2.focus();
      }}
      
}

function chkregno()
{ 
     var letters = /^[0-9]+$/;
      if(document.f1.regno.value.match(letters))
      {    }
      else
      {
          if(document.f1.regno.value!="")
          {
      alert('Please input Numeric characters only');
      document.f1.regno.value="";
      document.f1.regno.focus();
      }}
      
}
function chkpincodel()
{ 
          if((document.f1.add2.value.length)!=6)
      {         alert('Wrong Pincode');
      document.f1.add2.value="";
      document.f1.add2.focus();
      }
      
}
function chkregnol()
{ 
          if((document.f1.regno.value.length)!=7)
      {         alert('Wrong Register Number');
      document.f1.regno.value="";
      document.f1.regno.focus();
      }
      
}

function chkphnol()
{ 
     
          if((document.f1.cno2.value.length)!=10)
      {         alert('Wrong Mobile Number');
      document.f1.cno2.value="";
      document.f1.cno2.focus();
      }
      
      
}

	$(document).ready(function(){
		$("#subject").hide();
		$("#dt").hide();
		$("#school_dt").hide();
		$("#2g").on('change',function(){
			var a=$("#2g").val();
			if(a=='OT'){
				$("#subject").show();
			}
			else{
			   	$("#subject").hide(); 
			}
		});
		$("#st").on('change',function(){
			var b=$("#st").val();
			if(b=='OT'){
				$("#dt").show();	
				$("#dts").hide();	
			}
			if(b=='TN'){
				$("#dt").hide();	
				$("#dts").show();	
			}	
		});
		$("#school_st").on('change',function(){
			var b=$("#st").val();
			if(b=='OT'){
				$("#dt").show();	
				$("#dts").hide();	
			}
			if(b=='TN'){
				$("#dt").hide();	
				$("#dts").show();	
			}	
		});
	});
</script>
<style>
	.newinput{
		border-color: red;
/*		background-color: yellow;*/
	}
	.headmenu{
		background-color: navy;
		color:white;
		text-align: center;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 2px;
	}
	.headmenu1{
		background-color: #CFEE45;
		color:white;
		text-align: center;
		font-weight: bolder;
		border-radius: 8px;
		box-shadow: 2px 5px 8px gray;
		padding: 5px;
	}
	input {
  border: 2px solid currentcolor;
}
input:invalid {
 
}
input:invalid:focus {
  background-color:  #29BD87 ;
}
</style>


<!--<div class='frame text-center'>-->
	<!--<img src='images/faculty/Vivekanandha-College-of-Engineering-for-Women.jpg' class='clm' >-->
<!--</div>-->
<br>
<div class='headmenu'>
	 Vivekanandha Merit Scholarship Entrance Exam(Online) Registration <?=date('Y')?> /  விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - <?=date('Y')?> <br> (Only for Girls/மாணவிகள் மட்டும்)
</div>
<form action="" method="post" name='f1' enctype="multipart/form-data">
	<div class="container">
		<div class="road row">
			<div class="col-lg-2">
				Student Name <br> 	<font color=" #7c045f">
				மாணவியின் பெயர் 
			</font>	<font color="red">*</font>
		      
			</div> 
			<div  class="col-lg-4">
				<input type="text" name="name" id="name" class="form-control" onkeyup=chkname() required/>
			</div>
			<div class="col-lg-2">
				Parent Name <br> <font color=" #7c045f">
				பெற்றோரின் பெயர்
		</font>	</div>
			<div  class="col-lg-4">
				<input type="text" name="fname" id="fname" class="form-control"  onkeyup=chkfname() required/>
			</div>
		</div>
		
		<div class="road row">
			<div class="col-lg-2">
				Date of Birth <br> <font color=" #7c045f">
				பிறந்த தேதி  </font><font color="red">*</font>
			</div>
			<div  class="col-lg-4">
				<input type="date" name="dob" id="dob" class="form-control" min='1995-01-01' max='<?=date('Y')-16?>-12-31'/>
			</div>
			<div class="col-lg-2">
				Community <br> <font color=" #7c045f">
				சமூகம்
			</font></div>
			<div  class="col-lg-4">
				<select name='community' id='community' class="form-control">
					<option value=''>Select Community</option>					
					<option value='SC'>SC</option>
					<option value='SCA'>SCA</option>
					<option value='ST'>ST</option>
					<!--<option value='MBC'>MBC/DNC</option>-->
					<option value='MBC/DNC'>MBC/DNC</option>
					<option value='BC'>BC</option>
					<option value='MBC'>BCM</option>
					<option value='MBC'>OC</option>
					
				</select>
			</div>
		</div>
		<div class="road row">
			<div class="col-lg-2"> 
					Native Place<br><font color=" #7c045f">சொந்த ஊர்		
			</font></div>
			<div class="col-lg-4">
				<input type="text" name="add1" id="add1" class="form-control" onkeyup=chkadd1() />
			</div>
			<div class="col-lg-2">
				Taluk<br><font color=" #7c045f">தாலுக்கா  </font><font color="red">*</font>
			</div>
			<div class="col-lg-4">
				<input type="text" name="tk" id="tk" class="form-control" onkeyup=chktk() required/>
			</div>
			
			
		</div>
		<div class="road row">
			<div class="col-lg-2">
				State<br><font color=" #7c045f">மாநிலம் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-4">
				<select name='st' id='st' class="form-control">
					<option value='TN'>Tamil Nadu</option>
					<option value='OT'>Other State</option>
				</select>
			</div>
			<div class="col-lg-2">
				District<br><font color=" #7c045f">மாவட்டம் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-4">
				<input type="text" name="dt" id="dt" class="form-control" onkeyup=chkdt() required/>
				<select name='dts' id='dts' class="form-control">
				    <option value=''>Select District</option>
					<?php
					require('conn.php');
					$s=new DBCON();
					$link=$s->linkarivu();
					$sql="select * from tndt";
					//print$sql;
					$res=mysqli_query($link,$sql);
					if(!$res){
						Echo"error";
					}
					while($row=mysqli_fetch_assoc($res)){
						$dt=$row['dt'];
						print"<option>".$dt."</option>";
					}
					
					?>
				</select>
			</div>
			
		</div>
		<div class="road row">
		<div class="col-lg-2">
				PIN<br><font color=" #7c045f">அஞ்சல் குறியீடு  </font><font color="red">*</font>
			</div>
			<div class="col-lg-4">
				<input type="text" name="add2" id="add2" class="form-control"  minlength="6" maxlength="6" onkeyup=chkadd2()  required/></div>
			<div class='col-lg-2'>
				UG Course Studied</br><font color=" #7c045f"> UG பாடப்பிரிவு   </font><font color="red">*</font>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
			      <span class="input-group-addon">
			      	<select name='2g' id='2g' class="form-control">
			      		<option value="">Select Group</option>
			      		<option>B.A.</option>
			      		<option>B.Sc.</option>
			      		<option>B.Com.</option>
			      		<option>B.B.A</option>
			      		<option>B.C.A</option>
			      		<option>B.E.</option>
			      		<option>B.Tech.</option>
			      	</select>
			      </span>
			      <input id="2g1" type="text" class="form-control" name="2g1" placeholder="Computer Science">
			    </div>

					
				
			</div></div>
			<div class="road row" id='subject'>
			<div class="col-lg-6">If Group Others Enter the Subject here<br><font color=" #7c045f">வேறுபாடப்பிரிவு எனில் பாடங்களை இங்கே உள்ளிடுக  </font><font color ="red">  *</font> </div>
			<div class="col-lg-6"><input type="text" name='sub' id='sub' class="form-control" onblur=chksub() required>	</div>
		</div>
		<div class="road row">
			
			<div class="col-lg-2">
				Contact Number</br><font color=" #7c045f">தொடர்பு எண்
			</font>
			</div>
			<div class="col-lg-4">
				<input type="text" name="cno1" id="cno1" class="form-control" minlength="10" maxlength="10" onkeyup=chkcno1() required/>
			</div>
			<div class="col-lg-2">
				Whatsapp Number</br><font color=" #7c045f">வாட்ஸ்அப் எண் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-4">
				<input type="text" name="cno2" id="cno2" class="form-control" maxlength="10" onkeyup=chkcno2()   required />
			</div>
		</div>
		
		<div class="road row">		
			<div class='col-lg-2'>UG Register Number <br><font color=" #7c045f"> UG பதிவு எண்     </font>   <font color="red">*</font></div>

<div class='col-lg-4'><input type='text' name='regno' id='regno' class='form-control' minlength="7" required></div>
<div class='col-lg-2'>
			Email Id<br><font color=" #7c045f" style="font-size:10pt;">
			மின்னஞ்சல் முகவரி
			</font> 
		</div>
		<div class="col-lg-4">
			<input type='text' name='mail' id='mail' class='form-control'>
		</div>
		</div>
		<div class="road row" style="margin-bottom: 10px;">
		<div class="col-lg-3">
				Preference for Higher Study <br><font color=" #7c045f">
				நீங்கள் படிக்க விரும்புவது
		</font>	</div>
			<div class="col-lg-5 ">
				<select name='phs' id='phs' class="form-control">
					<option value=''>Select Your Option</option>
					<?php
					foreach($hsc as $key =>$value){
						echo "<option>".$value."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class='row'><div class='col-lg-12 headmenu'>College Details /கல்லூரியின் விவரங்கள்</div></div>
		<div class='road row'>
		<div class='col-lg-3'>College Name<br><font color='#7c045f'>கல்லூரியின் பெயர் </font><font color="red">*</font></div>
		<div class='col-lg-9'><input type='text' name='school_name' id='school_name' class='form-control'></div></div>
		<div class='road row'>
		<div class='col-lg-3'>University Name<br><font color='#7c045f' style="font-size:10pt;">பல்கலைக்கழகத்தின் பெயர்
 </font><font color="red">*</font></div>
		<div class='col-lg-9'><input type='text' name='uni_name' id='uni_name' class='form-control'></div></div>
		<div class='road row'>
		    <div class='col-lg-3'>Place<br><font color=" #7c045f"></font>இடம் <font color='red'>*</font></div>
		    <div class='col-lg-3'><input type='text' name='school_place' id='school_place' class='form-control'></div>
		    <div class='col-lg-3'>Taluk<br><font color=" #7c045f">தாலுக்கா  </font><font color="red">*</font></div>
		    <div class='col-lg-3'><input type='text' name='school_tk' id='school_tk' class='form-control'></div></div>
		    <div class='road row'>
		        <div class="col-lg-3">
				State<br><font color=" #7c045f">மாநிலம் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-3">
				<select name='school_st' id='school_st' class="form-control">
					<option value='TN'>Tamil Nadu</option>
					<option value='OT'>Other State</option>
				</select>
			</div>
		    <div class="col-lg-3">
				District<br><font color=" #7c045f">மாவட்டம் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-3">
				<input type="text" name="school_dt" id="school_dt" class="form-control" onkeyup=chkdt() required/>
				<select name='school_dts' id='school_dts' class="form-control">
				    <option value=''>Select District</option>
					<?php
					$sql="select * from tndt";
					//print$sql;
					$res=mysqli_query($link,$sql);
					if(!$res){
						Echo"error";
					}
					while($row=mysqli_fetch_assoc($res)){
						$dt=$row['dt'];
						print"<option>".$dt."</option>";
					}
					
					?>
				</select>
			</div>
		
		</div>
		<div class='row'><div class='col-lg-12 headmenu'>Referred Staff Details / பரிந்துரை செய்த பணியாளர் விவரங்கள்</div></div>
		<div class="road row">  
		<div class='col-lg-3'>
			Staff Name<br><font color=" #7c045f">
			பணியாளர் பெயர் 
			</font> <font color="red">*</font>
		</div>
		<div class="col-lg-3">
			<input type='text' name='ref_staff' id='ref_staff' class='form-control'>
		</div>
		<div class='col-lg-3'>
			Contact Number<br><font color=" #7c045f">
            தொடர்பு எண்
			</font> <font color="red">*</font>
		</div>
		<div class="col-lg-3">
			<input type='text' name='ref_mobile' id='ref_mobile' class='form-control'>
		</div>
		</div>
		<div class="road row">  
		<div class='col-lg-3'>
			Name of College<br><font color=" #7c045f">
		கல்லூரியின் பெயர்
			</font> <font color="red">*</font>
		</div>
		<div class="col-lg-3">
			<!-- <input type='text' name='ref_college' id='ref_college' class='form-control'> -->
			<select name='ref_college' id='ref_college' class="form-control">
				    <option value=''>Select College</option>
					<?php
					$sql="select * from college order by order_no";
					//print$sql;
					$res=mysqli_query($link,$sql);
					if(!$res){
						Echo"error";
					}
					while($row=mysqli_fetch_assoc($res)){
						if($row['code']>36){
							print"<option value='".$row['cname']." ".$row['short']."'>".$row['cname']." ".$row['short']." </option>";
						}else{
							print"<option value='".$row['short']."'>".$row['cname']." ( ".$row['short']." )</option>";
						}
						
					}
					
					?>
				</select>
		</div>
		<div class='col-lg-3'>
			Department<br><font color=" #7c045f">
        துறை
			</font> <font color="red">*</font>
		</div>
		<div class="col-lg-3">
			<input type='text' name='ref_dept' id='ref_dept' class='form-control'>
		</div>
		</div>
		<div class="road row">
			<div class="col-lg-12">
				<input type="checkbox" name="c1" id='c1' value='yes'> I assure that the above informations given by me are correct / மேலே குறிப்பிட்டுள்ள  அனைத்து விபரங்களும் சரியானவை என உறுதியளிக்கிறேன்
			</div>
		</div>
		
		<div class="road row">
			<div class="col-lg-12 text-center"><button type="button" id='save' name='save' onclick='mySave()' class="btn btn-primary"/>SAVE</<button></div>
		</div>
	</div>
</form>
<?php
include'foot.html';
?>
