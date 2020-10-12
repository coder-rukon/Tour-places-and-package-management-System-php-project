<?php
class Booking extends RsGlobal
{
    protected $table = "booking";
    public $db;
    public $id, $user_id,$total, $package_id, $payment_method, $payment_id, $requested_date, $status, $booking_date,$total_seat,$bank_tran_id,$val_id;
    function __construct($id = null , $db= null)
	{
		if($db != null){
			$this->db = $db;
		}else{
			$this->db= new Db();
		}
		parent::__construct($this->db->con,$this->table);
		if($id != null)
			$this->setFromId($id);
	}
	public function setFromId($id){
		$data = $this->Get($id);
		while ($row =  $data->fetch_assoc()) {
			foreach ($row as $key => $value) {
				$this->{$key} = $value;
			}
		}
	}
    
    public function Add($data){
        
        return $this->Insert($data);
    }
    public function getByPackage($packageId,$status = null){
    	if($status)
    		return $this->Query("SELECT * FROM $this->table WHERE package_id = '".$packageId."' AND status = '".$status."'");
    	return $this->Query("SELECT * FROM $this->table WHERE package_id = '".$packageId."'");
	}
	
	public function getUpcomingPackage($user){
		$todayDate = date("Y-m-d");
		$sql = "SELECT booking.* , package.name as packageName ,package.type as packageType, package.date as packageDate , package.price as packagePrice FROM booking  
					LEFT JOIN package ON $this->table.package_id = package.id
					WHERE booking.user_id ='$user->id' AND DATE(package.date) >= '$todayDate'";
		$return = $this->db->con->query($sql);
		return $return;
	}
	public function getPreviusTours($user){
		$todayDate = date("Y-m-d");
		$sql = "SELECT booking.* , package.name as packageName , package.date as packageDate , package.price as packagePrice FROM booking  
					LEFT JOIN package ON $this->table.package_id = package.id
					WHERE booking.user_id ='$user->id' AND DATE(package.date) < '$todayDate'";
		$return = $this->db->con->query($sql);
		return $return;
	}

}
