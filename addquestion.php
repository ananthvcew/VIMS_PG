<?php 
session_start();
include("top.php");
?>
<div class='row'><div class='col-lg-12 text-right'><br><a href='logout.php' class='btn btn-danger'>Logout</a></div></div>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

  <!-- include libs stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

  <!-- include summernote -->
  <link rel="stylesheet" href="dist/summernote-bs4.css">
  
  <script type="text/javascript" src="dist/summernote-bs4.js"></script>

  <!--<link rel="stylesheet" href="examples/example.css">-->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 200,
        tabsize: 2,
         fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto','latha','bamini'],
            fontNamesIgnoreCheck: ['baamini']
      });
  
    });
  </script>
<style type='text/css'>
.note-toolbar {
    z-index: auto;
}
.card{
        text-align:left !important;
    }
    .dropdown-fontname, .note-toolbar{
        z-index:99999 !important;
    }
</style>
    <div class='card'>Select Subject</div>

  <form name="f1" method="post" action="addquestion1.php" enctype='multipart/form-data'>
<?php
// print_r($_POST);
// die();
$ttype=$_POST['ttype'];
$scode=$_POST['scode'];
$set=$_POST['set'];
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
$qno=$s->gettotques($scode,$ttype,$set);
$qno=$qno+1;
print"<div class='container'>";
print"<div class='road row'>";
print"<div class='col-lg-2'>Q.No</div>";
print"<div class='col-lg-5'><input type='text' name=qno value='".$qno."' class='form-control' readonly /></div></div>";
print"<div class='road row'>";
print"<div class='col-lg-2'>Question</div>";
print"<div class='col-lg-10'> <textarea cols=100 rows=2 name=ques  class='summernote' > </textarea></div></div>";
print"<div class='road row'>";
print"<div class='col-lg-2'>Option A</div><div class='col-lg-10'><textarea cols=100 rows=2 name=opt1 id='opt1'  class='summernote option'  > </textarea></div></div>";
print"<div class='road row'>";
print"<div class='col-lg-2'>Option B</div><div class='col-lg-10'><textarea cols=100 rows=2 name=opt2 id='opt2'  class='summernote option'  > </textarea></div></div>";
print"<div class='road row'>";
print"<div class='col-lg-2'>Option C</div><div class='col-lg-10'><textarea cols=100 rows=2 name=opt3 id='opt3'  class='summernote option'  > </textarea></div></div>";
print"<div class='road row'>";
print"<div class='col-lg-2'>Option D</div><div class='col-lg-10'><textarea cols=100 rows=2 name=opt4 id='opt4'  class='summernote option'  > </textarea></div></div>";
print"<div class='road row'>";
print"<div class='col-lg-2'>Correct Answer</div><div class='col-lg-4'><select  class='form-control' name=cans>";
print "<option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option>";
 print "</select></div><div class='col-lg-2'>Mark</div><div class='col-lg-4'><input type='hidden' name='mark' class='form-control' value=1 readonly></div></div>";
   print"<input type=hidden name=ttype value='".$ttype."'>";
   print"<input type=hidden name=scode value='".$scode."'>";
   print"<input type=hidden name=set value='".$set."'>";
?>
<div class='road row'>
    <div class='col-lg-12 text-center'><input type='submit' class='btn btn-primary'  value='Add Question' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' class='btn btn-primary' value='Clear' /></div>
</div>

 </form>
 <br>
      <footer class="headmenu">
	<div class="contauner text-center ">
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