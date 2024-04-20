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

            $sqlQuery="SELECT products.product_id, products.product_name, categories.category_name, brands.brand_name, products.price, products.description, products.thumbnail, products.guarantee, products.average_rating, categories.category_id, brands.brand_id,products.total_reviews
            FROM products join brands on products.brand_id = brands.brand_id join categories on products.category_id = categories.category_id
            where product_id = $id";
            $product = $this->productService->productRepo->get($sqlQuery)[0];


            
            $sqlQuery = "SELECT * 
            FROM product_images
            WHERE product_images.product_id = $id";
            
            $productImages =  $this->productService->productRepo->get($sqlQuery);

            
            $sqlQuery = "SELECT skus.sku_id, skus.sku_code, skus.sku_name, IFNULL(SUM(shipments.remain), 0) AS remain
            FROM skus LEFT OUTER JOIN shipments on skus.sku_id = shipments.sku_id
            WHERE skus.product_id = $id
            GROUP BY skus.sku_id
            ";

            
            $productSkus =  $this->productService->productRepo->get($sqlQuery);

            
            $sqlQuery = "SELECT options.option_name, options.option_value
            FROM options
            WHERE options.product_id = $id
            ";

            
            $productOptions =  $this->productService->productRepo->get($sqlQuery);


            $category_id=$product["category_id"];
            
            $sqlQuery = "SELECT products.product_id, products.product_name, categories.category_name, brands.brand_name, products.price, products.description, products.thumbnail, products.guarantee, products.average_rating, categories.category_id, brands.brand_id
            FROM products join brands on products.brand_id = brands.brand_id join categories on products.category_id = categories.category_id
            WHERE products.is_active = 1 and products.category_id = $category_id and products.product_id!=$id
            LIMIT 6;";
            
            $similarProductList =  $this->productService->productRepo->get($sqlQuery);
            
            $this->view("master",[
                "Page" => "ProductDescription/ProductDescription",
                "Product" => $product,
                "ProductImages" => $productImages,
                "ProductSkus" => $productSkus,
                "ProductOptions" => $productOptions,
                "SimilarProductList" => $similarProductList
            ]);
            
            unset($sqlQuery);
            unset($product);
            unset($id);
        }
    }
?>