<?php
    require_once "./MVC/Models/CustomerModel.php";
    class CustomerService extends Service{
        public $customerRepo;

        public function __construct(){
            $this->customerRepo = $this->repository("CustomerRepository");
        }
        
        public function createCustomer(){
            $customer = new CustomerModel("Nguyễn Thị Lệ", "5", "9", "1", "0936363639", "le@gmail.com", "Nghĩa Địa Gia Đôi", "2003-05-22");
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
            echo json_encode($this->customerRepo->getAllCustomer());
        }

        public function getCustomerById(){
            $id = "'KH002'";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->customerRepo->getCustomerById($id));
        }
    }
?>