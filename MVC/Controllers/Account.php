<?php
    class Account extends Controller{
        public $accountService;
        public function __construct(){
            $this->accountService = $this->service("AccountService");
        }
        public function SayHi(){
            $this->view("loginSignUp", [
                "Page" => "LoginSignUp"
            ]);
        }
        public function CreateAccount($phoneNumber, $password){
            $this->accountService->createAccount($phoneNumber, $password);
        }
        public function UpdateAccount(){
            $this->accountService->updateAccount();
        }
        public function DeleteAccount(){
            $this->accountService->deleteAccount();
        }
        public function GetAllAccount(){
            $this->accountService->getAllAccount();
        }
        public function GetAccountById($id){
            $this->accountService->getAccountById($id);
        }
        public function GetAccountByPhoneNumber($phoneNumber){
            $this->accountService->getAccountByPhoneNumber($phoneNumber);
        }
        public function GetAccountByEmail($email){
            $this->accountService->getAccountByEmail($email);
        }
        public function GetRoleByAccountId($account_id){
            $this->accountService->getRoleByAccountId($account_id);
        }
    }
?>