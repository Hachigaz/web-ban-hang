<?php
        class AccountRepository extends DB{
            public function createAccount($account){
                $this->create("accounts", $account);
            }

            public function updateAccount($account, $id){// by id
                $this->update("accounts", $account, "account_id = ".$id);
            }

            public function deleteAccount($id){// by id
                $this->delete("accounts", "account_id = ".$id);
            }

            public function getAllAccount(){
                return $this->read("accounts");
            }
            
            public function getAccountById($id){
                return $this->getAllByWhere("accounts", "account_id = ".$id);
            }

            public function getAccountByUsername($username){
                return $this->getAllByWhere("accounts", "username = '$username'");
            }

            public function joinAccountCustomer($email){
                return $this->joinTables("accounts", "customers", "account_id", "customer_email = ".$email);
            }
        }
    ?>