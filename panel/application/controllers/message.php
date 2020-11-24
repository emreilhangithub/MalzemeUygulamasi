<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

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

		$viewData-> contacts = 
		$this->db->order_by("id", "desc")->get("contact")->result(); 
		$this->load->view('message_list',$viewData);

	
	}
	
public function delete($id)

	{
		


		$delete = $this->db->delete("contact",array('id' => $id ));

		if ($delete) {
			$this->session->set_flashdata("silmebasarili","Silme İşlemi Yapıldı");
			redirect(base_url("message"));
			//echo true;
		}
		else{
			echo false;
		}



	}	

public function editPage($id)

	{
	
		$this->db->query("UPDATE contact SET status='okundu' WHERE id=$id");//duzenle butonuna basınca okundu yapar

		$viewData = new stdClass();

		$viewData-> contact = $this->db->where("id",$id)->get("contact")->row(); 
		

		$viewData->aktif="test";


		$this->load->view('message_edit',$viewData); //buraya yazdıgımız alan ekrana cıkacak sayfadır 



	}



public function update($id)

	{
		$status = $this->input->post("status");
		$adminmessage = $this->input->post("adminmessage");		
		

		$data = array(
			'status' => $status,
			'adminmessage' => $adminmessage


		) ;

		$update = $this->db->where('id' , $id ) ->update("contact",$data);

		if ($update) {
			$this->session->set_flashdata("duzenlemebasarili","Duzenleme İşlemi Yapıldı"); 
			redirect(base_url("message"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

	}






} 

