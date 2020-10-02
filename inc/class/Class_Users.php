<?php
/**
 * 
 */
class Users
{
	public $table = 'users';
	public $id, $name, $password, $email, $user_role, $created_date, $last_activity;
	private $userRoles = ['subscriber','admin'];
	function __construct($id = null,$conDb = null)
	{
		$this->id = null;
		$this->name = "";
		$this->password = "";
		$this->email = "";
		$this->created_date = date("Y-m-d h:i:sa");
		$this->last_activity = $this->created_date;
		$this->user_role = $this->userRoles[0];

		if($conDb != null){
			$this->db = $conDb;
		}else{
			$this->db = new DB();
		}
		if($id !=null){
			$this->setObjectData($id);
		}

	}
	/*
	find user by id and set objset
	 */
	private function setObjectData($id){
		$this->id = $id;
		$user = $this->db->con->query("SELECT * from $this->table where id = $id");
		if($user->num_rows>0):
			while ($row = $user->fetch_assoc()) {
				foreach ($row as $key => $value) {
					$this->{$key} = $value;
				}
			}
		endif;
	}
	/*
	Delete user
	 */
	public function Delete($id = null){
		if($id != null){
			return $this->db->con->query("DELETE FROM $this->table where id = $id");
		}else if($this->id != null){
			return $this->db->con->query("DELETE FROM $this->table where id = $this->id");
		}else{
			return false;
		}
	}
	public function Save(){
		if($this->id != null){
			if(!$this->isValidMd5($this->password))
				$this->password = md5($this->password);
			$query = "UPDATE $this->table SET 
			name = '$this->name', 
			password = '$this->password', 
			email = '$this->email', 
			last_activity = '$this->last_activity', 
			user_role = '$this->user_role' 
			WHERE id = $this->id
			";
			$this->db->con->query($query);
		}else{
			$this->Create();
		}
		$this->setObjectData($this->id);
		return $this;

	}
	public function isValidMd5($md5 ='')
	{
	    return preg_match('/^[a-f0-9]{32}$/', $md5);
	}

	public function Create($data = array())
	{
		if(!empty($data)){
			foreach ($data as $key => $value) {
				if(isset($this->{$key}))
				$this->{$key} = $value;
			}
		}
		if(!$this->isValidMd5($this->password))
				$this->password = md5($this->password);
		$query = "INSERT into $this->table(name,email,password,last_activity,user_role) 
			values('$this->name','$this->email','$this->password','$this->last_activity','$this->user_role') 
			";
		$result = $this->db->con->query($query);

		if($result){
			$this->setObjectData($this->db->con->insert_id);
		}
		return $this;
	}
	public function CheckAuth($userName,$pass)
	{
		$pw = md5($pass);
		$result = $this->db->con->query("SELECT * from $this->table where  email = '$userName' AND password = '$pw' ");
		if($result and $result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				foreach ($row as $key => $value) {
					$this->{$key} = $value;
				}
			}
			return true;
		}else{
			return false;
		}
	}

	/* Set user data in session*/
	public function SetUserToSession(){
		$_SESSION['user']['id'] = $this->id;
		$_SESSION['user']['email'] = $this->email;
		$_SESSION['user']['name'] = $this->name;
		$_SESSION['user']['role'] = $this->user_role;
	}


	/*Check if user exist*/
	public function Has()
	{
		if($this->id != null)
			return true;
		return false;
	}
	public function CheckUserEmail($email){
		$result = $this->db->con->query("SELECT * from $this->table where email = '$email'");
		if($result and $result->num_rows > 0){
			return true;
		}else{
			return false;
		}
	}
	/*
	Get user by id

	 */
	public function GetUser($id)
	{
		$this->setObjectData($id);
		return $this;
	}
	public function getUsers(){
		$sql = "select * from $this->table";
		$result = $this->db->con->query($sql);
		$resultArray = array();

		if($result->num_rows>0):
			while ($row = $result->fetch_assoc()) {
				$user = new Users();
				foreach ($row as $key => $value) {
					$user->{$key} = $value;
				}
				$resultArray[] = $user;
			}
		endif;
		return $resultArray;
	}
}