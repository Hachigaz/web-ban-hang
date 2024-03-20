<?php
    class SupplierRepository extends DB{
        public function createSupplier($supplier){
            $this->create("suppliers", $supplier, "supplier_id");
        }

        public function updateSupplier($supplier, $id){// by id
            $this->update("suppliers", $supplier, "supplier_id = ".$id);
        }

        public function deleteSupplier($id){// by id
            $this->delete("suppliers", "supplier_id = ".$id);
        }

        public function getAllSupplier(){
            return $this->read("suppliers");
        }
        
        public function getSupplierById($id){
            return $this->getAllByWhere("suppliers", "supplier_id = ".$id);
        }
    }
?>