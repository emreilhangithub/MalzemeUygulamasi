<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

  
	public function index()
	{

		$viewData = new stdClass();

		$viewData-> contacts = 
		$this->db->get("contact")->result(); 
		//Mor ile yazılan alan bizim sayfa $categories olarak kullanıdıgımız alana denk gelir

		/* Category list sayfasında yazdıgımız view datayı yani dbden cektigmiz Ekrana bastık */
		$this->load->view('contact_list',$viewData);

	
	}
	

public function save()

	{
		$data = array(
			'name' =>  $this->input->post('name'),
			'phone' =>  $this->input->post('phone'), 
			'message' =>  $this->input->post('message'), 
			'email' =>  $this->input->post('email') 
       );

		$insert = $this->db->insert("contact",$data);

		if ($insert) {
			redirect(base_url("contact"));
		}
		else{
			echo "basarısız";
		}
		
	}











} 

