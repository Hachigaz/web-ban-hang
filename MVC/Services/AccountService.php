<?php
    require_once "./MVC/Models/AccountModel.php";
    class AccountService extends Service{
        public $accountRepo;

        public function __construct(){
            $this->accountRepo = $this->repository("AccountRepository");
        }
        
        public function createAccount(){
            $account = new AccountModel("ThiLua", "lua123");
            $this->accountRepo->createAccount($account);
        }

        public function updateAccount(){// by id (truyền DTO)
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
            echo json_encode($this->accountRepo->getAllAccount());
        }

        public function getAccountById(){
            $id = "5";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->accountRepo->getAccountById($id));
        }
    }
?>