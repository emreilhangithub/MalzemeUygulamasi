<?php
/**
 * Developer =  Mustafa Emre İlhan
 * Company = BTI Bilişim Danışmanlık ve Yazılım
 * Mission = Junior Software Developerer
 * 7.12.2020 13:44
 */

class Exde extends MirasVeren

{
    public function test()
    {
       return $this->isimYaz();
    }



}

$exde = new Exde();
echo "Başka librariden miras aldım = ".$exde->test()."<hr>";

