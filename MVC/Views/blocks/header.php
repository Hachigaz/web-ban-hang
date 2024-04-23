<script src="../Public/scripts/Catalog/CatalogFunctions.js"></script>
<script src="../Public/scripts/header/script.js" defer></script>
<div class="header">
    <div class="wrapper-components">
        <a href="../Home/" class="logo no-user-select no-style header-component">
            <img src="../Public/img/logo/logo.png" alt="">
            <span class="brand-name">Techshop</span>
        </a>
        <div class="hotline header-component">
            <img src="../Public/img/icons/customer-service.png" alt="">
            <span class="customer-service">Chăm sóc khách hàng</span>
            <span class="phone-number">1800 6109</span>
        </div>
        <div class="search-bar header-component">
            <div class="form-search">
                <input type="text" class="input-search" placeholder="Bạn cần tìm gì...">
                <button class="btn-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
        <?php if(isset($_SESSION["logged_in_account"])): ?>
        <div class="profile header-component">
            <?php 
                if(isset($_SESSION["logged_in_account"])){
                    $loggedInAvatar = $_SESSION["logged_in_account"]["avatar"];
                }
                else{
                    $loggedInAvatar = "customerAvatar/_common/anon-user.jpg";
                }
            ?>
            <button class="like"><i class="fa-regular fa-heart"></i><span></span></button>
            <a href="#" class="shopping-cart"><i class="fa-solid fa-bag-shopping"></i></i></a>
            <a href="../CustomerInfo/" class="avatar"><img src="../Public/img/<?=$loggedInAvatar?>" alt=""></a>
            <?php 
                unset($loggedInAvatar);
            ?>
        </div>
        <a href="../SignIn/LogOut" class="no-style header-ref">
            Đăng xuất
        </a>
        <?php else: ?>
            <a href="../SignIn/" class="no-style header-ref">
                Đăng nhập
            </a>
        <?php endif; ?>
    </div>
</div>