<?php
    class Catalog extends Controller{
        

        public function __construct(){

        }
        
        public function SayHi(){
            $this->view("master",[
                "Page" => "Catalog/Catalog"
            ]);
        }
    }
?>