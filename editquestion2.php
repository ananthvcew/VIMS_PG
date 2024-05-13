<?php 
session_start();
include("top.php");
?>

    <Div class='card'>Select Subject</div>
<div class='row'><div class='col-lg-12 text-right'><br><a href='logout.php' class='btn btn-danger'>Logout</a></div></div>
  <form name="f1" method="post" action="addquestion.php" enctype='multipart/form-data'>

<?php
$qno=trim($_POST['qno']);
$ques=base64_encode($_POST['ques']);
$opt1=base64_encode($_POST['opt1']);
$opt2=base64_encode($_POST['opt2']);
$opt3=base64_encode($_POST['opt3']);
$opt4=base64_encode($_POST['opt4']);
$cans=trim($_POST['cans']);
$mark=trim($_POST['mark']);
$ttype=$_POST['ttype'];
$scode=$_POST['scode'];	
$qno=$_POST['qno'];
$set=$_POST['set'];

require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql="update ques set question='".$ques."', opt1='".$opt1."', opt2='".$opt2."', opt3='".$opt3."', opt4='".$opt4."', cans='".$cans."', mark='".$mark."' where subcode='".$scode."' and tcode='".$ttype."' and qno='".$qno."' and qset='".$set."'";

//print $sql;
 $result= mysqli_query($link,$sql);
if (!$result) {
     echo "DB Error, could not add questions to the database----";
     echo 'MySQL Error: ' . mysql_error();
     echo"<a href='welcome.php' class='btn btn-info'>Home</a>";
   }
   else
   {
	  print "Question Inserted Successfully"; 
   }
   print"<input type=hidden name=dcode value='".$dcode."'>";
   print"<input type=hidden name=scode value='".$scode."'>";
   print"<input type=hidden name=set value='".$set."'>";
?>
<div class='container'>
    <div class='road row'>
        <div class='col-lg-12'>
            <a href='editquestion.php' class='btn btn-primary'>Edit Another Question</a>
        </div>
    </div>
</div>
<br>
      <footer class="headmenu">
	<div class="contauner text-center ">
		<div class="row ">
			<div class='col-lg-12'>
				For Help /உதவிக்கு தொடர்புகொள்ளவும் 
		</div>
	</div>
	<div class="row ">
			<div class='col-lg-12'>
				Cell:94437 34670, 99655 34670,<br>94433 16540, 94437 34417 <br> Web site: <a href="http://www.vivekanandha.ac.in/"><font color='yellow'>www.vivekanandha.ac.in</a></font>
		</div>
	</div>
</footer>
<br>
<div>
    <center>Website Developed & Maintained by Software Development Cell / VCEW</center>
</div>
</body>
</html>