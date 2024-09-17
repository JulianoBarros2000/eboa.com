
/* ==============================PESQUISA INTERATIVA TABELAS========================= */
const search = document.querySelector("#input-search"),
linhas_tabela = document.querySelectorAll("table tbody tr ");


search.addEventListener("input",pesquisarDados);  

function pesquisarDados() {
linhas_tabela.forEach((linha,i) =>{
  let dados_tabela = linha.textContent.toLowerCase(),
  dados_pesquisado=search.value.toLowerCase();

 linha.classList.toggle( 'esconder', dados_tabela.indexOf(dados_pesquisado) < 0);
 linha.style.setProperty("--delay",i/25 + 's');
});

document.querySelectorAll(".prodt  .item-prodt:not(.esconder)").forEach((linha_visivel,i) =>{
  linha_visivel.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
});

}    


/* FIM PESQUISA INTERATIVA TABELAS=========================== */ 



/* ==========================FEITO DE TROCA DE CONTAINER=========== */
let todos = document.querySelector("#todos");
let hoje = document.querySelector("#hoje");
let hoje_container = document.querySelector(".hoje-container");
let todos_container = document.querySelector(".todos-container");


//efeito de troca de propriedades css com a classe selected
if (!hoje_container.classList.contains("hide")) {
    todos_container.classList.add("hide");
}
todos.addEventListener("click",()=>{
 todos.classList.add("selected");
 hoje.classList.remove("selected");

if (todos_container.classList.contains("hide")) {
    todos_container.classList.remove("hide");
    hoje_container.classList.add("hide");
}
    
});
//efeito de troca de propriedades css com a classe selected
hoje.addEventListener("click",()=>{
 hoje.classList.add("selected");
 todos.classList.remove("selected");

 if (hoje_container.classList.contains("hide")) {
    hoje_container.classList.remove("hide");
    todos_container.classList.add("hide");
}

});
/* FIM FEITO DE TROCA DE CONTAINER================================= */

/* ==============FEITO DE COR PARA ESTADO DA ENCOMENDA ============ */

let td = document.querySelectorAll(".estado-encomenda");

td.forEach(element =>{
    if(element.innerHTML == "entregue"){
        element.classList ="estado-encomenda2";
    }else if (element.innerHTML == "pendente") {
        element.classList ="estado-encomenda3";
    }else if (element.innerHTML == "cancelada") {
        element.classList ="estado-encomenda1";
    }
});


/* FIM FEITO DE COR PARA ESTADO DA ENCOMENDA===================== */