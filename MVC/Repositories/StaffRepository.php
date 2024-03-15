<?php
    class StaffRepository extends DB{
        public function createStaff($staff){
            $this->create("staffs", $staff);
        }

        public function updateStaff($staff, $id){// by id
            $this->update("staffs", $staff, "staff_id = ".$id);
        }

        public function deleteStaff($id){// by id
            $this->delete("staffs", "staff_id = ".$id);
        }

        public function getAllStaff(){
            return $this->read("staffs");
        }
        
        public function getStaffById($id){
            return $this->getAllByWhere("staffs", "staff_id = ".$id);
        }
    }
?>