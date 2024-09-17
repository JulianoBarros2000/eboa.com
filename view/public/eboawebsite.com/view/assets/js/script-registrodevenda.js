/* ==========================FEITO DE TROCA DE CONTAINER=========== */
let todos = document.querySelector("#todos");
let hoje = document.querySelector("#hoje");
let hoje_container = document.querySelector(".hoje-container");
let todos_container = document.querySelector(".todos-container");


//efeito de troca de propriedades css com a classe selected
if (!hoje_container.classList.contains("hide")) {
  todos_container.classList.add("hide");
}
todos.addEventListener("click", () => {
  todos.classList.add("selected");
  hoje.classList.remove("selected");

  if (todos_container.classList.contains("hide")) {
    todos_container.classList.remove("hide");
    hoje_container.classList.add("hide");
  }
});
//efeito de troca de propriedades css com a classe selected
hoje.addEventListener("click", () => {
  hoje.classList.add("selected");
  todos.classList.remove("selected");

  if (hoje_container.classList.contains("hide")) {
    hoje_container.classList.remove("hide");
    todos_container.classList.add("hide");
  }
});
/* FIM FEITO DE TROCA DE CONTAINER================================= */
