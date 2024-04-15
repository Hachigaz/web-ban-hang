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
        }
        public function HomeManager(){
            $this->view("internalManager", [
                "Page" => "HomeManager",
                "Title" => "Trang chủ"
            ]);
        }
        public function AccountManager(){
            $this->view("internalManager", [
                "Page" => "AccountManager",
                "Title" => "Tài khoản"
            ]);
        }
        public function StaffManager(){
            $this->view("internalManager", [
                "Page" => "StaffManager",
                "Title" => "Nhân viên"
            ]);
        }
        public function CustomerManager(){
            $this->view("internalManager", [
                "Page" => "CustomerManager",
                "Title" => "Khách hàng"
            ]);
        }
        public function ProductManager(){
            $this->view("internalManager", [
                "Page" => "ProductManager",
                "Title" => "Sản phẩm"
            ]);
        }
        public function SupplierManager(){
            $this->view("internalManager", [
                "Page" => "SupplierManager",
                "Title" => "Nhà cung cấp"
            ]);
        }
        public function WarehouseManager(){
            $this->view("internalManager", [
                "Page" => "WarehouseManager",
                "Title" => "Kho"
            ]);
        }
        public function ImportManager(){
            $this->view("internalManager", [
                "Page" => "ImportManager",
                "Title" => "Nhập hàng"
            ]);
        }
        public function ExportManager(){
            $this->view("internalManager", [
                "Page" => "ExportManager",
                "Title" => "Xuất hàng"
            ]);
        }
        public function OrderManager(){
            $this->view("internalManager", [
                "Page" => "OrderManager",
                "Title" => "Hóa đơn"
            ]);
        }
        public function SalaryManager(){
            $this->view("internalManager", [
                "Page" => "SalaryManager",
                "Title" => "Lương"
            ]);
        }
        public function StatisticManager(){
            $this->view("internalManager", [
                "Page" => "StatisticManager",
                "Title" => "Thống kê"
            ]);
        }
        public function DecentralizationManager(){
            $this->view("internalManager", [
                "Page" => "DecentralizationManager",
                "Title" => "Phân quyền"
            ]);
        }
        public function LeaveApplicationManager(){
            $this->view("internalManager", [
                "Page" => "LeaveApplicationManager",
                "Title" => "Đơn xin nghỉ"
            ]);
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
    }
?>