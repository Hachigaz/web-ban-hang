<?php
    // Dùng để gọi Models và Views vào Controllers
    class Controller{
        public function model($model){
            require_once "./MVC/Models/".$model.".php";
            return new $model;// tạo ra 1 đối tượng
        }
        
        public function view($view, $data = []){
            require_once "./MVC/Views/".$view.".php";
        }
    }
?>