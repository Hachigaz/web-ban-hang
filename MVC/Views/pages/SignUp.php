<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/SignIn/style.css">
<div class="body two-subpanels">
    <div class="subpanel left-panel">
        <div class="widget-wrapper">
            <div class="widget">
                Widget
            </div>
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
                    Đăng ký
                </div>
            </div>
            <div class="form-message">

            </div>
            <form class="sign-in-form" action="SignUp/CreateAccount" method="post">
                <input type="text" id="input_username" placeholder="Email">
                <input type="password" id="input_password" placeholder="Mật khẩu">
                <input type="password" id="input_confirm_password" placeholder="Nhập lại mật khẩu">
                <input type="submit" value="Tạo tài khoản">            
            </form>
            <div class="sign-in-bottom-options">
                Đã có tài khoản?
                <a href="../SignIn/">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>