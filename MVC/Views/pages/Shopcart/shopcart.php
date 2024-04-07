<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Techshop</title>
        <meta http-equiv="Cache-Control" content="max-age=3600, must-revalidate" />
        <link rel="stylesheet" href="../Public/css/components/header.css">
        <link rel="stylesheet" href="../Public/css/global/common.css">
        <link rel="stylesheet" href="../Public/css/Shopcart/Shopcart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <?php require_once "./MVC/Views/blocks/header.php" ?>
        <div class="no-item-icon" id="no-item">
            <i class="fa-solid fa-bag-shopping"></i></br>
            <span>Không có sản phẩm nào trong giỏ hàng</span></br>
            <a href="/web-ban-hang/Home/" class="backhome">Về trang chủ</a>
        </div>
        <div class="reset" id="reset-button">
                <button>
                    Xóa
                </button>
        </div>
        <div class="shop-cart">
            <div class="cart">
                <div class="cart-header">
                    <span>Đơn giá</span>
                    <span>Số lượng</span>
                    <span>Thành tiền</span>
                </div>
                <div class="cart-content">
                <div class="left-section">
                        
                    </div>
                </div>
                <div class="cart-footer">

                </div>
            </div>
            <div class="Total">
                <div class="Total-header"> Thanh Toán</div>
                <div class="Total-content">
                    <div class="temp-money" >Tạm tính</div> 
                    <div class="value-temp-money" id="temp-money">đ</div> 
                    <div class="total-money"> Thành tiền</div>
                    <div class="value-total-money"></div>
                </div>
                <a href="/web-ban-hang/Signin/" class="Total-footer">
                    Thanh toán<br>
                    <span class="help">Đăng nhập để tiếp tục</span>
                </a> 
            </div>
        </div>
        <?php require_once "./MVC/Views/pages/".$data["Page"].".php" ?>
        <div class="featured-products-panel">
            <?php 
            function addFeaturedProductList($set_title,$set_index,$productList){
                include('./MVC/Views/pages/Home/components/TestItem.php');                
            }
            $index = 0;
            foreach ($data["ProductLists"] as $key => $productList){
                addFeaturedProductList($key,$index,$productList);
                $index++;
            }
            ?>
        </div>
    </body>
    <script src="../Public/scripts/Shopcart/script.js"></script>
    <script src="../Public/scripts/Shopcart/scriptsfunction.js" defer></script>


</html>
