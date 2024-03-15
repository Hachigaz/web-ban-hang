<?php
    require_once "./MVC/Models/TimesheetDetailModel.php";
    class TimesheetDetailService extends Service{
        public $timesheetDetailRepo;

        public function __construct(){
            $this->timesheetDetailRepo = $this->repository("TimesheetDetailRepository");
        }
        
        public function createTimesheetDetail(){//$timesheetDetailDTO
            $timesheetDetail = new TimesheetDetailModel("3", "15000000");
            $this->timesheetDetailRepo->createTimesheetDetail($timesheetDetail);
        }

        public function updateTimesheetDetail(){// by id (truyền DTO)
            $timesheetDetailData = $this->timesheetDetailRepo->getTimesheetDetailById("1");
            extract($timesheetDetailData);// gán các giá trị cho các key tương ứng với các biến
            $timesheetDetail = new TimesheetDetailModel(
                $timesheet_id, "20000000", $timesheet_detail_id
            );
            $this->timesheetDetailRepo->updateTimesheetDetail($timesheetDetail, "1");
        }

        public function getAllTimesheetDetail(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->timesheetDetailRepo->getAllTimesheetDetail(), JSON_UNESCAPED_UNICODE);
        }

        public function getTimesheetDetailById(){
            $id = "1";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->timesheetDetailRepo->getTimesheetDetailById($id), JSON_UNESCAPED_UNICODE);
        }
    }
?>