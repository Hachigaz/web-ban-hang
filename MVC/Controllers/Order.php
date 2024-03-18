<?php
    class Order extends Controller{
        public $orderService;
        public function __construct(){
            $this->orderService = $this->service("OrderService");
        }
        public function CreateOrder(){
            $this->orderService->createOrder();
        }
        public function UpdateOrder(){
            $this->orderService->updateOrder();
        }
        public function DeleteOrder(){
            $this->orderService->deleteOrder();
        }
        public function GetAllOrder(){
            $this->orderService->getAllOrder();
        }
        public function GetOrderById(){
            $this->orderService->GetOrderById();
        }
    }
?>