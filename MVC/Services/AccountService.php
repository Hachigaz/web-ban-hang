<?php
    require_once "./MVC/Models/AccountModel.php";
    class AccountService extends Service{
        public $accountRepo;
        public $customerRepo;

        public function __construct(){
            $this->accountRepo = $this->repository("AccountRepository");
            $this->customerRepo = $this->repository("CustomerRepository");
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

        public function checkForAccount($login_details, $password){
            $customer_account;
            if(filter_var($login_details,FILTER_VALIDATE_EMAIL)){   
                $customer = $this->customerRepo->getCustomerByEmail($login_details);
                $account_id = $customer['account_id'];
                $customer_account = $this->accountRepo->getAccountById($account_id);
            }
            else{
                $customer_account = $this->accountRepo->getAccountByUsername($login_details);
            }
            if($customer_account==null){
                return false;
            }
            return $customer_account;
        }
    }
?>