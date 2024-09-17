<?php
 if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
require_once __DIR__ . "/../../../vendor/autoload.php";
session_start();
use App\Model\BancoDados;

if (isset($_GET['status']) && isset($_GET['ddsf']) && isset($_GET['tbl'])) {
    $estado = filter_input(INPUT_GET, 'status', FILTER_DEFAULT);
   
    $id = filter_input(INPUT_GET, 'ddsf', FILTER_VALIDATE_INT);
   
    $tabela = filter_input(INPUT_GET, 'tbl', FILTER_DEFAULT);
  
    $banco = new BancoDados($tabela);
    if ($tabela == "produto_web") {
        if (strtolower($estado) == "activo") {
            /* editar inactivo */
            $banco->update("id_produto=".$id, ['estado' => 'inactivo']);
            
            header("Location: ../../../view/public/home.php?opcao=5");
            exit;
        } else if ($tabela = "inactivo") {
            /* editar activo */
            $banco->update("id_produto=".$id, ['estado' => 'activo']);
            header("Location: ../../../view/public/home.php?opcao=5");
            exit;
        }
    } else if ($tabela == "produto_local") {
        if (strtolower($estado) == "activo") {
            /* editar inactivo */
            $banco->update("id_produto=".$id, ['estado' => 'inactivo']);
            header("Location: ../../../view/public/home.php?opcao=5");
            
            exit;
        } else if (strtolower($estado) == "inactivo") {
            /* editar activo */
            $banco->update("id_produto=".$id, ['estado' => 'activo']);
            header("Location: ../../../view/public/home.php?opcao=5");
       

            exit;
        }
    }
} else {
    header("Location: ../../../view/public/home.php?opcao=5");

    exit;
}
