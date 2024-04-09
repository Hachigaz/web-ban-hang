function moveTo(name){
    let tabElement = document.querySelector("div#tab")
    tabElement.innerHTML = ""

    let pageRequest = new XMLHttpRequest()
    pageRequest.onreadystatechange = function(){
        console.log(this.readyState)
        if (this.readyState == 4 && this.status == 200) {
            let responseHTML = this.responseText
            tabElement.innerHTML = responseHTML
            console.log(this.responseText)
            console.log(`../InternalManager/GetPage?action=${name}`)
        }
    }
    pageRequest.open("GET",`../InternalManager/GetPage?action=${name}`)
    pageRequest.send()
}
