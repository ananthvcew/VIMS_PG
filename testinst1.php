<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
session_start();
include('top.php');
?>

  <form name="f1" method="post" action="test1.php"  enctype='multipart/form-data' >
<table>

      <?php

 require('conn.php');
$s=new DBCON(); 
$scode=$_POST['scode'];
$examno=$s->getexamno($scode);
Print $examno;
$tcode=$examno;

//$tcode=$s->gettcode1($scode,$examno);
Print $tcode;
$sss=$s->getexamstatus($scode,$tcode);
Print $sss;
if($sss=='Active')
{   $rno=$_SESSION['regno']; $atmp = $s->isattempted($rno,$scode,$tcode);
$atmp = $s->isattempted($rno,$scode,$tcode);
if($atmp>0){
	$tcode=$tcode+1;
}
    if($atmp<=0)
	{
print "<h3>General  Instructions : </h3>";
print"<h3>".$scode."-".$s->getsubname($scode)."</h3>";
print"<h3>".$tcode."-".$s->gettopname($tcode)."</h3>";
$dur=$s->getexamduration($scode,$tcode);
$_SESSION['duration']=$dur;
$max = $s->getmaxques($scode,$tcode);
$mpq = $s->getmarksperques($scode,$tcode);
print "<font size=3px > 1. This test contains $max Qustions. <br> 2. Duration of the Test is $dur Minutes. <br> 3.Marks awarded to each question is $mpq <br></font>";
print " <input type=hidden name=scode value= ".$scode.">";	
print " <input type=hidden name=tcode value= ".$tcode.">";	
$ttcode=$s->gettcode1($scode,$tcode);
$tq=$s->gettotques($scode,$ttcode);
 $qno1=range(1,$tq,1);
 shuffle($qno1);
 $qq=0;
 $qno=array_slice($qno1,0,$max);

  $_SESSION['qno'] = $qno;
    $_SESSION['qq'] = $qq;
    $ans=array();
     $_SESSION['ans'] = $ans;
  print "<input type=hidden name=qq value='".$qq."'>"; 
   print "<input type=hidden name=nxt value=1>"; 
   print "<input type=hidden name=tcode value='".$ttcode."'>"; 
   print "<input type=hidden name=ttcode value='".$tcode."'>"; 
print "<td width=50%> <input type='submit'  value='Start Test' /></td>";
}
else
{	print "You have already taken the test";   
//ob_end_clean();
//header("Localtion://loginform.html");
//	print "<a href=/gate/logout.php> Logout </a>";
}
}
else
{
	print "The Selected Test is Closed";
}
?>

 
</table>

 </form>
      
        
  
		
     
               
       
  </td>

           	
        <td width="10px">&nbsp;</td>
   </tr>
   <tr>
     <td  colspan="4" height="90px">&nbsp;</td>
   </tr>
</table>

<div align="center"><a class="copyright" style="color:#999999;background-color:#DCDCDC;font-weight:normal" href="www.vcenggw.ac.in" target=_blank> &copy;Vivekanandha college of Engineering for Women</a></div> <!--End: This code may not be removed or changed in the free of charge version!-->
</body>
</html>