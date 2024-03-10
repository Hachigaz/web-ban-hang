<?php
    class ProductRepository extends DB{
        public function createProduct($data){
            $this->create("products", $data);
        }
        public function updateProduct($data, $id){// by id
            $this->update("products", $data, "product_id = ".$id);
        }
        public function deleteProduct($id){// by id
            $this->delete("products", "product_id = ".$id);
        }
        public function getAllProduct(){
            $this->read("products");
        }
    }
?>