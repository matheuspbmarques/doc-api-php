/**
 * @param {String} e
 */
function navigate(e){
    const contentsElement = document.getElementById('contents')
    const sectionElement = document.getElementById(e)

    const contentesScrollTopPosition = contentsElement.scrollTop;
    const sectionTopPosition = sectionElement.getBoundingClientRect().top

    if((sectionTopPosition - 24) < 0){
        const scrollTo = (contentesScrollTopPosition + sectionTopPosition) - 24
        
        contentsElement.scrollTo({ top: scrollTo, behavior: 'smooth' })
    }else if((sectionTopPosition - 24) > 0){
        const scrollTo = (sectionTopPosition + contentesScrollTopPosition) - 24

        contentsElement.scrollTo({ top: scrollTo, behavior: 'smooth' })
    }
}