<?php
session_start();


include('top.php');
?>

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

				
				if(a1!=''&&a8!=''&&a10!=''&&a11!=''&&a13!=''&&a14!=''){
				     
					document.f1.action="find1.php";
					document.f1.submit();
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
		$("#2g").blur(function(){
			var a=$("#2g").val();
			if(a=='OT'){
				$("#subject").show();
			}
		});
		$("#st").blur(function(){
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
		padding: 5px;
	}
	input {
  border: 2px solid currentcolor;
}
input:invalid {
 
}
input:invalid:focus {
  background-color:  #d6aab3 ;
}
</style>


<div class='headmenu'>
	Online Arivuthiran Exam Registration 2020/ ஆன்லைன் அறிவுத்திறன் தேர்வு முன்பதிவு 2020 <br> (Only for Girls/மாணவிகள் மட்டும்)
</div>
<form action="" method="post" name='f1'>
	<div class="container">
		<div class="road row">
			<div class="col-lg-3">
				Student Name <br> 	<font color=" #7c045f">
				மாணவியின் பெயர் 
			</font>	<font color="red">*</font>
		      
			</div> 
			<div  class="col-lg-3">
				<input type="text" name="name" id="name" class="form-control" onkeyup=chkname() required/>
				<?php
				$regno=$_SESSION['regno'];
                $dob=$_SESSION['dob'];
				print"<input type='hidden' name='regno' id='regno' value='$regno'/>";
				print"<input type='hidden' name='dob' id='dob' value='$dob'/>";
				?>
			</div>
			<div class="col-lg-3">
				State<br><font color=" #7c045f">மாநிலம் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-3">
				<select name='st' id='st' class="form-control">
					<option value='TN'>Tamil Nadu</option>
					<option value='OT'>Other State</option>
				</select>
			</div>
		</div>
			
		<div class="road row">
			
			<div class="col-lg-3">
				District<br><font color=" #7c045f">மாவட்டம் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-3">
				<input type="text" name="dt" id="dt" class="form-control" onkeyup=chkdt() required/>
				<select name='dts' id='dts' class="form-control">
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
			
			<div class='col-lg-3'>
				+2 Group</br><font color=" #7c045f">+2 பாடப்பிரிவு   </font><font color="red">*</font>
			</div>
			<div class="col-lg-3">
				<select name='2g' id='2g' class="form-control">
					<option value="">Select Group</option>
					<option value="MPCC">Mathematics, Physics, Chemistry, Computer Science</option>
					<option value="MPCB">Mathematics, Physics, Chemistry, Biology</option>
					<option value="PCBC">Physics, Chemistry, Biology, Computer Science</option>
					<option value="PCZB">Physics, Chemistry,Zoology, Botany</option>
					<option value="CACE">Accountancy, Commerce, Economics, Computer Science</option>
					<option value="VO">Vocational</option>
					<option value="OT">Others</option>
					
				</select>		
				
			</div>
			</div>
			<div class="road row" id='subject'>
			<div class="col-lg-3">If Group Others Enter the Subject here<br><font color=" #7c045f">வேறுபாடப்பிரிவு எனில் பாடங்களை இங்கே உள்ளிடுக  </font><font color ="red">  *</font> </div>
			<div class="col-lg-3"><input type="text" name='sub' id='sub' class="form-control" onblur=chksub() required>	</div>
			</div>
		<div class="road row">		
			
			<div class="col-lg-3">
				Whatsapp Number</br><font color=" #7c045f">வாட்ஸ்அப் எண் </font> <font color="red">*</font>
			</div>
			<div class="col-lg-3">
				<input type="text" name="cno2" id="cno2" class="form-control" maxlength="10" onkeyup=chkcno2()   required />
			</div>
			<div class='col-lg-3'>
			Exam Language<br><font color=" #7c045f">
			தேர்வு மொழி  
			</font> <font color="red">*</font>
		</div>
		<div class="col-lg-3">
			<select name='lang' id='lang' class="form-control">
				<option value="">Select your Language</option>
				<option value="Tamil">Tamil</option>
				<option value="English">English</option>
			</select>
		</div>
		</div>
		
		<div class="road row">
			<div class="col-lg-12 text-center"><input type='submit' name='save' onclick='mySave()' class="btn btn-primary"/></div>
		</div>
	</div>
</form>

<footer class="headmenu">
	<div class="contauner text-center ">
		<div class="row ">
			<div class='col-lg-12'>
				For Help /உதவிக்கு தொடர்புகொள்ளவும் 
		</div>
	</div>
	<div class="row ">
			<div class='col-lg-12'>
				Cell:94437 34670, 99655 34670, <br>94433 16540, 94437 34417 <br> Web site: <a href="http://www.vivekanandha.ac.in/"><font color='yellow'>www.vivekanandha.ac.in</a></font>
		</div>
	</div>
</footer>
<br>
<div>
    <center>Website Developed & Maintained by Software Development Cell / VCEW</center>
</div>