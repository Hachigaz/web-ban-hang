setInterval(() => {
    document.querySelector("#ad-widget").itemWidget.moveToNextItem();
}, 5000);

function showMoreProducts(productSetElement){
    const productListElement = productSetElement.querySelector('.product-list')
    productListElement.classList.remove("hide")
    productListElement.classList.add("show")

    const showButton = productSetElement.querySelector('.show-more-button')
    const hideButton = productSetElement.querySelector('.hide-button')
    showButton.style.display = "none"
    hideButton.style.display = "block"
}

function hideProducts(productSetElement){
    const productListElement = productSetElement.querySelector('.product-list')
    productListElement.classList.remove("show")
    productListElement.classList.add("hide")

    const showButton = productSetElement.querySelector('.show-more-button')
    const hideButton = productSetElement.querySelector('.hide-button')
    showButton.style.display = "block"
    hideButton.style.display = "none"
}