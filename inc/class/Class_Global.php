<?php
/**
 * 
 */
if(class_exists('RsGlobal'))
	return;
class RsGlobal
{
	public $dbTable;
	public $dbCon;
	public $ppp = 10000;
	function __construct($dbConnection = null,$table = null)
	{
		$this->dbCon = $dbConnection;
		$this->dbTable = $table;
	}
	public function Delete($id){
		return $this->dbCon->query("DELETE FROM $this->dbTable WHERE id = '$id'");
	}
	public function Get($id = null,$limit = 100000){
		if($id != null)
		return $this->dbCon->query("SELECT * FROM $this->dbTable WHERE id='$id'");
		
		return $this->dbCon->query("SELECT * FROM $this->dbTable  ORDER BY id DESC limit $limit");
	}
	public function Query($sql){
		return $this->dbCon->query($sql);
	}
	public function Insert($data){
		$sql = "INSERT INTO $this->dbTable";
		$sql .= " (`".implode("`, `", array_keys($data))."`)";
		$sql .= " VALUES ('".implode("', '", $data)."') ";
		$this->dbCon->query($sql);
		return $this->dbCon->insert_id;
	}
	public function Update($id, $data){
		$sql = "UPDATE  $this->dbTable SET ";
		$iCount = 0;
		foreach ($data as $key => $value) {
			if($iCount==0){
				$sql .= " $key = '".$value."'";
			}else{
				$sql .= ", $key = '".$value."'";
			}
			$iCount++;
		}
		$sql .= " WHERE id = '".$id."'";
		$this->dbCon->query($sql);
	}
	public function Count($tableName){
		$sql = "SELECT count(id) as totalNumber from $tableName";
		$result = $this->dbCon->query($sql);
		$number = 0;
		while ($row = $result->fetch_assoc()) {
			$number = $row['totalNumber'];
		}
		return $number;
	}
}