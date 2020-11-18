<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {



	public function index()
	{

		$viewData = new stdClass();

		$viewData-> rows = //bu tanımlanan rows arraydaki rows olacak
		$this->db->get("purchase")->result(); 
		$this->load->view('purchase_list',$viewData);

		

	}


	public function newPage()

	{

		$viewData = new stdClass();

		$viewData -> products = $this->db->where("isActive",1)->get("product")->result();

		$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result();

		$this->load->view('purchase_add',$viewData);

	}	

	public function save()

	{
 

		$data = array(
			'invoice' =>  $this->input->post('invoice'), 
			'detail' =>  $this->input->post('detail'),
			'quantity' =>  $this->input->post('quantity'),
			'price' =>  $this->input->post('price'),
			'total_price' =>  $this->input->post('quantity') * $this->input->post('price'),
			'date' =>  date("Y-m-d"),
			'product_id' =>  $this->input->post('product_id'),
			'supplier_id' =>  $this->input->post('supplier_id')
		);

		$insert = $this->db->insert("purchase",$data);

		if ($insert) {      

			//burda ürün idsine göre seçilen ürünün ozelliklerini ekrana bastık 
			$product_id = $this->input->post("product_id");
			$quantity = $this->input->post("quantity");
			$price = $this->input->post("price");
			
			$product = $this->db->where("id",$product_id)->get("product")->row(); 

		    $old_quantity = $product->quantity;
		    $new_quantity = $old_quantity + $quantity;

		    $data = array(
		    	"quantity"   => $new_quantity,
		    	"list_price" => $price
		    );

		    $update = $this->db->where("id",$product_id)->update("product",$data);
			
			redirect(base_url("purchase"));
               
		}

		else{
			echo "basarısız";
		}
		
	}		


	public function delete($id)

	{
		


		$delete = $this->db->delete("purchase",array('id' => $id ));

		if ($delete) {
			redirect(base_url("purchase"));
		}
		else{
			echo "hata";
		}



	}	

	public function editPage($id)

	{
		 
		$viewData = new stdClass();

		$viewData-> purchase = $this->db->where("id",$id)->get("purchase")->row(); 

		//purchases dersen patşar orjinal ismini ister burda 

		$viewData -> products = $this->db->where("isActive",1)->get("product")->result();

		$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result();

		$viewData->aktif="test";


		$this->load->view('purchase_edit',$viewData); //burda categori butonuna basınca ekrana cıkar



	}


	public function update($id)

	{		

		$invoice = $this->input->post("invoice");
		$detail = $this->input->post("detail");
		$quantity = $this->input->post("quantity");
		$price = $this->input->post("price");
		$total_price = $this->input->post("total_price");
		
				

		$data = array(
			'invoice' => $invoice,
			'detail' => $detail,
			'quantity' => $quantity,
			'price' => $price,
			'total_price' =>  $this->input->post('quantity') * $this->input->post('price')
			//burda carpım yaptırdık duzenleme içinde 

		) ;

		$update = $this->db->where('id' , $id ) ->update("purchase",$data);

		if ($update) {
			redirect(base_url("purchase"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

	}




} 

