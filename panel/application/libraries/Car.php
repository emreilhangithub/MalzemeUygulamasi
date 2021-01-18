<?php
class Car
{

    public function message($dizi) {
        if (is_array($dizi))//array olup olmadıgını kontrol eder dısarıdan gelir veri
        {
            return "Bu bir dizidir <br>"; //direk echo ile de basılır
        }
        else {return "bu bir dizi degildir";}
    }


}







