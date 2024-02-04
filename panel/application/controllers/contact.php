<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata("oturum_data")) {  
			$this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
			redirect(base_url().'login'); 
		}

	}

  
	public function index()
	{ 
		$viewData = new stdClass();
		$viewData-> contacts = $this->db->get("contact")->result();
		$this->load->view('contact_list',$viewData);
	}
	

public function save()

	{
		$data = array(
			'name' =>  $this->input->post('name'),
			'phone' =>  $this->input->post('phone'), 
			'message' =>  $this->input->post('message'), 
			'email' =>  $this->input->post('email'),
			'user' => $this->session->oturum_data['user'],
			'date' => date("Y-m-d"),
			'IP' => $_SERVER["REMOTE_ADDR"]
		
       );

		$insert = $this->db->insert("contact",$data);

		if ($insert) {
			$this->session->set_flashdata("mesajbasarili","Mesajınız Gönderildi"); 			
			redirect(base_url("contact"));
		}
		else{
			echo "basarısız";
		}
		
	}











} 

