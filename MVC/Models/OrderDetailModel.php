<?php
    class OrderDetailModel{
        private $order_id;
        // private $product_id;
        private $serial_number;
        private $price;
        private $color_of_product;
        private $order_detail_id;
        public function __construct($order_id, $serial_number, $price, $color_of_product, $order_detail_id = null)
        {
            $this->order_id = $order_id;
            // $this->product_id = $product_id;
            $this->serial_number= $serial_number;
            $this->price = $price;
            $this->color_of_product = $color_of_product;
            $this->order_detail_id = $order_detail_id;
        }
        public function getOrderId(){
            return $this->order_id;
        }
    
        public function setOrderId($order_id){
            $this->order_id = $order_id;
        }
    
        public function getSerialNumber(){
            return $this->serial_number;
        }
    
        public function setSerialNumber($serial_number){
            $this->serial_number = $serial_number;
        }
    
        public function getPrice(){
            return $this->price;
        }
    
        public function setPrice($price){
            $this->price = $price;
        }

    
        public function getColorOfProduct(){
            return $this->color_of_product;
        }
    
        public function setColorOfProduct($color_of_product){
            $this->color_of_product = $color_of_product;
        }

        public function getOrderDetailId(){
            return $this->order_detail_id;
        }
    
        public function setOrderDetailId($order_detail_id){
            $this->order_detail_id = $order_detail_id;
        }

        public function toArray() {
            return array(
                'order_detail_id' => $this->order_detail_id,
                'order_id' => $this->order_id,
                // 'product_id' => $this->product_id,
                'serial_number' => $this->serial_number,
                'price' => $this->price,
                'color_of_product' => $this->color_of_product
            );
        }
    }
?>