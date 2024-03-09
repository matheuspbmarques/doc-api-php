/**
 * 
 * @param {Event} e 
 */
function copyRouter(e){
    _copyRouter(e.currentTarget)
}

/**
 * 
 * @param {Element} e 
 */
function _copyRouter(e){
    // Get icon span element
    const spanEl = e.children[0]

    // Get span element contents
    const contents = e.parentElement.children[0].innerHTML

    // Copy to clipboard
    navigator.clipboard.writeText(contents.trim())

    // Chancge icon to check
    spanEl.innerHTML = 'check'

    // Change icon to contents_copy
    setTimeout(() => {
        spanEl.innerHTML = 'content_copy'
    }, 600)
}

/**
 * 
 * @param {Event} e 
 */
function copyJson(e){
    _copyJson(e.currentTarget)
}

/**
 * 
 * @param {Element} e 
 */
function _copyJson(e){
    // Get json contents
    const jsonContents = e.parentElement.children[0].innerHTML

    // Copy to clipboard
    navigator.clipboard.writeText(jsonContents)

    // Get icon element
    const iconEl = e.children[0]

    // Change icon to check
    iconEl.innerHTML = 'check'

    // Change icon to content_copy
    setTimeout(() => {
        iconEl.innerHTML = 'content_copy'
    }, 600)
}