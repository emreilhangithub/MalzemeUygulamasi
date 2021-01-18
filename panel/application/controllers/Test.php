<?php
/**
 * Developer =  Mustafa Emre İlhan
 * Company = BTI Bilişim Danışmanlık ve Yazılım
 * Mission = Junior Software Developerer
 * 7.12.2020 11:26
 */
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("Libim");
    }

    public  function index() {
       echo $this->libim->soyisim("ilhan")."<br>";
       echo $this->libim->yas("23")."<br>";


       //echo $this->libim->getVites()."<br>";
        //$this->libim->setVites(6)."<br>";

       
        $vitesSayisi = 6; //değişkenimizi tanımladık
        $this->libim->setVites($vitesSayisi)."<br>"; //değere set yani atama yaptık  
        echo "Librayiden cagırıp controllerda ekrana bastıgımız  Arabanın vites Sayısı = ".$this->libim->getVites()."<br>"; //değeri get yani cagırma işlemi yaptık

        echo $this->libim->test("Var değişkenini ilk defa kullandık")."<br>"; 



    }
}
