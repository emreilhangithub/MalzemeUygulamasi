<?php 

class Supplier extends CI_Controller { 


	public function __construct()

	{

		parent::__construct();

		$this->load->model("AuthorizedModel");

	}


	public function index()
	{

//1 ) echo "index"; burda ilk yazıyı gorduk 

		// 2) $viewData = new stdClass();

		// $rows = $this->db->get("supplier")->result(); 

		// print_r($rows);

		$viewData = new stdClass();

		$viewData->rows = $this->db->get("supplier")->result();


		$this->load->view('supplier_list',$viewData);




	}


	public function editPage($id)

	{
		/* 
		Ekrana Katogeriniin bilgilerini basıyoruz 
		$supplier = $this->db->where("id",$id)->get("supplier")->row();

		print_r($supplier);

		*/

		$viewData = new stdClass();

		$viewData-> supplier = $this->db->where("id",$id)->get("supplier")->row(); 

		$viewData->aktif="test";


		$this->load->view('supplier_edit',$viewData); //burda categori butonuna basınca ekrana cıkar



	}


	public function isActiveSetter()

	{

	$isActive = $this->input->post("isActive");
	$isActive = ($isActive == "true") ? 1 : 0;

	$id =	$this->input->post("id");


	$update = $this->db
	->where(array('id' => $id ))
	->update("supplier",array("isActive" => $isActive))	;

}


	public function newPage()
	{
		$this->load->view('supplier_add');

	}

	public function save()

	{
		$data = array(
			'title' =>  $this->input->post('title'),
			'phone' =>  $this->input->post('phone'),
			'email' =>  $this->input->post('email'),
			'adress' =>  $this->input->post('adress'),

		);

		$insert = $this->db->insert("supplier",$data);

		if ($insert) {
			redirect(base_url("supplier"));
		}
		else{
			echo "basarısız";
		}
		
	}


	public function update($id)

	{

		// echo "<pre>";
		// print_r($this->input->post());
		// echo $isActive = $this->input->post("isActive");
		// exit;
		

		$title = $this->input->post("title");
		$adress = $this->input->post("adress");
		$phone = $this->input->post("phone");
		$email = $this->input->post("email");
		$isActive = $this->input->post("isActive");

		$isActive = ($isActive == "1") ? 1 : 0;
		

		$data = array(
			'title' => $title,
			'adress' => $adress,
			'phone' => $phone,
			'email' => $email,
			'isActive' => $isActive


	) ;

		$update = $this->db->where('id' , $id ) ->update("supplier",$data);

			if ($update) {
			redirect(base_url("supplier"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

}	






	public function delete($id)

	{
		//echo $id; burda silecegimiz idyi butona tıklayınca ekrana basmasına yaradı


		$delete = $this->db->delete("supplier",array('id' => $id ));

		if ($delete) {
			redirect(base_url("supplier"));
			//echo true;
		}
		else{
			echo false;
		}


	}


	public function AuthorizedList($supplier_id)

	{	

		//$this->session->set_userdata("supplier_id", $supplier_id);

		$viewData = new stdClass();

		$viewData-> rows = $this->AuthorizedModel->select(
	    array(
	    	'supplier_id'  => $supplier_id
	    ));


		$this->load->view("authorized_list",$viewData);


	}

	public function AuthorizedDelete($id)

	{	

   $this->AuthorizedModel->delete(
	    array(
	    	'id'  => $id
	    ));


	}

	public function AuthorizedAddPage()

	{	

		$viewData = new stdClass();	

		$viewData -> suppliers = $this->db->get("supplier")->result();//bunu ekledik duzenlemek için
		/*where("isActive",1)->*/ /*Aktif Firmaları Getirir*/
		$viewData->aktif="test";

   		$this->load->view("authorized_add",$viewData);
	}


	public function AuthorizedAdd()

	{	

		$supplier_id =  $this->input->post("supplier_id");
   		$name = $this->input->post("name");
		$tel =  $this->input->post("tel");
		$mail =  $this->input->post("mail");

		$data = array(
			'supplier_id' => $supplier_id, 
			'name' => $name, 
			'tel' => $tel,
			'mail' => $mail
		);

		$insert = $this->AuthorizedModel->insert($data);	

		echo $insert;

		if ($insert) {
			redirect(base_url("supplier"));
		}
		else 
			{echo "başarısız işlem";}


	}	


	public function AuthorizedEditPage($id)

	{	
		

   		$where = array(
			'id' => $id			
		);

		$listele = $this->AuthorizedModel->edit($where);

		$viewData = array('listele' => $listele);		

		$this->load->view("authorized_edit",$viewData);


	}

	public function AuthorizedUpdate($id)

	{	

   		$supplier_id = $this->input->post("supplier_id");
		$name = $this->input->post("name");
		$tel =  $this->input->post("tel");
		$mail =  $this->input->post("mail");
		$isActive = $this->input->post("isActive");

		$data = array(
			'supplier_id' => $supplier_id, 
			'name' => $name,
			'tel' => $tel,
			'mail' => $mail,
			'isActive' => $isActive
		);

		$where = array(
			'id' => $id			
		);


		$update = $this->AuthorizedModel->update($where,$data);
	

		if ($update) {
			redirect(base_url("supplier"));
		}
		else 
			{echo "başarısız işlem";}

		
	}

public function authorizedisActiveSetter()

	{

		$id =	$this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;	


	$update = $this->db
	->where(array('id' => $id ))
	->update("authorized",array("isActive" => $isActive))	;

}





}