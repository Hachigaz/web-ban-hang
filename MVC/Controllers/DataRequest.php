<?php
    class DataRequest extends Controller{
        public $productService;
        public function __construct(){
            $this->productService = $this->service("ProductService");
        }

        public function GetProductSKUs(){
            $productID = $_POST["product_id"];
            $sql = "SELECT skus.sku_id, skus.sku_code, skus.sku_name
                FROM skus
                WHERE skus.product_id = $productID and skus.is_active = '1'
                ORDER BY skus.sku_name;
            ";

            $resultData = $this->productService->productRepo->get($sql);
            $skuList = $resultData;
            include("./MVC/Views/pages/Manager/ProductManagers/skuListRender.php");
            unset($skuList);
            unset($productID);
        }

        public function GetProductImages(){
            $productID = $_POST["product_id"];
            $sql = "SELECT product_images.product_image_id, product_images.product_id, product_images.image_url
                FROM product_images
                WHERE product_images.product_id = $productID
                ORDER BY product_images.image_url;
            ";

            $resultData = $this->productService->productRepo->get($sql);
            $productImageList = $resultData;

            include("./MVC/Views/pages/Manager/ProductManagers/productImageRender.php");
            unset($productImageList);
            unset($productID);
        }

        public function GetProductOptions(){
            $productID = $_POST["product_id"];
            $sql = "SELECT options.option_id, options.product_id, options.option_name, options.option_value
                FROM options
                WHERE options.product_id = $productID and options.is_active = '1';
            ";

            $resultData = $this->productService->productRepo->get($sql);
            $optionList = $resultData;

            include("./MVC/Views/pages/Manager/ProductManagers/productOptionRender.php");
            unset($optionList);
            unset($productID);
        }

        public function Add(){
            $table = $_POST["table"];

            $arrayKeys = [];
            $arrayValues= [];
            foreach (array_keys($_POST) as $key){
                if($key != "table"){
                    array_push($arrayKeys,$key);
                    array_push($arrayValues,"'".$_POST["$key"]."'");
                }
            }

            foreach (array_keys($_FILES) as $key){
                $imgPath = $_FILES["$key"]["full_path"];
                $imgData = file_get_contents($_FILES["$key"]["tmp_name"]);
                
                $fileNameSep = strrpos($imgPath, '/'); 
                $imgDir = [substr($imgPath, 0, $fileNameSep),substr($imgPath, $fileNameSep + 1)];

                $storePath = "./Public/img/products/".$imgDir[0]."/";
                
                $fileNameInfo = explode(".",$imgDir[1]);
                if (!is_dir($storePath)) {
                    mkdir($storePath);
                }
                $newPathDir = $fileNameInfo[0].".".$fileNameInfo[1];
                $count = 1;
                while(file_exists($storePath.$newPathDir)){
                    $newPathDir = $fileNameInfo[0]."$count.".$fileNameInfo[1];
                    $count++;
                }
                
                file_put_contents($storePath.$newPathDir, $imgData);

                array_push($arrayKeys,$key);
                array_push($arrayValues,"'".$imgDir[0]."/$newPathDir'");

                unset($newPathDir);
                unset($fileNameInfo);
                unset($count);
                unset($imgData);
                unset($imgPath);
                unset($imgDir);
                unset($storePath);
                unset($fileNameSep);
            }

            $sql = "INSERT INTO $table(".implode(",",$arrayKeys).") VALUES(".implode(",",$arrayValues).")";
            $this->productService->productRepo->set($sql);
            
            echo(json_encode(["status"=>"success"]));
            unset($updateKeys);
            unset($table);
        }

        public function Update(){
            $table = $_POST["table"];
            $tableKey = $_POST["table_id"];

            $sql = "UPDATE $table SET ";

            $updateKeys = [];
            foreach (array_keys($_POST) as $key){
                if($key != "table" && $key !="table_id" && $key != $tableKey){
                    $value = $_POST["$key"];
                    array_push($updateKeys,"$table.$key = '$value'");
                    unset($value);
                }
            }
            foreach (array_keys($_FILES) as $key){
                //delete
                $deleteSQL = "SELECT $table.$key FROM $table where $table.$tableKey = ".$_POST["$tableKey"];
                $filePath = $this->productService->productRepo->get($deleteSQL);
                
                $filePath = $filePath[0][$key];
                if($filePath!=""){
                    if($table=="accounts"){
                        $deletePath = "./Public/img/$filePath";
                    }else{
                        $deletePath = "./Public/img/products/$filePath";
                    }
                    if(file_exists($deletePath)){
                        unlink($deletePath);
                    }
                }

                $imgPath = $_FILES["$key"]["full_path"];
                $imgData = file_get_contents($_FILES["$key"]["tmp_name"]);
                
                $fileNameSep = strrpos($imgPath, '/'); 
                $imgDir = [substr($imgPath, 0, $fileNameSep),substr($imgPath, $fileNameSep + 1)];
                
                if($table=="accounts"){
                    $storePath = "./Public/img/".$imgDir[0]."/";
                }else{
                    $storePath = "./Public/img/products/".$imgDir[0]."/";
                }
                
                $fileNameInfo = explode(".",$imgDir[1]);
                if (!is_dir($storePath)) {
                    mkdir($storePath);
                }
                $newPathDir = $fileNameInfo[0].".".$fileNameInfo[1];
                $count = 1;
                while(file_exists($storePath.$newPathDir)){
                    $newPathDir = $fileNameInfo[0]."$count.".$fileNameInfo[1];
                    $count++;
                }
                
                file_put_contents($storePath.$newPathDir, $imgData);

                array_push($updateKeys,"$table.$key = '".$imgDir[0]."/$newPathDir'");
                

                unset($newPathDir);
                unset($fileNameInfo);
                unset($count);
                unset($imgData);
                unset($imgPath);
                unset($imgDir);
                unset($storePath);
                unset($fileNameSep);
            }
            $sql .= implode(",",$updateKeys);
            $sql .= " WHERE $table.$tableKey = ".$_POST["$tableKey"];

            $this->productService->productRepo->set($sql);

            echo(json_encode(["status"=>"success"]));
            unset($updateKeys);
            unset($table);
        }

        public $imagePossesionList = [
            //"products"=>["thumbnail"],
            "product_images"=>["image_url"]
        ];
        public function Delete(){
            $table = $_POST["table"];
            $tableKey = $_POST["table_id"];
            $keyValue = $_POST["$tableKey"];
            
            $sql = "UPDATE $table SET $table.is_active = '0' WHERE $table.$tableKey = '$keyValue'";

            $this->productService->productRepo->set($sql);

            echo(json_encode(["status"=>"success"]));
            unset($table);
            unset($tableKey);
            unset($keyValue);
            unset($sql);
        }

        public function TrueDelete(){
            $table = $_POST["table"];
            $tableKey = $_POST["table_id"];
            $keyValue = $_POST["$tableKey"];
            
            if(array_key_exists($table,$this->imagePossesionList)){
                $possesionCols = $this->imagePossesionList["$table"];
                foreach ($possesionCols as $col){
                    $fileDeleteSQL = "SELECT $table.$col from $table WHERE $table.$tableKey = '$keyValue'";
                    $imgPath = $this->productService->productRepo->get($fileDeleteSQL)[0]["$col"];
                    $imgPath = "./Public/img/products/$imgPath";
                    if(file_exists($imgPath)){
                        unlink($imgPath);
                    }
                    unset($fileDeleteSQL);
                    unset($imgPath);
                }
                unset($possesionCols);
            }

            $sql = "DELETE FROM $table WHERE $table.$tableKey = '$keyValue'";

            $this->productService->productRepo->set($sql);

            echo(json_encode(["status"=>"success"]));
            unset($table);
            unset($tableKey);
            unset($keyValue);
            unset($sql);
        }

        public function DeleteImage(){

        }

        public function RefreshSessionData(){
            $accountID = $_SESSION["logged_in_account"]["account_id"];

            $sql = "SELECT * FROM accounts where accounts.account_id = $accountID";
            $account = $this->productService->productRepo->get($sql)[0];

            $sql = "SELECT * FROM customers where customers.account_id = $accountID";
            $customer = $this->productService->productRepo->get($sql)[0];

            $_SESSION["logged_in_account"]=$account;
            $_SESSION["logged_in_customer"]=$customer;

            unset($accountID);
            unset($sql);
            unset($account);
            unset($customer);
        }
    }
?>