<?php
class OrderRepository extends DB{
    public function createOrder($order){
        $this->create("orders", $order, "order_id");
    }

    public function getQuantityOrderByStatus($status_of_order){
        return $this->getCountColumn("orders", "order_id","status_of_order = '" .$status_of_order."'");
    }
    public function getQuantityStaffByRole($role_id){
        return $this->getCountColumn("staffs", "staff_id", "role_id = ".$role_id);
    }
    public function deleteOrder($id){// by id
        $this->delete("orders", "order_id = ".$id);
    }
    public function updateOrder($order, $id){// by id
        $this->update("orders", $order, "order_id = ".$id,"order_id");
    }
    public function updateOrderStatus($orderData) {
        $order_id = $orderData->order_id;
        $whereCondition = "order_id = '$order_id'";
        return $this->update("orders", $order_id, $whereCondition, "order_id");
    }
    
    
    public function getAllOrder(){
        return $this->read("orders");
    }
    
    public function getOrderById($id){
        return $this->getAllByWhere("orders", "order_id = ".$id);
    }
    // public function joinOrderOrderdetails(){
    //     return $this->joinTablesNotwhere("orders", "order_details","order_id");
    // }
    public function joinOrderOrderdetails(){
        return $this->join3TablesNotWhere("orders", "order_details","skus","orders.order_id=order_details.order_id","order_details.sku_id=skus.sku_id");
    }
    public function getQuantityAllOrder(){
        return $this->getCountColumn("orders", "order_id", "");
    }
}
?>
