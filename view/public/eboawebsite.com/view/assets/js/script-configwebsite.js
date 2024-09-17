

/* ================================================================ */


/* =====================Animação do actualizar menu=============  */
let menu_produto = document.querySelector("#menu-produto");
let menu_span = document.querySelector(".menu-dia .item-menu span");
let menu_lista = document.querySelector(".menu-dia .lista-menu");
let menu_itens= menu_lista.querySelectorAll(".menu-dia .lista-menu li");
console.log(menu_span.parentNode.parentNode)
menu_span.addEventListener("click",()=>{
    menu_lista.classList.add("show-menu-lista");
    if (menu_lista_promucao.classList.contains("show-menu-lista")) {
        menu_lista_promucao.classList.remove("show-menu-lista");
    }
});
menu_itens.forEach(element =>{
element.addEventListener("click",()=>{
    menu_lista.classList.remove("show-menu-lista");
    menu_span.innerHTML = element.innerHTML;
    menu_produto.value = element.innerHTML; 
});
});

let menu_produto_promucao = document.querySelector("#menu-produto-promucao");
console.log(menu_produto_promucao);
let menu_span_promucao = document.querySelector(".prom .item-menu span");
let menu_lista_promucao = document.querySelector(".prom .lista-menu");
let menu_itens_promucao= menu_lista_promucao.querySelectorAll(".prom .lista-menu li");
console.log(menu_itens_promucao)
menu_span_promucao.addEventListener("click",()=>{
    menu_lista_promucao.classList.add("show-menu-lista");
    if (menu_lista.classList.contains("show-menu-lista")) {
        menu_lista.classList.remove("show-menu-lista");
    }
    
});
menu_itens_promucao.forEach(element =>{
element.addEventListener("click",()=>{
    menu_lista_promucao.classList.remove("show-menu-lista");
    menu_span_promucao.innerHTML = element.innerHTML;
    menu_produto_promucao.value = element.innerHTML; 
    console.log(menu_produto_promucao.value);
});
});



/* Fim Animação do actualizar menu==============================  */