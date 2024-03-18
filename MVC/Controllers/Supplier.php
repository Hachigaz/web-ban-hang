<?php
    class Supplier extends Controller{
        public $supplierService;
        public function __construct(){
            $this->supplierService = $this->service("SupplierService");
        }
        public function CreateSupplier(){
            $this->supplierService->createSupplier();
        }
        public function UpdateSupplier(){
            $this->supplierService->updateSupplier();
        }
        public function DeleteSupplier(){
            $this->supplierService->deleteSupplier();
        }
        public function GetAllSupplier(){
            $this->supplierService->getAllSupplier();
        }
        public function GetSupplierById(){
            $this->supplierService->GetSupplierById();
        }
    }
?>