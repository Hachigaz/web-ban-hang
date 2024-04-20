<?php
    require_once "./MVC/Models/LeaveApplicationModel.php";
    class LeaveApplicationService extends Service{
        public $leaveApplicationRepo;

        public function __construct(){
            $this->leaveApplicationRepo = $this->repository("LeaveApplicationRepository");
        }
        
        public function createLeaveApplication(){//$reviewDTO
            $leaveApplication = new LeaveApplicationModel("4", "2024-04-05", "2024-04-05", "Lý do cá nhân", "0","4");
            $this->leaveApplicationRepo->createLeaveApplication($leaveApplication);
        }

        public function updateLeaveApplication(){// by id (truyền DTO)
            $leaveApplicationData = $this->leaveApplicationRepo->getLeaveApplicationById("31");
            extract($leaveApplicationData);// gán các giá trị cho các key tương ứng với các biến
            $leaveApplication = new LeaveApplicationModel(
                $staff_id, $start_date, $end_date, $reason, $status, $leave_application_id
            );
            $this->leaveApplicationRepo->updateLeaveApplication($leaveApplication, "1");
        }

        public function approveLeaveApplication($id){
            $leaveApplicationData = $this->leaveApplicationRepo->getLeaveApplicationById($id)[0];
            extract($leaveApplicationData);// gán các giá trị cho các key tương ứng với các biến
            $leaveApplication = new LeaveApplicationModel(
                $staff_id, $start_date, $end_date, $reason, 1, $leave_application_id
            );
            $this->leaveApplicationRepo->updateLeaveApplication($leaveApplication, $id);
        }

        public function deleteLeaveApplication(){
            $id = "1";
            $this->leaveApplicationRepo->deleteLeaveApplication($id);
        }

        public function getAllLeaveApplication(){
            return $this->leaveApplicationRepo->joinLeaveApplicationStaff();
        }

        public function getLeaveApplicationById($id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->leaveApplicationRepo->getLeaveApplicationById($id), JSON_UNESCAPED_UNICODE);
        }
    }
?>