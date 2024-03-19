$('form.sign-in-form').on('submit', processSignIn);

setup()
function setup(){
    let searchParams = new URLSearchParams(window.location.search)
    let status = searchParams.get("status")
    if(status == "login_failed"){
        showSliderDialogMessage("Thông tin đăng nhập không chính xác")
    }
    for (key in searchParams.keys()){
        searchParams.delete(key)
    }
    const newURL = window.location.origin + window.location.pathname
    window.history.pushState({},document.title,newURL)

    //cookies
    
}

function processSignIn(){
    try{
        let formElement = document.querySelector('form.sign-in-form')
        let usernameInput = new InputElement(formElement.querySelector('#input_username'))
        let passwordInput = new InputElement(formElement.querySelector('#input_password'))
        let isRememberPassword = formElement.querySelector('#input_remember_password').value

        if(usernameInput.getInputValue()==""){
            usernameInput.showError("Thông tin đăng nhập không được để trống")
            return false
        }
        else if(passwordInput.getInputValue()==""){
            passwordInput.showError("Mật khẩu không được để trống")
            return false
        }
        
        return true
    }
    catch(e){
        console.log(e)
        return false
    }
}