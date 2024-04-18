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
                
                $imgDir = explode("/",$imgPath);
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
                    $deletePath = "./Public/img/products/$filePath";
                    if(file_exists($deletePath)){
                        unlink($deletePath);
                    }
                }

                $imgPath = $_FILES["$key"]["full_path"];
                $imgData = file_get_contents($_FILES["$key"]["tmp_name"]);
                
                $imgDir = explode("/",$imgPath);
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

                array_push($updateKeys,"$table.$key = '".$imgDir[0]."/$newPathDir'");

                unset($newPathDir);
                unset($fileNameInfo);
                unset($count);
                unset($imgData);
                unset($imgPath);
                unset($imgDir);
                unset($storePath);
            }
            $sql .= implode(",",$updateKeys);
            $sql .= " WHERE $table.$tableKey = ".$_POST["$tableKey"];

            $this->productService->productRepo->set($sql);

            echo(json_encode(["status"=>"success"]));
            unset($updateKeys);
            unset($table);
        }
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
    }
?>