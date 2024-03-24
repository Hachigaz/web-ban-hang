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
                "Page" => "SignIn/SignIn"
            ]);
        }
        public function CheckSignIn(){
            $input_login_details = $_POST["input_username"];
            $input_password = $_POST["input_password"];
            
            $logged_in_customer_account = $this->accountService->checkForAccount($input_login_details,$input_password);
            if($logged_in_customer_account==null){
                $url = "../SignIn/?status=login_failed";
                header("Location: ".$url);
                return;
            }
            
            else{
                $_SESSION["logged_in_customer"] = $this->customerService->getCustomerByAccountId($logged_in_customer_account["account_id"]);
                $url = "../Home/";
                header("Location: ".$url);
                return;
            }
        }

        public function ForgotPassword(){
            $this->view("SignIn",[
                "Page" => "SignIn/FormWrapper",
                "Form" => "SignIn/ForgotPassword/EmailInput"
            ]);
        }

        public function SendVerificationEmail(){
            $email = $_POST["input_email"];
            $account = $this->accountService->accountRepo->getAccountByEmail($email);
            if($account==null){
                header("Location: ../SignIn/ForgotPassword?status=email_not_exist");
                return;
            }
            $_SESSION["password_change_user_data"]=["email"=>$email];

            $this->GenerateVerificationCode();

            $this->view("SignIn",[
                "Page" => "SignIn/FormWrapper",
                "Form" => "SignIn/ForgotPassword/ConfirmEmail"
            ]);
        }
        public function ResendVerificationEmail(){
            $codeCreatedTime = $_SESSION["password_change_verification_code"]["time_created"];
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

            $_SESSION["password_change_verification_code"]= $verificationData;

            $userEmail = $_SESSION["password_change_user_data"]["email"];
            $emailSubject = "Xác nhận đổi mật khẩu";
            $message = "
                Đã có yêu cầu đổi mật khẩu tải khoản của bạn.
                Mã xác nhận email là: $verification_code.";
            
            //return mail($userEmail,$emailSubject,$message);
        }
    }
?>