<?php
    class CustomerInfo extends Controller{
        public $customerService;
        public function __construct(){
            $this->customerService = $this->service("CustomerService");
        }
        public function SayHi(){
            $this->view("master",[
                "Page" => "CustomerInfo/CustomerInfo"
            ]);
        }
    }
?>