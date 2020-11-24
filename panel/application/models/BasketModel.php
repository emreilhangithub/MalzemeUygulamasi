<?php

class BasketModel extends CI_Model {

	function __construct()
	{
		parent:: __construct();
		$this->table = "basket";
	}


	public function select()
	{

		$geridon =  $this->db->get($this->table)->result();

		return $geridon;		
	}
	
		public function insert($data)
	{

		$geridon = $this->db->insert($this->table,$data);

		return $geridon;		
	}

	
	public function delete($where)
	{

		$geridon = $this->db->where($where)->delete($this->table);

		return $geridon;		
	}

	// 	public function get_count($where)//tablomuzda kac kayıt varsa bize onu donduren method olacak
	// {
	// 	$geridon = $this->db->where($where)->count_all($this->table);
	// 	return $geridon;
	// }



}