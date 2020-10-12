<?php
/**
 * 
 */
class TravelPlace extends RsGlobal
{
	public $db;
	public $tableName = "travel_place";
	public $id = "",$name = "",$thumbnail = "",$details ="",$nearby_hotel = [],$nearby_restaurants = [],$nearby_tour_place = [], $populer_foods = [],$tourist_spot = [],$gmap="",$division="";
	
	function __construct($id = null , $db= null)
	{
		if($db != null){
			$this->db = $db;
		}else{
			$this->db= new Db();
		}
		parent::__construct($this->db->con,$this->tableName);
		if($id != null)
			$this->setFromId($id);
	}
	public function setFromId($id){
		$place = $this->Get($id);
		while ($row = $place->fetch_assoc()) {
			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->thumbnail = $row['thumbnail'];
			$this->details = $row['details'];
			$this->gmap  = $row['gmap'];
			$this->division  = $row['division'];
			$this->populer_foods  = json_decode( $row['populer_foods'] , true);
			$this->nearby_hotel  = json_decode( $row['nearby_hotel'] , true);
			$this->nearby_restaurants  = json_decode( $row['nearby_restaurants'] , true);
			$this->nearby_tour_place  = json_decode( $row['nearby_tour_place'] , true);
			$this->tourist_spot  = json_decode( $row['tourist_spot'] , true);
		}
		return $this;
	}
	public function Get($id = null,$limit = 100000){
		if($id != null)
		return $this->dbCon->query("SELECT * FROM $this->dbTable WHERE id='$id'");
		
		$sql = "SELECT * FROM $this->dbTable ";
		if(isset($_GET['division'])){
			$sql = "SELECT * FROM $this->dbTable  WHERE division = '".$_GET['division']."'";
		}
		if(isset($_GET['s'])){
			$sql = "SELECT * FROM $this->dbTable  WHERE name like '%".$_GET['s']."%'";
		}
		return $this->dbCon->query($sql."  ORDER BY id DESC limit $limit");
	}
	public function getSpotsId($string1,$string2){
		$string = 'spot_'.strtolower($string1).'_spot_'.strtolower($string2);
		$string = str_replace(" ",'',$string);
		return $string;
	}
}