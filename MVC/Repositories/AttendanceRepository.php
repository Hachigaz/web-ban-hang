<?php
    class AttendanceRepository extends DB{
        public function createAttendance($attendance){
            $this->create("attendance", $attendance, "attendance_id");
        }

        public function updateAttendance($attendance, $id){// by id
            $this->update("attendance", $attendance, "attendance_id = ".$id, "attendance_id");
        }

        public function deleteAttendance($id){// by id
            $this->delete("attendance", "attendance_id = ".$id);
        }

        public function getAllAttendance(){
            return $this->readDontHaveIsActive("attendance");
        }
        
        public function getAttendanceById($id){
            return $this->getAllByWhere("attendance", "attendance_id = ".$id);
        }
    }
?>