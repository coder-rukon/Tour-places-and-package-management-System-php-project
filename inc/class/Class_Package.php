<?php
/**
 * 
 */
class Package extends RsGlobal
{
	public $db;
	public $tableName = "package";
	public $id = 0, $name = '',$price = 0, $place_from = '',$status="", $resort_to = '', $days = '', $type = '', $details = '', $image = '', $total_seat = '', $date = '', $last_updated= '';
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
		$sql = "SELECT * FROM $this->tableName WHERE id ='".$id."'";
		$result = $this->db->con->query($sql);
		while($row = $result->fetch_assoc()){
			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->place_from = $row['place_from'];
			$this->resort_to = $row['resort_to'];
			$this->days = $row['days'];
			$this->type = $row['type'];
			$this->details = $row['details'];
			$this->image = $row['image'];
			$this->price = $row['price'];
			$this->total_seat = $row['total_seat'];
			$this->date = $row['date'];
			$this->status = $row['status'];
			$this->last_updated = $row['last_updated'];
		}
	}

	public function searchPackage($from,$to,$days = null,$date = null){
		$sql = "SELECT * FROM $this->tableName WHERE place_from ='".$from."' AND resort_to = '".$to."' ";
		if($days && !empty($days)){
			$sql .= " AND days ='".$days."'";
		}
		if($date && !empty($date)){
			$dateStart = $date.'-01';
			$dateEnd = $date.'-31';
			$sql .= " AND cast(date as date) BETWEEN date('".$dateStart."') AND date('".$dateEnd."')";
		}
		$sql .= " AND status = 'ongoing'";
		$return = $this->db->con->query($sql);
		
		return $return;
	}

	public function addPackage($data)
	{
		$date=date_create($data['date']);
		$formatedDate = date_format($date,"Y-m-d");
		$sql = "INSERT INTO $this->tableName (`name`,`place_from`, `resort_to`, `days`, `type`, `details`, `image`, `total_seat`, `date`, `price`,`status`) VALUES('".$data['name']."','".$data['place_from']."','".$data['resort_to']."','".$data['days']."','".$data['type']."','".$data['details']."','".$data['image']."','".$data['total_seat']."','".$formatedDate."','".$data['price']."','".$data['status']."')";
		$this->db->con->query($sql);
	}
	public function update($id,$data)
	{
		$date=date_create($data['date']);
		$formatedDate = date_format($date,"Y-m-d");
		$sql = "UPDATE $this->tableName SET name='".$data['name']."', place_from='".$data['place_from']."', resort_to='".$data['resort_to']."', days='".$data['days']."', type='".$data['type']."', details='".$data['details']."', image='".$data['image']."', total_seat='".$data['total_seat']."', date='".$formatedDate."', price='".$data['price']."', status='".$data['status']."' WHERE id='".$id."'";
		$this->db->con->query($sql);
	}
	public function setBooked()
	{
		$date=date_create($data['date']);
		$formatedDate = date_format($date,"Y-m-d");
		$sql = "UPDATE $this->tableName SET status='booked' WHERE id='".$this->id."'";
		$this->db->con->query($sql);
	}
	public function getBookedSeatNumber(){
		$Booking = new Booking();
		$allBookingData = $Booking->getByPackage($this->id,'confirmed');
		$output = 0;
		while($row = $allBookingData->fetch_assoc()){
            $output += (int) $row['total_seat'];
        }
		return $output;
	}
}

/**
 * Single Package Row
 */
class PackageRow
{
	public $title = "",$price ="" ,$details = "",$items=[];
	function __construct($title,$price,$details,$items)
	{
		$this->title = $title;
		$this->price = $price;
		$this->details = $details;
		$this->items = $items;
	}
}