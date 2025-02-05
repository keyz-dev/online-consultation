const navbar = document.getElementById('navbar');
const toggleBtn = document.getElementById('toggleNavBarBtn');
span = toggleBtn.querySelector('span');
const toggleNavBar = () =>{
    if(span.innerHTML === '<i class="fas fa-bars"></i>'){
        openNav()
    }
    else{
        closeNavbar()
    }
}

const openNav =() =>{
    navbar.classList.remove('left-[-250%]')
    navbar.classList.add('left-0')
    span.innerHTML = '<i class="fas fa-times"></i>'
    // make the cursor to be x outside the navbar
    document.body.classList.add('cursor-x')
}

const closeNavbar = () => {
    navbar.classList.add('left-[-250%]')
    navbar.classList.remove('left-0')
    span.innerHTML = '<i class="fas fa-bars"></i>'    
    // remove the cross-like cursor from the body
    document.body.classList.remove('cursor-x')
}

navbar.addEventListener('mouseover', ()=>{
    if(navbar.classList.contains('left-0'))
        document.body.classList.remove('cursor-x')
})
navbar.addEventListener('mouseout', ()=>{
    if(navbar.classList.contains('left-0'))
        document.body.classList.add('cursor-x')
})

document.addEventListener('click',(event)=>{
    let isButton = toggleBtn.contains(event.target) 
    if(isButton){
        toggleNavBar()
    }
    else if(!navbar.contains(event.target) &&  !navbar.classList.contains('left-[-250%]')){
        closeNavbar()
    }
})
