<?php
    require_once "./MVC/Models/AccountModel.php";
    class AccountService extends Service{
        public $accountRepo;

        public function __construct(){
            $this->accountRepo = $this->repository("AccountRepository");
        }
        
        public function createAccount($usernameOrEmail, $password){
            $account = new AccountModel($usernameOrEmail, $password);
            $this->accountRepo->createAccount($account);
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

        public function getAccountByUsername($username){
            $account = $this->accountRepo->getAccountByUsername($username);//lấy ra mảng chứa data của account có username = $username
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

        public function verifyLogin($usernameOrEmail, $password){
            $verifyUsername = $this->getAccountByUsername($usernameOrEmail);
            $verifyEmail = $this->getAccountByEmail($usernameOrEmail);
            $passwordUsername = json_decode($this->getAccountByUsername($usernameOrEmail), true);
            $passwordEmail = json_decode($this->getAccountByEmail($usernameOrEmail), true);
            if(($verifyUsername && ($passwordUsername[0]['password'] == $password)) || ($verifyEmail &&  ($passwordEmail[0]['password'] == $password))){
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                echo json_encode("Đăng nhập thành công", JSON_UNESCAPED_UNICODE);   
            }else{
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                echo json_encode("Đăng nhập thất bại", JSON_UNESCAPED_UNICODE);   
            }
        }   

        public function register($usernameOrEmail, $password, $retypePassword){
            if($password == $retypePassword){
                $this->createAccount($usernameOrEmail, $password);
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                echo json_encode("Đăng ký thành công", JSON_UNESCAPED_UNICODE);   
            }else{
                header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
                echo json_encode("Mật khẩu chưa trùng khớp", JSON_UNESCAPED_UNICODE);   
            }
        }
    }
?>