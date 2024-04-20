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