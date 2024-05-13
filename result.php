<?php
require('html2pdf.php');


error_reporting(0);
    $pdf=new PDF();
    $pdf->SetFont('times','',12);
    $pdf->AddPage();
    // $pdf->Line(5,5,205,5);
    // $pdf->Line(6,6,204,6);
    // $pdf->Line(6,39,204,39);
    // $pdf->Line(6,40,204,40);
    // $pdf->Line(6,46,204,46);
    // $pdf->Line(6,47,204,47);
    // $pdf->Line(5,292,205,292);
    // $pdf->Line(6,291,204,291);
    // $pdf->Line(5,5,5,292);
    // $pdf->Line(6,6,6,39);
    // $pdf->Line(6,40,6,46);
    // $pdf->Line(6,47,6,291);
    // $pdf->Line(205,5,205,292);
    // $pdf->Line(204,6,204,39);
    // $pdf->Line(204,40,204,46);
    // $pdf->Line(204,47,204,291);
   // $pdf->Image('images/faculty/unnamed (1).jpg',163,7,40);
    $pdf->Image('images/faculty/logo1.png',7,7,30);
    
    
$html='';
$html .="<table><tr><td ALIGN='CENTER' width='750px'> <font color='RED' SIZE='29'>VIVEKANANDHA</font>";
$html .="<br><font color='#151F70' SIZE='14'> EDUCATIONAL INSTITUTIONS FOR WOMEN <br> Tiruchengode, Namakkal Dt. & Sankari, Salem Dt.<br><font color='RED' SIZE='15'>www.vivekanandha.ac.in<br><br></td>";
$html .="</tr>";

 $html .="<tr><td ALIGN='CENTER' width='750px' bgcolor='#151F70'><font color='#FBFCFC' SIZE='14'><b>Vivekanandha Merit Scholarship Entrance Exam(Online) -".date('Y')." Results<b><br></td></tr>";   

require('conn.php');
    $s=new DBCON();
    $link=$s->linkarivu();
    $rno=trim($_POST['regno']);
    if($rno<1)
     { print "<h1>Check Your Register Number </h1>";
      die();}
      if(!($s->iswritten($rno)))
      {
          print "<h1>Check Your Register Number </h1>";
      die();
      }
   $sql="select * from result where regno='".$rno."' order by server";
    $res=mysqli_query($link,$sql);
    if($row=mysqli_fetch_assoc($res)){
        $name="<font SIZE='14' color='RED'>Dear ".$row['name']."(".$row['regno'].")<br>";
        $html .="<tr><td>".$name;
        $html .="Welcome to the Vivekanandha Educational Institutions!<br>";
        $html .="<font SIZE='12'  color='#151F70' line-height='100px'>Congratulations, Your Vivekanandha Merit Scholarship Exam - ".date('Y')." mark details are given below:<br>";
//         $range="_________";
// //         $range="_________We are happy to inform that you have been selected for availing the scholarship through Vivekanandha Merit Scholarship Exam - 2022. Kindly refer the tables below for your Grade and fee concession details.";
//         $text = $pdf->WordWrap($range, 200);
// 		$text = explode("\n", $text);
// 		for($i=0;$i<count($text);$i++){
// 		    if($i==0){
// 		       $html .="<font SIZE='12'  color='#151F70'>".str_replace('_',' ',$text[$i])."<br>"; 
// 		    }
// 		    else{
// 		        $html .=$text[$i]."<br>";
// 		    }
// 		}
		//$html .="<b>Vivekanandha Educational Institutions welcomes you to Learn, Safe and Succeed</b><br>";
        // echo ;
        // die();
        $pdf->Image("https://vcew.ac.in/vims/example_001_simple_png_output.php?t=".$row['regno'],156,73,48,48, "png");
		//$pdf->Image('result.png',160,77,40,40);
	   // $html .="<br style='height: 1em;'>";
		$pdf->Line(10,77,200,77);
		$pdf->Line(10,87,160,87);
		$pdf->Line(10,97,160,97);
		$pdf->Line(10,107,160,107);
		$pdf->Line(10,117,200,117);
		$pdf->Line(10,127,200,127);
		$pdf->Line(10,77,10,127);
		$pdf->Line(60,77,60,127);
		$pdf->Line(160,77,160,117);
		$pdf->Line(200,77,200,127);
    // 	$row['total']=96;
		$grade='';
// 		if($row['total']<=50){
// 		    $grade='E';
// 		}
// 		elseif($row['total']>50 && $row['total']<=75){
// 		    $grade='D';
// 		}
// 		elseif($row['total']>75 && $row['total']<=90){
// 		    $grade='C';
// 		}
// 		elseif($row['total']>90 && $row['total']<=95){
// 		    $grade='B';
// 		}
// 		elseif($row['total']>95 ){
// 		    $grade='A';
// 		}
$ms=$row['mark'];
// if($ms<8)
// $ms=8;
	     $html .="<table ><tr><td width='200' height='70'>VIMS Unique Number </td><td width='310' height='65'>".$s->getstdetail1($rno,'at_regno')."</td></tr><tr><td width='200' height='65'>Date of Birth</td><td width='310' height='65'>".date('d-M-Y',strtotime($row['dob']))."</td></tr><tr><td width='200' height='55'>Mark</td><td width='310' height='55'>".$ms."</td></tr>";
	     $html .="<tr><td width='200' height='60'>Exam Language</td><td width='310' height='60'>".$row['examlang']."</td></tr>";
	     $html .="<tr><td width='200' height='60'>HSC Group</td><td width='500' height='60'>".$s->getsubname($row['branch'])."</td></tr></table><br>";
	     
	    // $html .="<table border=1><tr><td colspan='5' width='760' height='50' ALIGN='CENTER' bgcolor='#151F70'><font color='#FBFCFC' size=13><b>Grades & Fee Concession *</font><font color='#151F70'></td></tr><tr><td height='50' width='310' ALIGN='CENTER'>Degree / Course</td><td ALIGN='CENTER' height='50' width='90'>A</td><td ALIGN='CENTER' height='50' width='90'>B</td><td ALIGN='CENTER' height='50' width='90'>C</td><td ALIGN='CENTER' height='50' width='90'>D</td><td ALIGN='CENTER' height='50' width='90'>E</td></tr>";
	    // $html .="<tr><font size=12><td height='60' width='310' >Engineering (B.E./B.Tech.)</td><td height='60'  width='90'>Rs.25,000/-</td><td height='60'  width='90'>Rs.20,000/-</td><td height='60'  width='90'>Rs.15,000/-</td><td height='60'  width='90'>Rs.10,000/-</td><td height='60'  width='90'>Rs.5,000/-</td></tr>";
	    // $html .="<tr><td height='60' width='310' >Arts & Science (BA,B.Sc.,B.Com.,BBA)</td><td  height='60'  width='90'>Rs.8,000/-</td><td  height='60'  width='90'>Rs.7,000/-</td><td  height='60'  width='90'>Rs.6,000/-</td><td  height='60'  width='90'>Rs.5,000/-</td><td  height='60'  width='90'>Rs.3,000/-</td></tr>";
	   //   $html .="<tr><td height='60' width='350' >Paramedical (ANM,Dip.Nurs., B.Sc. Optometry)</td><td  height='60' width='410'   colspan=5>Rs.10,000/-(once)</td></tr></table><table>";
	    //  $html .="<tr><td colspan='5' width='760' height='100'><u>Note* :</u> <br>1. Limited seats only available with the above fee concession for the entire period of study <br>2. Onetime fee concession is also available <br>3. Admission based on FIRST COME FIRST SERVE BASIS <br>4. Terms & Conditions of respective college will apply<br> ";
	   //  foreach($text1 as $key => $value){
	   //    $html .=str_replace('_',' ',$value)."<br>";  
	   //  }
	   
	    // $html .="</td></tr>";
	      $html .="<tr><td colspan='5' width='760' height='75'><font color='red' size=11><u>Contact Admission Office with the following documents :</u></font> <br> <font color='#0000EE' size=12><b> a) Aadhar Card <br> b) 10th Mark Sheet <br> c) +1 Marksheet <br> d) +2 (HSC) Marksheet / +2 (HSC) Hall Ticket <br> e) Community certificate <br> f) TC if available <br> g) Passport size photo 2 Nos and <br> h) Printed or soft copy of VIMS Result. <br> (or) Any Available Certificate ";
	     $html .="</font></td></tr></table>";
	     // $html .="<table border=1><tr><td colspan='2'  ALIGN='CENTER' ><font color='white' bgcolor='navy' size=13></font></td></tr>";
	     // $html .="<tr><td ALIGN='CENTER' ><br></td>";
	     // $html .="<td ALIGN='CENTER' ><br> </td></tr></table>";
    	
    
    // $html .="<tr><td colspan='5' width='760' ALIGN='CENTER' ><font color='red' size=13>For further details & Admission Contact <br> </font></td></tr>";
	     //$html .="<tr><td colspan='5' width='760' ALIGN='CENTER' ><font color='#151F70' size=13>Website Developed & Maintained by Software Development Cell / Vivekanandha College of Engineering Women</font></td></tr></table>";
    }

        // $pdf->Ln(14);
      $pdf->WriteHTML($html);
		$pdf->Ln(6)	;
		$pdf->SetTextColor(255,0,0);
    	$pdf->Cell(190,6,"For further details & Admission Contact",1,0,"C");
		$pdf->Ln(6)	;$pdf->SetFillColor(230,230,0);
		$pdf->SetTextColor(6, 57, 112);
    	$pdf->Cell(95,6,"Sankagiri Campus",'TL',0,"C");
    	$pdf->Cell(95,6,"Tiruchengode Campus","TLR",0,"C");
		$pdf->Ln(6)	;
		$pdf->SetTextColor(255,0,0);
		$pdf->Cell(95,6,"94425 34564 & 97888 54417",'BL',0,"C");
    	$pdf->Cell(95,6,"94437 34670 & 99655 34670","BLR",0,"C");
    $pdf->Output('I',$row['regno'].'.pdf');
?>