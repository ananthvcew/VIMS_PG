<?php
 class ExamDate extends Dbconnection
 {
 	var $name;
 	var $db;
 	var $invitee_obj;
 	var $msg='';
 	var $tablename="examination_date";

 	function __construct() {
			parent :: __construct();
			$this->db = new Dbconnection();
		}
	public function addExamDate(){
		//print_r($_POST);
		$insert=[];
		$insert["year_of_exam"]=date('Y');
		$insert["disc"]=$this->db->getpost('examName');
		$insert["es_date"]=$this->db->getpost('esd');
		$insert["ee_date"]=$this->db->getpost('eed');
		$insert["status"]='0';
		$insert["created_by"]="1";
		$insert["created_at"]=date("Y-m-d H:i:s");
		$insertId=$this->db->mysql_insert($this->tablename,$insert);
		if($insertId){
			return ["status"=>"Done"];
		}else{
			return ["status"=>"Failed"];
		}

	}
	public function getExamDate(){
		$sql="select * from examination_date where id=(select max(id) from examination_date)";
		$res=$this->db->getAsIsArray($sql);
		return $res;
	}
	public function getExamDetails(){
		$sql="select * from ".$this->tablename." where id=".$this->db->getpost('id');
		$res=$this->db->getAsIsArray($sql);
		return $res;
	}
	public function updateExamDate(){
		$insert=[];
		$insert["disc"]=$this->db->getpost('editName');
		$insert["es_date"]=$this->db->getpost('editesd');
		$insert["ee_date"]=$this->db->getpost('editeed');
		$insert["r_status"]=$this->db->getpost('r_status');
		$insert["status"]=$this->db->getpost('e_status');
		$insert["result"]=$this->db->getpost('rs_status');
		$insert["updated_by"]="1";
		$insert["updated_at"]=date("Y-m-d H:i:s");
		$insertId=$this->db->mysql_update($this->tablename,$insert,"id=".$this->db->getpost('id'));
		if($insertId){
			return ["status"=>"Done"];
		}else{
			return ["status"=>"Failed"];
		}

	}
}