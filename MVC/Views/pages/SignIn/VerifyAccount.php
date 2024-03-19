<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/SignIn/VerifyAccount/style.css">

<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>
<script src="../Public/scripts/SignIn/VerifyAccount/script.js" defer></script>
<div class="body">
    <div class="title">
        Xác nhận email
    </div>
    <form action="" method="post" enctype="multipart/form-data" class="email-vertification-form">
        <div class="form-message">
            Mã xác nhận đã được gửi tới email <span id="email-display"></span>. Vui lòng kiểm tra email.
        </div>
        <input type="text" name="" pattern="[A-Za-z0-9]" maxlength="1" placeholder="Nhập mã xác nhận" onchange="onInputCode(this)">
        <input type="text" name="" pattern="[A-Za-z0-9]" maxlength="1" placeholder="Nhập mã xác nhận" onchange="onInputCode(this)">
        <input type="text" name="" pattern="[A-Za-z0-9]" maxlength="1" placeholder="Nhập mã xác nhận" onchange="onInputCode(this)">
        <div class="submit-wrapper">
            <input type="submit" value="Xác nhận email">
            <input type="button" value="Gửi lại mã" onclick="">
        </div>
    </form>
</div>