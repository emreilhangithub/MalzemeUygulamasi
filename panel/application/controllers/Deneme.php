<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deneme extends CI_Controller {
		

	public function index(){

    $this->load->model('DenemeModel');
    $data = $this->DenemeModel->get_categories();

    $viewData = array('data' => $data);

    $this->load->view("Deneme",$viewData);

   
    }
}
