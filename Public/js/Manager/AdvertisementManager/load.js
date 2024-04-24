// let bannerSearchBar = document.querySelector(".tab-conetnt-header.banner-manager-tab .header-search-bar input")

// bannerSearchBar.addEventListener("keydown", function(e){
//     if(e.key == "Enter"){
//         if(searchBar.value!=""){
//             SearchBanner(searchBar.value)
//         }
//         else{
//             let forwardURL = `../InternalManager/AdvertisementManager`
//             window.location.replace(forwardURL)
//         }
//     }
// })
// function SearchBanner(searchValue){
//     let urlParams = new URLSearchParams()
    
//     let bannerSearchQuery = {
//         "search-query":searchValue
//     }

//     urlParams.append("banner-query",bannerSearchQuery)


//     let forwardURL = `../InternalManager/AdvertisementManager?${encodeURI(urlParams.toString())}`
//     window.location.replace(forwardURL)
// }

// function showMoreBanners(element){
//     if(!element.index){
//         element.index = 1;
//     }
//     console.log(element.index)
//     let searchParams = new URLSearchParams(decodeURI(window.location.search))
//     searchParams.append("page",element.index)
    
//     let req = new XMLHttpRequest()
//     req.onreadystatechange = function(){
//         if (this.readyState == 4 && this.status == 200) {
//             let responseData = JSON.parse(this.responseText)
//             let productsHTML = responseData["ProductsHTML"]
//             let isLastProduct = responseData["StatusData"]["IsLast"]
            
//             let productListElement = document.querySelector(".banner-manager-tab .banner-list-panel .row-list")
//             productListElement.innerHTML+= productsHTML
//             element.index++
//             if(isLastProduct){
//                 element.style.display = "none"
//             }
//         }
//     }
//     req.open("GET", `../InternalManager/GetMoreProducts?${encodeURI(searchParams.toString())}`, true);
//     req.send();
// }