<?php
    require_once "./MVC/Models/StaffModel.php";
    class StaffService extends Service{
        public $staffRepo;

        public function __construct(){
            $this->staffRepo = $this->repository("StaffRepository");
        }
        
        public function createStaff(){//$staffDTO
            $staff = new StaffModel("5","Nguyễn Thị Liễu", "0786795974", "lieu@gmail.com", "3", "1");
            $this->staffRepo->createStaff($staff);
        }

        public function updateStaff(){// by id (truyền DTO)
            $staffData = $this->staffRepo->getStaffById("5");
            extract($staffData);// gán các giá trị cho các key tương ứng với các biến
            $staff = new StaffModel(
                $account_id, "Nguyễn Thị Lệ Liễu", $staff_phone_number, $staff_email, $role_id, $gender, $staff_id, $entry_date, $is_active
            );
            $this->staffRepo->updateStaff($staff, "5");
        }

        public function deleteStaff(){
            $id = "5";
            $this->staffRepo->deleteStaff($id);
        }

        public function getAllStaff(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->staffRepo->getAllStaff(), JSON_UNESCAPED_UNICODE);
        }

        public function getStaffById(){
            $id = "5";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->staffRepo->getStaffById($id), JSON_UNESCAPED_UNICODE);
        }
    }
?>