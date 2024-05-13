<?php
session_start();
?>
<?php
require("conn.php");
$s=new DBCON();
$link=$s->linkarivu();
$s1=trim($_POST['rname']);
 $s2=trim($_POST['rmob']); 
 $sql    = "select * from student27 where regno='".$s1."' ";
  print $sql;
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo "DB Error, could not query the database\n";
     echo 'MySQL Error: ' . mysql_error();
    }
if($row = mysqli_fetch_assoc($result)) 
 { 
 if($row['cno1']==$s2 or $row['cno2']==$s2)
  { 
       if(!($s->iswritten($s1)))
      {
          print "<h2>Check Your Register Number  - You May not Completed your Exam </h2>";
      die();
      }
      $_SESSION['regno']=$s1;
header("location:showdetails.php"); 
  }
  else {
       echo "<h2> Incorrect Password, Enter Correct Password!!</h2>";
}
}
else
{
echo " <h2>Invalid Register Number</h2>";
} 

 ?>

 