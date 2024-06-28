<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
include('top.php');
?><br><br>
<div class='headmenu'>Vivekanandha Merit Scholarship Entrance Exam(Online) -<?=date('Y')?> Results </div>
<form action='result.php' method="post">
<div class='container'>
	<div class='road row'>
		<div class='col-lg-2'></div>
		<div class='col-lg-4'>UG Register Number (Registered with VIMS) <br>UG பதிவு எண் </div>
		<div class='col-lg-4'><input type='text' name='regno' class='form-control'></div>
		<div class='col-lg-2'></div>
	</div>
	<div class='road row'>
		<div class="col-lg-12 text-center"><input type="submit" name="save" value="View" class="btn btn-primary"/></div>
	</div>
</div>
</form>