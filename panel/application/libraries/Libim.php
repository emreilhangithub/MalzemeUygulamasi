<?php
/**
 * Developer =  Mustafa Emre İlhan
 * Company = BTI Bilişim Danışmanlık ve Yazılım
 * Mission = Junior Software Developerer
 * 7.12.2020 10:46
 */


class Libim

{    

    public $isim;
    public $soyisim;
    public $yas;
    private $vites;
    private $renk;
    var $test;


     public function __construct($kisi_ismi='') //bos değer gönderdik hata vermemesi için consturctırın
    {
       $this-> isim = $kisi_ismi; // clastaki isim bu değeri ata =  $kisi_ismi parametresini ata diyoruz
    }


     public function get_isim(){ // construct öregni için bu methodu olusturduk
        return $this->isim; //ismi getir yani değeri getir diyoruz
    }


    
    public function soyisim($soyisim=null)
    {
        return "Soyisim = " . $soyisim;
    }
    public function yas($yas=null)
    {
        return "Yaş = " . $yas;
    }

    public function getVites(){
        return $this->vites; // vitesi getir yani değeri getir diyoruz
    }
    
    public function setVites($vites) {
        $this-> vites = $vites;   //  clastaki vitese bu değeri ata =  $vites parametresini ata diyoruz
    }

     public function getRenk(){
        return $this->renk;
    }
    public function setRenk($renk){
        $this-> renk =$renk;
    }
    public function test($var)
    {
        return $var;
    }

}


$libim = new Libim();

$libim->setVites(5); //değer ata
echo "Yeni Sınıftaki Arabanın vites Sayısı:".$libim->getVites()."<br>"; //değeri cagır

$libim->setRenk("beyaz");
echo "Yeni Sınıftaki  Arabanın rengi:".$libim->getRenk()."<br>";


$cns = new Libim("test"); // parantez içine yazılan değer construct ekrana bunu basaar
echo "Construct Dğeri : ".$cns->get_isim(); //nesneyi ve objeyi cagırdık burada


