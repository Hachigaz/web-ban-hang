<?php
    require_once "./MVC/Models/DecentralizationModel.php";
    class DecentralizationService extends Service{
        public $decentralizationRepo;

        public function __construct(){
            $this->decentralizationRepo = $this->repository("DecentralizationRepository");
        }
        
        public function createDecentralization(){//$decentralizationDTO
            $decentralization = new DecentralizationModel("11", "11", "11");
            $this->decentralizationRepo->createDecentralization($decentralization);
        }

        public function updateDecentralization(){// by id (truyền DTO)
            $decentralizationData = $this->decentralizationRepo->getDecentralizationById("146");
            extract($decentralizationData);// gán các giá trị cho các key tương ứng với các biến
            $decentralization = new DecentralizationModel(
                "5", $module_id, $function_id, $decentralization_id, $is_active
            );
            $this->decentralizationRepo->updateDecentralization($decentralization, "146");
        }

        public function deleteDecentralization(){
            $id = "146";
            $this->decentralizationRepo->deleteDecentralization($id);
        }

        public function getAllDecentralization(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->decentralizationRepo->getAllDecentralization(), JSON_UNESCAPED_UNICODE);
        }

        public function getDecentralizationById(){
            $id = "10";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->decentralizationRepo->getDecentralizationById($id), JSON_UNESCAPED_UNICODE);
        }
    }
?>