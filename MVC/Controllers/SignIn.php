<?php
    class SignIn extends Controller{
        public $user;
        public function __construct(){
            
        }
        public function SayHi(){
            $this->view("SignIn",[
                "Page" => "SignIn"
            ]);
        }
        public function CheckSignIn(){
            $url = "../Introduction/Intro";
            header("Location: ".$url);
        }
    }
?>