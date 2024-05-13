<?php
include('top.php');
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu();
?>
<div class='headmenu'>Student Data Verification</div>
<form action="dataverify1.php" method="post">
<div class='container' >
	<div class='road row'>
		<div class='col-lg-2'></div><div class="col-lg-4">Student Register No</div><div class="col-lg-4"><input type="text" name='regno' class="form-control"/></div><div class='col-lg-2'></div></div>
	
		<div class="road row">
		<div class="col-lg-12 text-center"><br><input type="submit" value="GO" name="go" class="btn btn-primary"/></div>
	</div>
</div>
</form>

<?php
include('foot2.php');

?>