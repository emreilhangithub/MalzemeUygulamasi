<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		public function __construct()
	{
		parent::__construct();		

		$this->load->model("Admin_Model");
	}

	public function index()
	{

	 if ($this->session->userdata("oturum_data")) {  
			redirect(base_url().'home'); //zaten login isen buraya göndersin beni
		}	

	$this->load->view('login');

	}

	public function login_ol()
	{

	$email = $this->input->post('email',TRUE);
	$password = $this->input->post('password',TRUE);

	$email = $this->security->xss_clean($email);//guvenlik sagladık
	$password = $this->security->xss_clean($password);

	$result = $this->Admin_Model->login($email,$password);

	if ($result) {
		$oturum_dizi = array(
			'userid' => $result[0]->id, 
			'user' => $result[0]->user,
			'email' => $result[0]->email, 
			'password' => $result[0]->password, 
			'img_id' => $result[0]->img_id, 
			'isActive' => $result[0]->isActive, 
			'registerdate' => $result[0]->registerdate, 
			'authority' => $result[0]->authority, 

			 
		);
		$this->session->set_userdata("oturum_data",$oturum_dizi);
		 //echo $result[0]->id ;
		 //echo $this->session->oturum_data['user'] ;
		$this->session->set_flashdata("giris","Giriş Yapıldı Hoşgeldiniz");
		 redirect(base_url("home"));
		}
		else
		{
			$this->session->set_flashdata("login_hata","Geçersiz e mail yada şifre");
			$this->load->view('login');

		}

	 }

	 public function log_out()
	{
		//$this->session->set_flashdata("exitokey","Başarıyla Çıkış Yapıldı");
		$this->session->unset_userdata('oturum_data');
		$this->session->sess_destroy();		
		redirect(base_url().'login');	

	}

}

		