<?php

use App\model\entidades\Funcionario;

require_once __DIR__."/../../../vendor/autoload.php";

if(!isset($_SESSION)){
    session_start();
}

 if(isset($_POST['btn_logar'])){
 $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

 if(in_array("",$dados)){
     $_SESSION['erro_login'] = "<i class='icon-warning'></i> Obrigatório preencher todos os campos";
    header("Location: ../../../view/public/");
    exit;
 }
 extract($dados);

 $funcionario = new Funcionario;
 if($funcionario -> logarSistema($utilizador,$senha)){
        header("Location: ../../../view/public/home.php");
        echo "entrou";
       
 }else{
    header("Location: ../../../view/public/");
    $_SESSION['erro_login'] = "<i class='icon-warning'></i> Nome ou Senha Incorrecta!";
 }
 }