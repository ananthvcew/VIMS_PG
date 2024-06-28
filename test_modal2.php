<?php
session_start();
include'includes/config.php';
include'top.php';
error_reporting(0);
?>
<style type="text/css">
	.headmenu{
		margin-top: -50px!important;
	}
</style>
<div class='headmenu'>
	Online Vivekanandha Merit Scholarship Entrance Exam <?=date('Y')?> / விவேகானந்தா மெரிட் ஸ்காலர்ஷிப் நுழைவுத் தேர்வு - <?=date('Y')?> <br> (Only for Girls/மாணவிகள் மட்டும்)
</div>
<script>
function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
function pause() {
 // window.alert('You Moved out this Window (Violated the examination rules), You Cannot proceed with the exam, Contact  Your Invigilator or Technical HelpLine');
//window.close();
}
    window.addEventListener('blur', pause);
     window.addEventListener('beforeunload', pause);
 </script>
<style type="text/css">
	.mm{
		width:400px;
		height: 300px;
		background-color: rgba(128,0,128,.5);
		margin: auto;
		margin-top: 30px;
		padding: 10px;
	}
	.mm2{
		width:500px;
		height: 200px;
		background-color: rgba(128,0,128,.5);
		margin: auto;
		margin-top: 30px;
		padding: 5px;
		color: white;
	}
	.testArea{
	    height:80px;
	    overflow :auto;
	}
	.list_ques{
	    height:300px;
	    overflow :auto;
	}
	#tabletext{
		font-size: 25px;
		color: white;
	}
	.test{
		width:60px;
		margin: 5px;	
	}
	a:hover{
		text-decoration: none;
		color:red;
	}
</style>
<?php
require('conn.php');
$s=new DBCON();
$link=$s->linkarivu(); 
$scode=$_SESSION['scode']!=''?$_SESSION['scode']:$_POST['scode'];

//echo $scode;
// print_r($_SESSION);
$exam=$_POST['tcode'];
$tim=$_POST['tim']!=''?$_POST['tim']:3600;
//print "<form name=f1><input type=hidden name=time1 id='time1' value=$tim></form> ";
//$ql[]=array();$ques[]=array();
$t=0;
for($z=1;$z<=50;$z++){$t++;
    $qno[]=$t;
    
}

shuffle($qno);
// for($z=1;$z<=30;$z++){$t++;
//     $qno1[$z]=$t;
    
// }
// shuffle($qno1);
// $t=21;
// foreach($qno1 as $tt)
// {$qno[$t]=$tt;
// $t++;
// }

//array_merge($qno, $qno1);
//print_r($_SESSION);
//echo $scode;
$dcode=substr($_SESSION['regno'],2,3);
$sql="select * from tmark where regno='".$_SESSION['regno']."' and scode='".$scode."' and lang='".$exam."' and (type='a')";
$res=mysqli_query($link,$sql);
if(!$res){
    echo"error to get data";
}
while($resp=mysqli_fetch_assoc($res)){
    $regno=$resp['regno'];
    $remark=$resp['remarks'];
$_SESSION['rtime']=$resp['rtime'];
$set=$resp['set'];
}
// $dd=rand(1,4);
// if($dd==1){
//     $set='s1';
// }
// else{
//    $set='s2'; 
// }
// echo $set;
if($_SESSION['rtime']==''){
echo"<input type=hidden name=time1 id='time1' value=$tim>";
}else{
echo"<input type=hidden name=time1 id='time1' value='".$_SESSION['rtime']."'>";
}
if($remark==1){
    echo"You have allready completed exam";
}else{
if($regno==''){
	//echo "hi";
	$dd=$s->getSet();
	//print_r($dd);
	//die();
	$k=array_rand($dd);
	$set=$dd[$k];
	$sql2="insert into tmark values('".$_SESSION['regno']."','q','".$scode."','".$exam."','".$set."',";
	$sql3="insert into tmark values('".$_SESSION['regno']."','a','".$scode."','".$exam."','".$set."',";
// 	$sql2=$sql2."'q',";
// 	$sql3=$sql3."'a',";
	foreach($qno as $key => $ql){
		$sql2=$sql2.$ql.",";
		$sql3=$sql3."'q',";
	}
	
	$_SESSION['rtime']=$tim;
	$sql2=$sql2."0,".$tim.",0)";
	$sql3=$sql3."0,".$tim.",0)";	
 //	echo$sql2;
 	//echo$sql3;
//  die();
	$res2=mysqli_query($link,$sql2);
	$res3=mysqli_query($link,$sql3);
//	print $res2;
	if(!$res2 and !$res3){
		echo"Error to insert...";
		$gift=0;
	}
	else{
		$gift=1;
	}
}
else{
    $gift=1;

}

if($gift==1){
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered" style="color:navy;">
				<thead>
					<tr>
						<th>Welcome: <?php echo $_SESSION['name']." (".$_SESSION['regno'].")";  ?></th><th rowspan="2" width='17.5%' id='qaInfo'></th></th><th width='17.5%' rowspan="2">
							<h5 style="color:#0000FF" align="center">
 Time Remaining: <br><span id='timer'>< /span>
 </h5><i id='ansDetail'></i>
  

<script>
	//define your time in second
         //var tim=3600;
         var tim=$("#time1").val();
      // alert(tim);
		var c=tim;
        var t;
        timedCount();

        function timedCount()
		{

        	var hours = parseInt( c / tim) % 24;
        	var minutes = parseInt( c / 60 ) % 60;
        	var seconds = c % 60;

        	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
                
             $("#time1").val(c);
        	$('#timer').html(result);
            if(c == 0 )
			{
			   // alert("Your Exam Time Completed");
            	//setConfirmUnload(false);
                //$("#quiz_form").submit();
				window.location="test4.php";
			}
            c = c - 1;
            t = setTimeout(function()
			{
			 timedCount()
			},
			1000);
        }
	</script>

						</th>
					</tr>
					<tr>
						<th>Subject: <?php echo $_POST['scode']; ?></th>
					</tr>
				</thead>
			</table>
</div>
		</div>
		<div class="row border">

		<div class="col-lg-9"><?php
		$sql4="select * from tmark where scode='".$scode."' and type='q' and lang='".$exam."' and regno='".$_SESSION['regno']."'";
		$res4=mysqli_query($link,$sql4);
		if(!$res4){
			echo"Error to get data";
		}
		$tot=0;
		while($row4=mysqli_fetch_assoc($res4)){
			//$scode=$row4['subcode'];

			for($j=1;$j<=50;$j++){
			$quesion="q".$j;
			$qno=$row4[$quesion];
			$an=$s->getans($scode,$_SESSION['regno'],$quesion,$exam,$set);
		//	echo $an;
			//$tcode='tcode';
			$tot++;
					echo'<div class="hide test$j" id='.$tot.'><i class="font-weight-bold">Question No.: '.$tot.'</i>';	
//             $sql10="select * from common_subject where com_scode='".$scode."'";
//             $result10=mysqli_query($link,$sql10);
//             if(!$result10){
//             $sql6="select * from ques where subcode='".$scode."' and qno=".$qno;
//             }
            
//             while($row10=mysqli_fetch_assoc($result10)){
//             if($row10['com_scode']==$scode{
//             $sql6="select * from ques where subcode='".$row10['que_scode']."' and qno=".$qno;
//             }else{
//             $sql6="select * from ques where subcode='".$scode."' and qno=".$qno;
//             }
//             }
            
            
			
            $sql6="select * from ques where subcode='".$scode."' and tcode='".$exam."' and qset='".$set."' and qno=".$qno;
            
              
					
				// 	echo $sql6;
echo"<table class='table table-borderless table-hover'>";
$result = mysqli_query($link,$sql6);  
if (!$result) {
     echo "DB Error, could not query the database----";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 {
    // $now = time();
 //echo $now;
//Calculate how many seconds have passed.
//$timeSince = $now - $_SESSION['timer'];
//$min=$timeSince/60;
//$sec=$timeSince%60;
//$min1=60-$min;
//$sec1=60-$sec;
//$rt=$min1.":".$ec1;
//print "<script> 	$('#timer').html($rt); </script>";

   $filename1='pict/'.$scode.'e'.$tcode.'qq'.$qn.'q.jpg';
   $filename2='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a1.jpg';
 $filename3='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a2.jpg';
 $filename4='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a3.jpg';
 $filename5='pict/'.$scode.'e'.$tcode.'qq'.$qn.'a4.jpg';
   $qs=$quesion;
     $nam="ans".$tot;
//print$nam;
 if (file_exists($filename1)) 
 {  // echo "The file $filename1 exists".$filename1;
 if(strlen($row['question']) > 100)
 print "<tr ><td colspan='2' id='tabletext3'><div class='testArea'> ". ($tot) .". " .trim(base64_decode($row['question']));
 else
 print "<tr ><td colspan='2' id='tabletext3'><div class='testArea'> ". ($tot) .". " .trim(base64_decode($row['question']));
 print "</div><br><img src='".$filename1."' width=500 height=300/></td></tr>" ;
 }
 else 
  {//print strlen($row['question']);
      if(strlen($row['question']) > 100)
 print "<tr ><td colspan='2' id='tabletext3'> " .trim(base64_decode($row['question']))."</td></tr>" ;
 else
  print "<tr ><td colspan='2' id='tabletext3'><div class='testArea'> " .trim(base64_decode($row['question']))."</div></td></tr>" ;
 }if (file_exists($filename2)) 
 {  if($an=='A')
     print" <tr><td  colspan='2' id='tabletext3'><input type=radio  class='radio' checked = true name='".$nam."' id='".$nam."' value='A'> A. ".   base64_decode($row['opt1']) ;
    else
     print" <tr><td  colspan='2' id='tabletext3'><input type=radio  class='radio'  name='".$nam."' id='".$nam."' value='A'> A. ".   base64_decode($row['opt1']) ;
 print "<br><img src='".$filename2."' width=500 height=200 /></td></tr>" ;
 }
 else
 {if($an=='A')
 print "<tr><td  colspan='2' id='tabletext3'><input type=radio name='".$nam."' class='radio'  id='".$nam."' checked = true value='A'> A. ".  base64_decode($row['opt1'])."</td></tr>" ;
  else
  print "<tr><td id='tabletext3'><input type=radio name='".$nam."' class='radio'  id='".$nam."' value='A'> A. ".  base64_decode($row['opt1'])."</td></tr>" ;
 }
  
  
   if (file_exists($filename3)) 
    { if($an=='B')
     print" <tr><td colspan='2' id='tabletext3'><input type=radio  checked = true class='radio' id='".$nam."' name='".$nam."' value='B'> B. ".   base64_decode($row['opt2']) ;
     else
        print" <tr><td colspan='2' id='tabletext3'><input type=radio class='radio' name='".$nam."' id='".$nam."' value='B'> B. ".   base64_decode($row['opt2']) ;
 print "<br><img src='".$filename3."'  width=500 height=200 /></td></tr>" ;
 }
 else
   {if($an=='B')
     print" <tr><td colspan='2' id='tabletext3'><input type=radio class='radio' checked = true name='".$nam."' id='".$nam."' value='B'> B. ".   base64_decode($row['opt2']) ;
     else
       print "<tr><td colspan='2' id='tabletext3'> <input type=radio name='".$nam."' id='".$nam."' value='B'> B.".  base64_decode($row['opt2'])."</td></tr>" ;
   }
    if (file_exists($filename4)) 
 { if($an=='C')
     print" <tr><td colspan='2' id='tabletext3'><input type=radio class='radio' checked = true name='".$nam."' id='".$nam."' value='C'> C. ".   base64_decode($row['opt3']) ;
     else
          print" <tr><td colspan='2' id='tabletext3'><input type=radio class='radio' name='".$nam."' id='".$nam."' value='C'> C. ".   base64_decode($row['opt3']) ;
 print "<br><img src='".$filename4."' width=500 height=200 /></td></tr>" ;
 }
 else
 {
 if($an=='C')
     print" <tr><td colspan='2' id='tabletext3'><input type=radio  checked = true class='radio' id='".$nam."' name='".$nam."' value='C'> C. ".  base64_decode($row['opt3']) ;
 else
 print "<tr><td colspan='2' id='tabletext3'><input type=radio name='".$nam."' class='radio' id='".$nam."' value='C'> C.".  base64_decode($row['opt3'])."</td></tr>" ;
 }
 if (file_exists($filename5)) 
  {if($an=='D')
     print" <tr><td colspan='2' id='tabletext3'><input type=radio  checked = true class='radio' id='".$nam."' name='".$nam."' value='D'> D. ".   base64_decode($row['opt4']) ;
     else
      print" <tr><td colspan='2' id='tabletext3'><input type=radio class='radio' id='".$nam."' name='".$nam."' value='D'> D. ".   base64_decode($row['opt4']) ;
 print "<br><img src='".$filename5."' width=500 height=200 /></td></tr>" ;
 }
 else
 { if($an=='D')
     print" <tr><td colspan='2' id='tabletext3'><input type=radio  checked = true class='radio' id='".$nam."' name='".$nam."' value='D'> D. ".   base64_decode($row['opt4']) ;
   else
 print "<tr><td colspan='2' id='tabletext3'> <input type=radio name='".$nam."' class='radio' id='".$nam."' value='D'> D.".  base64_decode($row['opt4'])."</td></tr>" ;
}
}
echo"<tr><td><input type='hidden' id='qqnopre".$tot."' value='$qno'><input type='hidden' id='topicpre".$tot."' value='".$set."'><span class='btn btn-primary text-left pre' id='pre".$tot."'>Previous</sapn></td><td class='text-right'><input type='hidden' id='qqnonext".$tot."' value='$qno'><input type='hidden' id='topicnext".$tot."' value='".$exam."'><input type='hidden' id='qsnext".$tot."' value='".$qs."'><span class='btn btn-primary next' id='next".$tot."'> Save & Next</sapn></td></tr>";

            echo"</table>";



					
					echo'</div>';	
		}
		}
		
		?>
		</div>
		<div class="col-lg-3 text-left list_ques border">
			<?php
				$sql="select * from tmark where scode='".$_POST['scode']."' and regno='".$_SESSION['regno']."' and type='q'";
				// 	echo $sql;
				$res=mysqli_query($link,$sql);
				if(!$res)
				{
				echo"Error to get data" ;
				}$tot=0;$tot1=100;
				while($row=mysqli_fetch_assoc($res)){
					//print_r($row);
					for($i=1;$i<=50;$i++){
						//$tcode=$row['tcode'];
						$quesion1="q".$i;
						$tot++; $tot1++;
						$qno1=$row[$quesion1];
						$an=$s->getans($scode,$_SESSION['regno'],$quesion1,$exam,$set);
						
						if($an=='q'){
						    echo"<a class='text-white' href='#".$tot."'><button class='btn btn-primary test' id='".$tot1."' >".$tot."</button></a>";
						}elseif($an==''){
						    echo"<a class='text-white' href='#".$tot."'><button class='btn btn-warning test' id='".$tot1."' >".$tot."</button></a>";
						}
						elseif($an=='A'||$an=='B'||$an=='C'||$an=='D'){
						    echo"<a class='text-white' href='#".$tot."'><button class='btn btn-success test' id='".$tot1."' >".$tot."</button></a>";
						}
						else{
						    echo"<a class='text-white' href='#".$tot."'><button class='btn btn-primary test' id='".$tot1."' >".$tot."</button></a>";
						}
				}
				}
					
				?>
		</div>
	</div>
</div>
<?php
}}
?>
</div>
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Submission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class='form-row'>
              <div class='form-group col-lg-12 count'></div>
          </div>
          <div class='form-row'>
              <div class='form-group col-lg-12 confirm'>Are sure you want submit the exam</div>
          </div>
          <div class='form-row'>
          <div class='form-group col-lg-4'></div><div class='col-lg-5'><a href='test4.php' class='btn btn-success btn-sm btn-block'> SUBMIT  & EXIT </a></div><div class='col-lg-3'><button type="button" class="btn btn-danger btn-sm btn-block" data-dismiss="modal">CANCEL</button></div>
          </div>
        
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade onemark" id="onemark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Maximun Count Reached</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class='row'>
              <div class='col-lg-12 msg'>You have completed Part(A). Part (B) Questions start from question no. 21  </div>
          </div>
          <!--<div class='row'>-->
          <!--<div class='col-lg-8'></div><div class='col-lg-2'><a href='test4.php' class='btn btn-success btn-sm'>
</a></div><div class='col-lg-2'><button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button></div>-->
          <!--</div>-->
        
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="twomark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Maximun Count Reached</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class='row'>
              <div class='col-lg-12 msg2'>Your have attented max 20 question in 2 mark<br>If you want to submit the exam click "SAVE" button</div>
          </div>
          <div class='row'>
          <div class='col-lg-8'></div><div class='col-lg-2'><a href='test4.php' class='btn btn-success btn-sm'>Save</a></div><div class='col-lg-2'><button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button></div>
          </div>
        
        
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	   	$(".hide").hide();
		$("#1").show();
		$(".pre").addClass('disabled');
   		$(".test").click(function(){
			var id=(this.id);
			var id=id-100;
			$(".hide").hide();
			$("#"+id).show();

		});
		$(".test").first().click();
        $(".clear").click(function(){
        //$(".clear").html('End Exam');
        var nextId=(this.id);
			var id=(this.id).substring(5,200);
             var qs=id;
            // alert(qs);
			var nextt=("topic"+nextId);
			var topiccode=$("#"+nextt).val();
			var id=Number(id)+Number(100);
         var time1=$("#time1").val();
			$.ajax({
				type:"POST",
				url:"clearTest.php",
            	dataType:"json",
				data:{"qs":qs,"scode":'<?=$scode?>',"tcode":topiccode,"testCode":'<?=$examno?>',"regno":'<?=$_SESSION['regno']?>',"time1":time1},
				success: function(res){
                // alert(qs);
                //alert(res);                
                  console.log(res);
				    if(res.status=='Done'){
                      // alert(qs);
                    $("input[name='ans"+qs+"']:checked").prop("checked",false);
                  //  $("input[name='ans"+qs+"']:checked").val('');
                   // $('#ans'+qs).prop("checked",false);
                    $("#ansDetail").html(res.quesBal);
;
                    //$(":checked")=false;
				       //$("#ansDetail").html(res.quesBal);  
				    }
				    if(res.ans=='A' || res.ans=='B' || res.ans=='C' || res.ans=='D'){
				        $('#'+id).removeClass('btn-primary');$('#'+id).removeClass('btn-warning');
                     	$('#'+id).addClass('btn-success');
                    //$("#ansDetail").html(res.quesBal); 
				    }
				    else if(res.ans==null || res.ans=='q'){
				        $('#'+id).removeClass('btn-primary');
                     	$('#'+id).addClass('btn-warning');
                    	//$('#ans'+qs).prop("checked",false);
                     //$("input[name='ans"+qs+"']:checked").prop("checked",false);
                    	// $("#ansDetail").html(res.quesBal);                     
				    }
//                 	if(res.tot1==10){
//                     	if(res.tot<30){
//                         $(".onemark").modal("show");
//                         $(".msg").html("Your have attented max 10 question in 1 markYou have completed Part(A). Part (B) Questions start from question no. 21");
//                         }else{
//                          $("#twomark").modal("show");
//                          $(".msg2").html("You have attented 10 questions in 1 mark & 20 questions in 2 mark<br>If you want to submit the exam click 'SAVE' button");
//                         }
//                     }
//                 	if(res.tot2==20){
//                     	if(res.tot<30){
//                         $(".onemark").modal("show");
//                         $(".msg").html("Your have attented max 20 question in 2 mark");
//                         }else{
//                          $("#twomark").modal("show");
//                          $(".msg2").html("You have attented 10 questions in 1 mark & 20 questions in 2 mark<br>If you want to submit the exam click SAVE button");
//                         }
                    	
//                     }
                
// 				    if(res.status!='Done'){
// 				        $("#"+res.status).modal("show");
// 				    }
// 				    if(res.remark==3){
// 				        window.location='examClosed.php';
// 				    }
// 					console.log(res);
// 					var qqno=nextId.substring(5,200);
// 					var qq=Number(1);
// 					var qqno1=Number(qqno)+qq;
// 					var next_id=qqno1+100;
// 					var qqno=nextId.substring(5,200);
// 					var qq=Number(1);
// 					var qqno1=Number(qqno)+qq;
// 					var next_id=qqno1+100;
// 					$("#"+next_id).click();
					
				}
			});
        
        
        
        
        })
		$(".test").click(function(){
			if($(".test").last().attr('id')==(this.id)){
				$(".next").html('End Exam');
				var  id=(this.id)-100;
            $(".next").attr('id','next'+id)
				// $(".next").attr('id','submit'+id)
				// $(".next").addClass("submit")
			}else{
				$(".next").html('Save&Next');
				var  id=(this.id)-100;
				$(".next").attr('id','next'+id)
			}
		})
		$(".next").click(function(){
		   var id=(this.id);
		   var id1=id.substring(0,6);
		   if(id1=='submit'){
		       $("#confirm").modal('show');
		   }
		});
		
		$(".test").click(function(){
			if($(".test").first().attr('id')==(this.id)){

				$("#pre"+((this.id)-100)).addClass('disabled');
			}
			else{
				$("#pre"+((this.id)-100)).removeClass('disabled');
			}
		});
		$(".next").on('click',function(){
			var nextId=(this.id);
			//alert(nextId);
			var q=$("#qs"+this.id).val();
			var qs=q;
			var id=(this.id).substring(4,200);
			var nextt=("topic"+nextId);
			var topiccode=$("#"+nextt).val();
			var ans=$("input[name='ans"+id+"']:checked").val();
			var id=Number(id)+Number(100);
            var time1=$("#time1").val(); 
			$.ajax({
				type:"POST",
				url:"saveTest.php",
				dataType:"json",
				data:{"ans":ans,"qs":qs,"scode":'<?=$scode?>',"tcode":topiccode,"testCode":'<?=$set?>',"regno":'<?=$_SESSION['regno']?>',"time1":time1},
				success: function(res){
                console.log(res);
				    if(res.status=='Done'){
				        var bal=Number(50)-Number(res.tot);
				       $("#qaInfo").html("Total No Questions: <b>50</b><br> Answered : <b>"+res.tot+"</b> <br>Remaining : <b>"+bal+"</b>");  
				    }
				    if(res.ans=='A' || res.ans=='B' || res.ans=='C' || res.ans=='D'){
				        $('#'+id).removeClass('btn-primary');$('#'+id).removeClass('btn-warning');
                     	$('#'+id).addClass('btn-success');
                   		 // $("#ansDetail").html(res.quesBal);  
				    }
				    else if(res.ans==null){
				        $('#'+id).removeClass('btn-primary');
                     	$('#'+id).addClass('btn-warning');
				    }
                // 	if(res.tot1==10 && (res.tot==10 || (res.tot==20 && res.tot2==20)) ){
                //     	if(res.tot<30){
                //         $(".onemark").modal("show");
                //         $(".msg").html("Your have attented max 10 question in 1 markYou have completed Part(A). Part (B) Questions start from question no. 21");
                //         }else{
                //          $("#twomark").modal("show");
                //          $(".msg2").html("You have attented 10 questions in 1 mark & 20 questions in 2 mark<br>If you want to submit the exam click 'SAVE' button");
                //         }
                //     }
                // 	if(res.tot2==20 && (res.tot==20 || res.tot==30) ){
                //     	if(res.tot<30){
                //         $(".onemark").modal("show");
                //         $(".msg").html("Your have attented max 20 question in 2 mark");
                //         }else{
                //          $("#twomark").modal("show");
                //          $(".msg2").html("You have attented 10 questions in 1 mark & 20 questions in 2 mark<br>If you want to submit the exam click SAVE button");
                //         }
                    	
                //     }
                
				    if(res.status!='Done'){
				        $("#"+res.status).modal("show");
				    }
				    if(res.remark==3){
				        window.location='examClosed.php';
				    }
					console.log(res);
					var qqno=nextId.substring(4,200);
					var qq=Number(1);
					var qqno1=Number(qqno)+qq;
					var next_id=qqno1+100;
					var qqno=nextId.substring(4,200);
					var qq=Number(1);
					var qqno1=Number(qqno)+qq;
					var next_id=qqno1+100;
				//	alert(next_id);
					if(next_id==151){
					   $("#confirm").modal('show');
					   $(".count").html("You have answered "+res.tot+" questions")
					}else{
					   $("#"+next_id).click(); 
					}
					
					
				}
			});
			
		});
		$(".pre").click(function(){
			var nextId=(this.id);
			var qqno=nextId.substring(3,100);
			var qq=Number(1);
			var qqno1=Number(qqno)-qq;
			var next_id=qqno1+100;
			$("#"+next_id).click();
		});
		$(".radio").click(function(){
			//alert(this.name);
			var id=(this.name).substring(3,200);
			var q=$("#qsnext"+id).val();
			var qs=q;
			var id=(this.id).substring(4,200);
			var nextt=("topicnext"+id);
			var topiccode=$("#"+nextt).val();
			var ans=$("input[name='ans"+id+"']:checked").val();
   			var time1=$("#time1").val(); 
// 		var id=Number(id)+Number(100);
			$.ajax({
				type:"POST",
				url:"saveTest.php",
				dataType:"json",
				data:{"ans":ans,"qs":qs,"scode":'<?=$scode?>',"tcode":topiccode,"testCode":'<?=$examno?>',"regno":'<?=$_SESSION['regno']?>',"time1":time1},
				success: function(res){
							}
			});
			
		});
		$(".test").click(function(){
			if($(".test").last().attr('id')==(this.id)){
				var lq=(this.id);
				var lq=lq-100;
				$("#submit"+lq).click(function(){
					//alert();
				});


			}
		});
		$(".submit").click(function(){
		    var nextId=(this.id);
			//alert(nextId);
			var q=$("#qs"+this.id).val();
			var qs=q;
			var id=(this.id).substring(6,200);
			var nextt=("topic"+nextId);
			var topiccode=$("#"+nextt).val();
			var ans=$("input[name='ans"+id+"']:checked").val();
			var id=Number(id)+Number(100);
			$.ajax({
				type:"POST",
				url:"Test4.php",
				data:{"ans":ans,"qs":qs,"scode":'<?=$scode?>',"tcode":topiccode,"testCode":'<?=$examno?>',"regno":'<?=$_SESSION['regno']?>'},
				success: function(res){
				}
			});
		});
    	
	});
</script>
