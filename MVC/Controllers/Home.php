<?php
    class Home extends Controller{
        public $user;
        public function __construct(){
            $this->user = $this->model("UserModel");
        }
        public function SayHi(){
            $this->view("master",[
                "Page" => "Home"
            ]);
        }
    }
?>