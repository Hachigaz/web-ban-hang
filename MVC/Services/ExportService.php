<?php
    require_once "./MVC/Models/ExportModel.php";
    class ExportService extends Service{
        public $exportRepo;

        public function __construct(){
            $this->exportRepo = $this->repository("ExportRepository");
        }
        
        public function createExport(){//$exportDTO
            $export = new ExportModel("4", "4");
            $this->exportRepo->createExport($export);
        }

        public function updateExport(){// by id (truyền DTO)
            $exportData = $this->exportRepo->getExportById("1");
            extract($exportData);// gán các giá trị cho các key tương ứng với các biến
            $export = new ExportModel(
                "2", $order_id, $total_price, $export_id, $export_date, $is_active
            );
            $this->exportRepo->updateExport($export, "1");
        }

        public function deleteExport(){
            $id = "1";
            $this->exportRepo->deleteExport($id);
        }

        public function getAllExport(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->exportRepo->getAllExport());
        }

        public function getExportById(){
            $id = "1";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->exportRepo->getExportById($id));
        }
    }
?>