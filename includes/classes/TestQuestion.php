<?php
 class TestSubjectWise extends Dbconnection
 {
 	var $name;
 	var $db;
 	var $invitee_obj;
 	var $msg='';
 	var $tablename="test_question";

 	function __construct() {
			parent :: __construct();
			$this->db = new Dbconnection();
		}
		function add_test_quesion(){
			$test_quesion=array();
			$test_quesion['dcode']=$_SESSION['dcode'];
			$test_quesion['scode']=$_SESSION['scode'];
			$test_quesion['test_code']=$this->db->getpost('examNo');
			foreach($_POST['tcode'] as $key => $value){
				print_r($_POST);
				$test_quesion['tcode']=$value;
				$totQues=$_POST['noofQuestion'][$key];
				$fno=$_POST['question_from'][$key];
				$tno=$_POST['question_to'][$key];
				echo $qno=rand($fno,$tno);
				$bal=20-$totQues;
				for($i=1;$i<=$totQues;$i++){
					$q='q'.$i;
					$test_quesion[$q]=$qno;					
				}
				for($j=1;$j<=$bal;$j++){
					$z=$totQues+$j;
					$q='q'.$z;
					$test_quesion[$q]=0;					
				}

				$test_quesion['total_quesion']=$totQues;
				$this->db->mysql_insert($this->tablename,$test_question);
				return ["status"=>"Success"];
			}
			}
	}
	?>