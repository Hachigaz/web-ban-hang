<?php
    class Import extends Controller{
        public $importService;
        public function __construct(){
            $this->importService = $this->service("ImportService");
        }
        public function CreateImport(){
            $this->importService->createImport();
        }
        public function UpdateImport(){
            $this->importService->updateImport();
        }
        public function DeleteImport(){
            $this->importService->deleteImport();
        }
        public function GetAllImport(){
            $this->importService->getAllImport();
        }
        public function GetImportById(){
            $this->importService->GetImportById();
        }
        public function getInfoImport(){
            $this->importService->getInfoImport();
        }

        public function GetQuantityImportByMonth($year){
            $this->importService->getQuantityImportByMonth($year);
        }

        public function GetQuantityImportByQuarter($year){
            $this->importService->getQuantityImportByQuarter($year);
        }

        public function GetDistinctYear(){
            $this->importService->getDistinctYear();
        }
    }
?>