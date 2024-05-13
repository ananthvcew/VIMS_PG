<?php 
session_start(); 
include('top1.php');
?>
<br>
 <div class='headmenu'>
	Online Arivuthiran Exam 2022/ ஆன்லைன் அறிவுத்திறன் தேர்வு 2022  </div>

  <form name="f1" method="post" action="#" target="_blank" enctype='multipart/form-data' >

<?php
require('conn.php');
$s=new DBCON();

$sql="select  * from tmark where type='a' ";

  $i=0;
	$l=$s->linkarivu();
 $result = mysqli_query($l,$sql);  //print $sql;
if (!$result) {
     echo "DB Error, could not query the database----";
     echo 'MySQL Error: select';
    }
while($row= mysqli_fetch_assoc($result)) 
 {
     echo $row['regno'];
     $mark=0;
     $rno=$row['regno'];
     $set=$row['set'];
    //  if($set=='s1')
    //   $set='s3';
    //   if($set=='s2')
    //   $set='s4';
     $scode=$row['scode'];
      $tcode=$row['lang'];
 for($i=1;$i<=50;$i++)
  {	    $an=  "q".$i;
          $ansf=$row[$an];
    
  $sql1="select $an from tmark where regno='$rno' and type='q'"; 
 //print $sql1;
   $result1 = mysqli_query($l,$sql1);  //print $sql;
if (!$result1) {
     echo "DB Error, could not query the database----";
     echo 'MySQL Error: qno';
    }
if($row1= mysqli_fetch_assoc($result1)) 
 { $qq=$row1[$an];
    $sqln    = "select cans from  ques1 where subcode='".trim($scode)."' and tcode='".trim($tcode)."' and qset='".trim($set)."' and qno =".$qq ;
//	print $sqln;
$resultn = mysqli_query($l,$sqln);  //print $sql;
if (!$resultn) {
     //echo "DB Error, could not query the database----";
     echo 'cans';// print $sqln;
    }
if($rown= mysqli_fetch_assoc($resultn)) 
 {
     $an1=$rown['cans'];
   //  print "ans".$an1."aa:".$ansf."<br>";
     if($an1==$ansf)
      $mark=$mark+1;
      
 }
}
 }
 print $rno."-".$mark."<br>";
 
 
 $sqln1="update tmark set total=".$mark." where regno='".$rno."' and  type='a' ";
 //	print $sqln;
//	$l=$s->linkarivu();
$resultn1 = mysqli_query($l,$sqln1);  //print $sql;
if (!$resultn1) {
     
   echo "DB Error, could not query the database----";
    echo 'MySQL Error: ' . mysqli_error();
    }
 }
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