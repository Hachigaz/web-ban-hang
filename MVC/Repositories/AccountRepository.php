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
                $account = $this->getAllByWhere("accounts", "account_id = ".$id);
                if(sizeof($account)==0){
                    return null;
                }
                else{
                    return $account[0];
                }
            }

            public function getAccountByPhoneNumber($phoneNumber){
                $account = $this->getAllByWhere("accounts", "phone_number = '".$phoneNumber."'");
                if(sizeof($account)==0){
                    return null;
                }
                else{
                    return $account[0];
                }
            }

            public function getAccountByEmail($email){
                $account = $this->getAllByWhere("accounts","accounts.email = '$email'");
                if(sizeof($account)==0){
                    return null;
                }
                else{
                    return $account[0];
                }
            }

            public function getAccountByPhone($phoneNumber){
                $account = $this->getAllByWhere("accounts","accounts.phone_number = '$phoneNumber'");
                if(sizeof($account)==0){
                    return null;
                }
                else{
                    return $account[0];
                }
            }

            public function joinAccountCustomer($email){
                return $this->joinTables("accounts", "customers", "account_id", "customer_email = ".$email);
            }

            public function joinAccountStaff($email){
                return $this->joinTables("accounts", "staffs", "account_id", "staff_email = ".$email);
            }
            
            public function getRoleByAccountId($account_id){
                return $this->unionTables("customers", "staffs", "role_id", "account_id = ".$account_id, "account_id = ".$account_id)[0]["role_id"];
            }

        }
    ?>