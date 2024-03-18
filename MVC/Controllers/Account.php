<?php
    class Account extends Controller{
        public $accountService;
        public function __construct(){
            $this->accountService = $this->service("AccountService");
        }
        public function LoginSignUp(){
            $this->view("loginSignUp", [
                "Page" => "LoginSignUp"
            ]);
        }
        public function CreateAccount(){
            $this->accountService->createAccount();
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
        public function GetAccountByUsername($username){
            $this->accountService->getAccountByUsername($username);
        }
        public function GetAccountByEmail($email){
            $this->accountService->getAccountByEmail($email);
        }
        public function VerifyLogin($usernameOrEmail, $password){
            $this->accountService->verifyLogin($usernameOrEmail, $password);
        }
        public function GetPassword($usernameOrEmail){
            $this->accountService->getPassword($usernameOrEmail);
        }
    }
?>