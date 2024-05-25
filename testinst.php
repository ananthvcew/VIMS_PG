<?php 
session_start();
include('top.php');
?>
  <script >
function submit1()
{ 
	f1.action="test_modal2.php";
	f1.submit();
}

function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
</script>

  <form name='f1' method='post' action='test_modal2.php' enctype='multipart/form-data' ><div class="bod "><br>
      <div class='headmenu'>
	Vivekanandha Merit Scholarship Entrance Exam (Online)- <?=date('Y')?> / விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - <?=date('Y')?>
	</div></div>
                                                                                                                                                                                       
      <?php   

 require('conn.php');
$s=new DBCON(); 

$scode=$_SESSION['branch'];
//print $scode;
if($scode=='M.A Tamil'){
  $tcode="Tamil";
}else{
  $tcode="English";
}

//$tz=new DateTimeZone("Asia/Kolkata");
//$d = new DateTime();
//$d->setTimeZone($tz);
//$dd=$d->format('d/m/y');

$set='s1';
// if($dd==1){
//     $set='s1';
// }
// else{
//    $set='s2'; 
// }
//print $scode.$tcode.$set;
$sss='Active';

if($sss=='Active')
{    $rno=$_SESSION['regno'];
$atmp = $s->isattempted1($rno);print "Attempt:".$atmp;
    if($atmp=='pending')
	{
	     print "<div class='card'>General  Instructions</div>";
print"<div class='container'><div class='road row'><div class='col-lg-10'><font color=green><b>Welcome back Ms.".$_SESSION['name']." (".$rno."),</b></div></div>";                                                                                                                                                                
print"<div class='road row'><div class='col-lg-10'><b>Your Group : ".$scode."  ; Your Exam Language :" .$tcode."</div></div>";
//print"<div class='road row'><div class='col-lg-10'><b> Your Test is interrupted.. Kindly Try again after 10 Mins.... </b></div></div>";

//  $sql    = "select * from  tmarkfinal where regno='".trim($rno)."' and type='ques'"  ;
//  $l=$s->linkarivu();
//  $result = mysqli_query($l,$sql);  
// if (!$result) {
//     // echo "Checking... Please Retry......";
//      //echo 'MySQL Error: ' . mysqli_error();
//     }
// 	$ques=array();
// if ($row= mysqli_fetch_assoc($result)) 
//   {  
//  for($i=1;$i<=50;$i++)
//  {   $j=$i-1;
// 	 $as='q'.$i; 
// 	 //print $as;
// 	 $ques[$j]=$row[$as];
//   }
  
//  }
 
// $sql    = "select * from  tmarkfinal where regno='".trim($rno)."' and type='ans' "  ;
//   $result = mysqli_query($l,$sql);  
// if (!$result) {
//     // echo "Checking... Please Retry......";
//      //echo 'MySQL Error: ' . mysqli_error();
//     }
// 	$ans=array();
// if ($row= mysqli_fetch_assoc($result)) 
//   { 
//  for($k=1;$k<=50;$k++)
//  {   $j=$k-1;
// 	 $aq='q'.$k;
// 	 $ans[$j]=$row[$aq];
//   }
//   $rtime=$row['rtime'];
  
//  }
//  $_SESSION['duration']=$rtime;
//  $_SESSION['qno'] = $ques;
//   $_SESSION['ans'] = $ans;
//   print "<input type='hidden' id='qq' name='qq' value=0 />"; 
   print "<input type='hidden' id='set' name='set' value='".$set."' />"; 
    //  print "<input type='hidden' id='nxt' name='nxt' value='0' />"; 
// 	 print "<input type='hidden' id='nxt' name='nxt' value='0' />";
	 print " <input type=hidden name=scode value= '".$scode."'>";	
print " <input type=hidden name=tcode value= ".$tcode.">";	
print "<br><center> <input type='button' class='btn btn-primary' value='Continue Exam'  onClick='submit1()'/><br><br>";
	}
	else if(($atmp=='')||($atmp==' ') )
		 {   if($tcode=='English'){
	    //----------------//
   print "<div class='card'>General  Instructions</div>";
print"<div class='container'><div class='road row'><div class='col-lg-10'><font color=green><b>Welcome Ms.".$_SESSION['name']." (".$rno."),</b></div></div>";                                                                                                                                                                
print"<div class='road row'><div class='col-lg-10'><b>Your Group : ".$scode."  ; Your Exam Language :" .$tcode."</div></div>";
$dur=$s->getexamduration($scode,$tcode);
$_SESSION['duration']=$dur;
$max=$s->getmaxques($scode,$tcode);
$tq=$s->gettotques($scode,$tcode,$set);
if($tq<$max)
	$max=$tq;
print " <div class='road row'><div class='col-lg-12'> 1. This Exam contains<font color=red> 50 </font> Questions. </div></div><div class='road row'><div class='col-lg-12'> 2. Duration of the Exam is <font color=red> $dur </font> Minutes. </div></div>";
print " <div class='road row'><div class='col-lg-12'> 3. After answering all the questions,  click submit button to finish the Exam.</div></div>";
print "  <div class='road row'><div class='col-lg-12'> 4. If the time duration is over, the Exam will automatically saved and submitted. </div></div> ";
print " <div class='road row'><div class='col-lg-12'> 5. You can move forward(next question) or move backward (Previous Question) at any  time. </div></div> <div class='road row'><div class='col-lg-12'> 6. If you are facing any internet or other issues while attending the Exam, don't panic, Your Progress will be saved, you will be given additional chance to complete the Exam</div></div>";
print " <div class='road row'><div class='col-lg-12'>7. At any point you can call the below mentioned Helpline numbers.. <br> </div></div>";

//print "<div class='road row'><div class='col-lg-12'> <font color=green><center> Kindly Update your Reference Details(if any) </center> </font> </div></div>";
//print "<div class='road row'><div class='col-lg-4'><font color=red> Reference Faculty/Staff/Student Name: </div><div class='col-lg-6'><input type='text'  name='ref' class='form-control' value=' '  /> </div></div><div class='road row'><div class='col-lg-4'>Reference Faculty/Staff/Student Mobile: </div><div class='col-lg-6'><input type='text'  name='refmobile' class='form-control' value=' ' /> </font> </div></div>"; 

print " <input type=hidden name=scode value= '".$scode."'>";	
print " <input type=hidden name=tcode value= ".$tcode.">";	
$tq=$s->gettotques($scode,$tcode,$set);
 $qno1=range(1,$tq,1);
 shuffle($qno1);
 $qq=0; $ans=array(50); $i=0;
 $qno=array_slice($qno1,0,$max);
 foreach($qno as $a)
 { //print"<br>".$a;
   $ans[$i]='z';
   $i=$i+1;
 }
  $_SESSION['qno'] = $qno;
 
   
	
     $_SESSION['ans'] = $ans;
  print "<input type='hidden' id='qq' name='qq' value=0 />"; 
   print "<input type='hidden' id='set' name='set' value='".$set."' />"; 
     print "<input type='hidden' id='nxt' name='nxt' value='0' />"; 
print " <center><input type='submit' class='btn btn-primary' value='Start Test' /></center> <br><br>";

//----------------//
}
else{
    //---------Tamil-------//
   print "<div class='card'>  வழிமுறைகள்</div>";
print"<div class='container'><div class='road row'><div class='col-lg-12'><b>நல்வரவு Ms.".$_SESSION['name']." (".$rno.")</b></div></div><div class='road row'><div class='col-lg-12'>";                                                                                                                                                                
print"<b> பாடப்பிரிவு : ".$scode."</div></div><div class='road row'><div class='col-lg-12'>";
print"தேர்வு மொழி : ".$tcode."</div></div>";

$dur=$s->getexamduration($scode,$tcode);
$_SESSION['duration']=$dur;
$max=$s->getmaxques($scode,$tcode);
$tq=$s->gettotques($scode,$tcode,$set);
if($tq<$max)
	$max=$tq;
print " <div class='road row'><div class='col-lg-12'> 1. இந்த தேர்வில்  <font color=red> 50</font> கேள்விகள் உள்ளன. </div></div><div class='road row'><div class='col-lg-12'> 2. தேர்வின் காலம் <font color=red >$dur </font> நிமிடங்கள். </div></div>";
print " <div class='road row'><div class='col-lg-12'> 3. எல்லா கேள்விகளுக்கும் பதிலளித்த பிறகு, தேர்வை முடிக்க சமர்ப்பி பொத்தானைக் கிளிக் செய்க.</div></div>";
print " <div class='road row'><div class='col-lg-12'> 4. கால அவகாசம் முடிந்தால், தேர்வு தானாகவே சேமிக்கப்பட்டு சமர்ப்பிக்கப்படும். </div></div>";
print "<div class='road row'><div class='col-lg-12 justify-content-around'> 5. நீங்கள் எந்த நேரத்திலும் முன்னேறலாம் (அடுத்த கேள்வி) அல்லது பின்னோக்கி நகர்த்தலாம் (முந்தைய கேள்வி).</div></div> <div class='road row'><div class='col-lg-12 justify-content'> 6. தேர்வில் கலந்து கொள்ளும்போது நீங்கள் ஏதேனும் இணையம் அல்லது பிற சிக்கல்களை எதிர்கொண்டால், பீதி அடைய வேண்டாம், நீங்கள் பதிலளித்த வினாக்களின் விடைகள் சேமிக்கப்படும், தேர்வை முடிக்க உங்களுக்கு கூடுதல் வாய்ப்பு வழங்கப்படும்.  </div></div>";
print " <div class='road row'><div class='col-lg-12 justify-content-around'> 7. பரீட்சை எழுதும் போது, நீங்கள் பரீட்சை இணையப் பக்கத்தைக் குறைக்கவோ அல்லது வேறு இணையப் பக்கத்தைத் திறக்கவோ கூடாது. </div></div><div class='road row'><div class='col-lg-12'> 8. எந்த நேரத்திலும் கீழே குறிப்பிடப்பட்டுள்ள உதவி மைய்ய எண்களை அழைக்கலாம். </div></div>";
print " <input type=hidden name=scode value= '".$scode."'>";	
print " <input type=hidden name=tcode value= ".$tcode.">";	

//print " <div class='road row'><div class='col-lg-12'> <b> தங்களுக்கு நமது கல்லூரியை பரிந்துரை செய்தவரின் விபரம்  (ஏதேனும் இருந்தால்)"; 
  //print "</div></div><div class='road row'><div class='col-lg-7'><font color=red> பரிந்துரை செய்த ஆசிரியர் / பணியாளர் / மாணவியின்  பெயர் :</div><div class='col-lg-5'> <input type='text'  name='ref' class='form-control'  /> </div></div><div class='road row'><div class='col-lg-7'>பரிந்துரை செய்த ஆசிரியர் / பணியாளர் / மாணவியின் மொபைல் எண்:</div><div class='col-lg-5'> <input type='text'  name='refmobile' class='form-control' /></font></div></div>";

$tq=$s->gettotques($scode,$tcode,$set);
 $qno1=range(1,$tq,1);
 shuffle($qno1);
 $qq=0; $ans=array(50); $i=0;
 $qno=array_slice($qno1,0,$max);
 foreach($qno as $a)
 { //print"<br>".$a;
   $ans[$i]='z';
   $i=$i+1;
 }
  $_SESSION['qno'] = $qno;
  
	
     $_SESSION['ans'] = $ans;
  print "<input type='hidden' id='qq' name='qq' value=0 />"; 
   print "<input type='hidden' id='set' name='set' value='".$set."' />"; 
     print "<input type='hidden' id='nxt' name='nxt' value='0' />"; 
print "<br><center> <input type='submit' class='btn btn-primary' value='Start Exam' /><br><br>";

//----------------//
}

} 
else
{	print "<h2>You have already completed the Exam... </h2>"; 
//ob_end_clean();
//header("temphome.php");
print "<a href=temphome.php> Logout </a>";
//}
}
}
else
{
	print "The Selected Exam is Closed... Contact Helpline numbers";
}
?>

 


 </form>
          
  	
   <?php
   include('foot.html')
   ?>