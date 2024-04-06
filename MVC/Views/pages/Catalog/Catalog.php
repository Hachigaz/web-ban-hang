<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/Home/product_item.css">
<link rel="stylesheet" href="../Public/css/Catalog/style.css">

<script src="../Public/scripts/Catalog/script.js"></script>

<div class="body">
    <div class="body-wrapper">
        <div class="body-header">
        </div>
        <div class="body-content">
            <div class="filter-panel">
                <div class="filter-panel-title">
                    Lọc sản phẩm
                </div>
                <div class="filter-element-container">
                    <div class="filter-title">
                        Khoảng giá
                    </div>
                </div>
                <?php foreach($data["FilterElements"] as $filterElement): ?>
                    <?php 
                        $filterElementId = $filterElement['id'];
                        if(isset($data["URLParams"][$filterElementId])){
                            $filteredParams = explode(",",$data["URLParams"]["$filterElementId"]);
                        }
                    ?>
                    <hr>
                    <div class="filter-element-container">
                        <div class="filter-title">
                            <?= $filterElement["name"] ?>
                        </div>
                        <div class="filter-content" filter_id="<?= $filterElement["id"]?>">
                            <?php foreach($filterElement["values"] as $filterValue): ?>
                                <div class="filter-option">
                                    <label class="no-user-select">
                                        <input type="checkbox" value="<?= $filterValue["opt_id"]?>" onclick="toggleFilterElement(this)" <?php if(isset($filteredParams)) if(in_array($filterValue["opt_id"],$filteredParams)) echo("checked") ?>>
                                        <?= $filterValue["opt_name"] ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php 
                        unset($filteredParams);
                        unset($filterElementId)
                    ?>
                <?php endforeach; ?>
                <hr>
                <div class="filter-element-container">
                    <script>
                        let params = new URLSearchParams()
                        params.append("type",[1,2].join())
                        params.append("categories",[1,2].join())
                        params.append("search-query","acer")
                        console.log(encodeURI(params.toString()))
                    </script>
                </div>
                <hr>
                <div class="filter-element-container">
                    filter 1
                </div>
            </div>
            <div class="product-display-panel">
                <div class="panel-wrapper">
                    <div class="product-display-title">
                        <?=$data["Message"]?>
                    </div>
                    <div class="product-list">
                        <?php 
                            $productList = $data["ProductList"]["ProductList"];
                            include('./MVC/Views/pages/Catalog/ProductPrint.php');
                            unset($productList);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>