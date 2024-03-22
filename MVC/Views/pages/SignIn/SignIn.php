<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/SignIn/SignIn/style.css">

<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>

<script src="../Public/scripts/SignIn/SignIn/script.js" defer></script>

<div class="body two-subpanels">
    <div class="subpanel left-panel">
        <!-- <div class="widget-wrapper">
            <div class="widget">
                <div class="widget">
                </div>
            </div>
        </div> -->
        <div class="background-image-wrapper">
            <img src="../Public/img/web_icons/shop_background.png" alt="" srcset="">
        </div>
    </div>
    <div class="subpanel right-panel">
        <div class="sign-in-form-wrapper">
            <div class="form-title">
                <div class="shop-name-display">
                    <div class="logo-wrapper">
                        <img src="../Public/img/logo/logo.png" width="100px" height="100px" alt="">
                    </div>
                    <div class="shop-name">
                        Electro-Goods
                    </div>    
                </div>
                <div class="form-title-message">
                    Đăng nhập
                </div>
            </div>
            <div class="form-message">

            </div>
            <form class="sign-in-form" action="../SignIn/CheckSignIn" method="post" enctype="multipart/form-data">
                <div class="c-input" id="input_username">
                    <div class="input-error-message">
                        
                    </div>    
                    <input name="input_username" type="text" placeholder="Email hoặc tên đăng nhập" onclick="(new InputElement(this.parentElement)).hideError()">
                </div>
                <div class="c-input" id="input_password">
                    <div class="input-error-message">
                        
                    </div>    
                    <input name="input_password" type="password" placeholder="Mật khẩu" onclick="(new InputElement(this.parentElement)).hideError()">
                </div>
                <div class="sign-in-options">
                    <div class="password-remember-wrapper">
                        <input type="checkbox" id="input_remember_password">
                        <label for="input_remember_password" class="no-user-select">Lưu mật khẩu</label>
                    </div>
                </div>
                <input type="submit" value="Đăng nhập">            
            </form>
            <div class="sign-in-bottom-options">
                Chưa có tài khoản?
                <a href="../SignUp/">Đăng ký</a>
            </div>
        </div>
    </div>
</div>