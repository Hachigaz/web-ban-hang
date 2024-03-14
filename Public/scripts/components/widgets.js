function widget_move_left(element){
    if(!element.current_item){
        element.current_item = 0;
    }
    let widgetItems = element.querySelectorAll(".widget-list .widget-item")
    let next_pos = element.current_item - 1
    if(next_pos < 0){
        next_pos = widgetItems.length-1
    }
    for([i,item] of widgetItems.entries()){
        if(i!=next_pos){
            item.style.display = "none"
        }
        else{
            item.style.display = "block"
        }
    }
    console.log(next_pos)
    let item = widgetItems[next_pos]
    item.style.animation = "widget-slide-left 2s"
    element.current_item = next_pos
}

function widget_move_right(element){
    if(!element.current_item){
        element.current_item = 0;
    }
    let next_pos = element.current_item + 1
    let widgetItems = element.querySelectorAll(".widget-list .widget-item")
    if(next_pos >= widgetItems.length){
        next_pos = 0
    }
    for([i,item] of widgetItems.entries()){
        if(i!=next_pos){
            item.style.display = "none"
        }
        else{
            item.style.display = "block"
        }
    }
    let item = widgetItems[next_pos]
    item.style.animation = "widget-slide-right 2s"
    element.current_item = next_pos
}

function widget_move_to_item(element,item_index){
    if(!element.current_item){
        element.current_item = 0;
    }
    let widgetItems = element.querySelectorAll(".widget-list .widget-item")
    if(
        element.current_item!=item_index && item_index >= 0 &&
        item_index < widgetItems.length
    )
    {
        for([i,item] of widgetItems.entries()){
            if(i==item_index){
                item.style.animation="widget-slide-left-show 4s"
                element.current_item = item_index
            }
        }
    }
}