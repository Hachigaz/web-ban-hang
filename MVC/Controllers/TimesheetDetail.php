<?php
    class TimesheetDetail extends Controller{
        public $timesheetDetailService;
        public function __construct(){
            $this->timesheetDetailService = $this->service("TimesheetDetailService");
        }
        public function CreateTimesheetDetail(){
            $this->timesheetDetailService->createTimesheetDetail();
        }
        public function UpdateTimesheetDetail(){
            $this->timesheetDetailService->updateTimesheetDetail();
        }
        public function GetAllTimesheetDetail(){
            $this->timesheetDetailService->getAllTimesheetDetail();
        }
        public function GetTimesheetDetailById(){
            $this->timesheetDetailService->GetTimesheetDetailById();
        }
    }
?>