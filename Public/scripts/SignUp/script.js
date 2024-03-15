

let constraints = {
    from: {
        email: true
    }
};
  
let inputs = {
    login_details: usernameInput.getInputValue(),
    password: passwordInput.getInputValue()
}

validate(inputs, constraints);