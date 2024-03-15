<?php
    require_once "./MVC/Models/ImportReturnModel.php";
    class ImportReturnService extends Service{
        public $importReturnRepo;

        public function __construct(){
            $this->importReturnRepo = $this->repository("ImportReturnRepository");
        }
        
        public function createImportReturn(){//$importReturnDTO
            $importReturn = new ImportReturnModel("4", "KH001", "Khách trả hàng");
            $this->importReturnRepo->createImportReturn($importReturn);
        }

        public function updateImportReturn(){// by id (truyền DTO)
            $importReturnData = $this->importReturnRepo->getImportReturnById("1");
            extract($importReturnData);// gán các giá trị cho các key tương ứng với các biến
            $importReturn = new ImportReturnModel(
                $staff_id, $customer_supplier_id, "Khách trả hàng", $import_return_id, $is_active
            );
            $this->importReturnRepo->updateImportReturn($importReturn, "1");
        }

        public function deleteImportReturn(){
            $id = "1";
            $this->importReturnRepo->deleteImportReturn($id);
        }

        public function getAllImportReturn(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->importReturnRepo->getAllImportReturn(), JSON_UNESCAPED_UNICODE);
        }

        public function getImportReturnById(){
            $id = "1";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->importReturnRepo->getImportReturnById($id), JSON_UNESCAPED_UNICODE);
        }
    }
?>