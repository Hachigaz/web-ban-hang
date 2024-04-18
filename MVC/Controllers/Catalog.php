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

            $queryCount = 25;
            $index = 0;
            if(isset($urlParams["page"])){
                $index = (int)$urlParams["page"];
            }
            $indexCount = $index*($queryCount-1);

            $filterQueries = "";
            if(isset($urlParams["categories"])){
                $queryItems = explode(",",$urlParams["categories"]);
                $filterQueries.=" AND products.category_id IN (".implode(",",$queryItems).")";
            }

            if(isset($urlParams["brands"])){
                $queryItems = explode(",",$urlParams["brands"]);
                $filterQueries.=" AND products.brand_id IN (".implode(",",$queryItems).")";
            }

            $priceRangeQueries = "";
            if(isset($urlParams["upper-price-range"])){
                $upperPrice = $urlParams["upper-price-range"];
                $priceRangeQueries.=" AND products.price <= $upperPrice";
            }
            if(isset($urlParams["lower-price-range"])){
                $lowerPrice = $urlParams["lower-price-range"];
                $priceRangeQueries.=" AND products.price >= $lowerPrice";
            }
            
            
            $searchQueries = "";
            if(isset($urlParams["search-query"])){
                $searchValue = $urlParams["search-query"];
                $searchQueries.=" AND products.product_name LIKE '%{$searchValue}%'";
            }

            $orderByQueries = "";
            if(isset($urlParams["order-by"])){
                $orderByValue = $urlParams["order-by"];
                if($orderByValue=="product-a-z"){
                    $orderByQueries.="products.product_name ASC,";
                }
                else if($orderByValue=="brand-a-z"){
                    $orderByQueries.="brands.brand_name ASC,";
                }
                else if($orderByValue=="price-asc"){
                    $orderByQueries.="products.price ASC,";
                }
                else if($orderByValue=="price-desc"){
                    $orderByQueries.="products.price DESC,";
                }
            }
            
            $sqlQuery = "SELECT products.product_id, products.product_name, categories.category_name, brands.brand_name, products.price, products.description, products.thumbnail, products.guarantee, products.average_rating, categories.category_id, brands.brand_id
            FROM products join brands on products.brand_id = brands.brand_id join categories on products.category_id = categories.category_id
            WHERE products.is_active = 1 $filterQueries $searchQueries $priceRangeQueries $otherQueries
            ORDER BY $orderByQueries products.updated_at DESC
            LIMIT $indexCount,$queryCount";
            $resultList =  $this->productService->GetProductsQuery($sqlQuery);
            unset($sqlQuery);
            unset($filterQueries);
            unset($searchQueries);
            $isLast = true;
            if(count($resultList)==$queryCount){
                $isLast = false;
                unset($resultList[24]);
            }
            
            return [
                "ProductList"=>$resultList,
                "IsLast"=>$isLast
            ];
        }
        
        private function ProcessPriceRange($urlParams){
            $filterQueries = "";
            if(isset($urlParams["categories"])){
                $queryItems = explode(",",$urlParams["categories"]);
                $filterQueries.=" AND products.category_id IN (".implode(",",$queryItems).")";
            }

            if(isset($urlParams["brands"])){
                $queryItems = explode(",",$urlParams["brands"]);
                $filterQueries.=" AND products.brand_id IN (".implode(",",$queryItems).")";
            }
            
            $searchQueries = "";
            if(isset($urlParams["search-query"])){
                $searchValue = $urlParams["search-query"];
                $searchQueries.=" AND products.product_name LIKE '%{$searchValue}%'";
            }

            //query price range
            $priceRangeSQLQuery = "SELECT max(products.price) as maxPrice, min(products.price) as minPrice 
                FROM products join brands on products.brand_id = brands.brand_id join categories on products.category_id = categories.category_id
                WHERE products.is_active = 1 $filterQueries $searchQueries
                ORDER BY products.updated_at DESC";
                
            $priceRangeValue = $this->productService->GetProductsQuery($priceRangeSQLQuery)[0];
            
            $priceRangeValue["maxPrice"] = ceil($priceRangeValue["maxPrice"] / 500000) * 500000;
            unset($priceRangeSQLQuery);
            unset($filterQueries);
            unset($searchQueries);

            return $priceRangeValue;
        }

        private function ProcessFilterOptions($urlParams){
            $filterOptions = [];

            $searchQueries = "";
            if(isset($urlParams["search-query"])){
                $searchValue = $urlParams["search-query"];
                $searchQueries.=" AND products.product_name LIKE '%{$searchValue}%'";
            }

            if((isset($urlParams["context"]) && $urlParams["context"]!="categories") || !isset($urlParams["context"])){
                $filterQueries = "";
                if(isset($urlParams["categories"])){
                    $queryItems = explode(",",$urlParams["brands"]);
                    $filterQueries.=" AND products.category_id IN (".implode(",",$queryItems).")";

                    if(isset($urlParams["brands"])){
                        $queryItems = explode(",",$urlParams["categories"]);
                        $filterQueries.=" OR brands.brand_id IN (".implode(",",$queryItems).")";
                    }
                }
                $sqlQuery = "SELECT DISTINCT categories.category_id as opt_id, categories.category_name as opt_name
                FROM categories join products on products.category_id = categories.category_id
                WHERE categories.is_active = 1 $searchQueries $filterQueries
                ORDER BY categories.category_name ASC
                ";
                $result = $this->productService->productRepo->get($sqlQuery);
                unset($sqlQuery);
                if(count($result)>1){
                    array_push($filterOptions,[
                        "name"=>"Loại sản phẩm",
                        "id"=>"categories",
                        "values"=>$result
                    ]
                    );
                }
            }

            if((isset($urlParams["context"]) && $urlParams["context"]!="brands") || !isset($urlParams["context"])){
                $filterQueries = "";
                if(isset($urlParams["categories"])){
                    $queryItems = explode(",",$urlParams["categories"]);
                    $filterQueries.=" AND products.category_id IN (".implode(",",$queryItems).")";
                    

                    if(isset($urlParams["brands"])){
                        $queryItems = explode(",",$urlParams["brands"]);
                        $filterQueries.=" OR brands.brand_id IN (".implode(",",$queryItems).")";
                    }
                }
                
                $sqlQuery = "SELECT DISTINCT brands.brand_id as opt_id, brands.brand_name as opt_name
                FROM brands join products on products.brand_id = brands.brand_id
                WHERE brands.is_active = 1 $searchQueries $filterQueries
                ORDER BY brands.brand_name ASC
                ";

                $result = $this->productService->productRepo->get($sqlQuery);
                unset($sqlQuery);
                unset($filterQueries);
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
            $priceRangeValue = $this->ProcessPriceRange($urlParams);

            $message = "Danh mục sản phẩm";
            if(isset($urlParams["search-query"])){
                $name = $urlParams["search-query"];
                $message="Kết quả tìm kiếm cho $name";
                unset($name);
            }

            $this->view("master",[
                "Page" => "Catalog/Catalog",
                "ProductList"=>$resultProductList,
                "FilterElements"=>$resultFilterElements,
                "URLParams"=>$urlParams,
                "PriceRange"=>$priceRangeValue,
                "Message"=>$message
            ]);
        }

        public function Category(){
            $urlParams = $this->DecodeURL();
            if(isset($urlParams["context"]) && isset($urlParams["context-value"])){
                $context = $urlParams["context"];
                $contextValue = $urlParams["context-value"];
                
                $otherQueries = "";

                if($context == "categories"){
                    $contextName = $this->productService->productRepo->get("SELECT categories.category_name FROM categories WHERE categories.category_id = $contextValue")[0]["category_name"];
                    $message = "Danh sách $contextName";
                    $otherQueries = " products.category_id = $contextValue";
                }
                else if($context == "brands"){
                    $contextName = $this->productService->productRepo->get("SELECT brands.brand_name FROM brands WHERE brands.brand_id = $contextValue")[0]["brand_name"];
                    $message = "Sản phẩm $contextName";
                    $otherQueries = " products.brand_id = $contextValue";
                }
                
                $resultProductList = $this->GetFilteredProducts($urlParams,$otherQueries);
                $resultFilterElements = $this->ProcessFilterOptions($urlParams);
                $priceRangeValue = $this->ProcessPriceRange($urlParams);

                unset($otherQueries);


                $this->view("master",[
                    "Page" => "Catalog/Catalog",
                    "ProductList"=>$resultProductList,
                    "FilterElements"=>$resultFilterElements,
                    "URLParams"=>$urlParams,
                    "PriceRange"=>$priceRangeValue,
                    "Message"=>$message
                ]);
            }
            else{
                header("Location: ../Catalog/");
            }
        }

        public function GetMoreProducts(){
            $urlParams = $this->DecodeURL();

            $resultProductList = $this->GetFilteredProducts($urlParams);

            ob_start();
            $productList = $resultProductList["ProductList"];
            include('./MVC/Views/pages/Catalog/ProductPrint.php');
            $htmlData=ob_get_contents();
            unset($productList); 
            ob_end_clean();

            $responseData = [
                "ProductsHTML"=>$htmlData,
                "StatusData"=>["IsLast"=>$resultProductList["IsLast"]]
            ];
            header('Content-Type: application/json');
            echo json_encode($responseData);
        }
    }
?>