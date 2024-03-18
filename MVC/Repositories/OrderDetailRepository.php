<?php
    class OrderDetailRepository extends DB{
        public function createOrderDetail($orderDetail){
            $this->create("order_details", $orderDetail);
        }

        public function updateOrderDetail($orderDetail, $id){// by id
            $this->update("order_details", $orderDetail, "order_detail_id = ".$id);
        }

        public function deleteOrderDetail($id){// by id
            $this->realDelete("order_details", "order_detail_id = ".$id);
        }

        public function getAllOrderDetail(){
            return $this->readDontHaveIsActive("order_details");
        }
        
        public function getOrderDetailById($id){
            return $this->getAllDontHaveIsActive("order_details", "order_detail_id = ".$id);
        }
    }
?>