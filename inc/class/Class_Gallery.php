<?php
/**
 * Gallery
 */
class Gallery extends RsGlobal
{
	public $db;
	public $name = "",$content = "",$thumbnail = "",$id = 0;
	private $table = "gallery";
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
	function setFromId($id){
		$data = parent::Get($id);
		while($result = $data->fetch_assoc()){
			$this->name = $result['name'];
			$this->content = $result['content'];
			$this->thumbnail = $result['thumbnail'];
			$this->id = $result['id'];
		}
	}
	public function Create(){
		return parent::Insert(['name' => $this->name, "content" => $this->content , "thumbnail" => $this->thumbnail]);
	}
}