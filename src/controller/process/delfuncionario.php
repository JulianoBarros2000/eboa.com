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


if (isset($_GET['shap'])) {
    $shap = filter_input(INPUT_GET, 'shap', FILTER_VALIDATE_INT); 
    
    $admin = new Admin;
    $funcionario = $admin -> listarFuncionario("SELECT*FROM `funcionario` f JOIN contactos c ON f.id_contacto = c.id_contactos JOIN morada m ON f.id_morada = m.id_morada WHERE id_funcionario = $shap");



        $foto_perfil = $funcionario[0]['foto_perfil'];

  
if($admin->eliminarFuncionario("DELETE f,c,m FROM `funcionario` f join contactos c on f.id_contacto=c.id_contactos join morada m on f.id_morada=m.id_morada WHERE id_funcionario =$shap")){
    $mensagem =new Mensagem;
    if($foto_perfil != "none.jpeg"){
    unlink("../../../view/assets/img/funcionarios/$foto_perfil");
    }
    $mensagem->showSuccess("shap","Funcionário eliminado com sucesso");
    header("Location: ../../../view/public/home.php?opcao=4");
}
}
