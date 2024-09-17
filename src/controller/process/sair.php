<?php
 if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
use App\model\entidades\Funcionario;

require_once __DIR__."/../../../vendor/autoload.php";

if(!isset($_SESSION)){
    session_start();
}

if(isset($_GET['hash']) && !empty($_GET['hash'])){
$id = filter_input(INPUT_GET,'hash',FILTER_VALIDATE_INT);

    $funcionario = new Funcionario;

    if($funcionario -> terminarSessao($id)){
        header("Location: ../../../view/public/");
        exit;
    }
}