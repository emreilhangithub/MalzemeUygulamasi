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

		//print_r(get_loaded_extensions());
		//exit();
			/* 
		$viewData = new stdClass();

		$viewData-> contacts = 
		$this->db->get("contact")->result(); 
		//Mor ile yazılan alan bizim sayfa $categories olarak kullanıdıgımız alana denk gelir

		 Category list sayfasında yazdıgımız view datayı yani dbden cektigmiz Ekrana bastık 
		$this->load->view('contact_list',$viewData);
		*/

		$config = array(
			"protocal"=>   "smtp",
			"smtp_host" => "ssl://smtp.gmail.com",
			"smtp_port" => "465",
			"smtp_user" => "test9988776611123@gmail.com",
			"smtp_pass" => "Test123456**",
			"starttls" => true,
			"charset"  => "utf-8",
			"mailtype" => "html",
			"wordwrap" => true,
			"newline"  => "\r\n",
		);
		$this->load->library("email",$config);


		$this->email->from("test9988776611123@gmail.com","Test From"); //kim gönderecek
		$this->email->to("mustafaemreilhan1903@gmail.com");  //nereye gidecek
		$this->email->subject("Codeigniter ile mail gönderimi");
		$this->email->message("Codeigniter ile mail gönderimi matarial uygulaması ile başarılı gerçekleşti ");
		 //mesaj

		 $send =   $this->email->send();

		if($send) 
		{
			echo "<span style='color:green'>Email gönderim işlemi başarılıdır!!</span>";		
		}

		else {
			echo "<span style='color:red'>Email gönderim işlemi başarısız!!</span>";
			echo $this->email->print_debugger();
		}

	
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

