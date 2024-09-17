/* ==============================ESTADO - COR-ANIMIMAÇÃO================================== */
let tabelaEstado = document.querySelectorAll(".estado");
console.log(tabelaEstado)
tabelaEstado.forEach(estado => {
    if(estado.innerHTML == "Online" || estado.innerHTML == "online"){
        estado.classList.add("online");
    }else if (estado.innerHTML == "Offline" || estado.innerHTML == "offline") {
        estado.classList.add("offline");
    }
});

/* ==============================PESQUISA INTERATIVA TABELAS========================= */
    const search = document.querySelector(".input-search"),
          linhas_tabela = document.querySelectorAll("tbody  tr");


    search.addEventListener("input",pesquisarDados);  
    
    function pesquisarDados() {
        linhas_tabela.forEach((linha,i) =>{
            let dados_tabela = linha.textContent.toLowerCase(),
            dados_pesquisado=search.value.toLowerCase();

           linha.classList.toggle( 'esconder', dados_tabela.indexOf(dados_pesquisado) < 0);
           linha.style.setProperty("--delay",i/25 + 's');
        });

        document.querySelectorAll("tbody tr:not(.esconder)").forEach((linha_visivel,i) =>{
            linha_visivel.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
        })

     
    }    


/* FIM PESQUISA INTERATIVA TABELAS=========================== */ 
/* ===================SAUDACAO HOME========================== */

    const data = new Date();
    const texto_saudacao = document.querySelector(".texto-saudacao");

    const hora = parseInt(data.getHours());

 if (hora >= 0 && hora <= 11) {
     texto_saudacao.innerHTML = "Bom Dia Sr/a. ";
 }
 else if (hora >= 12 && hora <= 17) {
     texto_saudacao.innerHTML = "Boa Tarde Sr/a. ";
 }
 else if (hora >= 18 && hora <= 23) {
     texto_saudacao.innerHTML = "Boa Noite Sr/a. ";
 }

  