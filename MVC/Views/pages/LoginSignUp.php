<div class="form-container">
    <div class="col col-1">
        <img src="../Public/img/logo/logo.png" alt="">
    </div>
    <div class="col col-2">
        <div class="btn-box">
            <button class="btn btn-1" id="login">Sign In</button>
            <button class="btn btn-2" id="register">Sign Up</button>
        </div>
        <!-- Đăng nhập -->
        <div class="login-form">
            <div class="form-title">
                <span>Đăng nhập</span>
            </div>
            <form action="./VerifyLogin" class="form-inputs" method="post" autocomplete="off">
                <div class="input-box">
                    <input type="text" name="phone_number_or_email_login" class="input-field" placeholder="Email hoặc số điện thoại" required>
                    <i class="fa-solid fa-user icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password_login" class="input-field" placeholder="Mật khẩu" required>
                    <i class="fa-solid fa-lock icon"></i>
                </div>
                <div class="forgot-pass">
                    <a href="#">Quên mật khẩu</a>
                </div>
                <div class="input-box">
                    <button class="input-submit">
                        <span>Sign In</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>
            <div class="social-login">
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-facebook"></i>
            </div>
        </div>
        <!-- Đăng ký -->
        <div class="register-form">
            <div class="form-title">
                <span>Đăng ký</span>
            </div>
            <form action="./Register" class="form-inputs" method="post" autocomplete="off">
                <div class="input-box">
                    <input type="text" name="email_register" class="input-field" placeholder="Email" required>
                    <i class="fa-solid fa-user icon"></i>
                </div>
                <div class="input-box">
                    <input type="text" name="phone_number_register" class="input-field" placeholder="Số điện thoại" required>
                    <i class="fa-solid fa-user icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password_register" class="input-field" placeholder="Mật khẩu" required>
                    <i class="fa-solid fa-lock icon"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="retype_password_register" class="input-field" placeholder="Xác nhận mật khẩu" required>
                    <i class="fa-solid fa-lock icon"></i>
                </div>
                <div class="forgot-pass">
                    <a href="#">Quên mật khẩu</a>
                </div>
                <div class="input-box">
                    <button class="input-submit">
                        <span>Sign Up</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>