<?php
class All_items extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function categories()
	{
		$this->db->select('category');
		$this->db->group_by('category');
		$this->db->order_by('category','desc');
		return $this->db->get('item_data')->result();
	}

	public function by_category_name($categoryName)
	{
		$this->db->where('category', $categoryName);
		return $this->db->get('item_data')->result();
	}
}