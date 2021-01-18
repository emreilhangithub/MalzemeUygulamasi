<?php
/**
 * Developer =  Mustafa Emre İlhan
 * Company = BTI Bilişim Danışmanlık ve Yazılım
 * Mission = Junior Software Developerer
 * 7.12.2020 11:59
 */

class MirasVeren

{
    public $isim = "Mustafa Emre";
    public $soyisim = "İlhan";

    public function isimYaz()
    {
        return "Benim Adım " . $this->isim;
    }
    protected function soyisimYaz()
    {
        return "Benim Soyadım" .$this->soyisim;
        //return $this->isimYaz().$this->soyisim;
    }

    public $name;
    public $color;

    public function test()
    {
        return $this->soyisimYaz();
    }




}

class MirasAlan extends MirasVeren //miras aldık
{
    public $ahmet="ahmet";
    public function isimSoyisim()
        //burda ismi aynı yaparsan miras calısmaz dikkat!
        //calısması için ::parent yazmamız lazım
    {
     return   $this->isimYaz();
    }
    public function soyisimYaz()
    {
        return parent::soyisimYaz(); //parent:: olmazsa ve aynı isim olursa mirası gormez ve içine yazılanı alır
    }

}

$mirasveren = new MirasVeren();
echo "Mirasveren ".$mirasveren->isim."<hr>";
echo "Mirasveren ".$mirasveren->soyisim."<hr>";
echo "Mirasveren ".$mirasveren->isimYaz()."<hr>";
//echo $mirasveren->soyisimYaz()."<hr>"; //hata doner basmaz ekrana cunku public degil
echo "Mirasveren ".$mirasveren->test()."<hr>";

$mirasalan = new MirasAlan();
echo "Mirasalan ".$mirasalan->isim."<hr>";
echo "Mirasalan ".$mirasalan->soyisim."<hr>";
echo "Mirasalan ".$mirasalan->isimYaz()."<hr>";
echo "Mirasalan ".$mirasalan->test()."<hr>";
echo "Mirasalan ".$mirasalan->ahmet."<hr>";
echo "Mirasalan".$mirasalan->isimSoyisim()."<hr>";//miras aldık ve method içinde miras içindeki methodu cagrıdık
echo "Mirasalan".$mirasalan->soyisimYaz()."<hr>";//miras aldık ve method içinde miras içindeki methodu cagrıdık
//echo "Mirasalan".$mirasalan->soyisimYaz()."<hr>"; //yazamazszın protected






//$mirasalan = new MirasAlan();
//echo $mirasalan->isim."<hr>";
//echo  $mirasalan->isimYaz()."<hr>";//methodu miras aldık
//echo $mirasalan->isimSoyisim()."<hr>";




