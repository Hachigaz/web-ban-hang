<?php
    class SignUp extends Controller{
        public $user;
        public function __construct(){
            
        }
        public function SayHi(){
            $this->view("SignIn",[
                "Page" => "SignUp"
            ]);
        }
        public function SignIn(){
            
        }
    }
?>