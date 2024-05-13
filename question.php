<?php 
session_start(); 
include('top1.php');
?>
<br>
 <div class='headmenu'>
	Online Arivuthiran Exam 2020/ ஆன்லைன் அறிவுத்திறன் தேர்வு 2020  </div>

  <form name="f1" method="post" action="#" target="_blank" enctype='multipart/form-data' >

<?php
require('conn.php');
$s=new DBCON();
$regno= $_SESSION['regno'];   
$scode=$_SESSION['branch'];
$tcode=$_SESSION['lang'];
$qno=$_SESSION["qno"];
$ans=$_SESSION["ans"];
$set=$_SESSION['set'];
$rtime=$_SESSION['dur'];
 //$qno=explode(";",$qno1);
//  $ans=explode(";",$ans1);
 $mark=0; $i=0;
 $sqln    = "update  tmarkfinal set";
 foreach ($qno as $qq)
  {	$j=$i+1;
      $sqln=$sqln." q".$j."='".$ans[$i]."',";
      
      $sql    = "select cans from  ques where subcode='".trim($scode)."' and tcode='".trim($tcode)."' and qset='".trim($set)."' and qno =".$qq ;
//	print $sql;
	$l=$s->linkarivu();
 $result = mysqli_query($l,$sql);  //print $sql;
if (!$result) {
     echo "DB Error, could not query the database----";
     echo 'MySQL Error: Already Taken Test';
    }
if ($row= mysqli_fetch_assoc($result)) 
 {
     $an=$row['cans'];
    // print $an."<br>";
     if($an==$ans[$i])
      $mark=$mark+1;
      
 }
 $i=$i+1;
 }
 
 $sqln=$sqln."  total=".$mark.", rtime=".$rtime. ", remarks='completed' where regno='".$regno."' and  type='ans' ";
 //	print $sqln;
	$l=$s->linkarivu();
$result = mysqli_query($l,$sqln);  //print $sql;
if (!$result) {
     
   echo "DB Error, could not query the database----";
    echo 'MySQL Error: ' . mysqli_error();
    }
    else{
        $tz=new DateTimeZone("Asia/Kolkata");
	$d = new DateTime();
	$d->setTimeZone($tz);
  	$dd=$d->format('M jS, y&H:i:s A');
  	$logmax=$s->getmaxlog($regno);
  	$sql2="UPDATE log SET eto='".$dd."' WHERE id='$logmax'";
  	//print $sql2;
  	$res2=mysqli_query($l,$sql2);
  	if(!$res2){
  	    echo"error to store log";
  	}
    }
    $tz=new DateTimeZone("Asia/Kolkata");
  $d = new DateTime();
  $d->setTimeZone($tz);
 // $test=$_SESSION['test'];
  $dd=$d->format('M jS, y&H:i:s A');

?>  <div class="container">
    <div class='road row' ><div class='col-lg-14'> <b>Hi Ms.<?php 
	$name=$_SESSION['name'];
	$branch=$_SESSION['branch'];
	$sid=$_SESSION['sid'];
	$ref=$_SESSION['ref'];
	if($ref=='')
	  $ref='Nil';
	$refm=$_SESSION['refm'];
	if($refm=='')
    	$ref='Nil';	
	print $name ."<br> You have successfully completed Exam.. Your Results will be announced with in 15 days<br><font color=red><u> Kindly Note down the following information for your future Reference: </font></u></b></div></div>";
   print" <div class='road row' ><div class='col-lg-12 '><b>Register Number : </b> $regno </div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b> Student Name    : </b> $name </div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b> Unique ACK No.: </b> $sid</div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b>Date & Time of Exam Completion :</b>$dd</div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b>Your Group :</b> $branch -". $s->getsubname($scode)."</div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b>Language  :</b>$tcode </div></div>";
    print" <div class='road row' ><div class='col-lg-12'><b>Reference Staff/Student Name  :</b>$ref </div></div>";
     print" <div class='road row' ><div class='col-lg-12'><b>Reference Staff/Student Mobile :</b>$refm </div></div>";
   print "<div class='road row' ><div class='col-lg-3  text-left'><input type=button value='Save' onclick=window.print()> </div></div> ";
   
   // remove all session variables
session_unset();

// destroy the session
session_destroy();
 ?>

</div>
 </form>
      
  <footer class="headmenu">
	<div class="contauner text-center ">
		<div class="row ">
			<div class='col-lg-12'>
				For further Information about  Courses & Admission contact <br> மேலும்  கல்லூரி   பாடபிரிவுகள் மற்றும்  அட்மிஷன்  தகவலுக்கு தொடர்புகொள்ளவும் 
		</div>
	</div>
	<div class="row ">
			<div class='col-lg-12'>
				Cell:94437 34670, 99655 34670,<br>94433 16540, 94437 34417 <br> Web site: <a href="http://www.vivekanandha.ac.in/"><font color='yellow'>www.vivekanandha.ac.in</a></font>
		</div>
	</div> </div>
</footer>
<br>
<div>
    <center>Website Developed & Maintained by Software Development Cell / VCEW</center>
</div>
</html>