<?php
    class OrderDetailModel{
        private $order_id;
        private $product_id;
        private $price;
        private $number_of_products;
        private $color_of_product;
        private $order_detail_id;
        public function __construct($order_id, $product_id, $price, $number_of_products, $color_of_product, $order_detail_id = null)
        {
            $this->order_id = $order_id;
            $this->product_id = $product_id;
            $this->price = $price;
            $this->number_of_products = $number_of_products;
            $this->color_of_product = $color_of_product;
            $this->order_detail_id = $order_detail_id;
        }
        public function getOrderId(){
            return $this->order_id;
        }
    
        public function setOrderId($order_id){
            $this->order_id = $order_id;
        }
    
        public function getProductId(){
            return $this->product_id;
        }
    
        public function setProductId($product_id){
            $this->product_id = $product_id;
        }
    
        public function getPrice(){
            return $this->price;
        }
    
        public function setPrice($price){
            $this->price = $price;
        }
    
        public function getNumberOfProduct(){
            return $this->number_of_products;
        }
    
        public function setNumberOfProduct($number_of_products){
            $this->number_of_products = $number_of_products;
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
                'product_id' => $this->product_id,
                'price' => $this->price,
                'number_of_products' => $this->number_of_products,
                'color_of_product' => $this->color_of_product
            );
        }
    }
?>