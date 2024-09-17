
let first = document.querySelector(".first");
let select = document.querySelector(".select .select-item");
let cargo = document.querySelector("#cargo");
let select_itens = document.querySelectorAll(".select-item span");

first.addEventListener("click",()=>{
  select.classList.toggle("hiden");

  select_itens.forEach(element => {
    element.addEventListener("click",()=>{
        cargo.value = element.innerHTML;
        first.innerHTML = element.innerHTML;

        select.classList.remove("hiden");
    });
    
  });
});

