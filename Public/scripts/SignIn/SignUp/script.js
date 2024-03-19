$('form.sign-up-form').on('submit', processSignUp);

setup()
function setup(){
    let searchParams = new URLSearchParams(window.location.search)
    let status = searchParams.get("status")
    if(status == "signup_invalid_input"){
        showSliderDialogMessage("Tạo tài khoản thất bại: Thông tin đăng nhập không đúng yêu cầu")
    }
    else if(status == "signup_email_exists"){
        showSliderDialogMessage("Email đã được sử dụng, vui lòng đăng ký tài khoản sử dụng email khác")
    }
    for (key in searchParams.keys()){
        searchParams.delete(key)
    }
    const newURL = window.location.origin + window.location.pathname
    window.history.pushState({},document.title,newURL)
}

function processSignUp(){
    try{
        const formElement = document.querySelector('form.sign-up-form')
        const emailInput = new InputElement(formElement.querySelector('#input_email'))
        const passwordInput = new InputElement(formElement.querySelector('#input_password'))
        const confirmPasswordInput = new InputElement(formElement.querySelector('#input_confirm_password'))

        let email = emailInput.getInputValue() 
        let password = passwordInput.getInputValue()
        let confirm_password = confirmPasswordInput.getInputValue()
        email = email.length!=0?email:null
        password = password.length!=0?password:null
        confirm_password = confirm_password.length!=0?confirm_password:null

        // if(emailInput.getInputValue()==""){
        //     emailInput.showError("Email không được để trống")
        //     return false
        // }
        
        // if(passwordInput.getInputValue()==""){
        //     passwordInput.showError("Mật khẩu không được để trống")
        //     return false
        // }
        // if(passwordInput.getInputValue().length < 8){
        //     passwordInput.showError("Mật khẩu phải chứa ít nhất 8 ký tự")
        //     return false
        // }
        
        // if(confirmPasswordInput.getInputValue()==""){
        //     confirmPasswordInput.showError("Mật khẩu không được để trống")
        //     return false
        // }
        // else if(confirmPasswordInput.getInputValue()!=passwordInput.getInputValue()){
        //     confirmPasswordInput.showError("Mật khẩu không trùng khớp")
        //     return false
        // }

        

        let constraints = {
            email: {
                presence:{
                    message:"Email không được để trống"
                },
                email:{
                    message:"Email không đúng định dạng"
                }
            },
            password:{
                presence:{
                    message:"Mật khẩu không được để trống"
                },
                format:{
                    pattern:/^[a-zA-z0-9]{8,20}$/,
                    message:"Mật khẩu phải có ít nhất 8 ký tự từ A-Z, a-z, 0-9"
                }
            },
            confirm_password:{
                presence:{
                    message:"Mật khẩu không được để trống"
                },
                equality:{
                    attribute:'password',
                    message:"Mật khẩu phải khớp với nhau"
                }
            }
        };
        let inputs = {
            email: email,
            password: password,
            confirm_password: confirm_password
        }
        const result = validate(inputs, constraints,{fullMessages:false});
        if(result!=undefined){
            if(result["email"]){
                emailInput.showError(result["email"])
                return false
            }
            if(result["password"]){
                passwordInput.showError(result["password"])
                return false
            }
            if(result["confirm_password"]){
                confirmPasswordInput.showError(result["confirm_password"])
                return false
            }
        }
        return true
    }
    catch(e){
        console.log(e)
        return false
    }
}