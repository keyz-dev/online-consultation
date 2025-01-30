const toggleBtn = document.getElementById('toggle-btn');
const sideBar = document.getElementById('sidebar')
const logo = document.getElementById('header-logo');
const dropDownBtns = document.querySelectorAll('.dropdown-btn');

const toggleSideBar = () =>{
    closeAllSubMenus()
    sideBar.classList.toggle('close');
    toggleBtn.classList.toggle('rotate');
    logo.classList.toggle('visible');
}
const toggleSubMenu = (button) =>{
    if(!button.nextElementSibling.classList.contains('show')){
        closeAllSubMenus()
    }
    if (sideBar.classList.contains('close')){
        sideBar.classList.toggle('close')
        toggleBtn.classList.toggle('rotate');
    }
    button.nextElementSibling.classList.toggle('show');
    button.classList.toggle('rotate');
}

const closeAllSubMenus = () =>{
    Array.from(sideBar.querySelectorAll('.show')).forEach(ul=>{
        ul.classList.remove('show');
        ul.previousElementSibling.classList.remove('rotate');
    })
}