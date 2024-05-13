
  <!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
session_start();
?>
<html>
<head>
  <title>Vivekanandha College of Engineering for Women</title>
  <link rel="stylesheet" href="style.css" type="text/css">
<script language="javascript">

</script>
</head>
<body>
<?php
include("facleft.php");
?>
<td class="hauptfenster" valign="top">
      		
  <div id="entryform">
    <h2>Select Subject</h2>



  <form name="f1" method="post" action="fselsubject1.php" enctype='multipart/form-data' >
<table>
      <?php
 require('conn.php');
$s=new DBCON(); 
$link=$s->linkvcew();

print " <tr><td id='tabletext'>Department </td><td width=50%> <select name=dcode> ";
 
$sql    = "select * from department ";
 $result = mysqli_query($link,$sql);

 if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysql_error();
    }
while ($row = mysqli_fetch_assoc($result)) 
 {
     print "<option value='". $row['code'] . "'>".$row['pname']. " - " .$row['dname']."</option>";
} 
print "</select></td></tr>";

print " <tr><td id='tabletext'>Semester</td><td width=50%> <select name=semester> ";
$sql    = "select distinct semester from crsreg order by semester";
 $link=$s->linkexam();
 $result = mysqli_query($link,$sql);
  if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
while ($row = mysqli_fetch_assoc($result)) 
 {$c=$row['semester'] ;
     print "<option value='".$c . "'>".$c."</option>";
} 
print "</select></td></tr>";
?>


 <tr><td>   <input type='submit'  value='Go' /></td><td><input type='reset' value='Clear' /> </td></tr>
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