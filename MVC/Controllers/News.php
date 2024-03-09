<?php
    class News extends Controller{
        function SayHi(){
            echo "News - SayHi";
        }
        function CallName($ho, $ten){
            echo $ho. " " . $ten;
        }
    }
?>