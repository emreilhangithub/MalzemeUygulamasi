<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
class Personelid 
 {

       public function reverse_name()
        {	
        	$CI = &get_instance(); 			
        	$CI->db2 = $CI->load->database('diger', TRUE);
        	$test = $CI->db2->query("SELECT * FROM telefon")->result();
        	
        }
}
*/

class category extends CI_Controller {

	  public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("oturum_data")) {  
            $this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap"); 
            redirect(base_url().'login'); 
        }
        
         $this->db2 = $this->load->database('diger', TRUE);

          $this->load->library(array('someclass', 'ExampleClass','MethodKullanimi'));

         // $this->load->library('someclass'); //someclass kütüphanesini cagırdık
         // $this->load->library('ExampleClass'); //example kütüphanesini cagırdık
          
    }




  
	public function index()
	{
$this->someclass->some_method();

$this->someclass->call_method();

echo "Kısa kullanım intance = "; $this->exampleclass->istance_method1();

echo "Kısa kullanım intance = "; $this->exampleclass->istance_method2();
     	
	/* var_dump kullanımı */

	echo "Var_dump kullanımı= ". "<br>";

	$cars = array("Volvo","BMW","Toyota",true);	

	var_dump($cars);

	echo "<hr>";


	/* foreach kullanımı */

	echo "foreach kullanımı= " . "<br>"; 
$sehirler = array(
	'İstanbul' => 34,
	'Ankara' => 06,
	'Adana' => 01,	
	 );

foreach ($sehirler as $key => $value) {
	echo "$key = $value <br>";
}

echo "<hr>";

/* foreach db2 veri cekme */

echo "foreach db2 veri cekme= " . "<br>"; 

$test = $this->db2->get("personel")->row();

$viewData = array('abc' => $test );

foreach ($test as $key => $value) {
	echo "$key = $value <br>";
}

echo "<hr>";



	
		/* result row result_array row_arrra kullanımı  */	

		echo "result row result_array row_arrra kullanımı = " . "<br>";
   		$result = $this->db2->get("personel")->result(); // std class object olarak geldi

        $resultarray = $this->db2->get("personel")->result_array(); //array olarak geldi 

	    $row = $this->db2->get("personel")->row(); // std class object olarak tek veri geldi

		 $rowarray = $this->db2->get("personel")->row_array(); // array olarak tek veri geldi

		  $viewData = array('result' => $result ,
		  	'resultarray' => $resultarray ,
		  	'row' => $row ,
		  	'rowarray' => $rowarray 
			);

		  print_r($viewData);

		  echo "<hr>";

		  /* Json kullanımı   */	

		  $array= array(array('turkish' => 'üğışçöÜĞİŞÇÖ'), array('chinese' => '我爱你'), array('arabic' => 'أنا أحبك'));

		$encodedTr = json_encode_tr($array);
		echo "Türkçe Encoded Json: ";
		var_dump($encodedTr);
		echo '<hr>';

		echo "Mehdod Kullanımı";
		writeMsg();
		familyName("emre");
		echo addNumbers(5,5); 
		familyDate("emre","11.10.1990");


		/* Library kullanarak method kullanmak*/
		$this->methodkullanimi->ilk_method("Ahmet");
		$this->methodkullanimi->ikinci_method("Yesil");
		// $this->parametrekullanimi->ilk_parametre("Yesil");
		// $this->parametrekullanimi->ikinci_parametre("Yesil");



}
}

function json_encode_tr($string)
{
    return json_encode($string, JSON_UNESCAPED_UNICODE);
}


function writeMsg() {
  echo "function cagırdık";
  echo "<br>";
}

function familyName($fname) {
  echo "İsminiz = $fname <br>";
}

function addNumbers(int $a, int $b) {
	echo "Toplama işlemi = <br>" ;
 	 return  $a + $b;
}	

function familyDate($fname, $year) {
  echo "İsminiz = $fname Doğum Tarihiniz = $year <hr>";
}

// class Fruit {
//   // Properties
//   public $name;
//   public $color;

//   // Methods
//   function set_name($name) {
//     $this->name = $name;
//   }
//   function get_name() {
//     return $this->name;
//   }
// }

// $apple = new Fruit();
// $banana = new Fruit();
// $apple->set_name('Apple');
// $banana->set_name('Banana');

// echo $apple->get_name();
// echo "<br>";
// echo $banana->get_name();




/* 
//1 
$query = $this->db2->query("SELECT * FROM personel");

		foreach ($query->result() as $row)
		{
		    echo $row->Personelid;
		      echo $row->isim;
		      echo $row->soyisim;
		}

		*/ 


		/* //2 

		$query = $this->db2->query("SELECT * FROM personel");

		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      echo $row->Personelid;
		      echo $row->isim;
		      echo $row->soyisim;
		   }
		}
		*/

		/*  //3
		$query = $this->db2->query("SELECT * FROM personel");

		foreach ($query->result('Personelid') as $row)
		{
		    echo $row->isim; // attributu cagırdık yani tablodaki ismi
		     echo $row->reverse_name();   //personel id yukardaki clas içinden fonksiyonu cagırdık 
		 
		}
		*/

		/* //4 
		$query = $this->db2->query("SELECT * FROM personel");		

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();

		   echo $row->Personelid;
		   echo $row->isim;
		   echo $row->soyisim;
		}
		*/

		/* //5 	
		$query = $this->db2->query("SELECT * FROM personel");	

		if ($query->num_rows() > 0)
		{
		   $row = $query->row_array();//() içine yazılan şeyler satırını belirtir 5 dersen 5.satırı getirir

		   echo $row['Personelid'];
		   echo $row['isim'];
		   echo $row['soyisim'];
		}
		*/ 

		/* //6 

		$query = $this->db2->query("SELECT * FROM personel");	

				if ($query->num_rows() > 0) // eğer satır sayısı 0 dan buyukse
		{				
					  $row = $query->row(5) ; //5.satırı getir
					  echo "Satır Sayısı" .  $query->num_rows() . "<br>";
					  echo "Sütun Sayısı" . $query->num_fields();	

					  echo "<br>";	   
					  echo $row->Personelid . "<br>";
				   echo $row->isim . "<br>";
				   echo $row->soyisim . "<br>";
				
		} */ 

		/* //7 		 

		 $this->db2->query("SELECT * FROM personel");

		  echo "Satır Sayısı" .  $query->num_rows() . "<br>";
		
		  echo "Sütun Sayısı" . $query->num_fields();		

		 */ 