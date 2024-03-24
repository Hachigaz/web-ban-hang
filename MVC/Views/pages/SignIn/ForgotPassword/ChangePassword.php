<link rel="stylesheet" href="../Public/css/SignIn/ForgotPassword/style.css">

<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>
<script src="../Public/scripts/SignIn/ForgotPassword/script.js" defer></script>

<div class="body">
    <div class="title">
        Quên mật khẩu
    </div>
    <form action="../SignIn/" method="post" enctype="multipart/form-data" class="forgot-password-form input-form">
        <div class="form-message">
            Nhập Email của tài khoản để gửi mã xác nhận
        </div>
        <input type="text" name="verification-code-input" placeholder="Nhập Email">
        <div class="submit-wrapper">
            <input type="submit" value="Gửi">
        </div>
    </form>
</div>