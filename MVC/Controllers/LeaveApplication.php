<?php
    class LeaveApplication extends Controller{
        public $leaveApplicationService;
        public function __construct(){
            $this->leaveApplicationService = $this->service("LeaveApplicationService");
        }
        public function ApproveLeaveApplication($id){
            $this->leaveApplicationService->approveLeaveApplication($id);
            header("location: ../../InternalManager/LeaveApplicationManager");
        }
        public function GetLeaveApplicationById($id){
            $this->leaveApplicationService->getLeaveApplicationById($id);
        }   
    }
?>