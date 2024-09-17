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
use App\model\entidades\MateriaPrima;
use App\model\entidades\Produto;

if (isset($_GET['pl']) && isset($_GET['plt'])) {
    $pl = filter_input(INPUT_GET, 'pl', FILTER_VALIDATE_INT); 
    $plt = filter_input(INPUT_GET, 'plt', FILTER_DEFAULT); 
    
    $produto = new Produto;
    $produto_pl = $produto -> listarProduto("SELECT * FROM $plt WHERE id_produto = $pl",$plt);



        $foto = $produto_pl[0]['foto'];

  
if($produto->eliminarProduto("id_produto =".$pl,$plt)){
    $mensagem =new Mensagem;
    unlink("../../../view/assets/img/produtos/$foto");
    $mensagem->showSuccess("geral_success","Produto eliminado com sucesso");
    header("Location: ../../../view/public/home.php?opcao=5");
}
}

if (isset($_GET['dim']) && isset($_GET['mt'])) {
    $dim = filter_input(INPUT_GET, 'dim', FILTER_VALIDATE_INT); 
    $mt = filter_input(INPUT_GET, 'mt', FILTER_DEFAULT); 
    
    $materia = new MateriaPrima;
    $materia_m = $materia -> listarMateria("SELECT * FROM $mt WHERE id_materiaprima = $dim",$mt);



        $foto = $materia_m[0]['foto'];

  
if($materia->eliminarMateria("id_materiaprima =".$dim,$mt)){
    $mensagem =new Mensagem;
    unlink("../../../view/assets/img/materiasprima/$foto");
    $mensagem->showSuccess("geral_success","Material eliminado com sucesso");
    header("Location: ../../../view/public/home.php?opcao=5");
}
}
