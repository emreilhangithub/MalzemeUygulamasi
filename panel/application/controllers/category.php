<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("oturum_data")) {
            $this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap");
            redirect(base_url().'login');
        }
    }
	
    public function index()    {
       $viewData = new stdClass();

		 $viewData-> rows = 
		 $this->db->get("category")->result(); 
		$this->load->view('category_list',$viewData);	
    }
	
	public function newPage()

	{

		$viewData = new stdClass();

		$viewData -> category = $this->db->where("isActive",1)->get("category")->result();


		$this->load->view('category_add',$viewData);

	}	
	
	public function isActiveSetter()

	{

	$isActive = $this->input->post("isActive");
	$isActive = ($isActive == "true") ? 1 : 0;

	$id =	$this->input->post("id");


	$update = $this->db
	->where(array('id' => $id ))
	->update("category",array("isActive" => $isActive))	;

	}
	
	public function delete($id)

	{
		//echo $id; burda silecegimiz idyi butona tıklayınca ekrana basmasına yaradı


		$delete = $this->db->delete("category",array('id' => $id ));

		if ($delete) {
			redirect(base_url("category"));
		}
		else{
			echo "hata";
		}



	}

	public function detailPage($id)

	{
		$viewData = new stdClass();

		$viewData-> category = $this->db->where("id",$id)->get("category")->row();

		$this->load->view('category_detail',$viewData);

	}	

}