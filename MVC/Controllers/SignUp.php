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
            if($this->accountService->accountRepo->getAccountByEmail($input_email)!=null){
                header("Location: ../SignUp/?status=signup_email_exists");
                return;
            };

            //very
            $signUpData = [
                "email"=>$input_email,
                "password" =>$input_password,
            ];
            
            $_SESSION["signup_user_data"] = $signUpData;
            $result = $this->GenerateVerificationCode();
            
            header("Location: ../SignUp/VerifyAccount");
        }
        public function ResendVerificationCode(){
            $codeCreatedTime = $_SESSION["verification_code"]["time_created"];
            $resendStatus;
            if(time()-$codeCreatedTime>=30){
                $result = $this->GenerateVerificationCode();
                $resendStatus=["resend_status"=>"success"];
                return;
            }
            else{
                header('Content-Type: application/json');
                $resendStatus=["resend_status"=>"resend_too_soon"];
                return;
            }
            echo(json_encode($resendStatus));
        }
        private function GenerateVerificationCode(){
            $verification_code = substr(md5(rand()), 0, 6);

            $verificationData = [
                "time_created"=>time(),
                "code"=>$verification_code
            ];

            $_SESSION["verification_code"]= $verificationData;

            $userEmail = $_SESSION["signup_user_data"]["email"];
            $emailSubject = "Xác nhận email";
            $message = "
                Mã xác nhận email là: $verification_code.";
            
            return mail($userEmail,$emailSubject,$message);
        }
        public function VerifyAccount(){
            if($_SESSION["verification_code"]==null){
               header("Location: ../SignUp/");  
               return;
            }

            $codeCreatedTime = $_SESSION["verification_code"]["time_created"];
            if($codeCreatedTime!=null){
                if(time()-$codeCreatedTime>300){
                    unset($_SESSION["signup_user_data"]);
                    unset($_SESSION["verification_code"]); 
                    header("Location: ../SignUp/");
                    return;
                }
            }

            $this->view("SignIn",[
                "Page" => "SignIn/FormWrapper",
                "Form" => "SignIn/VerifyAccount"
            ]);
        }
        public function DoVerifyEmail(){
            $codeCreatedTime = $_SESSION["verification_code"]["time_created"];
            if($codeCreatedTime!=null){
                if(time()-$codeCreatedTime>300){
                    header("Location: ../SignUp/VerifyAccount?status=timed_out");
                    return;
                }
            }
            else{
                header("Location: ../SignUp/");
                return;
            }
            $verification_code = $_POST["verification-code-input"];
            if($verification_code!= $_SESSION["verification_code"]["code"]){
                header("Location: ../SignUp/VerifyAccount?status=invalid_code");
                return;
            }
            else{
                $userData = $_SESSION["signup_user_data"];
                $newAccount = new AccountModel($userData["email"],$userData["password"]);
                $this->accountService->createAccount($newAccount);
                header("Location: ../SignIn/?status=verify_success");
                return;
            }
        }
    }
?>