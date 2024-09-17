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
