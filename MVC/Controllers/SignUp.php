<?php
    class SignUp extends Controller{
        public $accountService;
        public $customerService;
        public function __construct(){
            $this->accountService = $this->service("AccountService");
            $this->customerService = $this->service("CustomerService");
        }
        public function SayHi(){
            $this->view("SignIn",[
                "Page" => "SignIn/SignUp"
            ]);
        }
        public function CreateAccount(){
            //check thong tin
            $input_email = $_POST["input_email"];
            $input_password = $_POST["input_password"];
            $input_confirm_password = $_POST["input_confirm_password"];
            
            if(!filter_var($input_email,FILTER_VALIDATE_EMAIL)||$input_password!=$input_confirm_password){
                header("Location: ../SignUp/?status=signup_invalid_input");
                return;
            }

            //kiem tra email ton tai chua
            if($this->customerService->customerRepo->getCustomerByEmail($input_email)!=null){
                header("Location: ../SignUp/?status=signup_email_exists");
                return;
            };

            //very
            $this->GenerateVertificationCode();

            header("Location: ../SignUp/VerifyAccount");

            
            $_SESSION["signup_user_email"]= $input_email;
            $_SESSION["signup_user_password"]= $input_password;
        }
        public function GenerateVertificationCode(){
            $vertification_code = substr(md5(rand()), 0, 6);
            $_SESSION["vertification_code"]= $vertification_code;
            $_SESSION["vertification_code_time_created"]=time();

            $userEmail = $_SESSION["signup_user_email"];
            $emailSubject = "Xác nhận email";
            $message = "
                Mã xác nhận email là:".$vertification_code.".";
            
            mail($userEmail,$emailSubject,$message);
        }
        public function DoVerifyEmail(){
            $codeCreatedTime = $_SESSION["vertification_code_time_created"];
            if($codeCreatedTime!=null){
                if(time()-$codeCreatedTime>10){
                    header("Location: ../SignUp/VerifyAccount?status=timed_out");
                }
            }
            else{
                header("Location: ../SignUp/");
            }
            $vertification_code = $_POST["vertification_code"];
            if($vertification_code!= $_SESSION["vertification_code"]){
                header("Location: ../SignIn/?status=verify_success");
                unset($_SESSION["signup_user_email"]);
                unset($_SESSION["signup_user_password"]);
                unset($_SESSION["vertification_code"]); 
                unset($_SESSION["vertification_code_time_created"]);
            }
            else{
                header("Location: ../SignUp/VerifyAccount?status=invalid_code");
            }
        }
        public function VerifyAccount(){
            if($_SESSION["vertification_code"]==null){
               header("Location: ../SignUp/");
            }
            $this->view("SignIn",[
                "Page" => "SignIn/VerifyAccount"
            ]);
        }
    }
?>