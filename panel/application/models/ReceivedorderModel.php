<?php

class ReceivedorderModel extends CI_Model {

	function __construct()
	{
		parent:: __construct();
		$this->table = "receivedorder";
		$this->join = "orderproduct";
	}


	public function select()
	{

		$geridon =  $this->db->get($this->table)->result();

		return $geridon;		
	}

	public function rowselect($where=array())
	{

		$geridon =  $this->db->where($where)->get($this->table)->result();

		return $geridon;		
	}

	public function rowselectt($where=array())
	{

		$geridon =  $this->db->where($where)->get($this->join)->result();

		return $geridon;		
	}
	
	// 	public function insert($data)
	// {

	// 	$geridon = $this->db->insert($this->table,$data);

	// 	return $geridon;		
	// }

	public function insert($data)
	{

		if ($this->db->insert($this->table,$data)) {
		 	return $this->db->insert_id();//burda en son idyi almaya yaradı en son id bizim idmiz olmus oldu
		 } 	
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