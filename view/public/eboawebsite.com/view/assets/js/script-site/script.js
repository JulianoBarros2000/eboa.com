let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');


menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}


/* let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a'); */


window.onscroll = () =>{

    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    /* section.forEach(sec => {

        let top = window.scrollY;
        let height = sec.offsetHeight;
        let offset = sec.offsetTop - 150;
        let id = sec.getAttribute('id');

        if(top => offset && top < offset + height){
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header .navbar a[href*='+id+']').classList.add('active');
            });
        };

    }); */

}


/* document.querySelector('#search-icon').onclick = () =>{
    document.querySelector('#search-form').classList.toggle('active');
}


document.querySelector('#close').onclick = () =>{
    document.querySelector('#search-form').classList.remove('active');
} */

/* Shooping */
/* document.querySelector('#shopping-icon').onclick = () =>{
    document.querySelector('#shopping-form').classList.toggle('active');
}


document.querySelector('#Close').onclick = () =>{
    document.querySelector('#shopping-form').classList.remove('active');
} */


var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop: true,
  });



/*   var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },
    loop: true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
  });
 */

 function loader(){
    document.querySelector('.loader-container').classList.add('fade-out');
}

function fadeOut(){
    setInterval(loader, 3000);
}

window.onload = fadeOut; 


/* CARRINHO */

var product_total_amt = document.getElementById('product_total_amt');
var shipping_charge = document.getElementById('shipping_charge');
var total_cart_amt = document.getElementById('total_cart_amt');
/*  */

const decreaseNumber = (incdec, itemprice) => {
    var itmval = document.getElementById(incdec);
    var itemprice = document.getElementById(itemprice);
    //console.log(itmval.value);

    if(itmval.value < 0){
        itmval.value = 0;
        alert('Quantidade negativa não permitida');
    }else{
        itmval.value = parseInt(itmval.value) - 1;
        itmval.style.background = '#fff';
        itmval.style.color = '#000';
        itemprice.innerHTML = parseInt(itemprice.innerHTML ) - 15.00;
        product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML ) - 15.00;
        
        total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML);
    }

}

const increaseNumber = (incdec, itemprice) => {
    var itmval = document.getElementById(incdec);
    var itemprice = document.getElementById(itemprice);
    console.log(itemprice.innerHTML);
    //console.log(itmval.value);

    if(itmval.value > 25){
        itmval.value = 25;
        alert('Máximo de 25 permitido');
        itmval.style.background = 'red';
        itmval.style.color = '#fff';
    }else{
        itmval.value = parseInt(itmval.value) + 1;
        itemprice.innerHTML = parseInt(itemprice.innerHTML ) + 15.00;
        product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML ) + 15.00;

        total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML);
       
    }
}
 
 let cart = document.querySelector('.quantidade');
 let cartBox = document.querySelector('.box');
 let cartSlide = document.querySelector('.slide');
 let add = document.getElementsByClassName('Add');
 
 for(let but of add){
    but.onclick = e => {
        let item = Number(cart.getAttribute('data-count') || 0);
        cart.setAttribute('data-count', item + 1);
        cart.classList.add('on');

        //IMAGEM ANIMADA PARA O CARRINHO

        let parent =e.target.parentNode.parentNode.parentNode;
        let image = parent.querSelector('img');
        let span = document.createElement('span');
        
    }
 }
    