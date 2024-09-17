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
use App\model\entidades\Admin;


if (isset($_GET['clp'])) {
    $clp = filter_input(INPUT_GET, 'clp', FILTER_VALIDATE_INT); 
    
    $admin = new Admin;
    $cliente = $admin -> listarCliente("SELECT * FROM cliente_sistema cs JOIN contactos c ON cs.id_contacto = c.id_contactos JOIN morada m ON cs.id_morada = m.id_morada WHERE id_cliente = $clp");



        $foto_perfil = $cliente[0]['foto_perfil'];

  
if($admin->eliminarCliente("DELETE cs,c,m FROM cliente_sistema cs join contactos c on cs.id_contacto=c.id_contactos join morada m on cs.id_morada=m.id_morada WHERE id_cliente =$clp")){
    $mensagem =new Mensagem;
    if($foto_perfil != "none.jpeg"){
    unlink("../../../view/assets/img/clientes/$foto_perfil");
    }
    $mensagem->showSuccess("clp","Cliente eliminado com sucesso");
    header("Location: ../../../view/public/home.php?opcao=12");
}
}
