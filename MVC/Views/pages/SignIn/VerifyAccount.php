<link rel="stylesheet" href="../Public/css/globals/globals.css">
<link rel="stylesheet" href="../Public/css/globals/components.css">
<link rel="stylesheet" href="../Public/css/SignIn/VerifyAccount/style.css">

<script src="../Public/scripts/components/jquery-3.7.1.min.js"></script>
<script src="../Public/scripts/components/globals.js"></script>
<script src="../Public/scripts/SignIn/VerifyAccount/script.js" defer></script>
<?php
    echo(
        "<script>
            showSliderDialogMessage('Mã xác nhận: ".$data["vert_code"]."')
        </script>
    ")
?>
<div class="body">
    <div class="title">
        Xác nhận email
    </div>
    <form action="../Signup/DoVerifyEmail" method="post" enctype="multipart/form-data" class="email-vertification-form">
        <?php
            echo('<div class="form-message">
                Mã xác nhận đã được gửi tới email '.$_SESSION["signup_user_email"].'. Vui lòng kiểm tra email.
            </div>');
        ?>
        <!-- <div class="code-inputs">
            <input type="text" class="code-input" name="code-input-1" id="code-input-1" maxlength="1" placeholder="" onchange="onInputCode(this)">
            <input type="text" class="code-input" name="code-input-2" id="code-input-2" maxlength="1" placeholder="" onchange="onInputCode(this)">
            <input type="text" class="code-input" name="code-input-3" id="code-input-3" maxlength="1" placeholder="" onchange="onInputCode(this)">    
            <input type="text" class="code-input" name="code-input-4" id="code-input-4" maxlength="1" placeholder="" onchange="onInputCode(this)">
            <input type="text" class="code-input" name="code-input-5" id="code-input-5" maxlength="1" placeholder="" onchange="onInputCode(this)">
            <input type="text" class="code-input" name="code-input-6" id="code-input-6" maxlength="1" placeholder="" onchange="onInputCode(this)">    
        </div> -->
        <input type="text" name="vertification-code-input" id="vertification-code-input" class="code-input" maxlength="6" placeholder="Nhập mã xác nhận">
        <div class="submit-wrapper">
            <input type="submit" value="Xác nhận email">
            <input type="button" value="Gửi lại mã" onclick="">
        </div>
    </form>
</div>