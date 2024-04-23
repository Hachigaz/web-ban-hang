<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/Home/style.css">
<link rel="stylesheet" href="../Public/css/Home/product_item.css">

<script src="../Public/scripts/components/widgets.js" defer></script>
<script src="../Public/scripts/Home/script.js"></script>
<div class="home-page">
    <div class="content-wrapper">
        <div class="widget-panel">
            <div id="ad-widget" class="widget-container">
                <div class="widget-list-wrapper">
                    <div class="widget-list">
                        <?php foreach($data["BannerList"]["Banners"] as $bannerPath): ?>
                            <a href="#" class="widget-item no-style" style="">
                                <img src="../<?=$bannerPath?>" alt="" srcset="">
                            </a>
                        <?php endforeach?>
                    </div>
                </div>
                <button class="widget-button left-widget-button no-user-select" onclick="this.parentElement.itemWidget.moveToPrevItem()">❮</button>
                <button class="widget-button right-widget-button no-user-select" onclick="this.parentElement.itemWidget.moveToNextItem();">❯</button>
            </div>
        </div>
        <div class="categories-panel">
            <div class="categories-panel style-panel-title">
                
            </div>
        </div>
        <div class="featured-products-panel">
            <?php 
            function addFeaturedProductList($set_title,$set_index,$productList){
                include('./MVC/Views/pages/Home/components/ItemList.php');                
            }
            $index = 0;
            foreach ($data["ProductLists"] as $key => $productList){
                addFeaturedProductList($key,$index,$productList);
                $index++;
            }
            ?>
        </div>
    </div>
</div>