<div class="product-set set-<?= $set_index ?>">
    <div class="set-title style-panel-title">
        <div class="set-title-name">
            <?= $set_title ?>
        </div>
        <div class="show-product-button-wrapper no-user-select button-effect">
            <div class="show-more-button" onclick="showMoreProducts(this.parentElement.parentElement.parentElement)">Hiển thị tất cả</div>
            <div class="hide-button" onclick="hideProducts(this.parentElement.parentElement.parentElement)">Ẩn</div>
        </div>
    </div>
    <div class="product-list-wrapper no-scrollbar">
        <div class="product-list hide">
            <?php foreach($productList as $product): ?>
                <a href="../ProductDescription/?id=<?= $product["product_id"]?>" class="product-item no-style">
                    <div class="product-image-wrapper">
                        <img class="no-user-select" src="../Public/img/products/<?= $product["thumbnail"] ?>" alt="" srcset="">
                    </div>
                    <div class="product-display-name">
                        <?= $product["product_name"] ?>
                    </div>
                    <div class="producer-display-name">
                        <?= $product["brand_name"] ?>
                    </div>
                    <div class="product-info-display">
                        <div class="price-display">
                            <?= number_format($product["price"], 0, '.', ',') ?>₫
                        </div>
                        <div class="rating-display">
                            <div class="rating-icon-wrapper">
                                <img class="no-user-select" src="../Public/img/web_icons/star.png" width="18" height="18" alt="" srcset="">
                            </div>
                            <div class="rating-value">
                                <?= $product["average_rating"] ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
            <?php foreach($productList as $product): ?>
                <a href="#" class="product-item no-style">
                    <div class="product-image-wrapper">
                        <img class="no-user-select" src="../Public/img/products/<?= $product["thumbnail"] ?>" alt="" srcset="">
                    </div>
                    <div class="product-display-name">
                        <?= $product["product_name"] ?>
                    </div>
                    <div class="producer-display-name">
                        <?= $product["brand_name"] ?>
                    </div>
                    <div class="product-info-display">
                        <div class="price-display">
                            <?= number_format($product["price"], 0, '.', ',') ?>₫
                        </div>
                        <div class="rating-display">
                            <div class="rating-icon-wrapper">
                                <img class="no-user-select" src="../Public/img/web_icons/star.png" width="18" height="18" alt="" srcset="">
                            </div>
                            <div class="rating-value">
                                <?= $product["average_rating"] ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
            <?php foreach($productList as $product): ?>
                <a href="#" class="product-item no-style">
                    <div class="product-image-wrapper">
                        <img class="no-user-select" src="../Public/img/products/<?= $product["thumbnail"] ?>" alt="" srcset="">
                    </div>
                    <div class="product-display-name">
                        <?= $product["product_name"] ?>
                    </div>
                    <div class="producer-display-name">
                        <?= $product["brand_name"] ?>
                    </div>
                    <div class="product-info-display">
                        <div class="price-display">
                            <?= number_format($product["price"], 0, '.', ',') ?>₫
                        </div>
                        <div class="rating-display">
                            <div class="rating-icon-wrapper">
                                <img class="no-user-select" src="../Public/img/web_icons/star.png" width="18" height="18" alt="" srcset="">
                            </div>
                            <div class="rating-value">
                                <?= $product["average_rating"] ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>