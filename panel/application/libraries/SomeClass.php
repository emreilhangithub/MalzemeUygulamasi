<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SomeClass {

        public function some_method()
        {
        	echo "	İlk Librariyi cagırdık" . "<hr>";
        	// $CI =& get_instance();	
        	// $CI->load->library('testclass');
        	// $CI->testclass->test_method();
        }

        public function call_method()
        {
        	
        	$CI =& get_instance();	
            $CI->load->library('testclass');
            $CI->testclass->test_method();
        }

        


}