    <?php
        class ProductRepository extends DB{
            public function createProduct($product){
                $this->create("products", $product);
            }

            public function updateProduct($product, $id){// by id
                $this->update("products", $product, "product_id = ".$id);
            }

            public function deleteProduct($id){// by id
                $this->delete("products", "product_id = ".$id);
            }

            public function getAllProduct(){
                return $this->read("products");
            }
            
            public function getProductById($id){
                return $this->getAllByWhere("products", "product_id = ".$id);
            }
        }
    ?>