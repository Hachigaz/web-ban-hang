<?php
    class ShipmentModel{
        private $import_id;
        private $product_id;
        private $unit_price_import;
        private $quantity;
        private $remain;
        private $sku_id;
        private $mfg;
        private $exp;
        private $shipment_id;
        private $is_active;
        public function __construct($import_id, $product_id, $unit_price_import, $quantity, $sku_id, $mfg, $exp, $remain = null, $shipment_id = null, $is_active = null)
        {
            $this->import_id = $import_id;
            $this->product_id = $product_id;
            $this->unit_price_import = $unit_price_import;
            $this->quantity = $quantity;
            $this->sku_id = $sku_id;
            $this->mfg = $mfg;
            $this->exp = $exp;
            $this->remain = is_null($remain) ? $quantity : $remain;
            $this->shipment_id = $shipment_id;
            $this->is_active = $is_active;
        }
        public function getImport_id(){
            return $this->import_id;
        }
    
        public function setImport_id($import_id){
            $this->import_id = $import_id;
        }
    
        public function getProduct_id(){
            return $this->product_id;
        }
    
        public function setProduct_id($product_id){
            $this->product_id = $product_id;
        }
    
        public function getUnit_price_import(){
            return $this->unit_price_import;
        }
    
        public function setUnit_price_import($unit_price_import){
            $this->unit_price_import = $unit_price_import;
        }
    
        public function getQuantity(){
            return $this->quantity;
        }
    
        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }
    
        public function getRemain(){
            return $this->remain;
        }
    
        public function setRemain($remain){
            $this->remain = $remain;
        }
    
        public function getSku_id(){
            return $this->sku_id;
        }
    
        public function setSku_id($sku_id){
            $this->sku_id = $sku_id;
        }
    
        public function getMfg(){
            return $this->mfg;
        }
    
        public function setMfg($mfg){
            $this->mfg = $mfg;
        }
    
        public function getExp(){
            return $this->exp;
        }
    
        public function setExp($exp){
            $this->exp = $exp;
        }
    
        public function getShipment_id(){
            return $this->shipment_id;
        }
    
        public function setShipment_id($shipment_id){
            $this->shipment_id = $shipment_id;
        }
    
        public function getIs_active(){
            return $this->is_active;
        }
    
        public function setIs_active($is_active){
            $this->is_active = $is_active;
        }

        public function toArray() {
            return array(
                'shipment_id' => $this->shipment_id,
                'import_id' => $this->import_id,
                'product_id' => $this->product_id,
                'unit_price_import' => $this->unit_price_import,
                'quantity' => $this->quantity,
                'remain' => $this->remain,
                'sku_id' => $this->sku_id,
                'mfg' => $this->mfg,
                'exp' => $this->exp,
                'is_active' => $this->is_active
            );
        }
    }
?>