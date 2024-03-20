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
        public function VerifyLogin(){
            $phoneNumberOrEmail = $_POST['phone_number_or_email_login'];
            $password = $_POST['password_login'];
            $this->accountService->verifyLogin($phoneNumberOrEmail, $password);
        }
        public function Register(){
            $email = $_POST['email_register'];
            $phoneNumber = $_POST['phone_number_register'];
            $password = $_POST['password_register'];
            $retypePassword = $_POST['retype_password_register'];
            $this->accountService->register($email, $phoneNumber, $password, $retypePassword);
        }
    }
?>