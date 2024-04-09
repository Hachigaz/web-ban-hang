<?php
    class InternalManager extends Controller{
        public $internalManagerService;
        public $productService;
        public $customerService;
        public $orderService;
        public $staffService;
        public $roleService;
        public function __construct(){
            $this->internalManagerService = $this->service("InternalManagerService");
            $this->productService = $this->service("ProductService");
            $this->customerService = $this->service("CustomerService");
            $this->orderService = $this->service("OrderService");
            $this->staffService = $this->service("StaffService");
            $this->roleService = $this->service("RoleService");
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
            echo("
            <script defer>moveTo('Menu')</script>
            ");
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
        public function GetPage(){
            $uri = parse_url($_SERVER['REQUEST_URI']);

            $urlParams = null;
            if(isset($uri["query"])){            
                parse_str(urldecode($uri["query"]),$urlParams);
            }
            if(isset($urlParams["action"])){
                $action = $urlParams["action"];
                header("Content-Type: text/html");
                echo file_get_contents("./MVC/Views/pages/Manager/ProductManagers/$action.php");
            }
            else{
                header("Location: ../InternalManager/HomeManager");
            }
        }
    }
?>