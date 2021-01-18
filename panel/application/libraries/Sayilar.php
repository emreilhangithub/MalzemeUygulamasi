<?php
/**
 * Developer =  Mustafa Emre İlhan
 * Company = BTI Bilişim Danışmanlık ve Yazılım
 * Mission = Junior Software Developerer
 * 7.12.2020 10:14
 */

class Sayilar
{
    public $sayi1="bir";
    private $sayi2="iki";
    protected $sayi3="uc";


    public function s1()
    {
    return $this->sayi1;
    }

    public function s2()
    {
        return $this->sayi2;
    }
    public function s3()
    {
        return $this->sayi3;
    }
    private function s1s2s3()
    {
        return $this->sayi1."+".$this->sayi2."+".$this->sayi3;
    }
    public function topla()
    {
        return $this->s1s2s3(); //method içinde methodu cagırdık
    }




}
$sayilar = new Sayilar;
echo $sayilar->sayi1;//sadece sayi bire erişebiliriz digerlerine erişemezsin
echo $sayilar->s1();
echo $sayilar->s2();
echo $sayilar->s3();
echo $sayilar->topla();
echo "<hr>";