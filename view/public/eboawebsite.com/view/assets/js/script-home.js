
  let container = document.querySelector(".container"),
  perfil = document.querySelector(".perfil"),
  iconseta = perfil.querySelector("i"),
  box_perfil = document.querySelector(".box-perfil"),
  icon_menu = container.querySelector(".icon-menu5"),
  sidebar = container.querySelector(".sidebar"),
  iconMoon = container.querySelector(".cabecalho .icon-moon-o"),
  iconSun = container.querySelector(".icon-sun"),
  block_home = document.querySelector(".block");
 
/*   if(block_home.classList.contains("block")){
  block_home.classList.remove("block");
} */
/* block_home.addEventListener("click",()=>{
block_home.classList.add("show-block");
});
 */




/* ======================================================= */

/* ========================================================= */

/* ========================================================= */
/* Slide caixa de Perfil */
perfil.addEventListener("click", () => {
    box_perfil.classList.toggle("slide-perfil");
  iconseta.classList.toggle("rodar");
});
/* ========================================================== */

/* =====================slide sidebar======================== */
icon_menu.addEventListener("click", (e) => {
  container.classList.toggle("slide-menu");
});
/* =====================Modo escuro e claro======================== */
var estadomode;
iconMoon.addEventListener("click", () => {
  container.classList.add("escuro");
  //Armazena o valor modo-escuro localmente para não ser perdido o configuração de modo escuro
  localStorage.setItem("tema_pagina", JSON.stringify("modo-escuro"));
});

iconSun.addEventListener("click", () => {
  if (container.classList.contains("escuro")) {
    container.classList.remove("escuro");

    //Armazena o valor modo-claro localmente para não ser perdido o configuração de modo claro
    localStorage.setItem("tema_pagina", JSON.stringify("modo-claro"));
  }
});

//captura o valor da variável tema local de localStorage
let pegarmodo = JSON.parse(localStorage.getItem("tema_pagina"));
if (pegarmodo == "modo-claro") {
  if (container.classList.contains("escuro")) {
    container.classList.remove("escuro");
  }
} else if (pegarmodo == "modo-escuro") {
  container.classList.add("escuro");
}

/* ================================================================ */
