<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		public function __construct()
	{
		parent::__construct();

		$this->load->model("book_model");

	}

	public function index()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules('email','Eposta','required|trim|valid_email');
		$this->form_validation->set_rules('password','Sifre','required|trim|min_length[6]');


		$error_message = array(
			'required' => '<div style=color:red;>
			<strong> {field} </strong> Başarısız Bu Alanı Doldurmak Zorundasınız!. </div>', 
			'valid_email' => '<div>
			<strong> {field} </strong> Doğru şekilde giriniz. </div>', 
			'min_length' => '<div>
			<strong> {field} </strong> Şifre en az 6 karakter olmak zorunda  </div>'
		); 

		$this->form_validation->set_message($error_message);

		if ($this->form_validation->run()) {

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$sonuc = $this->book_model->uyevarmi($email,$password);

		if ($sonuc) {
			$this->session->userdata('durum',true);
			$this->session->userdata('user',$sonuc);
			$this->session->set_flashdata('grit','<div> <strong>Tebrikler! </strong>
				Başarıyla Giriş Yaptınız </div>');
			redirect(base_url("home"));

		}
		}

		else {

			echo validation_errors();


		}


		$this->load->view('login');

	
	}


}