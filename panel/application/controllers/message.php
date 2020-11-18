<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

   	public function index()
	{

		$viewData = new stdClass();

		$viewData-> contacts = 
		$this->db->get("contact")->result(); 
		$this->load->view('message_list',$viewData);

	
	}
	
public function delete($id)

	{
		


		$delete = $this->db->delete("contact",array('id' => $id ));

		if ($delete) {
			redirect(base_url("message"));
			//echo true;
		}
		else{
			echo false;
		}



	}	

public function editPage($id)

	{
	

		$viewData = new stdClass();

		$viewData-> contact = $this->db->where("id",$id)->get("contact")->row(); 
		

		$viewData->aktif="test";


		$this->load->view('message_edit',$viewData); //buraya yazdıgımız alan ekrana cıkacak sayfadır 



	}



public function update($id)

	{
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$message = $this->input->post("message");		
		

		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'message' => $message


		) ;

		$update = $this->db->where('id' , $id ) ->update("contact",$data);

		if ($update) {
			redirect(base_url("message"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

	}






} 

