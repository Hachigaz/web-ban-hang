
setup()

$('form.email-vertification-form input.code-input').on('input', function(formElement) {
    $(this).val($(this).val().replace(/[^a-z0-9]/gi, ''));
});

$('form.email-vertification-form').on('submit', doVerifyCode(formObj));

function setup(){
    let searchParams = new URLSearchParams(window.location.search)
    let status = searchParams.get("status")
    if(status == "timed_out"){
        showSliderDialogMessage("Mã xác nhận hết hạn, vui lòng gửi lại mã xác nhận")
    }
    if(status == "invalid_code"){
        showSliderDialogMessage("Mã xác nhận không đúng, vui lòng gửi lại mã xác nhận")
    }
    for (key in searchParams.keys()){
        searchParams.delete(key)
    }
    const newURL = window.location.origin + window.location.pathname
    window.history.pushState({},document.title,newURL)
}

function onInputCode(element){
    
}

function doVerifyCode(formObj){
    const codeInputElements = document.querySelectorAll(`input.code-input`)

    let vertificationCode = ""
    for([key,inputElement] of codeInputElements.entries()){
        if(inputElement.value!=""){
            vertificationCode+=inputElement.value
        }
        else{
            showSliderDialogMessage("Chưa nhập đủ thông tin")
            return false;
        }
    }

    return true;
}