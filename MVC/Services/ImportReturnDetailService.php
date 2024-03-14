<?php
    require_once "./MVC/Models/ImportReturnDetailModel.php";
    class ImportReturnDetailService extends Service{
        public $importReturnDetailRepo;

        public function __construct(){
            $this->importReturnDetailRepo = $this->repository("ImportReturnDetailRepository");
        }
        
        public function createImportReturnDetail(){//$importReturnDetailDTO
            $importReturnDetail = new ImportReturnDetailModel("1", "1", "2");
            $this->importReturnDetailRepo->createImportReturnDetail($importReturnDetail);
        }

        public function updateImportReturnDetail(){// by id (truyền DTO)
            $importReturnDetailData = $this->importReturnDetailRepo->getImportReturnDetailById("1");
            extract($importReturnDetailData);// gán các giá trị cho các key tương ứng với các biến
            $importReturnDetail = new ImportReturnDetailModel(
                $import_return_id, $product_id, "3", $import_return_detail_id
            );
            $this->importReturnDetailRepo->updateImportReturnDetail($importReturnDetail, "1");
        }

        public function deleteImportReturnDetail(){
            $id = "1";
            $this->importReturnDetailRepo->deleteImportReturnDetail($id);
        }

        public function getAllImportReturnDetail(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->importReturnDetailRepo->getAllImportReturnDetail());
        }

        public function getImportReturnDetailById(){
            $id = "1";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->importReturnDetailRepo->getImportReturnDetailById($id));
        }
    }
?>