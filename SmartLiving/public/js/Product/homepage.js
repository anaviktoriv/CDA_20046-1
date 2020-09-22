const slider = document.querySelector('.slider')

const leftArrow = document.querySelector('.left')
const rightArrow = document.querySelector('.right')

let sectionIndex = 0;
let numberOfSections = 4;



rightArrow.addEventListener('click', function() {
    sectionIndex = (sectionIndex < (numberOfSections - 1)) ? sectionIndex + 1 : numberOfSections - 1
    slider.style.transform = 'translate(' + (sectionIndex) * -100 + '%)'
})

leftArrow.addEventListener('click', function() {
    sectionIndex = (sectionIndex > 0) ? sectionIndex - 1 : 0
    slider.style.transform = 'translate(' + (sectionIndex) * -100 + '%)'
})