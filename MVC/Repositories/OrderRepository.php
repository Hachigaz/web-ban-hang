<?php
    class OrderRepository extends DB{
        public function createOrder($order){
            $this->create("orders", $order, "order_id");
        }

        public function updateOrder($order, $id){// by id
            $this->update("orders", $order, "order_id = ".$id);
        }

        public function deleteOrder($id){// by id
            $this->delete("orders", "order_id = ".$id);
        }

        public function getAllOrder(){
            return $this->read("orders");
        }
        
        public function getOrderById($id){
            return $this->getAllByWhere("orders", "order_id = ".$id);
        }

        public function getQuantityAllOrder(){
            return $this->getCountColumn("orders", "order_id", "");
        }
    }
?>