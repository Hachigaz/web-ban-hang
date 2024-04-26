<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/Home/style.css">
<link rel="stylesheet" href="../Public/css/Home/product_item.css">

<script src="../Public/scripts/components/widgets.js" defer></script>
<script src="../Public/scripts/Home/script.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="home-page">
    <div class="content-wrapper">
        <div class="widget-panel">
            <div id="ad-widget" class="widget-container">
                <div class="widget-list-wrapper">
                    <div class="widget-list">
                        <?php foreach($data["HeaderBannerList"] as $headerBanner): ?>
                            <a href="<?= $headerBanner["url"] ?>" class="widget-item no-style" style="">
                                <img src="../Public/img/<?=$headerBanner["image_path"]?>" alt="" srcset="">
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
            <?php foreach($data["DisplayRows"] as $displayRow):?> 
                <?php include('./MVC/Views/pages/Home/components/ItemList.php'); ?>          
            <?php endforeach; ?>
        </div>
        <div class="catalog-redirect-panel">
            <a class="no-style redirect-button" href="../Catalog/">Xem thêm sản phẩm</a>
        </div>
    </div>
</div>