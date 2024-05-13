<?php
session_start();
include('top.php');
?>

<script language="javascript">
function addQues()
{
	document.f1.action="addquestion.php";
	document.f1.submit();
}
function viewquestion()
{
	document.f1.action="viewques.php";
	document.f1.submit();
}
</script>

    <div class="card">Select Subject</div>

  <form name="f1" method="post" action="viewques.php" enctype='multipart/form-data'>

<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
print"<div class='container'>";
print"<div class='road row'>";
print"<div class='col-lg-2'></div>";
print"<div class='col-lg-3'>Select Your Subject</div>";
print"<div class='col-lg-5'><select name='scode' class='form-control'>";

 $sql    = "select * from subject ";
 $result = mysqli_query($link,$sql);
if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
   }

while($row = mysqli_fetch_assoc($result)) 
 {
    $sc=$row['subcode'];
    $sc1=$row['subname'];
    
print "<option value='".$sc  . "'>".$sc. " - " .$sc1."</option>";
}
 print "</select></div>";
 print"<div class='col=lg-2'></div></div>";
 print"<div class='road row'>";
 print"<div  class='col-lg-2'></div>";
  print"<div  class='col-lg-3'>Select Test Language</div>";
 print "<div class='col-lg-5'> <select name='ttype' class='form-control'>";
 print "<option value='Tamil'>Tamil</option>";
 print "<option value='English'>English</option>";
  print "</select></div>"; 
   print"<div class='col=lg-2'></div></div>";
    print"<div class='road row'>";
 print"<div  class='col-lg-2'></div>";
  print"<div  class='col-lg-3'>Select Set of Question</div>";
 print "<div class='col-lg-5'> <select name='set' class='form-control'>";
 print "<option value='s1'>Set - 1</option>";
 print "<option value='s2'>Set - 2</option>";
  print "</select></div>"; 
   print"<div class='col=lg-2'></div></div>";
?>
<div class="road row">
    <div class="col-lg-2"></div>
        <div class="col-lg-4"><input type='button' class='btn btn-primary' value='Add Questions' onClick='addQues()' /></div>
            <div class="col-lg-4"><input type='button' class='btn btn-primary'  value='View Questions' onClick='viewquestion()'/></div>
                <div class="col-lg-2"></div>
</div>
</div>

 </form>
      
        <td width="10px">&nbsp;</td>
   </tr>
   <tr>
     <td  colspan="4" height="90px">&nbsp;</td>
   </tr>
</table>
