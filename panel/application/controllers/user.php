<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

		$viewData-> users = 
		$this->db->order_by('id', 'desc')->get("user")->result(); 
		
		$this->load->view('user_list',$viewData);

		

	}


	public function isActiveSetter()

	{

	$isActive = $this->input->post("isActive");
	$isActive = ($isActive == "true") ? 1 : 0;

	$id =	$this->input->post("id");


	$update = $this->db
	->where(array('id' => $id ))
	->update("user",array("isActive" => $isActive))	;

}


	public function newPage()

	{

		//$viewData = new stdClass();

		//$viewData -> categories = $this->db->where("isActive",1)->get("kategoriler")->result();

		//$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result();

		//$this->load->view('user_add',$viewData);

		$this->load->view('user_add');

	}	

	public function save()

	{

		/*	
		echo "<pre>";
		print_r($this->input->post());
		exit;
		*/

		/* file bir dizidir  filın ismi nereye kaydatecegi boyut her seyi yazar burda 
		print_r($_FILES); die();
		*/  
		//$img_id = $_FILES["img_id"] ["name"]; //urlyi almak için kullandık 
		//nimes php jpg bolumune bak
		$data = array(
			'user' =>  $this->input->post('user'), 
			'email' =>  $this->input->post('email'),
			'password' =>  $this->input->post('password'),
			'adress' =>  $this->input->post('adress'),
			'phone' =>  $this->input->post('phone'),
			'city' =>  $this->input->post('city'),
			'authority' =>  $this->input->post('authority'),
			'registerdate' => date("Y-m-d"),
			'img_id' => $_FILES["img_id"] ["name"]
		);
		
		/*
		echo "<pre>";
		print_r($data);
		exit;
		*/	

			$config['upload_path']          = 'uploads'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR;
			$config['allowed_types']        = 'png|jpg|jpeg';
			//$config['encrypt_name']        = true;
				
               	$this->load->library('upload', $config);			 		
               	$this->upload->initialize($config);

                $upload = $this->upload->do_upload('img_id') ; //img id
                if (!$upload) {
                	print_r($this->upload->display_errors());
                	exit();
                } 

                else{
                	$this->db->insert("user",$data); 

                }

			redirect(base_url("user"));
		

		
	}		


	public function delete($id)

	{
		//echo $id; burda silecegimiz idyi butona tıklayınca ekrana basmasına yaradı


		$delete = $this->db->delete("user",array('id' => $id ));

		if ($delete) {
			redirect(base_url("user"));
		}
		else{
			echo "hata";
		}



	}	

	public function editPage($id)

	{
		/* 
		Ekrana Katogeriniin bilgilerini basıyoruz 
		$product = $this->db->where("id",$id)->get("product")->row();

		print_r($product);

		*/

		
		$viewData = new stdClass();

		$viewData-> user = $this->db->where("id",$id)->get("user")->row();

		/* Ekranda tedarikçileri ve kategorileri gosterme  */ 
		//$viewData -> categories = $this->db->where("isActive",1)->get("kategoriler")->result();

		//$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result(); 
		/* bitiş  */  	
		

		//$viewData->aktif="test";


		$this->load->view('user_edit',$viewData); //burda categori butonuna basınca ekrana cıkar



	}


	public function update($id)

	{

		/*
		echo $id;	
		echo "<pre>";
		print_r($this->input->post());
		echo $isActive = $this->input->post("isActive");
		exit;
		*/
	
		$user = $this->input->post("user");
		$email = $this->input->post("email");
		$password = $this->input->post("password");		
		$adress = $this->input->post("adress");		
		$phone = $this->input->post("phone");
		$city = $this->input->post("city");
		$authority = $this->input->post("authority");
		$isActive = $this->input->post("isActive");


		$img_id = $_FILES["img_id"] ["name"];

		$isActive = ($isActive == "1") ? 1 : 0;
		

		$data = array(
			'user' => $user,
			'email' => $email,
			'password' => $password,
			'adress' => $adress,
			'phone' => $phone,
			'city' => $city,
			'authority' => $authority,
			'isActive' => $isActive,
			'img_id' => $img_id
	) ;
		
		/*
	    echo "<pre>";
		print_r($data);
		exit;
		*/


		$update = $this->db->where('id' , $id ) ->update("user",$data);

			if ($update) {

				$config['upload_path']          = 'uploads/user/';
                $config['allowed_types']        = 'jpg|png';
				//$config['encrypt_name']        = true;//dosyaya kayıt ismini random yapar

                 $this->load->library('upload', $config);

                $upload = $this->upload->do_upload('img_id') ; 

                 if (!$upload) {
                	echo "
                	<span style='color:red'> Resim yüklemesi yapılamadı 
                	Lüften jpg- png kayıt yapınız </span>";
                	die();
                }
            $this->session->set_flashdata("duzenlemebasarili","Duzenleme İşlemi Yapıldı");     
			redirect(base_url("user"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

}	


public function detailPage($id)

	{
			$viewData = new stdClass();

		$viewData-> user = $this->db->where("id",$id)->get("user")->row();

		/* Ekranda tedarikçileri ve kategorileri gosterme  */ 
		//$viewData -> categories = $this->db->get("kategoriler")->result();

		//$viewData -> suppliers = $this->db->get("supplier")->result(); 
		/* bitiş  */  	
		

		//$viewData->aktif="test";

		$this->load->view('user_detail',$viewData); //burda categori butonuna basınca ekrana cıkar



	}



} 

