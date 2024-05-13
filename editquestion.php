<?php
session_start();
include('top.php');
?>
<style>
    .card{
        text-align:left !important;
    }
</style>


    <div class="card">Select Subject</div>
<div class='row'><div class='col-lg-12 text-right'><br><a href='logout.php' class='btn btn-danger'>Logout</a></div></div>
  <form name="f1" method="post" action="editquestion1.php" enctype='multipart/form-data'>

<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
print"<div class='container'>";
print"<div class='road row'>";
print"<div class='col-lg-2'></div>";
print"<div class='col-lg-3'>Select Your Subject</div>";
print"<div class='col-lg-5'><select name='scode' class='form-control'>";

 $sql    = "select * from branch ";
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
 print "<option value='s3'>Set - 3</option>";
 print "<option value='s4'>Set - 4</option>";
  print "</select></div>"; 
   print"<div class='col=lg-2'></div></div>";
    print"<div class='road row'>";
 print"<div  class='col-lg-2'></div>";
  print"<div  class='col-lg-3'>Select Question No.</div>";
 print "<div class='col-lg-5'> <input type='text' name='qno' class='form-control'>";

  print "</div>"; 
  print"<div class='col=lg-2'></div></div>";
//print"<input type='hidden'  name='set' value='s1'>";
?>
<div class="road row">
    <div class="col-lg-2"></div>
        <div class="col-lg-4"></div>
            <div class="col-lg-4"><input type='submit' class='btn btn-primary'  value='Edit Questions' /></div>
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
<script>
    $(document).ready(function(){
       $("#dcode").on('change',function(){
        var dcode=$(this).val();
        $.ajax({
            type:"POST",
            url:"selectSubject.php",
            data:{"dcode":dcode},
            success: function(res){
                $("#scode").html(res);
            }
            
            
        });
       });
       
    });
</script>
