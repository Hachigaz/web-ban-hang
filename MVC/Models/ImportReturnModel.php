<?php
    class ImportReturnModel{
        private $import_return_id;
        private $staff_id;
        private $customer_supplier_id;
        private $reason;
        private $is_active;
        public function __construct($staff_id, $customer_supplier_id, $reason, $import_return_id = null, $is_active = null)
        {
            $this->staff_id = $staff_id;
            $this->customer_supplier_id = $customer_supplier_id;
            $this->reason = $reason;
            $this->import_return_id = $import_return_id;
            $this->is_active = $is_active;
        }
        public function getImportReturnId(){
            return $this->import_return_id;
        }
    
        public function setImportReturnId($import_return_id){
            $this->import_return_id = $import_return_id;
        }
    
        public function getStaffId(){
            return $this->staff_id;
        }
    
        public function setStaffId($staff_id){
            $this->staff_id = $staff_id;
        }
    
        public function getCustomerSupplierId(){
            return $this->customer_supplier_id;
        }
    
        public function setCustomerSupplierId($customer_supplier_id){
            $this->customer_supplier_id = $customer_supplier_id;
        }
    
        public function getReason(){
            return $this->reason;
        }
    
        public function setReason($reason){
            $this->reason = $reason;
        }
    
        public function getIsActive(){
            return $this->is_active;
        }
    
        public function setIsActive($is_active){
            $this->is_active = $is_active;
        }

        public function toArray() {
            return array(
                'import_return_id' => $this->import_return_id,
                'staff_id' => $this->staff_id,
                'customer_supplier_id' => $this->customer_supplier_id,
                'reason' => $this->reason,
                'is_active' => $this->is_active
            );
        }
    }
?>