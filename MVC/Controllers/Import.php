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
    }
?>