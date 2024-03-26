<?php
        class CustomerRepository extends DB{
            public function createCustomer($customer){
                return $this->create("customers", $customer, "customer_id");
            }

            public function updateCustomer($customer, $id){// by id
                $this->update("customers", $customer, "customer_id = ".$id);
            }

            public function deleteCustomer($id){// by id
                $this->delete("customers", "customer_id = ".$id);
            }

            public function getAllCustomer(){
                return $this->read("customers");
            }
            
            public function getCustomerById($id){
                return $this->getAllByWhere("customers", "customer_id = ".$id);
            }
            public function getCustomerByAccountId($account_id){
                $customer = $this->getAllByWhere("customers","customers.account_id = ".$account_id);
                if(sizeof($customer)==0){
                    return null;
                }
                else{
                    return $customer[0];
                }
            }

            public function getQuantityAllCustomer(){
                return $this->getCountColumn("customers", "customer_id", "");
            }
        }
    ?>