<?php
    class Order extends Controller{
        public $orderService;
        public $exportService;
        public $exportDetailsService;
        public function __construct(){
            $this->orderService = $this->service("OrderService");
            $this->exportService = $this->service("ExportService");
            $this->exportDetailsService = $this->service("ExportDetailService");
        }
        public function CreateOrder(){
            $receiver_name = $_POST["name"];
            $email_of_receiver = $_POST["email"];
            $phone_number_of_receiver = $_POST["phone_number"];
            $shipping_address = $_POST["address"];
            $note = $_POST["note"];
            $this->orderService->createOrder($receiver_name, $email_of_receiver, $phone_number_of_receiver, $shipping_address, $note);
            header("location: ../InternalManager/OrderManager");
        }
        public function UpdateOrder(){
            $this->orderService->updateOrder();
        }
        public function CancelledOrder($order_id){
            $this->orderService->CancelledOrder($order_id);
        }
        public function UpdateStatusOrder($order_id){
            $this->orderService->UpdateStatusOrder($order_id);
        }
        
        // public function CancelledOrder($order_id) {
        //     // Lấy thông tin đơn hàng từ cơ sở dữ liệu
        //     $orderData = $this->orderService->getOrderById($order_id);
            
        //     // Kiểm tra xem $orderData có giá trị null không
        //     if ($orderData) {
        //         // Cập nhật trạng thái của đơn hàng thành "Cancelled"
        //         $orderData->updateOrderStatus("Cancelled");
            
        //         // Gọi phương thức để cập nhật trạng thái trong cơ sở dữ liệu
        //         $this->orderService->updateOrderStatus($orderData);
        //     } else {
        //         // Xử lý trường hợp không tìm thấy thông tin đơn hàng
        //         echo "Không tìm thấy thông tin đơn hàng.";
        //     }
        // }
        
        public function DeleteOrder(){
            $this->orderService->deleteOrder();
        }
        public function GetAllOrder(){
            $this->orderService->getAllOrder();
        }
        public function GetOrderById($id){
            $this->orderService->GetOrderById($id);
        }
        
        public function GetInfoOrder(){
            $this->orderService->GetInfoOrder();
        }
        public function GetOrder1(){
            $this->orderService->GetOrder1();
        }
        public function GetAllDataStatisticByTime($start_date, $end_date){
            header('Content-Type: application/json');
            echo json_encode($this->orderService->getAllDataStatisticByTime($start_date, $end_date), JSON_UNESCAPED_UNICODE);
        }
    }
?>