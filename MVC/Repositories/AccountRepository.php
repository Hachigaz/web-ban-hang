<?php
        class AccountRepository extends DB{
            public function createAccount($account){
                return $this->create("accounts", $account, "account_id");
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

            public function getAccountByPhoneNumber($phoneNumber){
                return $this->getAllByWhere("accounts", "phone_number = '".$phoneNumber."'");
            }

            public function joinAccountCustomer($email){
                return $this->joinTables("accounts", "customers", "account_id", "customer_email = ".$email);
            }

        }
    ?>