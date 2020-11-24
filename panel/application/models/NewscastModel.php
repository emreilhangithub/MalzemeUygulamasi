<?php

class NewscastModel extends CI_Model {


public function get_records($limit,$count)
	{
		$geridon = $this->db->limit($limit,$count)->order_by("newcastid","desc")->get("newscast")->result();

		return $geridon;

		//sıralamayı desc ile terse dogru yaptık
		
	}

	public function get_count()//tablomuzda kac kayıt varsa bize onu donduren method olacak
	{
		$geridon = $this->db->count_all("newscast");
		return $geridon;
	}

	public function edit($where)
	{

		// $geridon =  $this->db->where($where)->get("newscast")->row();

		// return $geridon;	

		$this->db->select("*");
		$this->db->from("newscast");
		$this->db->where($where);
	    $this->db->join('product', 'product.productid  = newscast.product_id');
	    return $this->db->get()->row();				
	}

}