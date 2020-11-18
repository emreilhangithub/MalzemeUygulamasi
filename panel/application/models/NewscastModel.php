<?php

class NewscastModel extends CI_Model {


public function get_records($limit,$count)
	{
		$geridon = $this->db->limit($limit,$count)->order_by("id","desc")->get("newscast")->result();

		return $geridon;

		//sıralamayı desc ile terse dogru yaptık
		
	}

	public function get_count()//tablomuzda kac kayıt varsa bize onu donduren method olacak
	{
		$geridon = $this->db->count_all("newscast");
		return $geridon;
	}

}