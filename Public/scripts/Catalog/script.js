function toggleFilterElement(element){
    let filterElement = element.parentElement.parentElement.parentElement.getAttribute("filter_id")
    let filterValue = element.value

    let searchParams = new URLSearchParams(decodeURI(window.location.search))
    if(searchParams.has(filterElement)){
        let values = searchParams.get(filterElement).split(",")
        searchParams.delete(filterElement)
        if(values.includes(filterValue)){
            if(values.length>1){
                values.splice(values.indexOf(filterValue),1)
                searchParams.append(filterElement,values.join(","))
            }
        }
        else{
            values.push(filterValue)
            searchParams.append(filterElement,values.join(","))
        }
    }
    else{
        searchParams.append(filterElement,filterValue)
    }
    let redirectURL = `${window.location.href.replace(window.location.search,"")}`
    if(searchParams.size>0){
        redirectURL+=`?${encodeURI(searchParams.toString())}`
    }
    window.location.replace(redirectURL)
}