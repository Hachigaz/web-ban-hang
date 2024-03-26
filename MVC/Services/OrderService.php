<?php
    require_once "./MVC/Models/OrderModel.php";
    class OrderService extends Service{
        public $orderRepo;

        public function __construct(){
            $this->orderRepo = $this->repository("OrderRepository");
        }
        
        public function createOrder(){//$orderDTO
            $order = new OrderModel("3", "3", "Anh Hiển", "hien2205@gmail.com", "0937363834", "Gửi tặng anh Hiển", "Express", "Tây Ninh", "2024-05-03", "70L1-13579", "COD");
            $this->orderRepo->createOrder($order);
        }

        public function updateOrder(){// by id (truyền DTO)
            $orderData = $this->orderRepo->getOrderById("3");
            extract($orderData);// gán các giá trị cho các key tương ứng với các biến
            $order = new OrderModel(
                $staff_id, $account_id, "Anh Hiển đẹp trai", $email_of_receiver, $phone_number_of_receiver, "Gửi tặng anh Hiển nha!", $shipping_method, $shipping_address, $shipping_date, $tracking_number, $payment_method, $total_money, $order_id, $order_date, $status_of_order, $is_active
            );
            $this->orderRepo->updateOrder($order, "3");
        }

        public function deleteOrder(){
            $id = "3";
            $this->orderRepo->deleteOrder($id);
        }

        public function getAllOrder(){
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->orderRepo->getAllOrder(), JSON_UNESCAPED_UNICODE);
        }

        public function getQuantityAllOrder(){
            return $this->orderRepo->getQuantityAllOrder();
        }

        public function getOrderById(){
            $id = "3";
            header('Content-Type: application/json');// chuyển đổi dữ liệu sang json
            echo json_encode($this->orderRepo->getOrderById($id), JSON_UNESCAPED_UNICODE);
        }
    }
?>