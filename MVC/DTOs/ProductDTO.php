<?php
    class ProductDTO {
        private $product_name;
        private $brand_id;
        private $category_id;
        private $price;
        private $guarantee;
        private $thumbnail;
        private $description;
        public function __construct($product_name, $brand_id, $category_id, $price, $guarantee, $thumbnail, $description){
            $this->product_name = $product_name;
            $this->brand_id = $brand_id;
            $this->category_id = $category_id;
            $this->price = $price;
            $this->guarantee = $guarantee;
            $this->thumbnail = $thumbnail;
            $this->description = $description;
        }
        public function getProductName(){
            return $this->product_name;
        }
        public function setProductName($product_name){
            $this->product_name = $product_name;
        }
        public function getBrandId(){
            return $this->brand_id;
        }
        public function setBrandId($brand_id){
            $this->brand_id = $brand_id;
        }
        public function getCategoryId(){
            return $this->category_id;
        }
        public function setCategoryId($category_id){
            $this->category_id = $category_id;
        }
        public function getPrice(){
            return $this->price;
        }
        public function setPrice($price){
            $this->price = $price;
        }
        public function getGuarantee(){
            return $this->guarantee;
        }
        public function setGuarantee($guarantee){
            $this->guarantee = $guarantee;
        }
        public function getThumbnail(){
            return $this->thumbnail;
        }
        public function setThumbnail($thumbnail){
            $this->thumbnail = $thumbnail;
        }
        public function getDescription(){
            return $this->description;
        }
        public function setDescription($description){
            $this->description = $description;
        }
    }
?>