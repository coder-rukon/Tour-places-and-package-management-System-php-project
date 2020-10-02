<?php
/**
 * Data list for table
 */
class DataList
{
	public $name,$image,$edit_url,$delete_url,$url;
	function __construct($name,$image,$url,$edit_url,$delete_url)
	{
		$this->name = $name;
		$this->image = $image;
		$this->url = $url;
		$this->edit_url = $edit_url;
		$this->delete_url = $delete_url;
	}
}