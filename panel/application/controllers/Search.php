<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata("oturum_data")) {  
			$this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
			redirect(base_url().'login'); 
		}
		$this->load->model("NewscastModel");	
        

	}


	public function skeyword()
	{
		/*
		echo "<pre>";
		print_r($this->input->post());
		exit;
		*/

		$key = $this->input->post('title');
		
		if ($key == "") {
			$this->session->set_flashdata("bos","Arama İşlemi Yapilmeniz Lütfen METİN Giriniz");
            redirect(base_url("home"));			
        }
		
		else
		{
		$data['key'] = $key;		
		$data['posts']  = $this->search($key);
		/* 
		echo "<pre>";
		echo $key;
	 	print_r($this->input->post());
		exit;
		 */

		$this->load->view('search_list',$data);
		}		 

	}

	public function search($key)
	 {
		 $this->db->like('title',$key); //title arama yapıldı 
		 $query = $this->db->order_by('newcastid', 'desc')->get('newscast'); //sıralama yapıldı ve newcast tablosu getirildi
		 $this->session->set_flashdata("aramabasarili","Arama İşlemi Yapıldı");
		 return $query->result();
		 
	 }

} 

