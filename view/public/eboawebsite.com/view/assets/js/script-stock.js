let block = document.querySelector(".block");
if (true) {
  block.classList.remove("show-block");
}
const search = document.querySelector(".input-search"),
  linhas_tabela = document.querySelectorAll("tbody  tr");


search.addEventListener("input", pesquisarDados);

function pesquisarDados() {
  linhas_tabela.forEach((linha, i) => {
    let dados_tabela = linha.textContent.toLowerCase(),
      dados_pesquisado = search.value.toLowerCase();

    linha.classList.toggle('esconder', dados_tabela.indexOf(dados_pesquisado) < 0);
    linha.style.setProperty("--delay", i / 25 + 's');
  });

  document.querySelectorAll("tbody tr:not(.esconder)").forEach((linha_visivel, i) => {
    linha_visivel.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
  })


}


/* FIM PESQUISA INTERATIVA TABELAS=========================== */

/* =========================FORMULÁRIO DE CADASTRO DE PRODUTOS============================ */
let btn_cad1 = document.querySelector(".btn-cad1");
let btn_cad2 = document.querySelector(".btn-cad2");
let select = document.querySelector("#c-select");
let c_first = document.querySelector("#c-first");
let select_item = document.querySelector("#c-select-itens");
let categoria = document.querySelector("#categoria");
let select_itens = document.querySelectorAll("#c-select-itens span");
let btn_remove = document.querySelector(".icon-remove");

let form = document.querySelector(".form-cad-stock");
let form_ = document.querySelector(".form-cad-stock form");
let btn = document.querySelector(".form-cad-stock form button");
let body = document.querySelector("body");


/*   form_.addEventListener("submit",(event)=>{
    event.preventDefault();
  }); */



/*  block.addEventListener("click",()=>{
   block.classList.add("show-block");
   form.classList.add("show-block");
   }); */

c_first.addEventListener("click", () => {
  select_item.classList.toggle("show-selector");
  c_first.classList.toggle("rot");
  select_itens.forEach(element => {
    element.addEventListener("click", () => {
      categoria.value = element.innerHTML;

      c_first.innerHTML = element.innerHTML;
      select_item.classList.remove("show-selector");
    });
  });
});
btn_cad1.addEventListener("click", () => {
  if (!form.classList.contains("show-block")) {
    form.classList.add("show-block");
    btn_cad1.classList.add("hide-btn");
  }
  body.classList.add("scroll");
  block.classList.add("show-block");
});

btn_cad2.addEventListener("click", () => {
  if (!form.classList.contains("show-block")) {
    form.classList.add("show-block");
    btn_cad2.classList.add("hide-btn");
  }
  block.classList.add("show-block");

  body.classList.add("scroll");
});

btn_remove.addEventListener("click", () => {
  form.classList.remove("show-block");
  btn_cad1.classList.remove("hide-btn");
  btn_cad2.classList.remove("hide-btn");
  block.classList.remove("show-block");
  body.classList.remove("scroll");
});

/* FIM FORMULÁRIO DE CADASTRO DE PRODUTOS================================================= */
/* =========================CHARTS=======================================================  */


let ctx1 = document.getElementById('grfc-materia');
new Chart(ctx1, {
  type: 'line',
  data: {
    labels: ['Perecíveis', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
    datasets: [{
      label: ' (% - Percentagem) - Quantidade em stock ',
      data: [70, 18, 34, 60, 10],
      borderWidth: 1,
      color: "#ee9f91",
      backgroundColor: ['#9bf5a2', '#7be8fc', '#ee9f91', '#fce97b', '#0984f7']
    }]
  },
  options: {
    responsive: true,
    animation: {
      duration: 10000,
      easing: 'easeOutExpo'
    }

  }
});

let ctx2 = document.getElementById('grfc-produto');
new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Fev', 'Mar', 'Abr'],
    datasets: [{
      label: ' (% - Percentagem) - produtos vendidos ',
      data: [70, 18, 34, 60],
      borderWidth: 1,
      backgroundColor: ['#9bf5a2', '#7be8fc', '#ee9f91', '#fce97b']
    }]
  },
  options: {
    responsive: true,
    animation: {
      duration: 10000,
      easing: 'easeOutExpo'
    }

  }
});


/* FIM CHARTS=======================================================  */