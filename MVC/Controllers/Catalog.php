<?php
    class Catalog extends Controller{
        public $productService;

        public function __construct(){
            $this->productService = $this->service("ProductService");
        }
        private function GetFilteredProducts($urlParams, $otherQueries = ""){
            if($otherQueries!=""){
                $otherQueries = " AND ".$otherQueries;
            }

            $queryCount = 24;
            $index = 0;
            if(isset($urlParams["page"])){
                $index = (int)$urlParams["page"];
            }
            $indexCount = $index*$queryCount;

            $filterQueries = "";
            if(isset($urlParams["categories"])){
                $queryItems = explode(",",$urlParams["categories"]);
                $filterQueries.=" AND products.category_id IN (".implode(",",$queryItems).")";
            }

            if(isset($urlParams["brands"])){
                $queryItems = explode(",",$urlParams["brands"]);
                $filterQueries.=" AND products.brand_id IN (".implode(",",$queryItems).")";
            }
            
            echo($filterQueries);
            $searchQueries = "";
            if(isset($urlParams["search-query"])){
                $searchValue = $urlParams["search-query"];
                $searchQueries.=" AND products.product_name LIKE '%{$searchValue}%'";
            }
            
            $sqlQuery = "SELECT products.product_id, products.product_name, categories.category_name, brands.brand_name, products.price, products.description, products.thumbnail, products.guarantee, products.average_rating, categories.category_id, brands.brand_id
            FROM products join brands on products.brand_id = brands.brand_id join categories on products.category_id = categories.category_id
            WHERE products.is_active = 1 $filterQueries $searchQueries $otherQueries
            ORDER BY products.updated_at DESC
            LIMIT $indexCount,$queryCount
            ";

            $resultList =  $this->productService->GetProductsQuery($sqlQuery);
            $isLast = false;
            if(count($resultList)<$queryCount){
                $isLast = true;
            }
            return [
                "ProductList"=>$resultList,
                "IsLast"=>$isLast
            ];
        }
        private function ProcessFilterOptions($urlParams){
            $filterOptions = [];

            $searchQueries = "";
            if(isset($urlParams["search-query"])){
                $searchValue = $urlParams["search-query"];
                $searchQueries.=" AND products.product_name LIKE '%{$searchValue}%'";
            }

            if(true){
                $sqlQuery = "SELECT DISTINCT categories.category_id as opt_id, categories.category_name as opt_name
                FROM categories join products on products.category_id = categories.category_id
                WHERE categories.is_active = 1 $searchQueries
                ORDER BY categories.category_name ASC
                ";
                $result = $this->productService->productRepo->get($sqlQuery);
                if(count($result)>1){
                    array_push($filterOptions,[
                        "name"=>"Loại sản phẩm",
                        "id"=>"categories",
                        "values"=>$result
                    ]
                    );
                }
            }

            if(true){
                $sqlQuery = "SELECT DISTINCT brands.brand_id as opt_id, brands.brand_name as opt_name
                FROM brands join products on products.brand_id = brands.brand_id
                WHERE brands.is_active = 1 $searchQueries
                ORDER BY brands.brand_name ASC
                ";

                $result = $this->productService->productRepo->get($sqlQuery);

                if(count($result)>1){
                    array_push($filterOptions,[
                        "name"=>"Hãng sản xuất",
                        "id"=>"brands",
                        "values"=>$result
                    ]
                    );
                }
            }
            return $filterOptions;
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

            $resultProductList = $this->GetFilteredProducts($urlParams);
            $resultFilterElements = $this->ProcessFilterOptions($urlParams);

            $message = "Danh mục sản phẩm";

            $this->view("master",[
                "Page" => "Catalog/Catalog",
                "ProductList"=>$resultProductList,
                "FilterElements"=>$resultFilterElements,
                "URLParams"=>$urlParams,
                "Message"=>$message
            ]);
        }

        public function Category(){
            $urlParams = $this->DecodeURL();
            if(isset($urlParams["context"]) && isset($urlParams["context-value"])){
                $context = $urlParams["context"];
                $contextValue = $urlParams["context-value"];
            }
            else{
                header("Location: ../Catalog/");
            }
        }

        public function GetMoreProducts(){
            $urlParams = $this->DecodeURL();

            $resultProductList = $this->GetFilteredProducts($urlParams);
            header('Content-Type: text/html; charset=utf-8');
            $htmlText = "";
            echo($htmlText);
        }
    }
?>