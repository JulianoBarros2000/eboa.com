<?php
 if(!isset($_SESSION)){
  session_start();
  }
  
  if(!isset($_SESSION['user'])){
    header("Location: ../../../view/public/index.php");
   exit;
  }
 require_once "../../../vendor/autoload.php";

  use \App\controller\process\ValidarFormulario;
  use \App\model\entidades\Funcionario;

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

	$btn = trim($dados["btn_logar"]);
	$user = trim($dados["utilizador"]);
	$pass = trim($dados["senha_utilizador"]);

	$validacao = new ValidarFormulario();
	if($validacao -> validarLogin($user, $pass, $btn)){
           $funcionario = new Funcionario();
           if($funcionario -> logarSistema($user,$pass)){
            if($_SESSION['funcao'] == 'administrador' || $_SESSION['funcao'] == 'operador' || $_SESSION['funcao'] == 'gerente'){
              header('Location: ../../../view/public/');
            }else{
              header('Location: ../../../index.php?status=invalidaccess');
              exit;
            }
           }else{
            header('Location: ../../../index.php?status=invalid');
            exit;
           }
    }else {
        header('Location: ../../../index.php?status=empty');
        exit;
    }