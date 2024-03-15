class InputElement{
    constructor(c_inputElement){
        if(!c_inputElement.classList.contains("c-input")){
            throw new Error("invalid c-input element")
        }

        this.errorMessageElement = c_inputElement.querySelector("div.input-error-message")
        this.inputElement = c_inputElement.querySelector("input")
    }

    hideError(){
        this.errorMessageElement.style.display='none'
        this.inputElement.classList.remove('input-error-highlight')
    }
    
    showError(strMessage){
        this.setErrorMessage(strMessage)
        this.errorMessageElement.style.display='block'
        this.inputElement.classList.add('input-error-highlight')
    }

    setErrorMessage(strMessage){
        this.errorMessageElement.innerText=`*${strMessage}`
    }

    getInputValue(){
        return this.inputElement.value
    }

    setInputValue(value){
        this.inputElement.value = value
    }
}