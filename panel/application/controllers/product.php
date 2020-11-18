<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    /* 
	public function __construct ()

	{
		parent::__construct();
		
		$this->load->library("deneme");

		//die("basladi");
	}
	*/

	public function index()
	{

// echo "Product";
// die();

		$viewData = new stdClass();

		$viewData-> rows = 
		$this->db->order_by('id', 'desc')->get("product")->result(); 
		//Mor ile yazılan alan bizim sayfa $categories olarak kullanıdıgımız alana denk gelir

		/* product list sayfasında yazdıgımız view datayı yani dbden cektigmiz Ekrana bastık */
		

		//print_r($viewData->rows);
		$this->load->view('product_list',$viewData);

		

	}


	public function isActiveSetter()

	{

	$isActive = $this->input->post("isActive");
	$isActive = ($isActive == "true") ? 1 : 0;

	$id =	$this->input->post("id");


	$update = $this->db
	->where(array('id' => $id ))
	->update("product",array("isActive" => $isActive))	;

}


	public function newPage()

	{

		$viewData = new stdClass();

		$viewData -> categories = $this->db->where("isActive",1)->get("kategoriler")->result();

		$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result();

		$this->load->view('product_add',$viewData);

	}	

	public function save()

	{

		/* file bir dizidir  filın ismi nereye kaydatecegi boyut her seyi yazar burda 
		print_r($_FILES); die();
		*/  
		//$img_id = $_FILES["img_id"] ["name"]; //urlyi almak için kullandık 
		//nimes php jpg bolumune bak
		$data = array(
			'title' =>  $this->input->post('title'), 
			'code' =>  $this->input->post('code'),
			'detail' =>  $this->input->post('detail'),
			'quantity' =>  $this->input->post('quantity'),
			'list_price' =>  $this->input->post('list_price'),
			'sale_price' =>  $this->input->post('sale_price'),
			'total_list' =>  $this->input->post('list_price') * $this->input->post('kdv') +  $this->input->post('list_price'),
			'total_sale' =>  $this->input->post('sale_price') * $this->input->post('kdv') +  $this->input->post('sale_price'),
			'kdv' =>  $this->input->post('kdv'),
			'category_id' =>  $this->input->post('category_id'),
			'supplier_id' =>  $this->input->post('supplier_id'),
			'img_id' => $_FILES["img_id"] ["name"]
		);
			$config['upload_path']          = 'uploads'.DIRECTORY_SEPARATOR.'product'.DIRECTORY_SEPARATOR;
			$config['allowed_types']        = 'png|jpg|jpeg';
			$config['encrypt_name']        = true;
				
               	$this->load->library('upload', $config);			 		
               	$this->upload->initialize($config);

                $upload = $this->upload->do_upload('img_id') ; //img id
                if (!$upload) {
                	print_r($this->upload->display_errors());
                	exit();
                } 

                else{
                	$this->db->insert("product",$data); 

                }

			redirect(base_url("product"));
		

		
	}		


	public function delete($id)

	{
		//echo $id; burda silecegimiz idyi butona tıklayınca ekrana basmasına yaradı


		$delete = $this->db->delete("product",array('id' => $id ));

		if ($delete) {
			redirect(base_url("product"));
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

		$viewData-> product = $this->db->where("id",$id)->get("product")->row();

		/* Ekranda tedarikçileri ve kategorileri gosterme  */ 
		$viewData -> categories = $this->db->where("isActive",1)->get("kategoriler")->result();

		$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result(); 
		/* bitiş  */  	
		

		$viewData->aktif="test";


		$this->load->view('product_edit',$viewData); //burda categori butonuna basınca ekrana cıkar



	}


	public function update($id)

	{
		


		// echo "<pre>";
		// print_r($this->input->post());
		// echo $isActive = $this->input->post("isActive");
		// exit;
		
		$code = $this->input->post("code");
		$title = $this->input->post("title");
		$quantity = $this->input->post("quantity");
		$list_price = $this->input->post("list_price");
		$sale_price = $this->input->post("sale_price");
		$total_list =  $this->input->post('list_price') * $this->input->post('kdv') +  $this->input->post('list_price');
		$total_sale  =  $this->input->post('sale_price') * $this->input->post('kdv') +  $this->input->post('sale_price');
		$kdv  =  $this->input->post('kdv');
		$kategori_id = $this->input->post("kategori_id");
		$supplier_id = $this->input->post("supplier_id");
		$isActive = $this->input->post("isActive");
		$img_id = $_FILES["img_id"] ["name"];

		$isActive = ($isActive == "1") ? 1 : 0;
		

		$data = array(
			'code' => $code,
			'title' => $title,
			'quantity' => $quantity,
			'list_price' => $list_price,
			'sale_price' => $sale_price,
			'total_list' => $total_list,
			'total_sale' => $total_sale,
			'kdv' => $kdv,
			'kategori_id' => $kategori_id,
			'supplier_id' => $supplier_id,
			'isActive' => $isActive,
			'img_id' => $img_id


	) ;

		$update = $this->db->where('id' , $id ) ->update("product",$data);

			if ($update) {

				$config['upload_path']          = 'uploads/';
				$config['allowed_types']        = 'jpg|png';
				$config['encrypt_name']        = true;//dosyaya kayıt ismini random yapar

                 $this->load->library('upload', $config);

                $upload = $this->upload->do_upload('img_id') ; 

                 if (!$upload) {
                	echo "
                	<span style='color:red'> Resim yüklemesi yapılamadı 
                	Lüften jpg- png kayıt yapınız </span>";
                	die();
                }

			redirect(base_url("product"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

}	



} 

