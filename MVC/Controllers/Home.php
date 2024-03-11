<?php
    class Home extends Controller{// Có thể hiểu class Controller thông qua bridge.php 
        public function SayHi(){
            $this->view("master",[
                "Page" => "Home"
            ]);
        }
    }
?>