<?php
    require_once "./MVC/Models/AccountModel.php";
    require_once "./MVC/Models/CustomerModel.php";
    class AccountService extends Service{
        public $accountRepo;
        public $customerRepo;

        public function __construct(){
            $this->accountRepo = $this->repository("AccountRepository");
            $this->customerRepo = $this->repository("CustomerRepository");
        }
        
        public function createAccount($account){
            return $this->accountRepo->createAccount($account);
        }

        public function createCustomer($account_id){
            $customer = new CustomerModel($account_id);
            return $this->customerRepo->createCustomer($customer);
        }

        public function updateAccount(){
            $accountData = $this->accountRepo->getAccountById("9");
            extract($accountData);// gán các giá trị cho các key tương ứng với các biến
            $account = new AccountModel(
                "ThiLua12345", $password, $account_id, $created_at, $updated_at, $is_active
            );
            $this->accountRepo->updateAccount($account, "9");
        }

        public function deleteAccount(){
            $id = "9";
            $this->accountRepo->deleteAccount($id);
        }

        public function getAllAccount(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            return json_encode($this->accountRepo->getAllAccount(), JSON_UNESCAPED_UNICODE);
        }

        public function getAccountById($id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            return json_encode($this->accountRepo->getAccountById($id), JSON_UNESCAPED_UNICODE);
        }

        public function toString($string){// tránh bị lỗi khi nhập ký tự đặc biệt vào chuỗi
            return "'".$string."'";
        }

        public function getAccountByPhoneNumber($phoneNumber){
            $account = $this->accountRepo->getAccountByPhoneNumber($phoneNumber);//lấy ra mảng chứa data của account có username = $username
            if($account){// nếu mảng khác null
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                return json_encode($account, JSON_UNESCAPED_UNICODE); // trả về json data
            }else{
                return null;
            }
        }

        public function getAccountByEmail($email){  
            $accountCustomer = $this->accountRepo->joinAccountCustomer($this->toString($email));// lấy ra mảng chứa data của account có email = $email bằng cách join 2 bảng on account_id
            $accountStaff = $this->accountRepo->joinAccountStaff($this->toString($email));
            if($accountCustomer){ // nếu mảng khác null
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                return json_encode($accountCustomer, JSON_UNESCAPED_UNICODE);   // trả về json data
            }elseif($accountStaff){
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                return json_encode($accountStaff, JSON_UNESCAPED_UNICODE);
            }else{
                return null;
            }
        }

        public function getRoleByAccountId($account_id){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            return json_encode($this->accountRepo->getRoleByAccountId($account_id), JSON_UNESCAPED_UNICODE);
        }

        public function checkForAccount($login_details, $password){
            $customer_account = [];
            if(filter_var($login_details,FILTER_VALIDATE_EMAIL)){   
                $customer_account = $this->accountRepo->getAccountByEmail($login_details);
            }
            else{
                $customer_account = $this->accountRepo->getAccountByPhone($login_details);
            }
            if($customer_account==null){
                return null;
            }
            if($password != $customer_account["password"]){
                return null;
            }
            return $customer_account;
        }
        // public function verifyLogin($phoneNumber, $password){
        //     $verifyPhoneNumber = $this->getAccountByPhoneNumber($phoneNumber);
        //     $verifyEmail = $this->getAccountByEmail($phoneNumber);
        //     $passwordPhoneNumber = json_decode($this->getAccountByPhoneNumber($phoneNumber), true);
        //     $passwordEmail = json_decode($this->getAccountByEmail($phoneNumber), true);
        //     // header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
        //     // echo json_decode($passwordPhoneNumber[0]['account_id'], JSON_UNESCAPED_UNICODE);   // trả về json data
        //     if(($verifyPhoneNumber && ($passwordPhoneNumber[0]['password'] == $password)) || ($verifyEmail &&  ($passwordEmail[0]['password'] == $password))){
        //         if($passwordPhoneNumber){
        //             $_SESSION["account_id"] = $passwordPhoneNumber[0]['account_id']; // 1
        //             $_SESSION["role_id"] = $this->getRoleByAccountId($_SESSION["account_id"]);
        //         }else{
        //             header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
        //             $_SESSION["account_id"] = $passwordEmail[0]['account_id']; // 1
        //             $_SESSION["role_id"] = $this->getRoleByAccountId($_SESSION["account_id"]);
        //         }
        //         if($_SESSION["role_id"] == 5){
        //             header("location: ../Home/SayHi");
        //         }else{
        //             header("location: ../InternalManager/SayHi");
        //         }
        //     }else{
        //         header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
        //         // echo json_encode("Đăng nhập thất bại", JSON_UNESCAPED_UNICODE);   
        //         echo $passwordEmail;
        //     }
        // }   
    }
?>