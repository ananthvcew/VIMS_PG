<?php 
session_start(); 
include('top.php');
?>
<script  type="text/javascript" >
  function preventBack() { window.history.forward(); }
       
 function one()
 {  // window.alert("previous");
	 var x=document.f1.qq.value;
	// window.alert(x);
	  x=parseInt(x)-2;
	  if(x<0)
		  window.alert("First Question");
	  else
	  {
	  document.f1.qq.value=x;
	  document.f1.nxt.value=0;
	  document.f1.action="test.php";
	  document.f1.submit();
      }
  
 }
 function thre()
 {    
    
	  f1.action="test4.php";
	  f1.submit();
  }
    function secondPassed() {
                  $.ajax({
	url:"data1.php",
	method:"GET", 
	success:function(data){
	    console.log(data);
	    data.trim(); //window.alert("HI"+data+"hi");
	    if((data ==="0:0"))
	     { f1.action="test4.php";
	         document.f1.submit();
	     }
	      if((data ==="0:1"))
	     { f1.action="test4.php";
	         document.f1.submit();
	     }
	      if((data.localeCompare("0:0")==0))
	     { f1.action="test4.php";
	         document.f1.submit();
	     }
	      if((data.localeCompare("0:1")==0))
	     { f1.action="test4.php";
	         document.f1.submit();
	     }
	     
	    document.getElementById('countdown').innerHTML = data;
	}
});

      }
      
      var countdownTimer = setInterval('secondPassed()',1000);
  </script>
 <style type=text/css>
.timer {
    width: 300px;
    font-size: 2.5em;
    text-align: center;
}
 </style>   
  <div class='headmenu'>
	Online Arivuthiran Exam 2020/ ஆன்லைன் அறிவுத்திறன் தேர்வு 2020  </div>
<?php
require('conn.php');
$s=new DBCON();
?>
   <div class="card">  Reg.Number :<?php 
	$regno= $_SESSION['regno'];  	$name= $_SESSION['name'];    print $regno." - ". $name." ";
$scode=$_SESSION['branch'];
$tcode=$_SESSION['lang'];
//$du=6000;
//print  "&nbsp;&nbsp;&nbsp;&nbsp;Subject :" .$scode."-".$s->getsubname($scode); <div class='card'>
 
	print "</div><div class=card> Time Remaining : <div class='col-lg-12' id='countdown'></div></div>";
?> 
  <form name='f1' method='post' action='test.php' enctype='multipart/form-data'   >
      <div class="container">
<?php
$scode=$_SESSION['branch'];
$tcode=$_SESSION['lang'];
$qno=$_SESSION["qno"];
$ans=$_SESSION["ans"];

if($_SESSION['hi']==1)
{
	$qq=$_SESSION['qq'];
	$nxt1=$_SESSION['nxt'];
	$set=$_SESSION['set'];
	//$sqln="INSERT INTO tmark VALUES ($regno,'ques' , '$scode','$tcode', '$set',";
	//$i=1;
	//foreach($qno as $q2) 
  // { $sqln=$sqln."'".$q2."', ";
     
  //   $i=$i+1;
   //}
  // for($j=$i;$j<=50;$j++)
  // {
	//   $sqln=$sqln." '',";
//}
//	$sqln=$sqln."'0','60','completed' )";
	//print $sqln."<br>";
//	$l=$s->linkarivu();
//	$result = mysqli_query($l,$sqln);  
//	if (!$result) {
    // echo "Checking... 1......";
     //echo 'MySQL Error: ' . mysqli_error();
    } 
	
	//$sqln="INSERT INTO tmark VALUES ($regno,'ans' , '$scode','$tcode', '$set', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',0,60,'pending') ";
	//$l=$s->linkarivu();
//$result = mysqli_query($l,$sqln);  
//	if (!$result) {
    // echo "Checking... 2......";
   //  echo 'MySQL Error: ' . mysqli_error();
   // } 
	//print $sqln;
//}
else
{
	$qq=$_POST['qq'];
	$nxt1=$_POST['nxt']; //print "Current Next Value:".$nxt1."<br>";
	$set=$_POST['set'];
}
$an='';
$_SESSION['hi']=0;
//print "Current Index:".$qq."<br>";
if(($qq % 3)==0)
{ $i=1;
$sqln="update  tmark set";
foreach($ans as $a2) 
{ 
	$sqln=$sqln." q".$i."='".$a2."',";
  
  $i=$i+1;
}
 $rtime=$_SESSION['dur'];
 if($rtime=='')
   $rtime=0;
 $sqln=$sqln." rtime=".$rtime ; 
 $sqln=$sqln."  where  regno='".$regno."' and type='ans'";
 //print $sqln;
 $l=$s->linkarivu();
	$result = mysqli_query($l,$sqln);  
	if (!$result) {
   //  echo "Checking... 3......";
    // echo 'MySQL Error: ' . mysqli_error();
    } 
}


$qn=$qno[$qq];
//print "Current question Number :".$qn."<br>";
$max=$s->getmaxques($scode,$tcode);
$tq=$s->gettotques($scode,$tcode,$set);
if($tq<$max)
	$max=$tq;
if($nxt1==1)
 {
if($qq>0)
{ $qqp=$qq-1;
 $nam="ans".$qqp; 
  //print " Previous index:".$qqp;
  $an=$_POST[$nam];
   $ans=$_SESSION['ans'];
  $ans[$qqp]=$an;
  $_SESSION['ans']=$ans;
 // print "Previous Answer".$an;
 
}
}
else
{
    if($qq>0)
    {
     $qqp=$qq+1;
     $nam="ans".$qqp; 
 // print " Previous index(Next):".$qqp;
    $an=$_POST[$nam];
    $ans=$_SESSION['ans'];
   $ans[$qqp]=$an;
   $_SESSION['ans']=$ans;
   // print "Previous Answer".$an;
    }
}
 $ans=$_SESSION['ans'];
 foreach($ans as $a11)
 // print "<br>Ans:".$a11;
 if($qq>0)
    {$an=$ans[$qq];
 // print "C.QNO:".$qq;
 //print " : Next :". $an;
	}
  
 

  	 $sql    = "select * from  ques where subcode='".trim($scode)."' and tcode='".trim($tcode)."' and qset='".trim($set)."' and qno =".$qn ;
	//print $sql;
	$l=$s->linkarivu();
 $result = mysqli_query($l,$sql);  
if (!$result) {
    // echo "Checking... Please Retry......";
     //echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
   {$filename1='pict/'.$scode.'e'.$tcode.'qq'.$qn.'q.jpg';
   $filename2='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a1.jpg';
 $filename3='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a2.jpg';
 $filename4='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a3.jpg';
 $filename5='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a4.jpg';
   }
     $nam="ans".$qq;

  if (file_exists($filename1)) 
 {  // echo "The file $filename1 exists".$filename1;
 //if(strlen($row['question']) > 200)
//print "<div class='road row' ><div class='col-lg-12'><textarea class='form-control' readonly> ". ($qq + 1) .". " .htmlentities($row['question']);
// else
 //print "<div class='road row' ><div class='col-lg-12'><textarea class='form-control' readonly> ". ($qq + 1) .". " .htmlentities($row['question'])."</textarea>";

 print "<div class='road row' ><div class='col-lg-12'>". ($qq + 1).". <img src='".$filename1."' width='350' /></div></div>" ;
 }
 else 
  {//print strlen($row['question']);
      if(strlen($row['question']) > 200)
 print "<div class='road row' ><div class='col-lg-12'> <textarea class='form-control' readonly> ". ($qq + 1) .". " .htmlentities($row['question'])."</textarea></div></div>" ;
 else
  print "<div class='road row' ><div class='col-lg-12'> <textarea class='form-control'  readonly> ". ($qq + 1) .". " .htmlentities($row['question'])."</textarea></div></div>" ;
 }if (file_exists($filename2)) 
 {  if($an=='A')
     print" <div class='road row' ><div class='col-lg-12'><input type=radio  checked = true name='".$nam."' value='A'>A. ". htmlentities(  $row['opt1']) ;
    else
     print" <div class='road row' ><div class='col-lg-12'><input type=radio   name='".$nam."' value='A'>A. ". htmlentities(  $row['opt1']) ;
 print "<img src='".$filename2."' width='150' /></div></div>" ;
 }
 else
 {if($an=='A')
 print "<div class='road row' ><div class='col-lg-12'><input type=radio name='".$nam."'   checked = true value='A'>A. ". htmlentities(  $row['opt1'])."</div></div>" ;
  else
  print "<div class='road row' ><div class='col-lg-12'><input type=radio name='".$nam."' value='A'>A. ". htmlentities(  $row['opt1'])."</div></div>" ;
 }
  
  
   if (file_exists($filename3)) 
    { if($an=='B')
     print" <div class='road row' ><div class='col-lg-12'><input type=radio  checked = true name='".$nam."' value='B'>B. ". htmlentities(  $row['opt2']) ;
     else
        print" <div class='road row' ><div class='col-lg-12'><input type=radio name='".$nam."' value='B'>B. ". htmlentities(  $row['opt2']) ;
 print "<img src='".$filename3."' width='150'   /></div></div>" ;
 }
 else
   {if($an=='B')
     print" <div class='road row' ><div class='col-lg-12'><input type=radio  checked = true name='".$nam."' value='B'>B. ". htmlentities(  $row['opt2']) ;
     else
       print "<div class='road row' ><div class='col-lg-12'> <input type=radio name='".$nam."' value='B'>B.". htmlentities( $row['opt2'])."</div></div>" ;
   }
    if (file_exists($filename4)) 
 { if($an=='C')
     print" <div class='road row' ><div class='col-lg-12'><input type=radio  checked = true name='".$nam."' value='C'>C. ". htmlentities(  $row['opt3']) ;
     else
          print" <div class='road row' ><div class='col-lg-12'><input type=radio name='".$nam."' value='C'>C. ". htmlentities(  $row['opt3']) ;
 print "<img src='".$filename4."' width='150'  /></div></div>" ;
 }
 else
 {
 if($an=='C')
     print" <div class='road row' ><div class='col-lg-12'><input type=radio  checked = true name='".$nam."' value='C'>C. ". htmlentities(  $row['opt3']) ;
 else
 print "<div class='road row' ><div class='col-lg-12'><input type=radio name='".$nam."' value='C'>C.".  htmlentities($row['opt3'])."</div></div>" ;
 }
 if (file_exists($filename5)) 
  {if($an=='D')
     print" <div class='road row' ><div class='col-lg-12'><input type=radio  checked = true name='".$nam."' value='D'>D. ". htmlentities(  $row['opt4']) ;
     else
      print" <div class='road row' ><div class='col-lg-12'><input type=radio name='".$nam."' value='D'>D. ". htmlentities(  $row['opt4']) ;
 print "<img src='".$filename5."' width='150'  /></div></div>" ;
 }
 else
 { if($an=='D')
     print" <div class='road row' ><div class='col-lg-12'><input type=radio  checked = true name='".$nam."' value='D'>D. ". htmlentities(  $row['opt4']) ;
   else
 print "<div class='road row' ><div class='col-lg-12'> <input type=radio name='".$nam."' value='D'>D.". htmlentities( $row['opt4'])."</div></div>" ;
}
	 $qq=$qq+1;
	 $_SESSION['qq']=$qq;
	  
	 print "<input type=hidden name=qq value='".$qq."'>"; 
	 print "<input type=hidden name=nxt value=1>"; 
	 
// }
 print " <input type=hidden name=scode value= ".$scode.">";	
print " <input type=hidden name=tcode value= ".$tcode.">";		
//$strans = implode(';', $ans);
//print " <input type=hidden name=ans1 value= ".$strans.">";	
//$strqno = implode(';', $qno);
//print " <input type=hidden name=qno1 value= ".$strqno.">";
print " <input type=hidden name=set value= ".$set.">";
print " <input type=hidden name=lstans>";
 if($qq==$max)
 {
	 print "<div class='road row' ><div class='col-lg-3  text-left'>  <input type='button'  onclick=thre() class='btn btn-primary' value='Submit' /></div> <div class='col-lg-6 text-right'> <input type='button' value='Previous' onclick=one() />  </div></div>";
 }
	 else
	 {
 
 print "<div class='road row' > <div class='col-lg-6 text-left'>  <input type='submit' class='btn btn-primary' value='Next' /> </div> <div class='col-lg-6 text-right'> <input type='button' value='Previous' class='btn btn-primary' onclick=one() /> </div></div>";
	 } 

	
}

?>
 </div>
 </form>

       

</body>
<?php
include('foot1.html');
?>
</html>