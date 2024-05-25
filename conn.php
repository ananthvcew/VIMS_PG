<?php
ini_set('date.timezone', 'Asia/Kolkata');
class dbcon
{protected $link;

function linkarivu()
{	$link=null;
	$link = mysqli_connect('localhost', 'root', 'vcew@123','vims_pg');
	// $link = mysqli_connect('localhost', 'user', 'vims@2024','vims');
	 if (!$link){
	     die('Could not connect:12 ' . mysqli_error());   }
	 else
	{
 	/*if (!mysql_select_db('vcewac_vcew', $link)) {
     		echo 'Could not select database';
     		exit;    }
	else */ 
	 return $link;
	}
}
function getcount($lang)
{
	$link=$this->linkarivu();
	$sql="select count(sid) from student where examlang='".$lang."'";
//	print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(sid)'];
	}
	else
		return 0;

}
function getmaxcount()
{
	$link=$this->linkarivu();
	$sql="select max(id) from student";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['max(id)'];
	}
	else
		return 0;

}

function getdistrictc($district)
{
	$link=$this->linkarivu();
	$sql="select count(sid) from student where district='".$district."'";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(sid)'];
	}
	else
		return 0;

}
function getdatec($date)
{
	$link=$this->linkarivu();
	$sql="select count(sid) from student where dor='".$date."'";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(sid)'];
	}
	else
		return 0;

}
function getmaxlog($regno)
{
	$link=$this->linkarivu();
	$sql="select max(id) from log where regno='".$regno."'";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['max(id)'];
	}
	else
		return 0;

}
function gettotal()
{
	$link=$this->linkarivu();
	$sql="select count(sid) from student ";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(sid)'];
	}
	else
		return 0;

}
function getTodayTotal()
{
	$link=$this->linkarivu();
	$sql="select count(sid) from student where date(dor)='".date('Y-m-d')."'";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(sid)'];
	}
	else
		return 0;

}
function getsctotal()
{
	$link=$this->linkarivu();
	$sql="select count(regno) from scholarship ";
//	print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(regno)'];
	}
	else
		return 0;

}
function getsctotal1($dt)
{
	$link=$this->linkarivu();
	$sql="select count(regno) from scholarship where  college like '%$dt%' ";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(regno)'];
	}
	else
		return 0;

}
function getsctotal2($dt1,$dt)
{
	$link=$this->linkarivu();
	$sql="select count(regno) from scholarship where  college like '%$dt1%' and course='$dt'";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(regno)'];
	}
	else
		return 0;

}
function getexst($rno)
{
$l=$this->linkarivu();
	$sql    = "select remarks from  tmark where regno='".$rno."' and type='a' " ;
$result = mysqli_query($l,$sql);  
if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
     if($row['remarks']==1){
         return 'completed';
     }else{
         return 'pending';
     }
 
}
else
return 'Yet To Start';	
}


function gettotal1($dt)
{
	$link=$this->linkarivu();
	$sql="select count(sid) from student where district like '%$dt%' ";
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(sid)'];
	}
	else
		return 0;

}

function getsubcount($m,$s)
{
	$link=$this->linkarivu();
	$sql="select count(sid) from student where preperence='".$s."' ";  	
	//print $sql;
	$result=mysqli_query($link,$sql);
	if(!$result){
		echo"Error to get count";
	}
	if($row=mysqli_fetch_assoc($result)){
		return $row['count(sid)'];
	}
	else
		return 0;

}


function gettotques($scode,$tcode,$set)
{
$l=$this->linkarivu();
	$sql    = "select count(qno) from  ques where subcode='".$scode."' and tcode='".$tcode."' and qset='".$set."'  ";
//print $sql;
$result = mysqli_query($l,$sql); 

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['count(qno)'];
}
else
return 0;	
}
function getans($scode,$regno,$qno,$exam,$set)
{
$l=$this->linkarivu();
	$sql    = "select $qno from  tmark where regno='".$regno."' and scode='".$scode."' and lang='".$exam."' and `set`='".$set."' and `type`='a' " ; 
$result = mysqli_query($l,$sql);  
if (!$result) {
    	print $sql;
     echo "DB Error, could not query the databasewwwwww";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row[$qno];
}
else
return 'Yet To Start';	
}

function getsubname($scode)
{
$l=$this->linkarivu();
	$sql    = "select subname from  branch where subcode='".$scode."'";
//print $sql;
$result = mysqli_query($l,$sql); 

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['subname'];
}
else
return null;	
}
function getsubname1($scode)
{
$l=$this->linkarivu();
	$sql    = "select subname from  subject where subcode='".$scode."'";
//print $sql;
$result = mysqli_query($l,$sql); 

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['subname'];
}
else
return null;	
}
function isattempted1($rno)
{
$l=$this->linkarivu();
	$sql    = "select remarks from  tmark where type='ans' and regno='".trim($rno)."'";
$result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['remarks'];
}
else
return null;	
}

function iswritten($rno)
{
$l=$this->linkarivu();
	$sql    = "select regno from  result where  regno='".trim($rno)."'";
//	print $sql;
$result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['regno'];
}
else
return null;	
}

function gettotques1($scode,$tcode)
{
$l=$this->linkarivu();
	$sql    = "select count(qno) from  ques where subcode='".$scode."' and tcode='".$tcode."' ";
//print $sql;
$result = mysqli_query($l,$sql); 

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['count(qno)'];
}
else
return 0;	
}

function getexamstatus($scode,$tcode,$test)
{
$l=$this->linkarivu();
	$sql    = "select status from  test where scode='".trim($scode)."' and tcode='".trim($tcode)."' and test='".trim($test)."' ";
	//Print$sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['status'];
}
else
return null;	
}

function getexamduration($scode,$tcode)
{
$l=$this->linkarivu();
	$sql    = "select duration from  test where scode='".trim($scode)."' and tcode='".trim($tcode)."' ";
	
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['duration'];
}
else
return null;	
}

function getCollegeWiseCount($short)
{
$l=$this->linkarivu();
$sql    = "select count(distinct(regno)) as count from  reference where college='".$short."' ";
	
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['count'];
}
else
return 0;	
}
function getDirectReferenceCount()
{
$l=$this->linkarivu();
$sql    = "select count(regno) as count from  student ";
	
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['count'];
}
else
return 0;	
}

function getmaxques($scode,$tcode)
{
$l=$this->linkarivu();
	$sql    = "select noofques from  test where scode='".trim($scode)."' and tcode='".trim($tcode)."' ";
    //print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['noofques'];
}
else
return 0;	
}


function getstdetail($regno,$cont)
{
$l=$this->linkarivu();
	$sql    = "select $cont from  student where regno='".$regno."' ";
// 	print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row[$cont];
}
else
return 0;	
}


function getstdetail1($regno,$cont)
{
$l=$this->linkarivu();
	$sql    = "select $cont from  student where regno='".$regno."' ";
	//print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row[$cont];
}
else
return 0;	
}

function getstdetail2($regno,$cont)
{
$l=$this->linkarivu();
	$sql    = "select $cont from  student where regno='".$regno."' ";
	//print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row[$cont];
}
else
return 0;	
}
function getgrade($regno)
{
$l=$this->linkarivu();
	$sql    = "select grade from result where regno='".$regno."' ";
//	print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['grade'];
}
else
return 'Nil';	
}
function getstreference($regno,$cont)
{
$l=$this->linkarivu();
	$sql    = "select $cont from reference where regno='".$regno."'  ";
//	print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     //echo "DB Error, could not query the database";
    // echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row[$cont];
}
else
return 'Nil';	
}
function getstudent1Info($regno,$content)
{
$l=$this->linkarivu();
	$sql    = "select ".$content." from  student where regno='".$regno."' ";
//	print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row[$content];
}
else
return 0;	
}
function getstudentInfo($regno,$content)
{
$l=$this->linkarivu();
	$sql    = "select ".$content." from  student where regno='".$regno."' ";
//	print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row[$content];
}
else
return 0;	
}
function getstcom($regno)
{
$l=$this->linkarivu();
	$sql    = "select community from  student where regno='".$regno."' ";
	//print $sql;
 $result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['community'];
}
else
return 0;	
}
 function countoftopper($branch,$topper,$preperence)
{	
$l=$this->linkarivu();
	if($topper==0){
		$sql    = "select count(regno) from  result where  branch='".$branch."' ";
	}
	else{
		$sql    = "select count(regno) from  result where  branch='".$branch."' and mark>=60  ";			
	}
$result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['count(regno)'];
}
else
return 0;	
}
function countoftopper1($branch,$topper,$preperence)
{	
$l=$this->linkarivu();
	if($topper==0){
		$sql    = "select count(regno) from  result where  branch='".$branch."' ";
	}
	else{
		$sql    = "select count(regno) from  result where branch='".$branch."' and mark>=60 ";		
	}
$result = mysqli_query($l,$sql);  

if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
if ($row= mysqli_fetch_assoc($result)) 
 { 
 return $row['count(regno)'];
}
else
return 0;	
}
function getResult($regno,$scode,$set,$lang,$qusNo,$qus){
	$l=$this->linkarivu();
	$sql="select $qusNo from tmark where regno=".$regno." and type='a'";
	$res=mysqli_query($l,$sql);
	if(!$res){
		echo "errort to get Anws from tmark";
	}
	else{
		$data=mysqli_fetch_assoc($res);
		$sql1="select * from ques where subcode='".$scode."' and tcode='".$lang."' and qset='".$set."' and qno='".$qus."'";
		$res1=mysqli_query($l,$sql1);
		if(!$res1){
			echo "error to get Correct Anwser";
		}
		$ans=mysqli_fetch_assoc($res1);
		if($ans['cans']==$data[$qusNo]){
			return 1;
		}else{
			return 0;
		}
	}
}
function getSet(){
	$l=$this->linkarivu();
	$sql="select distinct(qset) as qset from ques";
	$res=mysqli_query($l,$sql);
	if(!$res){
		echo"error to get Set";
	}
	$set=[];
	while($row=mysqli_fetch_assoc($res)){
		$set[]=$row['qset'];
	}
	return $set;
}
function getCollegeWiseCompletedCount($college)
{
	$l=$this->linkarivu();
	$sql="select count(regno) as count from tmark where `type`='q'and remarks=1 and regno in (select regno from  reference where college='".$college."')";
	$result = mysqli_query($l,$sql);  
	if (!$result) {
     echo "DB Error, could not query the database";
     echo 'MySQL Error: ' . mysqli_error();
    }
	if ($row= mysqli_fetch_assoc($result)) 
 	{ 
 	return $row['count'];
	}
	else
	return 0;	
}


}
?>
