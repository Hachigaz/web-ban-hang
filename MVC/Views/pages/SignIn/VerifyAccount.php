<link rel="stylesheet" href="../Public/css/SignIn/VerifyAccount/style.css">

<script src="../Public/scripts/components/validate.min.js"></script>
<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/SignIn/VerifyAccount/script.js" defer></script>

<div class="body">
    <div class="title">
        Xác nhận email
    </div>
    <form action="../SignUp/DoVerifyEmail" method="post" enctype="multipart/form-data" class="email-verification-form">
        <div class="form-message">
            Mã xác nhận đã được gửi tới email <?=$_SESSION["signup_user_data"]["email"]?>. Vui lòng kiểm tra email, mã sẽ hết hạn trong vòng 5 phút.
        </div>

        <input type="text" name="verification-code-input" id="verification-code-input" class="code-input" maxlength="6" placeholder="Nhập mã xác nhận" autocomplete="off">
        <div class="submit-wrapper">
            <input type="submit" value="Xác nhận email">
            <input type="button" value="Gửi lại mã" onclick="doResendVerificationCode()">
        </div>
    </form>
</div>