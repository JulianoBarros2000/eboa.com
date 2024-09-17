
let form = document.querySelector("#form");



const nome = document.querySelector("#nome");
const sobrenome = document.querySelector("#sobrenome");
const municipio = document.querySelector("#municipio");
const bairro = document.querySelector("#bairro");
const rua = document.querySelector("#rua");
const telefone = document.querySelector("#telefone");
const telefonealt = document.querySelector("#telefone-alt");
const email = document.querySelector("#email");
const masculino = document.querySelector("#masculino");
const feminino = document.querySelector("#feminino");
const data = document.querySelector("#data");


form.addEventListener("submit", (e) => {


  if(checkInputs() == false){
  e.preventDefault();
  }
 
  
});

function checkInputs() {

  const nomeValue = nome.value.trim();
  const sobrenomeValue = sobrenome.value.trim();
  const municipioValue = municipio.value.trim();
  const bairroValue = bairro.value.trim();
  const ruaValue = rua.value.trim();
  const telefoneValue = telefone.value.trim();
  const telefonealtValue = telefonealt.value.trim();
  const emailValue = email.value.trim();
  const masculinoValue = masculino.value.trim();
  const femininoValue = feminino.value.trim();
  const dataValue = data.value.trim();


  if (nomeValue === "") {
    erroValidacao(nome, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(nome);
  }
 
  if (sobrenomeValue === "") {
    erroValidacao(sobrenome, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(sobrenome);
  }
  if (municipioValue === "") {
    erroValidacao(municipio, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(municipio);
  }
  if (bairroValue === "") {
    erroValidacao(bairro, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(bairro);
  }
   if (ruaValue === "") {
    erroValidacao(rua, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(rua);
  }
  if (telefoneValue === "") {
    erroValidacao(telefone, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(telefone);
  }
  if (telefonealtValue === "") {
    erroValidacao(telefonealt, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(telefonealt);
  }
  if (emailValue === "") {
    erroValidacao(email, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  }else{
    sucessoValidacao(email);
  }

  if (dataValue === "") {
    erroValidacao(data, "<i class='icon-warning'></i> Campo obrigatório");
    return false;
  } else{
    sucessoValidacao(data);
  }
 

 return true;
  
 
}

function erroValidacao(input, mensagem) {

  const formControl = input.parentElement;
  const span = formControl.querySelector("span");

  span.innerHTML = mensagem;
 
  if(!formControl.classList.contains("error")){
    formControl.classList.add("error");
    formControl.classList.remove("sucess");
  
  }
 
}
  function sucessoValidacao(input){
      const formControl = input.parentElement;

      if(!formControl.classList.contains("sucess")){
        formControl.classList.remove("error");
        formControl.classList.add("sucess");
        
      }
     
}

