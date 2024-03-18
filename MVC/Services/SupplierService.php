<?php
    require_once "./MVC/Models/SupplierModel.php";
    class SupplierService extends Service{
        public $supplierRepo;

        public function __construct(){
            $this->supplierRepo = $this->repository("SupplierRepository");
        }
        
        public function createSupplier(){//$supplierDTO
            $supplier = new SupplierModel("Apple Việt Nam", "0931548670", "Đống Đa, Hà Nội", "applevietnam@gmail.com");
            $this->supplierRepo->createSupplier($supplier);
        }

        public function updateSupplier(){// by id (truyền DTO)
            $supplierData = $this->supplierRepo->getSupplierById("'NCC019'");
            extract($supplierData);// gán các giá trị cho các key tương ứng với các biến
            $supplier = new SupplierModel(
                "Samsung Việt Nam", $phone_number_of_supplier, $address_of_supplier, $email_of_supplier, $supplier_id, $is_active
            );
            $this->supplierRepo->updateSupplier($supplier, "'NCC019'");
        }

        public function deleteSupplier(){
            $id = "'NCC019'";
            $this->supplierRepo->deleteSupplier($id);
        }

        public function getAllSupplier(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->supplierRepo->getAllSupplier(), JSON_UNESCAPED_UNICODE);
        }

        public function getSupplierById(){
            $id = "'NCC010'";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->supplierRepo->getSupplierById($id), JSON_UNESCAPED_UNICODE);
        }
    }
?>