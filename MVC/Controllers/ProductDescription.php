<?php
    class ProductDescription extends Controller{// Có thể hiểu class Controller thông qua bridge.php 
        public $productService;

        public function __construct(){
            $this->productService = $this->service("ProductService");
        }
        
        public function DecodeURL(){
            $uri = parse_url($_SERVER['REQUEST_URI']);

            $urlParams = null;
            if(isset($uri["query"])){            
                parse_str(urldecode($uri["query"]),$urlParams);
            }
            return $urlParams;
        }

        public function SayHi(){
            $urlParams = $this->DecodeURL();
            $id = $urlParams["id"];
            $product = $this->productService->GetProductById2($id);
            $category_id=$product[0]["category_id"];
            $sqlQuery = "SELECT products.product_id, products.product_name, categories.category_name, brands.brand_name, products.price, products.description, products.thumbnail, products.guarantee, products.average_rating, categories.category_id, brands.brand_id
            FROM products join brands on products.brand_id = brands.brand_id join categories on products.category_id = categories.category_id
            WHERE products.is_active = 1 and products.category_id = $category_id and products.product_id!=$id
            LIMIT 6;";
            $resultList =  $this->productService->GetProductsQuery($sqlQuery);
            //echo var_dump($product);
            $this->view("master",[
                "Page" => "ProductDescription/ProductDescription",
                "Info_product" => $product[0],
                "ProductList_same_category_id" => $resultList
            ]);
        }
    }
?>