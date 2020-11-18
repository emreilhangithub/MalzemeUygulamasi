<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

  
	public function index()
	{
     	$title='Kodmerkezi.net Pizza Sipariş Sayfası';
		$header='<h1>Siparişler</h1>';
		$orders='Sipariş Yok';
		//Şimdi üstteki değişkenleri bir araya toplayalım. Bunun için hepsini data dizisinin içine atalım.
		$data['title']=$title;
		$data['header']=$header;
		$data['orders']=$orders;
		$this->load->view('category_list',$data);
	 }
}