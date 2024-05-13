<?php
 class Topic extends Dbconnection
 {
 	var $name;
 	var $db;
 	var $invitee_obj;
 	var $msg='';
 	var $tablename="topic";

 	function __construct() {
			parent :: __construct();
			$this->db = new Dbconnection();
		}
	function getTopic(){
		$sql="select * from ".$this->tablename." where dcode='".$_SESSION['dcode']."' and scode='".$_SESSION['scode']."' and topic like '%".$this->db->getpost('term')."%'";
		$result=$this->db->GetResultsArray($sql);
		return $result;
	}
}