function showImage(element){
    element.parentElement.querySelectorAll(".image-wrapper .overlay").forEach((item)=>{
        item.classList.add("hidden")
    })

    element.querySelector(".overlay").classList.remove("hidden")

    let imageSrc = element.querySelector("img").getAttribute("src")

    document.querySelector(".product-info-panel .product-image-info-wrapper .product-image-panel .display-image-wrapper .image-wrapper img").setAttribute("src",imageSrc)
}

function selectSku(element){
    element.parentElement.querySelectorAll(".sku-option").forEach((item)=>{
        item.classList.remove("selected")
    })

    element.classList.add("selected")
}

function sendProductReview(element){
    if(!element.classList.contains("disabled")){
        if(confirm("Gửi nhận xét?")){
            let comment = document.querySelector('#input_comment textarea').value
    
            $userStarRatingEL = $("#user-star-review-rating")
            let ratingValue = $userStarRatingEL.rateYo("rating")
    
            
            let searchParams = new URLSearchParams(decodeURI(window.location.search))
            let productID = searchParams.get("id")
    
            let postData = new FormData()
            postData.append("comment",comment)
            postData.append("rating",ratingValue)
            postData.append("product_id",productID)
    
            let req = new XMLHttpRequest()
            
            req.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText)
                    let responseData = JSON.parse(this.responseText)
                    console.log(responseData)
                    if(responseData["status"]=="success"){
                        window.location.reload()
                    }
                    else if(responseData["status"]=="had_reviewed"){
                        alert("Bạn đã nhận xét sản phẩm, không thể gửi lại")
                    }
                    else if(responseData["status"]=="not_ordered"){
                        alert("Vui lòng mua hàng trước khi nhận xét sản phẩm")
                    }
                    else if(responseData["status"]=="not-signed-in"){
                        alert("Vui lòng đăng nhập để nhận xét")
                    }
                }
            }
    
            req.open("POST","../ProductDescription/SendReview")
            req.send(postData)
        }
    }
}

function buyProduct(){
    let selectedSku = document.querySelector(".product-info-panel .product-sku-list .sku-option.selected")
    if(selectedSku){
        window.location.reload()
    }
    let skuCode = selectedSku.getAttribute("value")
    
    let searchParams = new URLSearchParams(decodeURI(window.location.search))
    let productID = searchParams.get("id")

    addProducttocart(productID,skuCode)

    // window.location="../ShopCart/"
}

function addProductToCart(){
    let selectedSku = document.querySelector(".product-info-panel .product-sku-list .sku-option.selected")
    // if(selectedSku){
    //     window.location.reload()
    // }
    let skuCode = selectedSku.getAttribute("value")
    
    let searchParams = new URLSearchParams(decodeURI(window.location.search))
    let productID = searchParams.get("id")
    console.log(productID);
    console.log(selectedSku);
    addProducttocart(productID,skuCode)

    // window.location.reload()
}