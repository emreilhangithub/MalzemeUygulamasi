<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newscast extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata("oturum_data")) {  
			$this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
			redirect(base_url().'login'); 
		}
		$this->load->model("NewscastModel");
		
        

	}



	public function index()
	{		
		$this->load->library("pagination");

		//echo $this->NewscastModel->get_count(); //ekrana toplamı basar
		//print_r($this->NewscastModel->get_records(10,10)); 10 kayıt getirir 

		$config ["base_url"] = base_url("newscast/index"); //getbooksa gonder orası verileri getirsin 
		$config ["total_rows"] = $this->NewscastModel->get_count(); //burada kac tane sayfa uretecegini soyleriz
		$config ["uri_segment"] = 3; //controller/method/parametre yani 3.oluyor linkde
		$config ["per_page"] = 20; //her sayfada gostermek istenilen kayıt sayısı 20 tane
		//$config ["num_links"] = 10; //linklerin sayısı gosterirken istersen 10 tane 10 sayfa link cıkar
		$config ["num_links"] = $config ["total_rows"]/$config ["per_page"] = 10; //tümünü goster	

		$this->pagination->initialize($config);

		/* 
		İnişiliza belirlenmiş olmus rakamlara gore sayfayı yapılandırmaktır 
		para matre alır kendi içine içine $config isimli bir array alır
		*/

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

		/* 
		20 den baslamaması için 0 dan baslması için yazddık
		Eğere uri deki segmentlerden 3.doluysa page segmend olur eger bossa 0 olacak
		*/

		$viewData = new stdClass();

		$viewData-> newscasts = $this->NewscastModel->get_records($config ["per_page"],$page);
		//limit = 1 sayfaya kac tane kayıt dusecegidir
		//count  = kacındı indisden sonra limit kadar almasını soyler

		$viewData-> links = $this->pagination->create_links();
		//linkleri olusturulan komutun adını crate links

		//print_r($viewData); iş bitince burda test ettik

		$viewData-> toplam = $this->NewscastModel->get_count();

		
		$this->load->view('newscast_list',$viewData);

	
	}


	public function isActiveSetter()

	{

	$isActive = $this->input->post("isActive");
	$isActive = ($isActive == "true") ? 1 : 0;

	$id =	$this->input->post("id");


	$update = $this->db
	->where(array('newcastid' => $id ))
	->update("newscast",array("isActive" => $isActive))	;

}


	public function newPage()

	{

		$viewData = new stdClass();

		$viewData -> products = $this->db->where("isActive",1)->get("product")->result();


		$this->load->view('newscast_add',$viewData);

	}	

	public function save()

	{

		/* file bir dizidir  filın ismi nereye kaydatecegi boyut her seyi yazar burda 
		print_r($_FILES); die();
		*/  


		$img_id = $_FILES["img_id"] ["name"]; //urlyi almak için kullandık 

		$data = array(
			'product_id' =>  $this->input->post('product_id'),
			'title' =>  $this->input->post('title'), 
			'description' =>  $this->input->post('description'),
			'keyword' =>  $this->input->post('keyword'),
			'date' =>  date("Y-m-d"),						
			'img_id' => $img_id
		);

		$insert = $this->db->insert("newscast",$data);

		if ($insert) {


			 	$config['upload_path']          = 'uploads/newscast/';
                $config['allowed_types']        = 'jpg|png';
                

                $this->load->library('upload', $config);

                $upload = $this->upload->do_upload('img_id') ; 

                if (!$upload) {
                	echo "
                	<span style='color:red'> Resim yüklemesi yapılamadı 
                	Lüften jpg- png kayıt yapınız </span>";
                	die();
                } 
            $this->session->set_flashdata("eklemebasarili","Ekleme İşlemi Yapıldı");   
			redirect(base_url("newscast"));
		}

		else{
			echo "basarısız";
		}
		
	}		




public function delete($id)

		{
		//echo $id; burda silecegimiz idyi butona tıklayınca ekrana basmasına yaradı


		$delete = $this->db->delete("newscast",array('newcastid' => $id ));

		if ($delete) {
			$this->session->set_flashdata("silmebasarili","Silme İşlemi Yapıldı");  
			redirect(base_url("newscast"));
			//echo true;
		}
		}

		public function editPage($id)

	{
		$where = array(
			'newcastid' => $id					
		);

		 $newscast = $this->NewscastModel->edit($where);

		//$newscast = $this->db->where($where)->get("newscast")->row();

		$products = $this->db->where("isActive",1)->get("product")->result();		

		$viewData = array(
			'newscast' => $newscast,
			 'products' => $products	
			);	


		$this->load->view('newscast_edit',$viewData); //burda categori butonuna basınca ekrana cıkar



	}


	public function update($id)

	{

		
		//echo "<pre>";
		//print_r($this->input->post());
		//echo $isActive = $this->input->post("isActive");
		//exit;
	
		$product_id = $this->input->post("product_id");
		$title = $this->input->post("title");
		$description = $this->input->post("description");		
		$keyword = $this->input->post("keyword");		
		$isActive = $this->input->post("isActive");
		$img_id = $_FILES["img_id"] ["name"];

		$isActive = ($isActive == "1") ? 1 : 0;
		

		$data = array(
			'product_id' => $product_id,
			'title' => $title,
			'description' => $description,
			'keyword' => $keyword,
			'isActive' => $isActive,
			'img_id' => $img_id


	) ;



		$update = $this->db->where('newcastid' , $id ) ->update("newscast",$data);

			if ($update) {

				$config['upload_path']          = 'uploads/newscast/';
                $config['allowed_types']        = 'jpg|png';

                 $this->load->library('upload', $config);

                $upload = $this->upload->do_upload('img_id') ; 

                 if (!$upload) {
                	echo "
                	<span style='color:red'> Resim yüklemesi yapılamadı 
                	Lüften jpg- png kayıt yapınız </span>";
                	die();
                }
            $this->session->set_flashdata("duzenlemebasarili","Duzenleme İşlemi Yapıldı");     
			redirect(base_url("newscast"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

}	









} 

