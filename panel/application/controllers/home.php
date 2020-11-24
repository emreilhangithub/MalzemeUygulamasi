<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

		public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata("oturum_data")) { //kullanıcı giriş yapmadan linke basarsa 
			$this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); //bu mesajı ver  ve
			redirect(base_url().'login'); // bu sayfaya yönlendir
		}

		// if ($this->session->oturum_data['uyetipi'] != 1) {
		// 	redirect('login');
		// }

		// if ($this->session->oturum_data['uyetipi'] != "aktif") {
		// 	redirect('login');
		// 	echo "oturumunuz henuz onaylanmadı";
		// }

	}
		

	public function index()
	{	
		 $this->load->view('home');	
	}


}