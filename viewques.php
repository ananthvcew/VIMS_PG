<?php 
session_start();
include("top.php");
?>
<style>
  
</style>
           
    <div class='card'>Select Subject</div>
<div class='row'><div class='col-lg-12 text-right'><br><a href='logout.php' class='btn btn-danger'>Logout</a></div></div>
  <form name="f1" method="post" action="viewques1.php" enctype='multipart/form-data'>
<table width=100%>
<?php
$ttype=$_POST['ttype'];
$scode=$_POST['scode'];
$set=$_POST['set'];
if($set=='s3'){
    $file='pict';
}
elseif($set=='s4'){
     $file='picts2';
}
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$sql    = "select * from  ques1 where subcode='".trim($scode)."' and tcode='".$ttype."' and qset='".$set."'";
Print $sql;
	$l=$s->linkarivu();
 $result = mysqli_query( $l,$sql);  
if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
	$qno=0;
	print"<div class='container'>";
print"<div class='road row'>";
	print "<div class='col-lg-12 text-center'> ".$scode." - ".$s->getsubname($scode)."<br> Question language:  ".$ttype."<br>";

	if($set=='s1'){	print "SET - I" ;}
	elseif($set=='s2'){	print "SET - II" ;}
	print"</div></div>";
	

			
while ($row= mysqli_fetch_assoc($result)) 
 { $qno=$row['qno'];
 
   $filename1=$file.'/'.$scode.'e'.$tcode.'qq'.$qno.'q.jpg';
   $filename2=$file.'/'.$scode.'e'.$tcode.'qq'.$qno.'a1.jpg';
 $filename3=$file.'/'.$scode.'e'.$tcode.'qq'.$qno.'a2.jpg';
 $filename4=$file.'/'.$scode.'e'.$tcode.'qq'.$qno.'a3.jpg';
 $filename5=$file.'/'.$scode.'e'.$tcode.'qq'.$qno.'a4.jpg';
   
  // print $filename2;
echo "<div class='road row'><div class='col-lg-12'><table class='table'><tbody><tr>";
 if (file_exists($filename1)) 
 {  // echo "The file $filename1 exists".$filename1;
 print "<td> ".$row['qno']." . ".base64_decode($row['question']);
 print "<img src='".$filename1."' width=800 /></td></tr>" ;
 }
 else
 print "<td>  ".$row['qno']." . ".base64_decode($row['question'])."</td></tr>" ;
 if (file_exists($filename2)) 
 {    print "<tr><td> &nbsp; A. ".  base64_decode( $row['opt1']) ;
 print "<br><img src='".$filename2."' width=100 /></td></tr>" ;
 }
 else
  print "<tr><td> &nbsp; A. ".  base64_decode( $row['opt1'])."</td></tr>" ;
 if (file_exists($filename3)) 
 {    print "<tr><td> &nbsp; B. ".  base64_decode( $row['opt2']) ;
 print "<br><img src='".$filename3."' width=100  /></td></tr>" ;
 }
 else
   print "<tr><td> &nbsp; B. " .base64_decode(  $row['opt2'])."</td></tr>" ;
  if (file_exists($filename4)) 
 {   print "<tr><td> &nbsp; C. ".  base64_decode( $row['opt3']) ;
 print "<br><img src='".$filename4."' width=100  /></td></tr>" ;
 }
 else
    print "<tr><td> &nbsp; C. ". base64_decode( $row['opt3'])."</td></tr>" ;
	if (file_exists($filename5)) 
 {   print "<tr><td>&nbsp; D. ".  base64_decode( $row['opt4']) ;
 print "<br><img src='".$filename5."' width=100  /></td></tr>" ;
 }
 else
	 print "<tr><td> &nbsp; D. ". base64_decode( $row['opt4'])."</td></tr>" ;
 print "<tr><td><b>&nbsp;Correct Answer : ". htmlentities( $row['cans'])."</b></td></tr><tr><td> <b>&nbsp;Mark : ". htmlentities( $row['mark'])."</b></td></tr>" ;
 
	} 
	if($qno==0)
	{
		print " Questions are not Updated Yet";
	}
?>
print "</table>";
 </form>
<br>
      <footer class="headmenu">
	<div class="container text-center ">
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