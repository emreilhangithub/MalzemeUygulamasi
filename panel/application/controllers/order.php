<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata("oturum_data")) {  
			$this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
			redirect(base_url().'login'); 
		}

		date_default_timezone_set('Etc/GMT-3');

	}



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

         //  echo "<pre>";
         // print_r($this->input->post());
         // exit;
        /* Satınalma siparişi oluşturma başlangıç */

        $products = $this->input->post('product_id');
        $quantities = $this->input->post('quantity');
        $prices = $this->input->post('price');
        $totalPrice = 0;
        $orderLines = array();
        foreach($products as $key=>$pro)
        {
            $totalPrice += $prices[$key]*$quantities[$key];
            $orderLines[$key]["productId"]=$pro;
            $orderLines[$key]["price"]=$prices[$key];
            $orderLines[$key]["quantity"]=$quantities[$key];
        }
        $data = array(
            'invoice' =>  $this->input->post('invoice'),
            'detail' =>  $this->input->post('detail'),
            'date' =>  date('d.m.Y H:i:s'),
            'total_price'=>$totalPrice,
            'supplier_id'=>$this->input->post('supplier_id')
        );
        
       //  echo "<pre>";
       // print_r($data);
       // exit;

        $insert = $this->db->insert("order",$data);
        $insertId = $this->db->insert_id();
        if($insertId>0)
        {
            foreach($products as $key=>$pro)
            {

                $orderLines[$key]["productId"]=$pro;
                $orderLines[$key]["price"]=$prices[$key];
                $orderLines[$key]["quantity"]=$quantities[$key];
                $orderLines[$key]["salid"]=$insertId;
            }

            $this->db->insert_batch("sales",$orderLines);
             $this->session->set_flashdata("eklemebasarili","Ekleme İşlemi Yapıldı"); 
            redirect(base_url("order"));
        }
        /* Satınalma siparişi oluşturma bitiş */


        if ($insert) {

            //burda ürün idsine göre seçilen ürünün ozelliklerini ekrana bastık
            $product_id = $this->input->post("product_id");
            $quantity = $this->input->post("quantity");
            $price = $this->input->post("price");

            $product = $this->db->where("id",$product_id)->get("order")->row();

            $old_quantity = $product->quantity;
            $new_quantity = $old_quantity + $quantity;

            $data = array(
                "quantity"   => $new_quantity,
                "list_price" => $price
            );

            $update = $this->db->where("id",$product_id)->update("product",$data);

           
            redirect(base_url("order"));

        }

        else{
        	redirect(base_url("order/newPage"));
            echo "basarısız";
        }

		
	}		


	public function delete($id)

	{
		


		$delete = $this->db->delete("order",array('id' => $id ));

		if ($delete) {
			$this->session->set_flashdata("silmebasarili","Silme İşlemi Yapıldı");  
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


    public function detail($id)

    {       

        $rows = $this->db->query("SELECT *
		FROM `order` 
		INNER JOIN supplier ON supplier.supplierid = order.supplier_id 
		WHERE order.id=$id")->result();
		
  		$sales = $this->db->query("SELECT *
		FROM `sales`
		INNER JOIN product ON product.productid = sales.productId  		 
		WHERE sales.salid=$id")->result();

		$viewData = array('rows' => $rows,
			'sales' => $sales
		);

		// echo "<pre>";
  //      print_r($viewData);
  //      exit;

		 $this->load->view("orderdetail_list",$viewData);

    }

	 


} 

