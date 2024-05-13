<?php
 class Reference extends Dbconnection
 {
 	var $name;
 	var $db;
 	var $invitee_obj;
 	var $msg='';
 	var $tablename="reference";

 	function __construct() {
			parent :: __construct();
			$this->db = new Dbconnection();
		}
	function getReferenceDetails($regno){
		$sql="select * from ".$this->tablename." where regno='".$regno."'";
		$result=$this->db->GetAsIsArray($sql);
		return $result;
	}
}