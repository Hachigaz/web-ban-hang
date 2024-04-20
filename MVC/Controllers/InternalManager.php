<?php
    class InternalManager extends Controller{
        public $internalManagerService;
        public $productService;
        public $customerService;
        public $orderService;
        public $staffService;
        public $roleService;
        public $supplierService;
        public $accountService;
        public $decentralizationService;
        public $attendanceService;
        public $leaveApplicationService;
        public function __construct(){
            $this->internalManagerService = $this->service("InternalManagerService");
            $this->productService = $this->service("ProductService");
            $this->customerService = $this->service("CustomerService");
            $this->orderService = $this->service("OrderService");
            $this->staffService = $this->service("StaffService");
            $this->roleService = $this->service("RoleService");
            $this->supplierService = $this->service("SupplierService");
            $this->accountService = $this->service("AccountService");
            $this->decentralizationService = $this->service("DecentralizationService");
            $this->attendanceService = $this->service("AttendanceService");
            $this->leaveApplicationService = $this->service("LeaveApplicationService");
        }
        public function HomeManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "HomeManager",
                    "Title" => "Trang chủ"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function AccountManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "AccountManager",
                    "Title" => "Tài khoản"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
            
            
        }
        public function StaffManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "StaffManager",
                    "Title" => "Nhân viên"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
            
        }
        public function CustomerManager(){
            // if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
            //     $this->view("internalManager", [
            //         "Page" => "CustomerManager",
            //         "Title" => "Khách hàng"
            //     ]);
            // }else{
            //     header('Location: ../SignIn/SayHi');
            // }
            $this->view("internalManager", [
                "Page" => "CustomerManager",
                "Title" => "Khách hàng"
            ]);
        }
        public function ProductManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "ProductManager",
                    "Title" => "Sản phẩm"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
            
        }
        public function SupplierManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "SupplierManager",
                    "Title" => "Nhà cung cấp"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
            
        }
        public function WarehouseManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "WarehouseManager",
                    "Title" => "Kho"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function ImportManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "ImportManager",
                    "Title" => "Nhập hàng"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function ExportManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "ExportManager",
                    "Title" => "Xuất hàng"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function OrderManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "OrderManager",
                    "Title" => "Hóa đơn"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function SalaryManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "SalaryManager",
                    "Title" => "Lương"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function StatisticManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "StatisticManager",
                    "Title" => "Thống kê"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function DecentralizationManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "DecentralizationManager",
                    "Title" => "Phân quyền"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function LeaveApplicationManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "LeaveApplicationManager",
                    "Title" => "Đơn xin nghỉ"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function PersonalInfoManager(){
            if(isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                $this->view("internalManager", [
                    "Page" => "PersonalInfoManager",
                    "Title" => "Thông tin cá nhân"
                ]);
            }else{
                header('Location: ../SignIn/SayHi');
            }
        }
        public function Logout(){
            session_start();
            // Hủy tất cả các biến session
            session_unset();
            // Hủy toàn bộ session
            session_destroy();
            // Chuyển hướng người dùng về trang đăng nhập
            header('Location: ../SignIn/SayHi');
        }
        public function GetAllDataHome(){// lấy ra các thông số cơ bản
            $cardValue = array(
                "countProduct" => $this->productService->getQuantityAllProduct(),
                "countCustomer" => $this->customerService->getQuantityAllCustomer(),
                "countOrder" => $this->orderService->getQuantityAllOrder(),
                "countStaff" => $this->staffService->getQuantityAllStaff()
            );     
            $data = array("cardValue" => $cardValue);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE);    
        }
        public function GetAllDataStaff(){
            $cardValue = array(
                "countSaleStaff" => $this->staffService->getQuantityStaffByRole(3),
                "countWarehouseStaff" => $this->staffService->getQuantityStaffByRole(4),
                "countStoreManager" => $this->staffService->getQuantityStaffByRole(2),
                "countAdmin" => $this->staffService->getQuantityStaffByRole(1)
            );
            $infoStaff = $this->staffService->getInfoStaff();
            $roleStaff = $this->roleService->GetAllRoleStaff();
            $data = array("cardValue" => $cardValue, "infoStaff" => $infoStaff, "roleStaff" => $roleStaff);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE);   
        }

        public function GetAllDataCustomer(){
            $cardValue = array(
                "countAllCustomer" => $this->customerService->getQuantityAllCustomer(),
                "countMaleCustomer" => $this->customerService->getQuantityMaleCustomer(),
                "countFemaleCustomer" => $this->customerService->getQuantityFemaleCustomer(),
                "averageAgeCustomer" => $this->customerService->calculateAverageAgeCustomer()
            );
            $infoCustomer = $this->customerService->getInfoCustomer();
            $data = array("cardValue" => $cardValue, "infoCustomer" => $infoCustomer);  
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE);   
        }

        public function GetAllDataSupplier(){
            $infoSupplier = $this->supplierService->getAllSupplier();
            $data = array("infoSupplier" => $infoSupplier);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        }

        public function GetAllDataAccount(){
            $infoAccount = $this->accountService->getAllAccount();
            $data = array("infoSupplier" => $infoAccount);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        }
        public function GetAllDataDecentralization(){
            $moduleNames = $this->decentralizationService->getAllModule();
            $roleNames = $this->decentralizationService->getAllRole();
            $data = array("modules" => $moduleNames, "roles" => $roleNames);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        }
        public function GetAllDataAttendance(){
            $attendanceData = $this->attendanceService->getAllAttendance();
            $data = array("attendances" => $attendanceData);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        }
        public function GetAllDataLeaveApplication(){
            $leaveApplicationData = $this->leaveApplicationService->getAllLeaveApplication();
            $data = array("leaveApplications" => $leaveApplicationData);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        }
    }
?>