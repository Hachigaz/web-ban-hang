<?php
    class ImportReturnDetailModel{
        private $import_return_detail_id;
        private $import_return_id;
        private $product_id;
        private $quantity;
        public function __construct($import_return_id, $product_id, $quantity, $import_return_detail_id = null)
        {
            $this->import_return_id = $import_return_id;
            $this->product_id = $product_id;
            $this->quantity = $quantity;
            $this->import_return_detail_id = $import_return_detail_id;
        }
        public function getImportReturnDetailId(){
            return $this->import_return_detail_id;
        }
    
        public function setImportReturnDetailId($import_return_detail_id){
            $this->import_return_detail_id = $import_return_detail_id;
        }
    
        public function getImportReturnId(){
            return $this->import_return_id;
        }
    
        public function setImportReturnId($import_return_id){
            $this->import_return_id = $import_return_id;
        }
    
        public function getProductId(){
            return $this->product_id;
        }
    
        public function setProductId($product_id){
            $this->product_id = $product_id;
        }
    
        public function getQuantity(){
            return $this->quantity;
        }
    
        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }
        public function toArray() {
            return array(
                'import_return_detail_id' => $this->import_return_detail_id,
                'import_return_id' => $this->import_return_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity
            );
        }
    }
?>