/**
 * 
 * @param {PointerEvent} e 
 */
function showRouter(e){
    _showRotuer(e.currentTarget)
}

/**
 * @param {Element} element
 */
function _showRotuer(element){
    const { children, parentElement } = element
    const spanEl = children[1]
    const ulEl = parentElement.children[1]
    const liElHeight = ulEl.children[0].clientHeight

    if(spanEl.innerHTML == 'chevron_right'){
        spanEl.innerHTML = 'expand_more'
        ulEl.style.height = `${ulEl.children.length * liElHeight}px`
    }else{
        spanEl.innerHTML = 'chevron_right'
        ulEl.style.height = 0
    }
}