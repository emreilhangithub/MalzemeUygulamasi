<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MethodKullanimi {

    public $name;
    public $color;

        public function ilk_method($name)
        {
        	echo "	İsim =  $name" . "<hr>";        
        }      

         public function ikinci_method($color)
        {
            echo "  Renk = $color" . "<hr>";        
        }       


}