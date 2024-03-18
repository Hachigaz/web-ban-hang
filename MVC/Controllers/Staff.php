<?php
    class Staff extends Controller{
        public $staffService;
        public function __construct(){
            $this->staffService = $this->service("StaffService");
        }
        public function CreateStaff(){
            $this->staffService->createStaff();
        }
        public function UpdateStaff(){
            $this->staffService->updateStaff();
        }
        public function DeleteStaff(){
            $this->staffService->deleteStaff();
        }
        public function GetAllStaff(){
            $this->staffService->getAllStaff();
        }
        public function GetStaffById(){
            $this->staffService->GetStaffById();
        }
    }
?>