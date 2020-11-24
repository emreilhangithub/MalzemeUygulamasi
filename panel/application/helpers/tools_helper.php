<?php 

function get_product_title($id)
{
	$CI = &get_instance(); 
	$row = $CI->db
	->where("productid", $id)
	->get("product")
	->row();
	

	$title = "<span style='color:red'> Ürün Bulanamadı !!! </span>";

	if (!empty($row)) {
		$title=$row->titlee;
	}

		return $title;

}

function get_category_title($id)
{
	$CI = &get_instance(); 
	$row = $CI->db
	->where("id", $id)
	->get("category")
	->row();
	

	$title = "<span style='color:red'> Kategori Bulanamadı !!! </span>";

	if (!empty($row)) {
		$title=$row->title;
	}

		return $title;

} 


function get_supplier_title($id)
{

/*  burası bir php dosyası htis kelimesini kullanamazsın o yuzden CTI yı cekecez
	row tek satır row title yani title getir demek oldu 
	neden CI tanımladk cunku this yok diye 
	*/

	$CI = &get_instance(); 
	$row = $CI->db
	->where("supplierid", $id)
	->get("supplier")
	->row();
	
	$title = "<span style='color:red'> Tedarikçi Bulanamadı !!! </span>";

	if (!empty($row)) {
		$title=$row->title;
	} 

		return $title;
//geri dondurmek için title ekledik basına 
}



function get_category_parent($id)
{
	$CI = &get_instance(); 
	$row = $CI->db
	->where("id", $id)
	->get("category")
	->row();
	

	$title = "<span style='color:red'> Üst Kategori Yok</span>";

	if (!empty($row)) {
		$title=$row->title;
	}

		return $title;

} 




?>