<?php
    class Export extends Controller{
        public $exportService;
        public function __construct(){
            $this->exportService = $this->service("ExportService");
        }
        public function CreateExport(){
            $this->exportService->createExport();
        }
        public function UpdateExport(){
            $this->exportService->updateExport();
        }
        public function DeleteExport(){
            $this->exportService->deleteExport();
        }
        public function GetAllExport(){
            $this->exportService->getAllExport();
        }
        public function GetExportById(){
            $this->exportService->GetExportById();
        }
    }
?>