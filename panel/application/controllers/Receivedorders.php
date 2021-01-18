<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receivedorders extends CI_Controller {


        public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("oturum_data")) {  
            $this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
            redirect(base_url().'login'); 
        }
         $this->load->model("ReceivedorderModel");
         $this->load->model("OderProductModel");
        

    }

    public function index()
    {
    
    $listele = $this->ReceivedorderModel->select();

    $viewData = array(
    'listele' => $listele);

       $this->load->view('receivedorders_list',$viewData);
    

 }
	
}