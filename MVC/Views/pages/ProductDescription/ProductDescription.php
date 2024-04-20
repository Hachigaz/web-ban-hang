<link rel="stylesheet" href="../Public/css/ProductDescription/style.css">
<link rel="stylesheet" href="../Public/scripts/ProductDescription/script.js">
<div>
    <div class="container">
        <div class="product">
            <div class="product-image">
                <img src="../Public/img/products/<?=$data["Info_product"]["thumbnail"]?>" alt="Product Image">
            </div>
            <div class="product-shopping-details">
                <h1 class="product-title"><?=$data["Info_product"]["product_name"]?></h1>
                <p class="product-price">
                    <?= number_format($data["Info_product"]["price"], 0, '.', ',') ?>₫
                </p>
                <a href="#" class="btn">THÊM VÀO GIỎ HÀNG</a>
            </div>
        </div>
    </div>
    <div class="related-products">
        <h2>Sản phẩm liên quan</h2>
        <div class="product-list">
            <?php
                $productList = $data["ProductList_same_category_id"];
            ?>
            <?php foreach($productList as $product): ?>
                <div class="product-card">
                    <a href="../ProductDescription/?id=<?= $product["product_id"]?>" class="product-item no-style">
                    <img src="../Public/img/products/<?=$product["thumbnail"]?>" alt="Product Image">
                    <div class="product-details">
                        <h3 class="product-title"><?=$product["product_name"]?></h3>
                        <p class="product-price">
                            <?= number_format($product["price"], 0, '.', ',') ?>₫
                        </p>
                    </div>
                </div>
            <?php endforeach; ?> 
            <?php 
                unset($productList);
            ?>
        </div>
    </div>
    <div class="comment-container">
        <h2>Comments</h2>
        <form id="comment-form">
            <input type="text" id="name" placeholder="Your Name" required>
            <textarea id="comment" placeholder="Your Comment" required></textarea>
            <button type="submit">Submit</button>
        </form>
        <div id="comments-list"></div>
    </div>
</div>
<script src="../Public/scripts/ProductDescription/script.js"></script>
