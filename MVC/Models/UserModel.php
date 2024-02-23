<?php
    class UserModel extends DB{
        public function InsertUser($email, $tendangnhap, $password, $hoten, $diachi, $sdt){
            $sql = "INSERT INTO user VALUES (null, '$hoten', '$diachi', '$sdt', '$tendangnhap', '$password', '$email', 1)";
            $result = false;
            if(mysqli_query($this->con, $sql)){
                $result = true;
            }
            return json_encode($result);
        }
    }
?>