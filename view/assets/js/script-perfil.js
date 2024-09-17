/* ================================================================ */
/* ========================EDITAR FORM-PERFIL====================== */
 let remove = document.querySelector(".remove-botao");
 let edit_botao = document.querySelector(".edit-botao");
 let edit_card = document.querySelector(".edicao-card");
 let edit_botao2 = document.querySelector(".maisdetalhes .header .icon-edit2");
 
 edit_botao.addEventListener("click",()=>{
     if (!edit_card.classList.contains("show-card")) {
         edit_card.classList.add("show-card");
     }
 });
 edit_botao2.addEventListener("click",()=>{
     if (!edit_card.classList.contains("show-card")) {
        edit_card.classList.add("show-card");
     }
 });
remove.addEventListener("click",()=>{
    if (edit_card.classList.contains("show-card")) {
        edit_card.classList.remove("show-card");  
    }
});
/* FIM EDITAR FORM-PERFIL========================================== */
