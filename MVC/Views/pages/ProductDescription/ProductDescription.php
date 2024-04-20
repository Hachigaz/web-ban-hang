
    
<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/ProductDescription/style.css">

<link rel="stylesheet" href="../Public/misc/rateyo-min/jquery.rateyo.min.css">


<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/misc/rateyo-min/jquery.rateyo.min.js"></script>


<script src="../Public/scripts/ProductDescription/script.js"></script>
<script src="../Public/scripts/ProductDescription/load.js" defer></script>

<div class="body">
    <div class="product-info-panel">
        <div class="product-image-info-wrapper">
            <div class="grid-cell-wrapper">
                <div class="product-image-panel">
                    <div class="display-image-wrapper">
                        <div class="image-wrapper">
                            <img src="../Public/img/products/<?= $data["Product"]["thumbnail"] ?>" alt="">
                        </div>
                    </div>
                    <div class="image-preview-list-wrapper no-user-select">
                        <div class="preview-image-list">
                            <div class="image-wrapper" onclick="showImage(this)">
                                <div class="overlay"></div>
                                <img src="../Public/img/products/<?= $data["Product"]["thumbnail"] ?>" alt="">
                            </div>
                            <?php 
                                $productImages = $data["ProductImages"];
                            ?>

                            <?php foreach($productImages as $productImage): ?>
                            <div class="image-wrapper" onclick="showImage(this)">
                                <div class="overlay hidden"></div>
                                <img src="../Public/img/products/<?= $productImage["image_url"] ?>" alt="">
                            </div>
                            <?php endforeach; ?>

                            <?php 
                                unset($productImages);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-cell-wrapper">
                <div class="product-info-panel">
                    <div class="product-info-display">
                        <div class="product-name">
                            <?= $data["Product"]["product_name"] ?>
                        </div>
                        <div class="brand-name">
                            <?= $data["Product"]["brand_name"] ?>
                        </div>
                        <div class="price">
                            Giá:
                            <span class="price-value">
                                <?= number_format($data["Product"]["price"], 0, '.', ',') ?>₫
                            </span>
                        </div>
                    </div>
                    <div class="product-sku-list-wrapper">
                            <?php 
                                $productSkus = $data["ProductSkus"];
                            ?>
                            <?php if(count($productSkus)>1): ?>
                                <div class="title">
                                    Các lựa chọn
                                </div>
                                <div class="product-sku-list">
                                    <?php foreach($productSkus as $sku): ?>
                                        <?php if($sku["remain"]>0): ?>
                                            <div class="sku-option <?php if(!isset($selectedSku)) {echo "selected";$selectedSku = true;}?>" value="<?= $sku["sku_id"] ?>" onclick="selectSku(this)">
                                                <span class="text">
                                                    <?= $sku["sku_name"] ?>
                                                </span>
                                            </div>
                                        <?php else: ?>
                                            <div class="sku-option disabled" value="<?= $sku["sku_id"] ?>">
                                                <span class="text">
                                                    <?= $sku["sku_name"] ?> (Hết)
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="product-sku-list">
                                    <div class="sku-option selected hidden" value="<?= $productSkus[0]["sku_id"] ?>">
                                        <span class="text">
                                            <?= $productSkus[0]["sku_name"] ?> 
                                        </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                                if(isset($selectedSku)){
                                    unset($selectedSku);
                                }
                                unset($productSkus);
                            ?>
                    </div>
                    <div class="order-options no-user-select">
                        <div class="option-buy">
                            Mua ngay
                        </div>
                        <div class="option-add-to-cart">
                            Thêm vào giỏ hàng
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-description-panel">
            <div class="description-spec-wrapper">
                <div class="description-panel">
                    <div class="title">
                        Mô tả sản phẩm
                    </div>
                    <div class="text">
                        <?= $data["Product"]["description"] ?>
                    </div>
                </div>
                <div class="rating-spec-wrapper">
                    <div class="spec-table-wrapper">
                        <div class="title">
                            Thông số sản phẩm
                        </div>
                        <table class="product-spec-table">
                            <?php 
                                $productOptions = $data["ProductOptions"];
                            ?>

                            <?php foreach($productOptions as $option): ?>
                                <tr>
                                    <td class="option-name">
                                        <?= $option["option_name"] ?>
                                    </td>
                                    <td class="option-value">
                                        <?= $option["option_value"] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php 
                                unset($productOptions);
                            ?>
                        </table>
                    </div>
                    <div class="product-rating-wrapper">
                        <div class="product-rating-row">
                            <div class="title">
                                Đánh giá
                            </div>
                            <div class="rating-number text">
                                (<?= (number_format((float)$data["Product"]["average_rating"], 1, '.', '')); ?>)
                            </div>
                            <div id="product-star-rating-value" value="<?= $data["Product"]["average_rating"]?>" >
    
                            </div>
                        </div>
                        <div class="rating-count-row">
                            <?php 
                                $ratingCount = $data["Product"]["total_reviews"];
                            ?>

                            <?php if($ratingCount == 0): ?>
                            Chưa có đánh giá
                            <?php else: ?>
                            <?= $ratingCount ?> đánh giá
                            <?php endif; ?>

                            <?php 
                                unset($ratingCount);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-review-section">

    </div>
    <div class="similar-product-section">
        
    </div>
</div>