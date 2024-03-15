<?php
    class SignIn extends Controller{
        public $accountService;
        public $customerService;
        public function __construct(){
            $this->accountService = $this->service("AccountService");
            $this->customerService = $this->service("CustomerService");
        }
        public function SayHi(){
            $this->view("SignIn",[
                "Page" => "SignIn"
            ]);
        }
        public function CheckSignIn(){
            $input_login_details = $_POST["input_username"];
            $input_password = $_POST["input_password"];
            
            $logged_in_customer_account = $this->accountService->checkForAccount($input_login_details,$input_password);
            if($logged_in_customer_account==null){
                $url = "../SignIn/";
                header("Location: ".$url);    
            }
            else{
                $_SESSION["logged_in_customer"] = $this->customerService->getCustomerByAccountId($logged_in_customer_account["account_id"]);
                $url = "../Home/";
                header("Location: ".$url);    
            }
        }
    }
?>