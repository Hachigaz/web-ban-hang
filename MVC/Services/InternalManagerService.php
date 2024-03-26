<?php
    require_once "./MVC/Models/StaffModel.php";
    require_once "./MVC/Models/ProductModel.php";
    class InternalManagerService extends Service{
        public $staffRepo;
        public $productRepo;
        public function __construct(){
            $this->staffRepo = $this->repository("StaffRepository");
            $this->productRepo = $this->repository("ProductRepository");
        } 
    }
?>