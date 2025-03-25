// dom html
//document object model
document.addEventListener('DOMContentLoaded', function(){
    let menuMobileBtn = document.querySelector('.menu-mobile img');
    let navegacionPrincipal = document.querySelector('.header_navegacion');
    if(menuMobileBtn)[
        menuMobileBtn.addEventListener('click', function(){
            navegacionPrincipal.classList.toggle('mostrar');
        })
    ]
});