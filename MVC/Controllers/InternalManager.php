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
            if(!isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                header('Location: ../SignIn/SayHi');
            }   
            
            $uri = parse_url($_SERVER['REQUEST_URI']);

            $urlParams = null;
            if(isset($uri["query"])){            
                parse_str(urldecode($uri["query"]),$urlParams);
            }
            unset($uri);
            
            $resultProductList = $this->productService->GetFilteredProducts($urlParams, "" , "products.product_id ASC");
            $sql = "SELECT category_id,category_name
            FROM categories
            WHERE categories.is_active = '1'";
            $resultCategoryList = $this->productService->getProductsQuery($sql);
            unset($sql);
            
            $sql = "SELECT brand_id,brand_name
            FROM brands
            WHERE brands.is_active = '1'";
            $resultBrandList = $this->productService->getProductsQuery($sql);
            unset($sql);

            $this->view("internalManager", [
                "Page" => "ProductManager",
                "Title" => "Sản phẩm",
                "ProductList"=>$resultProductList,
                "CategoryList"=>$resultCategoryList,
                "BrandList"=>$resultBrandList,
                "URLParams"=>$urlParams
            ]);
        }

        public function DecodeURL(){
            $uri = parse_url($_SERVER['REQUEST_URI']);

            $urlParams = null;
            if(isset($uri["query"])){            
                parse_str(urldecode($uri["query"]),$urlParams);
            }
            return $urlParams;
        }

        public function GetMoreProducts(){
            $urlParams = $this->DecodeURL();

            $resultProductList = $this->productService->GetFilteredProducts($urlParams, "", "products.product_id ASC");

            ob_start();
            $productList = $resultProductList["ProductList"];
            include("./MVC/Views/Pages/Manager/ProductManagers/ProductPrint.php");
            $htmlData=ob_get_contents();
            unset($productList); 
            ob_end_clean();

            $responseData = [
                "ProductsHTML"=>$htmlData,
                "StatusData"=>["IsLast"=>$resultProductList["IsLast"]]
            ];
            header('Content-Type: application/json');
            echo json_encode($responseData);
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
            if(!isset($_SESSION["account_id"]) && isset($_SESSION["role_id"])){
                header('Location: ../SignIn/SayHi');
            }   
            
            $uri = parse_url($_SERVER['REQUEST_URI']);

            $urlParams = null;
            if(isset($uri["query"])){            
                parse_str(urldecode($uri["query"]),$urlParams);
            }
            unset($uri);



            $this->view("internalManager", [
                "Page" => "WarehouseManager",
                "Title" => "Kho",
                "urlParams"=>$urlParams
            ]);
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
        public function GetAllDataPersonalInfoStaff($account_id){
            $personalInfoStaff = $this->staffService->getInfoStaffById($account_id);
            $data = array("personalInfoStaff" => $personalInfoStaff);
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($data, JSON_UNESCAPED_UNICODE); 
        }
    }
 