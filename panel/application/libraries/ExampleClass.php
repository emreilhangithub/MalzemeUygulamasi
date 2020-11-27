<?php 

class ExampleClass {

        protected $CI;

        public function __construct()
        {                
                $this->CI =& get_instance();
        }

        public function istance_method1()
        {
                 $this->CI->load->library('UcuncuClass');
                 $this->CI->ucuncuclass->ucuncu_method();                
        }

        public function istance_method2()
        {
                $this->CI->load->library('DorduncuClass');
                $this->CI->dorduncuclass->dorduncu_method();
        }

}
