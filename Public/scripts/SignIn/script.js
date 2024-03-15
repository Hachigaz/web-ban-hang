$('form.sign-in-form').on('submit', processSignIn);

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