<?php
    class TimesheetDetailRepository extends DB{
        public function createTimesheetDetail($timesheetDetail){
            $this->create("timesheet_details", $timesheetDetail);
        }

        public function updateTimesheetDetail($timesheetDetail, $id){// by id
            $this->update("timesheet_details", $timesheetDetail, "timesheet_detail_id = ".$id);
        }

        public function getAllTimesheetDetail(){
            return $this->readDontHaveIsActive("timesheet_details");
        }
        
        public function getTimesheetDetailById($id){
            return $this->getAllDontHaveIsActive("timesheet_details", "timesheet_detail_id = ".$id);
        }
    }
?>