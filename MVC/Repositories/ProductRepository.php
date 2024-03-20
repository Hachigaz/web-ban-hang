    <?php
        class ProductRepository extends DB{
            public function createProduct($product){
                $this->create("products", $product, "product_id");
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

            public function getAllBrandOfProduct(){
                return $this->getAllByDistinct("products", "brand_id", "");
            }

            public function getAllBrandOfProductByCategory($category_id){
                return $this->getAllByDistinct("products", "brand_id", "category_id = ".$category_id);
            }

            public function getAllProductByCategory($category_id){
                return $this->getAllByWhere("products", "category_id = ".$category_id);
            }

            public function getAllProductByBrand($brand_id){
                return $this->getAllByWhere("products", "brand_id = ".$brand_id);
            }

            public function getAllProductByCategoryWithBrand($category_id, $brand_id){
                return $this->getAllByWhere("products", "category_id = ".$category_id." AND brand_id = ".$brand_id);
            }
        }
    ?>