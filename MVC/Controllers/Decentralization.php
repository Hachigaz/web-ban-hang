<?php
    class Decentralization extends Controller{
        public $decentralizationService;
        public function __construct(){
            $this->decentralizationService = $this->service("DecentralizationService");
        }
        public function CreateDecentralization(){
            $this->decentralizationService->createDecentralization();
        }
        public function UpdateDecentralization(){
            $this->decentralizationService->updateDecentralization();
        }
        public function DeleteDecentralization(){
            $this->decentralizationService->deleteDecentralization();
        }
        public function GetAllDecentralization(){
            $this->decentralizationService->getAllDecentralization();
        }
        public function GetDecentralizationById(){
            $this->decentralizationService->GetDecentralizationById();
        }
        public function GetAllModuleByRole($role_id){// lấy ra các module
            $this->decentralizationService->getAllModuleByRole($role_id);
        }
    }
?>