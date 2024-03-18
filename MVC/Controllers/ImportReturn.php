<?php
    class ImportReturn extends Controller{
        public $importReturnService;
        public function __construct(){
            $this->importReturnService = $this->service("ImportReturnService");
        }
        public function CreateImportReturn(){
            $this->importReturnService->createImportReturn();
        }
        public function UpdateImportReturn(){
            $this->importReturnService->updateImportReturn();
        }
        public function DeleteImportReturn(){
            $this->importReturnService->deleteImportReturn();
        }
        public function GetAllImportReturn(){
            $this->importReturnService->getAllImportReturn();
        }
        public function GetImportReturnById(){
            $this->importReturnService->GetImportReturnById();
        }
    }
?>