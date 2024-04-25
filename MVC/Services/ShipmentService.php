<?php
    require_once "./MVC/Models/ShipmentModel.php";
    class ShipmentService extends Service{
        public $shipmentRepo;

        public function __construct(){
            $this->shipmentRepo = $this->repository("ShipmentRepository");
        }
        
        public function createShipment(){//$shipmentDTO
            $shipment = new ShipmentModel("1", "1", "2000000", "5", "SKU123", "2024-05-22", "2025-05-22");
            $this->shipmentRepo->createShipment($shipment);
        }

        public function updateShipment(){// by id (truyền DTO)
            $shipmentData = $this->shipmentRepo->getShipmentById("1");
            extract($shipmentData);// gán các giá trị cho các key tương ứng với các biến
            $shipment = new ShipmentModel(
                $import_id, $supplier_id, "1000000", $quantity, $sku_id, $mfg, $exp, "4", $shipment_id, $is_active 
            );
            $this->shipmentRepo->updateShipment($shipment, "1");
        }

        public function deleteShipment(){
            $id = "1";
            $this->shipmentRepo->deleteShipment($id);
        }

        public function getAllShipment(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->shipmentRepo->getAllShipment(), JSON_UNESCAPED_UNICODE);
        }

        public function getShipmentById(){
            $id = "1";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->shipmentRepo->getShipmentById($id), JSON_UNESCAPED_UNICODE);
        }
        public function GetShipmentlByImportId(){
            return $this->shipmentRepo->getDetails();
        }
    }
?>