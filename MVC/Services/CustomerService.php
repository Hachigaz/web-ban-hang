<?php
    require_once "./MVC/Models/CustomerModel.php";
    class CustomerService extends Service{
        public $customerRepo;

        public function __construct(){
            $this->customerRepo = $this->repository("CustomerRepository");
        }
        
        public function createCustomer($customer){
            $this->customerRepo->createCustomer($customer);
        }

        public function updateCustomer(){// by id (truyền DTO)
            $customerData = $this->customerRepo->getCustomerById("'KH005'");
            extract($customerData);// gán các giá trị cho các key tương ứng với các biến
            $customer = new CustomerModel(
                "Nguyễn Huỳnh", $role_id, $account_id, $gender, $phone_number, $customer_email, $address, $date_of_birth, $customer_id, $is_active
            );
            $this->customerRepo->updateCustomer($customer, "'KH005'");
        }

        public function deleteCustomer(){
            $id = "'KH005'";
            $this->customerRepo->deleteCustomer($id);
        }

        public function getAllCustomer(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->customerRepo->getAllCustomer(), JSON_UNESCAPED_UNICODE);
        }

        public function getQuantityAllCustomer(){
            return $this->customerRepo->getQuantityAllCustomer();
        }

        public function getCustomerById(){
            $id = "'KH002'";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->customerRepo->getCustomerById($id), JSON_UNESCAPED_UNICODE);
        }
        public function getCustomerByAccountId($account_id){
            return $this->customerRepo->getCustomerByAccountId($account_id);
        }
    }
?>