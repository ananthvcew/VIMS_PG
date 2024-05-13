<link href="assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
  <style type="text/css"> 
    .card{
        background-color: navy!important;
        color:white!important;
    }
  </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   
<div class='card'>Vivekanandha Merit Scholarship Entrance Exam (Online)-<?=date('Y')?>  Result Details</div>
<table id="example1" class="table table-bordered table-striped" >
  <thead>
    <tr>
      <th>S.No</th>
      <th>Regno</th>
      <th>Name of the Candidate</th>
      <th>Branch</th>
      <th>Exam Language</th>
      <th>Preperence</th>
      <th>Mark</th>
      <th>Date Of Birth</th>
      <th>Place</th>
      <th>Taluk</th>
      <th>District</th>
      <th>Pincode</th>
      <th>Contact Number</th>
      <th>Community</th>
      <th>Referal Details</th>
    </tr>
  </thead>
  <tbody>
<?php
//die();
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
  $sql2="select * from result order by regno,preperence ASC, mark DESC";
      $res2=mysqli_query($link,$sql2);
      if(!$res2){
        echo "Error to get Result";
      }
      $i=0;
      while($row2=mysqli_fetch_assoc($res2)){
        $i=$i+1;
        echo "<tr><td>".$i."</td><td>".$row2['regno']."</td><td>".$row2['name']."</td><td>".$row2['branch']."</td><td>".$row2['examlang']."</td><td>".$row2['preperence']."</td><td>".$row2['mark']."</td><td>".$row2['dob']."</td><td>".$s->getstdetail1($row2['regno'],'add1')."</td><td>".$s->getstdetail1($row2['regno'],'city')."</td><td>".$row2['district']."</td><td>".$s->getstdetail1($row2['regno'],'add2')."</td><td>".$row2['cno1'].", <br>".$row2['cno2']."</td><td>".$row2['community']."</td><td>".$row2['ref'].", <br>".$row2['length']."</td></tr>";
      }
?>
</tbody></table>

