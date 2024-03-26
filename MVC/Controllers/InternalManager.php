<?php
    class InternalManager extends Controller{
        public $internalManagerService;
        public $productService;
        public $customerService;
        public $orderService;
        public $staffService;
        public function __construct(){
            $this->internalManagerService = $this->service("InternalManagerService");
            $this->productService = $this->service("ProductService");
            $this->customerService = $this->service("CustomerService");
            $this->orderService = $this->service("OrderService");
            $this->staffService = $this->service("StaffService");
        }
        public function SayHi(){
            $this->view("internalManager", []);
        }
        public function CustomerManager(){
            $this->view("internalManager", [
                "Page" => "CustomerManager"
            ]);
        }

        public function GetAllCardValue(){// lấy ra các thông số cơ bản
            $data = array(
                "productCount" => $this->productService->getQuantityAllProduct(),
                "customerCount" => $this->customerService->getQuantityAllCustomer(),
                "orderCount" => $this->orderService->getQuantityAllOrder(),
                "staffCount" => $this->staffService->getQuantityAllStaff()
            );     
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE);    
        }
    }
?>