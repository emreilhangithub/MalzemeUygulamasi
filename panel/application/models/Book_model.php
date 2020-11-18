<?php

class Book_model extends CI_Model {


public function uyevarmi($email,$password)
	{
		$geridon=$this
		->db
		->select("*")
		->from("uyeler")
		->where("uyemail",$email)
		->where("uyesifre",md5($password))
		->get()
		->row();

		return $geridon;
	}

}