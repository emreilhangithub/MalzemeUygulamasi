<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basket extends CI_Controller {


        public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("oturum_data")) {  
            $this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
            redirect(base_url().'login'); 
        }
         $this->load->model("BasketModel");
         date_default_timezone_set('Etc/GMT-3');

    }

    public function index()
    {
    	$userid =  $this->session->oturum_data['userid'];//session cagırdık user id aldık

    	$user = $this->db->query("SELECT * FROM user WHERE user.id=$userid")->row(); //user bilgileri cagırdık


    	$listele = $this->db->query("SELECT basket.*,product.titlee as urunadi, product.total_list as urunfiyat
		FROM `basket` 
		INNER JOIN product ON product.productid = basket.product_id 
		WHERE basket.user_id=$userid order by basket_id")->result();

		// $toplamurun = $this->db->query("SELECT AVG(basket_id)
		// FROM `basket`
		// WHERE basket.user_id=$userid")->result();

		

		$viewData = array(
			'user' => $user,
			'listele' => $listele
			// 'toplamurun'=>$toplamurun
		);

    	 $this->load->view('basket_list',$viewData);
    	

  //   	 $listele = $this->BasketModel->select();

		// $viewData = array(
		// 	'listele' => $listele);

  //   	 $this->load->view('basket_list',$viewData);	
    }

  
	public function save($id)
	{

	$data = array(
		'user_id' =>  $this->session->oturum_data['userid'], 
		'product_id' =>  $id, 
		'basket_date' =>  date('d.m.Y H:i:s'),
		'basket_quentity' =>  $this->input->post("basket_quentity")
	);

	

	$insert = $this->BasketModel->insert($data);	

		if ($insert) {
			$this->session->set_flashdata("sepet","Ürün Sepetinize Eklendi");
			redirect(base_url("product/detailPage/$id"));
		}
		else 
			{ redirect(base_url("insertPage")); }
     	
	}

	public function delete($id)
	{

		$where = array(
			'basket_id' => $id			
		);

		$delete = $this->BasketModel->delete($where);

		$this->session->set_flashdata("silmebasarili","Silme İşlemi Yapıldı"); 
		redirect(base_url("basket"));
	}

	
}