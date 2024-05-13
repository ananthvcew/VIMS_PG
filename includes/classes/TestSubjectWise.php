<?php
 class TestSubjectWise extends Dbconnection
 {
 	var $name;
 	var $db;
 	var $invitee_obj;
 	var $msg='';
 	var $tablename="test_subject_wise";

 	function __construct() {
			parent :: __construct();
			$this->db = new Dbconnection();
		}
	function add_test(){
		//print_r($_POST);
		$test=array();
		$test['dcode']=$_SESSION['dcode'];
		$test['scode']=$_SESSION['scode'];
		$test['examno']=$this->db->getpost('examNo');
		$test['noofques']=$this->db->getpost('totalNoofQuestion');
		$test['duration']=$this->db->getpost('duration_exam');
		$test['mpq']=$this->db->getpost('markQuestion');
		$test['start_from']=$this->db->getpost('fromDate');
		$test['end_to']=$this->db->getpost('toDate');
		$userId=$this->db->mysql_insert($this->tablename,$test);
		if(count($userId)>0){
			$test_quesion=array();
			$test_quesion['dcode']=$_SESSION['dcode'];
			$test_quesion['scode']=$_SESSION['scode'];
			$test_quesion['test_code']=$this->db->getpost('examNo');
			foreach($_POST['tcode'] as $key => $value){
				//print_r($_POST);
				$test_quesion['tcode']=$value;
				$totQues=$_POST['noofQuestion'][$key];
				$fno=$_POST['question_from'][$key];
				$tno=$_POST['question_to'][$key];
				
				$bal=20-$totQues;
				for($i=1;$i<=$totQues;$i++){
					$qno=range($fno,$tno);
					$y=$i-1;
					//$qno=suffle($qno1);
					$q='q'.$i;
					$test_quesion[$q]=$qno[$y];					
				}
				for($j=1;$j<=$bal;$j++){
					$z=$totQues+$j;
					$q='q'.$z;
					$test_quesion[$q]=0;					
				}

				$test_quesion['total_quesion']=$totQues;
				$this->db->mysql_insert('test_question',$test_quesion);
				//return ["status"=>"Refersh"];
			}

		}
		return ["status"=>"Success"];
		
	}
}