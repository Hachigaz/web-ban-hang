<?php
    class AccountModel{
        private $account_id;
        private $username;
        private $password;
        private $created_at;
        private $updated_at;
        private $is_active;
        public function __construct($username, $password, $account_id = null, $created_at = null, $updated_at = null, $is_active = null){
            $this->account_id = $account_id;
            $this->username = $username;
            $this->password = $password;
            $this->created_at = $created_at;
            $this->updated_at = $updated_at;
            $this->is_active = $is_active;
        }
        public function getAccountId(){
            return $this->account_id;
        }
        public function setAccountId($account_id){
            $this->account_id = $account_id;
        }
        public function getUsername(){
            return $this->username;
        }
        public function setUsername($username){
            $this->username = $username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function getCreatedAt(){
            return $this->created_at;
        }
        public function setCreatedAt($created_at){
            $this->created_at = $created_at;
        }
        public function getUpdatedAt(){
            return $this->updated_at;
        }
        public function setUpdatedAt($updated_at){
            $this->updated_at = $updated_at;
        }
        public function getIsActive(){
            return $this->is_active;
        }
        public function setIsActive($is_active){
            $this->is_active = $is_active;
        }
        public function toArray() {
            return array(
                'account_id' => $this->account_id,
                'username' => $this->username,
                'password' => $this->password,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'is_active' => $this->is_active
            );
        }
    }
?>