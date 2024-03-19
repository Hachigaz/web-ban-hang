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
        public function VerifyLogin(){
            $usernameOrEmail = $_POST['username_login'];
            $password = $_POST['password_login'];
            $this->accountService->verifyLogin($usernameOrEmail, $password);
        }
        public function Register(){
            $usernameOrEmail = $_POST['username_register'];
            $password = $_POST['password_register'];
            $retypePassword = $_POST['retype_password_register'];
            $this->accountService->register($usernameOrEmail, $password, $retypePassword);
        }
    }
?>