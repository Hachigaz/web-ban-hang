<?php
    class ImportReturnDetail extends Controller{
        public $importReturnDetailService;
        public function __construct(){
            $this->importReturnDetailService = $this->service("ImportReturnDetailService");
        }
        public function CreateImportReturnDetail(){
            $this->importReturnDetailService->createImportReturnDetail();
        }
        public function UpdateImportReturnDetail(){
            $this->importReturnDetailService->updateImportReturnDetail();
        }
        public function DeleteImportReturnDetail(){
            $this->importReturnDetailService->deleteImportReturnDetail();
        }
        public function GetAllImportReturnDetail(){
            $this->importReturnDetailService->getAllImportReturnDetail();
        }
        public function GetImportReturnDetailById(){
            $this->importReturnDetailService->GetImportReturnDetailById();
        }
    }
?>