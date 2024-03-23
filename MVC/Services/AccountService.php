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
        
        public function createAccount($phoneNumber, $email, $password){
            $account = new AccountModel($phoneNumber, $email, $password);
            return $this->accountRepo->createAccount($account);
        }

        public function createCustomer($account_id ,$email){
            $customer = new CustomerModel($account_id, $email);
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
            $account = $this->accountRepo->joinAccountCustomer($this->toString($email));// lấy ra mảng chứa data của account có email = $email bằng cách join 2 bảng on account_id
            if($account){ // nếu mảng khác null
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                return json_encode($account, JSON_UNESCAPED_UNICODE);   // trả về json data
            }else{
                return null;
            }
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
        
        public function createNewAccount($email,$password){
            $account = new AccountModel(null,$email,$password);
            $this->accountRepo->createAccount($account);
        }
    }
?>