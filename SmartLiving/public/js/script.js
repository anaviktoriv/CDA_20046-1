
document.addEventListener('DOMContentLoaded', function() {

    //////////////////////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(element => element.addEventListener('click', function(e){
        e.stopPropagation();
    }));

    // make it as accordion for smaller screens
    document.querySelectorAll('.dropdown-toggle').forEach(element => element.addEventListener('click', toggleSubMenuMobile));

    function toggleSubMenuMobile(e) {
        if (window.innerWidth < 992) {
            e.preventDefault();
            let nextElement = this.nextElementSibling;
            if(nextElement.classList.contains('submenu')){
                nextElement.style.display = nextElement.style.display === 'block'? 'none' : 'block';
            }
        }
    }
});
