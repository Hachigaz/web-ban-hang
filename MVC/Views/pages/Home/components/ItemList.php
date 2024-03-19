<div class="product-set set-<?= $set_index ?>">
    <div class="set-title style-panel-title">
        <?= $set_title ?>
    </div>
    <div class="product-list-wrapper">
        <?php foreach($itemList as $key=>$item): ?>
            <div class="product-list">
                <a class="product-item">
                    <div class="product-image-wrapper">
                        <img class="no-user-select" src="../Public/img/products/<?= $item->product_type ?>/<?= $item->product_thumbnail ?>" alt="" srcset="" width="200px" height="200px">
                    </div>
                    <div class="product-display-name">
                        <?= $item->product_name ?>
                    </div>
                    <div class="producer-display-name">
                        <?= $item->producer_name ?>
                    </div>
                    <div class="product-info-display">
                        <div class="price-display">
                            <?= $item->price ?>
                        </div>
                        <div class="rating-display">
                            <div class="rating-icon-wrapper">
                                <img class="no-user-select" src="../Public/img/web_icons/star.png" width="20" height="20" alt="" srcset="">
                            </div>
                            <div class="rating-value">
                                4.75
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>