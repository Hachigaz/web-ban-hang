<?php
    class TimesheetRepository extends DB{
        public function createTimesheet($timesheet){
            $this->create("timesheets", $timesheet);
        }

        public function updateTimesheet($timesheet, $id){// by id
            $this->update("timesheets", $timesheet, "timesheet_id = ".$id);
        }

        public function getAllTimesheet(){
            return $this->readDontHaveIsActive("timesheets");
        }
        
        public function getTimesheetById($id){
            return $this->getAllDontHaveIsActive("timesheets", "timesheet_id = ".$id);
        }
    }
?>