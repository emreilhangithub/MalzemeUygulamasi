<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receivedorder extends CI_Controller {


        public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("oturum_data")) {  
            $this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
            redirect(base_url().'login'); 
        }
         $this->load->model("ReceivedorderModel");
         $this->load->model("OderProductModel");
         date_default_timezone_set('Etc/GMT-3');

    }

    public function index()
    {

    $userid =  $this->session->oturum_data['userid'];

    $where = array(
            'orderuserid' =>  $userid         
        ); 
    
    $listele = $this->ReceivedorderModel->rowselect($where); 

    $viewData = array(
    'listele' => $listele);

       $this->load->view('receivedorder_list',$viewData);     
    

    }


    public function save()
    {

    $userid =  $this->session->oturum_data['userid'];

    //banka kredi kartı ödeme tutarı gonderilip onay alınması kısmı

    //formdan verileri aldık $data ile
    $data = array(
        'orderuserid' =>   $userid, 
        'orderdate' =>  date('d.m.Y H:i:s'),
        'orderip' =>  $_SERVER["REMOTE_ADDR"],
        'ordername' =>  $this->input->post("ordername"), 
        'orderadress' => $this->input->post("orderadress"),
         'orderphone' =>  $this->input->post("orderphone"), 
         'ordercity' =>  $this->input->post("ordercity"),   
         'total_amount' =>  $this->input->post("total_amount"),
         'cardno' =>  $this->input->post("cardno")
        
    );

          // 'cardno' =>  $this->input->post("cardno"),
         // 'moon' =>  $this->input->post("moon"),
         // 'year' =>  $this->input->post("year"),
         // 'scode' =>  $this->input->post("scode")

     //echo $insert = $this->ReceivedorderModel->insert($data); 
      //burada son gelen idyi ekrana bastırdıkki $inserti sepetteki ürünleri gostermek için  
    $insert = $this->ReceivedorderModel->insert($data);  

     //$insert=16; 

  //print_r($data);

      if ($insert) {

    $query = $this->db->query("SELECT basket.*,product.titlee as urunadi, product.total_list as urunfiyat, product.productid 
        FROM `basket` 
        INNER JOIN product ON product.productid = basket.product_id 
        WHERE basket.user_id=$userid order by basket_id"); //result();

    //print_r($listele);

     $veriler= $query->result();
     //print_r($veriler);    

        foreach ($veriler as $rs) {
            $op = array(
            'op_userid' =>  $this->session->oturum_data['userid'],
            'order_id' =>  $insert,//urun_id demişti burada
            'op_productid' => $rs->product_id,//eşitledik bunu yukarı = productid o yüzden bize sorun yaratıyordu 
            'op_name' =>  $rs->urunadi,//artık buna urun adi dedik join de o yuzden urun adi yazmak zorundasin
            'op_quantity'=>$rs->basket_quentity,//quantity
            'op_price' =>  $rs->urunfiyat,
            'op_amount' => $rs->basket_quentity*$rs->urunfiyat     
            );
             $this->OderProductModel->insert($op);  
             //print_r($op);

        } //forach bitiş

        } //$,nsert if bitiş

        // başarılıysa musterinin sepeti bosalt 
        $this->db->query("DELETE FROM basket WHERE basket.user_id=$userid ");

    //     exit();

         $this->session->set_flashdata("eklemebasarili","Sipariş Başarıyla Tamamlandı");
          redirect(base_url("receivedorder"));





        // else 
        //     { redirect(base_url("basket")); }    

    }


    public function orderproduct($id)
    { 

     $userid =  $this->session->oturum_data['userid'];   

    $where = array(
            'op_userid' =>  $userid,
            'order_id'  =>  $id       
        ); 


    $wheretwo = array(
            'orderid'  =>  $id       
        ); 
    
     $listele = $this->ReceivedorderModel->rowselectt($where);
     $getir = $this->ReceivedorderModel->rowselect($wheretwo);


     $viewData = array(
     'listele' => $listele,
     'getir' =>$getir
    );

    
    foreach ($getir as $row) //foreach sutunlara ulas TODO
    
    $kullanici = $row->orderuserid; // sipariş tablosundan kullanıcıyı bulTODO
    
     if($userid == $kullanici) 
     //eğer $userid == $kullanici  o zaman siparişi gör TODO

     {
        $this->load->view('orderproduct_list',$viewData); 
     }

     else { //aynı degılse siparişlerime geri don
        redirect(base_url('receivedorder'));
    }
    

   
    
    

     

    
    

    }




	
}