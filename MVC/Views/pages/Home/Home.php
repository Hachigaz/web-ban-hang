<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/Home/style.css">

<script src="../Public/scripts/components/widgets.js" defer></script>
<script src="../Public/scripts/Home/script.js"></script>
<<<<<<< Updated upstream

=======
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
>>>>>>> Stashed changes
<div class="home-page">
    <div class="content-wrapper">
        <div class="widget-panel">
            <div id="ad-widget" class="widget-container">
                <div class="widget-list-wrapper">
                    <div class="widget-list">
                        <a href="#" class="widget-item no-style" style="background-color:rgb(185, 112, 112)">
                            <img src="../Public/img/banners/banner1.png" alt="" srcset="">
                        </a>
                        <a href="#" class="widget-item no-style" style="background-color:rgb(78, 206, 95)">
                            <img src="../Public/img/banners/banner2.png" alt="" srcset="">
                        </a>
                        <a href="#" class="widget-item no-style" style="background-color:rgb(91, 128, 196)">
                            <img src="../Public/img/banners/banner3.png" alt="" srcset="">
                        </a>
                    </div>
                </div>
                <button class="widget-button left-widget-button no-user-select" onclick="this.parentElement.itemWidget.moveToPrevItem()">❮</button>
                <button class="widget-button right-widget-button no-user-select" onclick="this.parentElement.itemWidget.moveToNextItem();">❯</button>
            </div>
        </div>
        <div class="categories-panel">
            <div class="categories-panel style-panel-title">
                <div class="set-title-name">
                        Xem các danh mục
                </div>
            </div>
            <div class="category-wrapper">
                <div class="category-list">
                    <a class="category-item no-style">
                        <div class="item-image-wrapper">
                            <img src="../Public/img/logo/category_logo/keyboard.png" class="no-user-select" alt="" srcset="" width="100px" height="100px">
                        </div>
                        <div class="item-info-wrapper">
                            <div class="large-text-info">
                                Bàn phím
                            </div>
                            <div class="small-text-info">
                                Giá chỉ từ 300.000đ đến 650.000đ
                            </div>
                        </div>
                    </a>
                    <a class="category-item no-style">
                        <div class="item-image-wrapper">
                            <img src="../Public/img/logo/category_logo/mouse.png" class="no-user-select" alt="" srcset="" width="100px" height="100px">
                         </div>
                        <div class="item-info-wrapper">
                            <div class="large-text-info">
                                Chuột
                            </div>
                            <div class="small-text-info">
                                Giá chỉ từ 200.000đ đến 350.000đ
                            </div>
                        </div>
                    </a>
                    <a class="category-item no-style">
                        <div class="item-image-wrapper">
                            <img src="../Public/img/logo/category_logo/laptop.png" class="no-user-select" alt="" srcset="" width="100px" height="100px">
                        </div>
                        <div class="item-info-wrapper">
                            <div class="large-text-info">
                                Laptop
                            </div>
                            <div class="small-text-info">
                                Giá chỉ từ 10.000.000đ đến 15.000.000đ
                            </div>
                        </div>
                    </a>
                </div>
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