<?php
include('includes/config.php');
$obj=new ExamDate();
$res=$obj->getExamDate();
//print_r($res);
if($res['id']>0){
if(date("Y-m-d",strtotime($res['es_date']))<=date('Y-m-d')){
	header('Location:index10.php');
}elseif($res['r_status']=='Active'){
	header('Location:registrationForm.php');
}
}
include('top.php');
?>
<div class="row mt-4"><br><br>
	<div style="background-color:purple;color: white;font-weight: bolder; font-size: 20;padding: 30px;box-shadow: 15px 15px 15px gray;border-radius: 30px;text-align: center;">
		Vivekanandha Merit Scholarship Entrance Exam(Online) <?=date('Y')?> Announced Soon....  <br> விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு (ஆன்லைன்) <?=date('Y')?> விரைவில் அறிவிக்கப்படும்
	</div><br><br>
	
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<a href='res.php' class='btn btn-success'>View Result</a>
	</div>
</div>
<?php
include('foot.html');
?>
</body>
</html>







