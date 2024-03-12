<?php
    class Customer extends Controller{
        public $customerService;
        public function __construct(){
            $this->customerService = $this->service("CustomerService");
        }
        public function CreateCustomer(){
            $this->customerService->createCustomer();
        }
        public function UpdateCustomer(){
            $this->customerService->updateCustomer();
        }
        public function DeleteCustomer(){
            $this->customerService->deleteCustomer();
        }
        public function GetAllCustomer(){
            $this->customerService->getAllCustomer();
        }
        public function GetCustomerById(){
            $this->customerService->GetCustomerById();
        }
    }
?>