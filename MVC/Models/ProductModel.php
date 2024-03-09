<?php
    class Product {
        private $product_id;
        private $product_name;
        private $brand_id;
        private $category_id;
        private $price;
        private $guarantee;
        private $thumbnail;
        private $description;
        private $created_at;
        private $updated_at;
        private $is_active;
        public function __construct($product_id, $product_name, $brand_id, $category_id, $price, $guarantee, $thumbnail, $description, $created_at, $updated_at, $is_active){
            $this->product_id = $product_id;
            $this->product_name = $product_name;
            $this->brand_id = $brand_id;
            $this->category_id = $category_id;
            $this->price = $price;
            $this->guarantee = $guarantee;
            $this->thumbnail = $thumbnail;
            $this->description = $description;
            $this->created_at = $created_at;
            $this->updated_at = $updated_at;
            $this->is_active = $is_active;
        }
        public function getProductId(){
            return $this->product_id;
        }
        public function setProductId($product_id){
            $this->product_id = $product_id;
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
        public function getCreatedAt(){
            return $this->created_at;
        }
        public function setCreatedAt($created_at){
            $this->created_at = $created_at;
        }
        public function getUpdatedAt(){
            return $this->updated_at;
        }
        public function setUpdatedAt($updated_at){
            $this->updated_at = $updated_at;
        }
        public function getIsActive(){
            return $this->is_active;
        }
        public function setIsActive($is_active){
            $this->is_active = $is_active;
        }
    }
?>