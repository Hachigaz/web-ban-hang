function showTab(element){
    let tabName = element.getAttribute('tab')
    element.parentElement.querySelectorAll('.option').forEach((item)=>{
        item.classList.remove('selected')
    })
    element.classList.add("selected")

    document.querySelectorAll(`.tab .tab-content .tab-content-wrapper`).forEach((item)=>{
        item.classList.add("hidden")
    })
    document.querySelector(`.tab .tab-content .tab-content-wrapper.${tabName}`).classList.remove("hidden")
}

function showPanel(element){
    let tabName = element.getAttribute('panel')
    element.parentElement.querySelectorAll('.option').forEach((item)=>{
        item.classList.remove('selected')
    })
    element.classList.add("selected")

    document.querySelectorAll(`.tab .tab-content .tab-content-wrapper .info-panel-wrapper .info-panel`).forEach((item)=>{
        item.classList.add("hidden")
    })
    document.querySelector(`.tab .tab-content .tab-content-wrapper .info-panel-wrapper .info-panel.${tabName}`).classList.remove("hidden")
}


let bannerFillInfos = [
    "banner_name",
    "location",
    "url",
    "banner_id",
    "image_path"
]

let bannerEditFormElements = {
    "input":{
        "banner_name":document.querySelector(".info-panel-wrapper .info-panel-form-wrapper #input_banner_name input"),
        "location":document.querySelector(".info-panel-wrapper .info-panel-form-wrapper #input_location input"),
        "url":document.querySelector(".info-panel-wrapper .info-panel-form-wrapper #input_url input")
    },
    "image_input":{
        "image_path":{
            "display_element":document.querySelector(".info-panel-wrapper .edit-image-wrapper img"),
            "input_element":document.querySelector(".info-panel-wrapper .edit-image-wrapper input")
        }
    }
}
    

let fillInfos = {
    "Banners":{
        "row_infos":bannerFillInfos,
        "edit_elements":bannerEditFormElements
    }
}

let selectedDatas = {
    
}

function fillInfo(name,element){
    if (element.parentElement.selectedRow){
        element.parentElement.selectedRow.classList.remove("selected")
    }
    element.parentElement.selectedRow = element
    element.classList.add("selected")

    let rowInfos = fillInfos[`${name}`]["row_infos"]
    let editElements = fillInfos[`${name}`]["edit_elements"]

    if(!selectedDatas[`${name}`]){
        selectedDatas[`${name}`] = []
    }
    for (index in rowInfos){
        selectedDatas[`${name}`][`${rowInfos[index]}`] = element.querySelector(`[attrib='${rowInfos[index]}']`).getAttribute("value")
    }
    

    let inputElements = editElements["input"]
    for(index in inputElements){
        element = inputElements[index]
        element.value = selectedDatas[`${name}`][index]
    }
    
    let imageInputElements = editElements["image_input"]
    for(index in imageInputElements){
        displayElement = imageInputElements[index]["display_element"]
        displayElement.setAttribute('src',`../Public/img/${selectedDatas[name][index]}`)
    }
}


let formOptions = {
    "EditBannerForm":{
        "edit":document.querySelector(".info-panel-wrapper .banner-info-panel .info-panel-form-options .edit-button")
    }
}
function enableOptions(formName){
    let formOption = formOptions[formName]
    for (index in formOption){
        formOption[index].classList.remove("disabled")
    }
}

function disableOptions(formName){
    let formOption = formOptions[formName]
    for (index in formOption){
        formOption[index].classList.add("disabled")
    }
}

let isInfoPanelShown = false
function showInfoPanel(){
    if(!isInfoPanelShown){
        document.querySelector(".tab-content .banner-info-panel .inital-panel").classList.add("hidden")
        document.querySelector(".tab-content .banner-info-panel .after-panel").classList.remove("hidden")
        isInfoPanelShown = true
    }
}

function editBanner(element){
    if(isChanged && !element.classList.contains("disabled")){
        let bannerData = selectedDatas["Banners"]["row-infos"]
        let formData = selectedDatas["Banners"]["edit-elements"]
        
        let bannerID = bannerData["banner_id"]
        let bannerName = formData["input"]["banner_name"]
        let location = formData["input"]["location"]
        let bannerURL = formData["input"]["url"]

        
        if(bannerName==""){
            productNameElement.showError("Vui lòng nhập tên banner")
            return
        }

        if(location==""){
            descriptionElement.showError("Vui lòng nhập vị trí đặt banner")
            return
        }
        


        let reqData = new FormData()
        reqData.append("table","bannerss")
        reqData.append("table_id","banner_id")
        reqData.append("product_id",bannerID)
        reqData.append("banner_name",bannerName)
        reqData.append("location",location)
        reqData.append("url",bannerURL)

        if(productImage){
            let imgExtension = productImage.name.split(".")
            let newImgPath = `${categoryID}/${imgExtension[imgExtension.length-2].trim().toLowerCase()}.${imgExtension[imgExtension.length-1]}`
            reqData.append("thumbnail",productImage,newImgPath)
        }
        
        let req = new XMLHttpRequest()
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                let responseData = JSON.parse(this.responseText)
                console.log(responseData)
                if(responseData["status"]=="success"){
                    window.location.reload()
                }
            }
        };
        req.open("POST", "../DataRequest/Update", true);
        req.send(reqData);
    }
    else{
        
    }
}

function changeImage(element){
    let file = element.querySelector("input").files[0]
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
        let imgElement = element.querySelector("img")
        imgElement.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

function removeProduct(element){
    if(!element.classList.contains("disabled")){
        let productID = productInfo["product_id"]
        
        let reqData = new FormData()
        reqData.append("table","products")
        reqData.append("table_id","product_id")
        reqData.append("product_id",productID)
        
        
        
        let req = new XMLHttpRequest()
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                let responseData = JSON.parse(this.responseText)
                console.log(responseData)
                if(responseData["status"]=="success"){
                    window.location.reload()
                }
            }
        };
        req.open("POST", "../DataRequest/Delete", true);
        if(confirm("Xác nhận xóa sản phẩm"))
            req.send(reqData);
    }
    else{
        
    }
}

function addProduct(element){
    if(!element.classList.contains("disabled")){
        let infoPanelElement = document.querySelector(".add-products-tab .tab-content-wrapper")
        let productNameElement = new InputElement(infoPanelElement.querySelector('.c-input#input-product-name'))
        let productName = productNameElement.getInputValue()
        let descriptionElement = new InputElement(infoPanelElement.querySelector(".c-input#input-description"))
        let description = descriptionElement.getInputValue()

        let categoryID = infoPanelElement.querySelector(".c-input#input-category-id select").value
        let brandID =infoPanelElement.querySelector(".c-input#input-brand-id select").value

        let price = infoPanelElement.querySelector(".c-input#input-price input").trueValue
        let guarantee = infoPanelElement.querySelector(".c-input#input-guarantee input").trueValue
        
        let productImage = infoPanelElement.querySelector(".product-img-wrapper input").files[0]
        
        if(productName==""){
            productNameElement.showError("Tên sản phẩm không được để trống")
            return
        }
        if(description==""){
            descriptionElement.showError("Mô tả không được để trống")
            return
        }
        if(!price){
            (new InputElement(infoPanelElement.querySelector(".c-input#input-price"))).showError("Giá sản phẩm không được để trống")
            return
        }
        if(!guarantee){
            (new InputElement(infoPanelElement.querySelector(".c-input#input-guarantee"))).showError("Năm bảo hành phải lớn hơn 0")
            return
        }

        let reqData = new FormData()
        reqData.append("table","products")
        reqData.append("product_name",productName)
        reqData.append("category_id",categoryID)
        reqData.append("brand_id",brandID)
        reqData.append("description",description)
        reqData.append("price",price)
        reqData.append("guarantee",guarantee)

        if(productImage){
            let imgExtension = productImage.name.split(".")
            let newImgPath = `${categoryID}/${imgExtension[imgExtension.length-2].trim().toLowerCase()}.${imgExtension[imgExtension.length-1]}`
            reqData.append("thumbnail",productImage,newImgPath)
        }
        
        let req = new XMLHttpRequest()
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                let responseData = JSON.parse(this.responseText)
                if(responseData["status"]=="success"){
                    window.location.reload()
                }
            }
        };
        req.open("POST", "../DataRequest/Add", true);
        req.send(reqData);
    }
    else{
        
    }
}