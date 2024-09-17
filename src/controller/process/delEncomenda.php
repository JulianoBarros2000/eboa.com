<?php
 if(!isset($_SESSION)){
  session_start();
  }
  
  if(!isset($_SESSION['user'])){
    header("Location: ../../../view/public/index.php");
   exit;
  }
require_once __DIR__."/../../../vendor/autoload.php";
use App\controller\Mensagem;
use App\Model\BancoDados;

if (isset($_GET['visitante']) && !empty($_GET['visitante'])) {
    $vist = filter_input(INPUT_GET, 'visitante', FILTER_VALIDATE_INT); 
    $mensagem = new Mensagem;
  $banco = new BancoDados("visitante"); 
  if($banco->delete("id_visitante=".$vist)){
   
    header("Location: ../../../view/public/home.php?opcao=6");
    exit;
  }


}
