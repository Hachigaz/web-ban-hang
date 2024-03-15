<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/SignUp/style.css">

<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/validate.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>
<script src="../Public/scripts/SignUp/script.js" defer></script>
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
        <div class="sign-up-form-wrapper">
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
                    Đăng ký
                </div>
            </div>
            <div class="form-message">

            </div>
            <form class="sign-up-form" action="SignUp/CreateAccount" method="post">
                <div class="c-input" id="input_username">
                    <div class="input-error-message">
                        
                    </div>    
                    <input type="text" placeholder="Email của bạn" onclick="(new InputElement(this.parentElement)).hideError()">
                </div>
                <div class="c-input" id="input_password">
                    <div class="input-error-message">
                        
                    </div>    
                    <input type="password" placeholder="Nhập mật khẩu" onclick="(new InputElement(this.parentElement)).hideError()">
                </div>
                <div class="c-input" id="input_confirm_password">
                    <div class="input-error-message">
                        
                    </div>    
                    <input type="password" placeholder="Nhập lại mật khẩu" onclick="(new InputElement(this.parentElement)).hideError()">
                </div>
                <input type="submit" value="Tạo tài khoản">            
            </form>
            <div class="sign-up-bottom-options">
                Đã có tài khoản?
                <a href="../SignIn/">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>