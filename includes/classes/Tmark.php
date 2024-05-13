<?php
 class Tmark extends Dbconnection
 {
 	var $name;
 	var $db;
 	var $invitee_obj;
 	var $msg='';
 	var $tablename="tmark";

 	function __construct() {
			parent :: __construct();
			$this->db = new Dbconnection();
		}
	public function getExamStatus($regno){
		$sql="select *, count(regno) from ".$this->tablename." where regno='".$regno."' and type='a'" ;
		$result=$this->db->GetAsIsArray($sql);
		if($result['count(regno)']>0){
			$qa=0;
			for($i=1;$i<=50;$i++){
				$q="q".$i;
				if($result[$q]=="A" || $result[$q]=="B" || $result[$q]=="C" || $result[$q]=="D"){
					$qa=$qa+1;
				}
			}
			return ["status"=>"1","totqa"=>$qa,"rt"=>number_format(($result['rtime']/60),2),"remark"=>$result['remarks']];

		}else{
			return ["status"=>"0","totqa"=>"0","rt"=>number_format((3600/60),2),"remark"=>"0"];

		}
		
	}
	public function updateTmark(){
		$update=[];
		$rm=$this->db->getpost('remark');
		if($rm==0){
			$update['remarks']=1;
		}else{
			$update['remarks']=0;
		}
		$updateId=$this->db->mysql_update($this->tablename,$update,"regno='".$this->db->getpost('regno')."'");
		if($updateId){
			return ["regno"=>$this->db->getpost('regno'),"status"=>$update['remarks']];
		}
	}
	public function updateTimeTmark(){
		$update=[];
		$update['rtime']=($this->db->getpost('lang')*60);
		$updateId=$this->db->mysql_update($this->tablename,$update,"regno='".$this->db->getpost('regno')."'");
		if($updateId){
			return ["regno"=>$this->db->getpost('regno'),"rtime"=>number_format(($update['rtime']/60),2)];
		}
	}
	public function getExamCount(){
		$sql="select remarks,count(regno) from ".$this->tablename." where type='a' group by remarks order by remarks";
		$res=$this->db->GetResultsArray($sql);
		return $res;
	}
	public function getAbsentCount(){
    	$sql="select count(regno) from student where regno not in (select regno from ".$this->tablename." where type='a')";
    	$res=$this->db->getAsIsArray($sql);
    	return $res;
    }
}