<?php
 class Student extends Dbconnection
 {
 	var $name;
 	var $db;
 	var $invitee_obj;
 	var $msg='';
 	var $tablename="student";

 	function __construct() {
			parent :: __construct();
			$this->db = new Dbconnection();
		}
	public function dbGroup(){
		$sql="SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))";
		$res=$this->db->ExecuteQuery($sql);
	}
	public function studentNamelist(){
		$sql="select * from ".$this->tablename." where regno not in (select regno from result)";
		$result=$this->db->GetResultsArray($sql);
		return $result;
	}
	public function studentNamelistFromDataList(){
		$sql="select * from ".$this->tablename;
		$result=$this->db->GetResultsArray($sql);
		return $result;
	} 
	public function updateStudentData(){
		$update=[];
		$update[$this->db->getpost('area')]=$this->db->getpost('lang');
		$updateId=$this->db->mysql_update($this->tablename,$update,"regno='".$this->db->getpost('regno')."'");
		if($updateId){
        	$sql="select count(regno) from tmark where regno=".$this->db->getpost('regno');
        	$res=$this->db->getAsIsArray($sql);
        	$update1=[];
        	if($res['count(regno)']>0){
            	if($this->db->getpost('area')=='branch'){
                $update1['scode']=$this->db->getpost('lang');
                }elseif($this->db->getpost('area')=='examlang'){
                $update1['lang']=$this->db->getpost('lang');
                }
            	$updateTmark=$this->db->mysql_update('tmark',$update1,"regno='".$this->db->getpost('regno')."'");
            	return ["regno"=>$this->db->getpost('regno'),"lang"=>$this->db->getpost('lang')];            
            }else{
            return ["regno"=>$this->db->getpost('regno'),"lang"=>$this->db->getpost('lang')];
            }
		}
	}
	public function regCount(){
		$sql="select count(regno) from ".$this->tablename;
		$res=$this->db->getAsIsArray($sql);
		return $res;
	}
	public function getSlNoOpenSlot(){
		$sql="select min(id), max(id) from ".$this->tablename." where slot='Open'";
		$res=$this->db->getAsIsArray($sql);
		return $res;
	}
	public function saveSlot(){
		for($i=$this->db->getpost('sno');$i<=$this->db->getpost('eno');$i++){
			$slot=[];
			$slot['slot']=$this->db->getpost('date')."_".$this->db->getpost('time');
			$insert=$this->db->mysql_update($this->tablename,$slot,'id='.$i);
		}
		if($insert){
			return ["status"=>"Done"];
		}else{
			return ["status"=>"Failed"];
		}
	}
	public function getSlot(){
		$sql="select distinct(slot) as slot from ".$this->tablename." ";
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
	public function getStudentNameList(){
		if($this->db->getpost('slot')=="All"){
			$sql="select * from ".$this->tablename." order by id";
		}else{
			$sql="select * from ".$this->tablename." where slot='".$this->db->getpost('slot')."' order by id ";
		}
		$res=$this->db->GetResultsArray($sql);
		return $res;		
	}
	public function getAbsentStudentNameList(){
		if($this->db->getpost('slot')=="All"){
			$sql="select * from ".$this->tablename." where regno not in (select regno from tmark where type='q') order by id";
		}else{
			$sql="select * from ".$this->tablename." where regno not in (select regno from tmark where type='q') and slot='".$this->db->getpost('slot')."' order by id ";
		}
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
}