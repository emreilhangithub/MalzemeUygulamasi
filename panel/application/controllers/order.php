<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {



	public function index()
	{

		$viewData = new stdClass();

		$viewData-> rows = //bu tanımlanan rows arraydaki rows olacak
		$this->db->get("order")->result(); 
		$this->load->view('order_list',$viewData);

		

	}


	public function newPage()

	{

		$viewData = new stdClass();

		$viewData -> products = $this->db->where("isActive",1)->get("product")->result();

		$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result();

		$this->load->view('order_add',$viewData);

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

			$invoice =  $this->input->post('invoice');
			$product_id = $this->input->post("product_id");
			$quantity = $this->input->post("quantity");
			$price = $this->input->post("price");
			$product_id  = $this->input->post('product_id');
			$supplier_id  = $this->input->post('supplier_id');

			$product = $this->db->where("id",$product_id)->get("product")->row(); 

		    $old_quantity = $product->quantity;
		    $new_quantity = $old_quantity - $quantity;
		    $newadd_quantity = $old_quantity + $quantity;
			

		   	echo "Eski Miktar = "; print_r($old_quantity); echo "<br>"; 			
		    echo "Girilen Miktar =";  print_r($quantity); echo "<br>";
		    echo "Yeni Olacak Miktar =  "; print_r($new_quantity); echo "<br>";


		    if ($old_quantity<=$quantity) {

		   	$alis = array(
			'invoice' =>  $invoice, 
			'detail' =>  "stok yetmedi",
			'quantity' =>  $quantity,
			'price' =>  $price,
			'total_price' =>  $quantity*$price,
			'date' =>  date("Y-m-d"),
			'product_id' =>  $product_id,
			'supplier_id' =>  $supplier_id
		    );

		   	//$this->db->insert("purchase",$alis);
		   	
		     $insert = $this->db->insert("purchase",$alis);

		     if ($insert) {
		     	 $newdata = array(
		    	"quantity"   => $newadd_quantity,
		    	"sale_price" => $price
							    );

				    $update = $this->db->where("id",$product_id)->update("product",$newdata);
		     	redirect(base_url("purchase"));
		     }

		     else{
				echo "alış faturası  işlemi yapılmaadı hata var";
				}


		   	}

		   	else{

		   		$insert = $this->db->insert("order",$data);


					if ($insert) {  
					 $data = array(
		    	"quantity"   => $new_quantity,
		    	"sale_price" => $price
							    );

				    $update = $this->db->where("id",$product_id)->update("product",$data);
					
					redirect(base_url("order"));
		               
						}

						else{
							echo "satış işlemi yapılmaadı hata var";
						}    



		  
		  	 	}    	
               
		

		
	}		


	public function delete($id)

	{
		


		$delete = $this->db->delete("order",array('id' => $id ));

		if ($delete) {
			redirect(base_url("order"));
		}
		else{
			echo "hata";
		}



	}	

	public function editPage($id)

	{
		 
		$viewData = new stdClass();

		$viewData-> order = $this->db->where("id",$id)->get("order")->row(); 

		//orders dersen patşar orjinal ismini ister burda 

		$viewData -> products = $this->db->where("isActive",1)->get("product")->result();

		$viewData -> suppliers = $this->db->where("isActive",1)->get("supplier")->result();

		$viewData->aktif="test";


		$this->load->view('order_edit',$viewData); //burda categori butonuna basınca ekrana cıkar



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

		$update = $this->db->where('id' , $id ) ->update("order",$data);

		if ($update) {
			redirect(base_url("order"));
		}
		else{
			echo "Duzenleme işlemi başarısız oldu ";
		}

	}




} 

