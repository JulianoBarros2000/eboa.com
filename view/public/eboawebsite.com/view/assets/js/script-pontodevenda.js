/* ==============================PESQUISA INTERATIVA TABELAS========================= */
const search = document.querySelector("#input-search"),
linhas_tabela = document.querySelectorAll(".prodt  .item-prodt");


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
})

}    

/* FIM PESQUISA INTERATIVA TABELAS====================================== */ 

    /* =============ANIMAÇÃO NO FINALIZAR COMPRA(PONTODEVENDA.HTML/.PHP)================= */
      let escolher = document.querySelector(".escolher");
      let input_forma_pagmento = document.querySelector(".pgmt-input");
      let opcaoNumeral = document.querySelector("#opcs-numeral");
      let opcaoMulticaixa = document.querySelector("#opcs-multicaixa");
      let opcaoPagamento = document.querySelector(".opcs-pgmt-item");

      escolher.addEventListener("click",()=>{
        opcaoPagamento.classList.toggle("show-opcs-pgmt-item");
      });

      opcaoNumeral.addEventListener("click",()=>{
      opcaoPagamento.classList.toggle("show-opcs-pgmt-item");

      escolher.innerHTML = "Numeral";
      input_forma_pagmento.value = "Numeral";

      });
        opcaoMulticaixa.addEventListener("click",()=>{
        opcaoPagamento.classList.toggle("show-opcs-pgmt-item");

        escolher.innerHTML = "Multicaixa";
        input_forma_pagmento.value = "Multicaixa";
      });

    /* FIM ANIMAÇÃO NO FINALIZAR COMPRA(PONTODEVENDA.HTML/.PHP)========================== */

    /* =====================CLICK PRODUTO PRODUTO(ANIMAÇÃO)============================== */
    let item_prodt = document.querySelector(".item-prodt");
    let item_t = document.querySelectorAll(".item-cesto li");
    

   let arrayPreco=[];
   let arrayCodigo=[];
  
    function adicionarItem(imagem,nome,preco,codigo) { 
      
      var total_protd = document.querySelector(".subtotal");
      //adionar o preco do produto no arrayPreco
      arrayPreco.push(preco);
      //adionar o codigo do produto no arrayCodigo
      arrayCodigo.push(codigo);

      let cesto_input = document.querySelector('#cesto-input');
      cesto_input.value = arrayCodigo;
     
      
      const cesto = document.querySelector(".item-cesto");
      const item =document.createElement("li");

      // Criação de filhos para o cesto
      const imagem_protd = document.createElement("img");
      imagem_protd.src = imagem;
      const nome_protd = document.createElement("span");
      nome_protd.innerText =nome ;
      const preco_protd = document.createElement("p");
      preco_protd.innerText = preco;
      const remove_item= document.createElement("i");
      remove_item.classList.add("icon-remove");

     
      
      item.appendChild(imagem_protd);
      item.appendChild(nome_protd);
      item.appendChild(preco_protd);
      item.appendChild(remove_item);
      cesto.appendChild(item);

      //remove o item que foi adicionado na lista
      remove_item.addEventListener("click",()=>{
        // passo 1: chama o seu container como pai
        let pai = remove_item.parentNode;
        //passo 2: pega tag p que contem o preço converte para tipo flutuante(float->number) 
        let preco_item = parseFloat(pai.querySelector("p").innerHTML);
        //passo 3: dentro do arrayPreco deve conter uma posição igual a preco e depois deve elimina-la
        arrayPreco.splice(arrayPreco.indexOf(preco));
        //passo 4: Actualizar o total e subtotal 
        total_protd.innerText = Math.floor(parseFloat(total_protd.innerText) - preco_item ) + ",00 akz";
        total.innerHTML= Math.floor(parseFloat(total_protd.innerText)) + ",00 akz";
        document.querySelector("#total-input").value = parseFloat(total.innerHTML);

        // remove o nome do produto na no arrayNome
        arrayCodigo.splice(arrayPreco.indexOf(codigo));
        cesto_input.value = arrayCodigo;
        
        
        //passo 5: remover o su container
       item_selected = remove_item.parentNode.remove();
      });
      

      var total_provisorio = 0;
      //Esta funcao faz soma de todos os precos dos produtos no cesto e retorna o total
      function somarPreco(array) {
        //percorrendo os precos dos produtos no cesto e somandos-as 
       array.forEach(element => {
        total_provisorio += element;  
        
      });

      return total_provisorio;
    }
 
    //apresentar o os valores somados subtotal, total
    total_protd.innerText = Math.floor(somarPreco(arrayPreco))+",00 akz";
    let total = document.querySelector(".total");
   
    let valor_a_pagar = document.querySelector("#valor-a-pagar");
     
    total.innerHTML = parseFloat(total_protd.innerHTML)+",00 akz";
   
    
    document.querySelector("#total-input").value = parseFloat(total.innerHTML);
    
    }
   
    /* FIM CLICK PRODUTO PRODUTO(ANIMAÇÃO)=============================================== */
    /* FIM SAUDACAO HOME========================================= */
