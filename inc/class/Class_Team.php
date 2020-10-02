<?php
/**
 * Team 
 */
class Team 
{
	private $members = array();
	public function __construct()
	{
		
	}
	public function addMember(Member $member){
		$this->members[$member->id] = $member;
	}
	public function getMemeber($memeberId = null)
	{
		if($memeberId)
			return $this->members[$memeberId];
		return $this->members;
	}
}

/**
 * Member
 */
class Member
{
	public $name,$id,$intake,$department,$shift,$mobile,$section,$picture;
	public $social = [
							"facebook" => "",
							"twitter" => "",
							"googleplus" => ""
						];
	function __construct($id, $name,$mobile, $department,$intake, $shift, $section,$social,$picture = "")
	{
		$this->setDefault();
		$this->name = $name;
		$this->section = $section;
		$this->id = $id;
		$this->intake = $intake;
		$this->department = $department;
		$this->shift = $shift;
		$this->mobile = $mobile;
		$this->picture = $picture;
		if(is_array($social)){
			foreach ($social as $key => $value) {
				$this->social[$key] = $value;
			}
		}
		
	}
	private function setDefault(){
		$this->section = "";
		$this->name = "";
		$this->id = "";
		$this->intake = "";
		$this->department = "";
		$this->shift = "";
		$this->mobile = "";
		$this->picture = "";
	}
}
