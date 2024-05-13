<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
session_start();
?>
<html>
<head>
  <title>Vivekanandha College of Engineering for Women</title>
  <link rel="stylesheet" href="style.css" type="text/css">
<script language="javascript">
function addQues()
{
	document.f1.action="addquestion.php";
	document.f1.submit();
}
function createTest()
{
	document.f1.action="createtest.php";
	document.f1.submit();
}
function actdactTest()
{
	document.f1.action="actdacttest.php";
	document.f1.submit();
}
function viewResult()
{
	document.f1.action="viewresult.php";
	document.f1.submit();
}
function consResult()
{
	document.f1.action="conresult.php";
	document.f1.submit();
}
function viewquestion()
{
	document.f1.action="viewques.php";
	document.f1.submit();
}
</script>
</head>
<?php

?>
<body>
<?php
include("facleft.php");
?>

           	<td class="hauptfenster" valign="top">
      		
  <div id="entryform">
    <h2>Select Subject</h2>

  <form name="f1" method="post" action="viewques.php" enctype='multipart/form-data'>
<table>
<?php
$_SESSION['var']=0;
$_SESSION['dcode']=0;
$dcode=trim($_POST['dcode']);//$_SESSION['dcode']=$dcode;
$semester=trim($_POST['semester']);
require('conn.php');
$s=new DBCON();
$link=$s->linkvcew();
print "<tr><td id='tabletext'>Department</td><td width=50%> <input type='text' name=dcode value='".$dcode."'/></td><td width=10%></td> </tr>";
print "<tr><td id='tabletext'>Semester</td><td width=50%> <input type='text' name=semester value='".$semester."'/></td><td width=10%></td> </tr>";
print "<tr><td id='tabletext'>Select Your Subject </td><td width=50%> <select name=scode>";

 $sql    = "select distinct subcode from crsreg where dcode=".$dcode." and semester=".$semester;
 $link=$s->linkexam();
 $result = mysqli_query($link,$sql);
if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
   }

while($row = mysqli_fetch_assoc($result)) 
 {
    $sc=$row['subcode'];
    if($sc=='U15GE102')
    {$sc='U15GE102(A)';
        print "<option value='".$sc  . "'>".$sc. " - " .$s->getsubname($sc)."</option>";
        $sc='U15GE102(B)';
        print "<option value='".$sc  . "'>".$sc. " - " .$s->getsubname($sc)."</option>";
    }
    else if($s->getsubtype($sc)!='')
print "<option value='".$sc  . "'>".$sc. " - " .$s->getsubname($sc)."</option>";
}
 print "</select></td></tr>";
 print "<tr><td id='tabletext'>Select Test Type</td><td width=50%> <select name=ttype>";
 print "<option value='pre'>PRELAB</option>";
 print "<option value='post'>POSTLAB</option>";
 print "<option value='qz'>QUIZ</option>";
  print "</select></td></tr>"; $i=1;
  print "<tr><td id='tabletext'>Select Experiment / Unit No</td><td width=50%> <select name=expno>";
  
  while($i<=15)
  {  print "<option value='".$i. "'>".$i. "</option>";
  $i=$i+1;
  }

  
  
  
?>

 </table>
 <table width=100%><tr><td width=30%><input type='button'  value='Add Questions' onClick='addQues()' /></td>
 <td width=30%><input type='button'  value='Create Test' onClick='createTest()' /> </td>
 <td width=40%><input type='button'  value='Activate / Deactivate  Test' onClick='actdactTest()' /></td>
 </tr><tr>
 <td width=30%><input type='button'  value='View Test Results' onClick='viewResult()'/></td>
 <td width=30%><input type='button'  value='Consolidate Result' onClick='consResult()'/></td>
 <td width=40%><input type='submit'  value='View Questions' onClick='viewquestion()'/></td></tr><td></td>
 <td><input type='reset' value='Clear' /> </td></tr>
</table>

 </form>
      
        <td width="10px">&nbsp;</td>
   </tr>
   <tr>
     <td  colspan="4" height="90px">&nbsp;</td>
   </tr>
</table>

<div align="center"><a class="copyright" style="color:#999999;background-color:#DCDCDC;font-weight:normal" href="www.vcenggw.ac.in" target=_blank> &copy;Vivekanandha college of Engineering for Women</a></div> <!--End: This code may not be removed or changed in the free of charge version!-->
</body>
</html>