<?php
include'includes/config.php';
$obj=new Student();
$res=$obj->studentNamelistFromDataList();
$obj1=new Tmark();
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>VIMS 2023</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src='images/logo2.png' width='50%'></a>
   <!--  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      
    </div> -->
  </div>
</nav>
<style type="text/css">
  .list-group{
    padding: 10px!important;
  }
  .list-group-item{
    margin: 10px!important;
    height: 150px!important;
    color: navy !important;
  }
  .list-group-item:hover{
    background-color: green!important;
    color: white!important;
    box-shadow: 0px 10px 0 0 red!important;
  }
  .dataBtn:hover{
    background-color: green!important;
    color: white!important;
    box-shadow: 0px 2px 0 0 red!important;
    
  }
  .active{
    background-color: green!important;
    color: white!important;
    font-weight: bolder!important;
    border: none!important;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="theme.bootstrap_4.css">
<link rel="stylesheet" href="jquery.tablesorter.pager.css">
  <style>
  .tablesorter-pager .btn-group-sm .btn {
    font-size: 1.2em;
  }
  </style>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card text-center" style="padding: 5px;color:white;font-weight: bolder;background-color: navy;line-height: 20px;">Vivekanandha Merit Scholarship Entrance Exam(Online) Registration <?=date("Y")?> / விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - <?=date("Y")?><br>
(Only for Girls/மாணவிகள் மட்டும்) </div>
  </div>
</div></div>
  <div class='row'><div class='col-lg-12 text-right'><br><a href='logout.php' class='btn btn-danger'>Logout</a></div></div>
<div class="row">
  <div class="col-lg-12">
<table class="table">
                         <tr>
            <th class="ts-pager">
                <div class="form-inline">
                    <div class="btn-group btn-group-sm mx-1" role="group">
                        <button type="button" class="btn first" title="first"><i class="fa fa-backward" aria-hidden="true"></i></button>
                        <button type="button" class="btn prev" title="previous"><i class="fa fa-caret-left fa-lg" aria-hidden="true"></i></button>
                    </div>
                    <label class="pagedisplay"></label>
                    <div class="btn-group btn-group-sm mx-1" role="group">
                        <button type="button" class="btn  next" title="next"><i class="fa fa-caret-right fa-lg" aria-hidden="true"></i></button>
                        <button type="button" class="btn  last" title="last"><i class="fa fa-forward" aria-hidden="true"></i></button>
                    </div>
                    <select class="form-control-sm custom-select pagesize" title="Select page size">
                        <option selected="selected" value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="all">All Rows</option>
                    </select>
                           
                </div>
            </th>
            <th class="text-white bg-success text-center"><div id='countdown'></div></th>
            
            
        </tr>
                    </table>
    
<table class="table table-bordered tablesorter table_filter">
  <thead>
    <tr>
      <th>S.No</th><th>Reg. No</th><th>Student Name</th><th>Contact No 1</th><th>Contact No 2</th><th>Father Name</th><th>District</th><th class="filter-select filter-exact" data-placeholder="group">PG Preference</th><th class="filter-select filter-exact" data-placeholder="status">Exam Status</th><th>Total Questions Answerd</th><th>Time Remaining</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=0;
    foreach ($res as $row) {
      $i=$i+1;
      $tmark=$obj1->getExamStatus($row['regno']);
      //print_r($tmark);
      //die();
      echo "<tr><td>$i</td><td>".$row['regno']."</td><td>".$row['name']."</td><td>".$row['cno1']."</td><td>".$row['cno2']."</td><td>".$row['fathername']."</td><td>".$row['district']."</td><td id='branch".$row['regno']."' ondblclick='myChange(this)' data-val='".$row['preperence']."' data-regno='".$row['regno']."' data-name='branch'>".$row['preperence']."</td>";
      echo"<td  id='status".$row['regno']."' ondblclick='myChange1(this)' data-val='".$tmark['status']."' data-regno='".$row['regno']."' data-name='status' data-rm='".$tmark['remark']."'>";
      if($tmark['status']==0){
        print"<font class='btn btn-danger'>Yet to Start</font>";
      }else{
        if($tmark['remark']==0){
            print "<font color='Yellow' class='btn btn-primary'>Partially Completed</font>";
        }else{
            print "<font  class='btn btn-success'>Completed</font>";
        }
      } 
      echo"</td><td>".$tmark['totqa']."</td>";
      echo"<td id='rtime".$row['regno']."' ondblclick='myChange(this)' data-regno='".$row['regno']."' data-name='rtime'>".$tmark['rt']." Min</td></tr>";
    }

    ?>
  </tbody>
  </div>
</div>
</table></div></div>
<footer>
<div class="row">
  <div class="col-lg-12 text-center" style="background-color:lightgray;color: white;">
    Website Developed & Maintained by Software Development Cell / Vivekanandha College of Engineering for Women 
  </div>
</div>
</footer>


  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
<script type="text/javascript">
  function myChange(elem){
    var name=$(elem).data("name");
    var regno=$(elem).data("regno");
    if(name=='examlang'){
      //var exlg=$(elem).data("val");
      var field ="<select data-name='examlang' name='examlang' data-regno='"+regno+"' class='form-control lang' onchange='saveMyData(this)' id='lang"+regno+"'>";      
              field +="<option value=''>Select Language</option>";
              field +="<option>Tamil</option>";      
              field +="<option>English</option>";
              field +="</select>";

      $("#"+elem.id).html(field)
    }else if(name=='branch'){
     var exlg=$(elem).data("val");
      var field ="<select data-name='preperence' name='preperence' data-regno='"+regno+"' class='form-control lang' onchange='saveMyData(this)' id='bran"+regno+"'>";      
              field +="<option value=''>Select Preference</option>";
              field +="<option>M.A Tamil</option>";      
              field +="<option>M.A English</option>";
              field +="<option>M.Sc Computer Science</option>";
              field +="<option>M.Sc Microbiology</option>";
              field +="<option>M.Sc Biochemistry</option>";
              field +="<option>M.Sc Nutrition & Dietetics</option>";
              field +="<option>M.Sc Mathematics</option>";
              field +="<option>M.Sc Physics</option>";
              field +="<option>M.Sc Chemistry</option>";
              field +="<option>M.Sc Botany</option>";
              field +="<option>M.Sc Zoology</option>";
              field +="<option>M.Sc Applied Psychology</option>";
              field +="<option>M.Sc Costume Design & Fashion</option>";
              field +="<option>M.Com</option>";
              field +="<option>M.B.A</option>";
              field +="<option>M.C.A</option>";
              field +="</select>";

      $("#"+elem.id).html(field)
    }else if(name=='rtime'){
      var field ="<select data-name='rtime' name='rtime' data-regno='"+regno+"' class='form-control ' onchange='saveMyData1(this)' id='rtime"+regno+"'>";      
              field +="<option value=''>Select Time</option>";
              field +="<option value='10'>10 Minite</option>";      
              field +="<option value='20'>20 Minite</option>";      
              field +="<option value='30'>30 Minite</option>";      
              field +="<option value='40'>40 Minite</option>";      
              field +="<option value='50'>50 Minite</option>";      
              field +="<option value='60'>60 Minite</option>";                 
              field +="</select>";
      $("#"+elem.id).html(field)
    }
  }
  function myChange1(elem){
    var name=$(elem).data("name");
    var regno=$(elem).data("regno");
    var status=$(elem).data("val");
    var remark=$(elem).data("rm");
    if (status!=0){
        $.ajax({
          type:"POST",
          url:"ajaxCalls/changeTmark.php",
          dataType:"json",
          data:{"regno":regno,"remark":remark},
          success:function(res){
          if(res.status==0){
          $("#status"+res.regno).html("<font color='Yellow' class='btn btn-primary'>Partially Completed</font>");
          }else if(res.status==1){
          $("#status"+res.regno).html("<font  class='btn btn-success'>Completed</font>");
          }
            
          }
        })      
    }
  }
  function saveMyData(elem){
    var regno=$(elem).data("regno");
    var lang=$(elem).val();
    var area=$(elem).data("name");
    $.ajax({
      type:"POST",
      url:"ajaxCalls/chaneStudentInfo.php",
      dataType:"json",
      data:{"regno":regno,"lang":lang,"area":area},
      success:function(res){
        $("#"+area+res.regno).html(res.lang);
      }
    })
  }
  function saveMyData1(elem){
    var regno=$(elem).data("regno");
    var lang=$(elem).val();
    var area=$(elem).data("name");
    $.ajax({
      type:"POST",
      url:"ajaxCalls/chaneTmarkInfo.php",
      dataType:"json",
      data:{"regno":regno,"lang":lang,"area":area},
      success:function(res){
        $("#rtime"+res.regno).html(res.rtime+" Min");
      }
    })
  }
  $(document).ready(function(){
   setTimeout(function(){ window.location.reload(); }, 120000);

  })
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.text("Auto Referece with in : " + minutes + ":" + seconds +" Minite");
        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}
  jQuery(function ($) {
    var fiveMinutes = 60 * 2, 
        display = $('#countdown');
    startTimer(fiveMinutes, display);
    if (fiveMinutes == 0) {
        window.location.reload();
    }
});
</script>
<script src="jquery.tablesorter.js"></script>
  <script src="jquery.tablesorter.widgets.js"></script>
<script src="jquery.tablesorter.pager.js"></script>

            <script>$(function() {
              $("table").tablesorter({
       theme : "bootstrap",

        widthFixed: true,

        // widget code contained in the jquery.tablesorter.widgets.js file
        // use the zebra stripe widget if you plan on hiding any rows (filter widget)
        // the uitheme widget is NOT REQUIRED!
        widgets : [ "filter"],
        headers: {
        // 7: { sorter: false, filter: false },
        // //6: { sorter: false, filter: false },
        // //5: { sorter: false, filter: false },
        // 8: { sorter: false, filter: false },
        // 9: { sorter: false, filter: false },
        // //3: { sorter: false, filter: false },
        // 10: { sorter: false, filter: false },
        // 11: { sorter: false, filter: false }
        },
        widgetOptions : {
            // using the default zebra striping class name, so it actually isn't included in the theme variable above
            // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
            zebra : ["even", "odd"],

            // class names added to columns when sorted
            // columns: [ "primary", "secondary", "tertiary" ],

            // reset filters button
            filter_reset : ".reset",

            // extra css class name (string or array) added to the filter element (input or select)+
            filter_cssFilter: [
                'form-control',
                'form-control',
                'form-control', // select needs custom class names :(
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control custom-select',
                'form-control custom-select',
                'form-control',
                'form-control'

            ]

        }


    })
    .tablesorterPager({

        // target the pager markup - see the HTML block below
        container: $(".ts-pager"),

        // target the pager page select dropdown - choose a page
        cssGoto  : ".pagenum",

        // remove rows from the table to speed up the sort of large tables.
        // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
        removeRows: false,

        // output string - default is '{page}/{totalPages}';
        // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
        output: '{startRow} to {endRow} of {filteredRows} ({totalRows})'

    });
});

            </script>