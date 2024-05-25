<?php 
session_start();
error_reporting(0);
include'top1.php';
?>
<style type='text/css'>

.a {
background: black;
color: white;
}
.b {
color: #aaa;
}
</style>
<div id='printArea'><br>
  <div class='headmenu'>
	Vivekanandha Merit Scholarship Entrance Exam (Online)- <?=date('Y')?> / விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - <?=date('Y')?>
	</div>
  <form name="f1" method="post" action="#" target="_blank" enctype='multipart/form-data' >

<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu(); 
$regno= $_SESSION['regno'];   
$scode=$_SESSION['branch'];
$tcode=$_SESSION['lang'];
$qno=$_SESSION["qno"];
$ans=$_SESSION["ans"];
$set=$_SESSION['set'];
$rtime=$_SESSION['dur'];
$tz=new DateTimeZone("Asia/Kolkata");
	$d = new DateTime();
	$d->setTimeZone($tz);
  	$dd=$d->format('M jS, y&H:i:s A');
 $sql="update tmark set remarks=1, rtime=0 where regno='".$regno."' and scode='".$scode."'";
 $res=mysqli_query($link,$sql);
 
?> 
    <div class='road row' ><div class='col-lg-12'> <b>Hi Ms.<?php 
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
   print" <div class='road row' ><div class='col-lg-12 '><b>VIMS Register Number : </b>". $_SESSION['atId']." </div></div>";
   print" <div class='road row' ><div class='col-lg-12 '><b>Register Number : </b> $regno </div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b> Student Name    : </b> $name </div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b> Unique ACK No.: </b> $sid</div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b>Date & Time of Exam Completion :</b>$dd</div></div>";
   print" <div class='road row' ><div class='col-lg-12'><b>Your Group :</b> $branch </div></div>";
   // print" <div class='road row' ><div class='col-lg-12'><b>Language  :</b>$tcode </div></div>";
    print"</div>";
   print "<div class='road row' ><div class='col-lg-3  text-left'><input type=button value='Save' onclick='myPrint()'> </div></div> ";
   
   // remove all session variables

 ?></b>

</div></div></div></form>
 
  <?php
include'foot.html'

  ?>
</body></html>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="jQuery.print.js"></script> 
<script type="text/javascript">
function myPrint(){
     $.print("#printArea");
}
    $(document).ready(function(){
      // $("#top2header1").hide();
      
    })
  </script>