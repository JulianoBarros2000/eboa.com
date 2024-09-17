<?php 
if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}
if($_SESSION['funcao'] == "Outro"){
    header("Location: index.php");
    session_unset();
    session_destroy();
 exit;
}


require_once __DIR__."/../../vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="../assets/icon/icomoon.css">
    <!-- ligação com a folha de estilo principal -->
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="shortcut icon" href="../assets/img/favicon/eboa-favicon.ico" type="image/x-icon">
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eboa - painel admininstrativo</title>
</head>

<body>
    
   <div class="block"></div>
   <div class="processo-home">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- Este é o conteiner principal do dashboard -->
    <div class="container">
        <div class="logo">
            <img src="../assets/img/eboa.png" alt="">
        </div>
        <!-- Cabeçalho -->
        <header class="cabecalho">

            <div id="icon-menu"><i class="icon-menu5"></i></div>

            <div class="search" style="visibility: hidden !important;">

                <input type="search" placeholder="Pesquisa aqui...">
                <i class="icon-search7"></i>
            </div>
            <div class="modo">
                <i class="icon-sun"></i>
                <i class="icon-moon-o"></i>
            </div>
            <div class="chat">


                <div class="perfil">
                    <img src="../assets/img/funcionarios/<?=$_SESSION['foto']?>">
                    <i class="icon-arrow-down-b"></i>

                    <span class="box-perfil">
                        <header>
                            <img src= "../assets/img/funcionarios/<?=$_SESSION['foto']?>">
                            <span class="dados">
                                <span class="nome"><?=mb_strtoupper($_SESSION['user'])?></span>
                                <small><?=mb_strtoupper($_SESSION['funcao'])?></small>
                            </span>
                        </header>

                        <main>
                            <a href="home.php?opcao=9">
                                <i class="icon-lock3"></i>
                                <span>Perfil</span>
                            </a>
                        </main>
                        <a href="<?php if (isset($_SESSION['id'])) {
                                        echo "../../src/controller/process/sair.php?hash=".$_SESSION['id'];
                                    } ?>" class="sair">
                            <i class="icon-exit"></i>
                            <span>Terminar Sessão</span>
                        </a>
                    </span>
                </div>

            </div>
        </header>
<div class="try"></div>
        <!-- =================================================== -->
        <aside class="sidebar">
            <!-- MENU -->
            <ul class="menu">
                <li class=" item"><a href="home.php?opcao=10"><i class="icon-dashboard2"></i><span>Dashboard</span></a>
                </li>
                </li>
                <li class=" item"><a href="home.php?opcao=2"><i class="icon-ios-loop-strong"></i><span>Abrir
                            Venda</span></a></li>
                <li class=" item"><a href="home.php?opcao=3"><i class="icon-ios-loop-strong"></i><span>Registro de
                            Venda</span></a></li>
                <li class=" item"><a href="home.php?opcao=4" style="
                        <?php
                        if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                            echo "display:none;";
                        }
                        ?>
                        "> <i class=" icon-android-people"></i><span>Funcionários</span></a></li>
                <li class=" item"><a href="home.php?opcao=12" style="
                        <?php
                        if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                            echo "display:none;";
                        }
                        ?>
                        "> <i class=" icon-android-people"></i><span>Clientes</span></a></li>
                <li class=" item"><a href="home.php?opcao=5" style="
                    <?php
                    if (isset($_SESSION['funcao']) && ($_SESSION['funcao'] == 'operador' || $_SESSION['funcao'] == 'gerente')) {
                        echo "display:none;";
                    }
                    ?>
                "><i class="icon-ios-list-outline"></i><span>Stock</span></a>
                </li>
                <li class=" item"><a href="home.php?opcao=6" style="
                    <?php
                    if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                        echo "display:none;";
                    }
                    ?>
                            "><i class="icon-ios-printer-outline"></i><span>Encomendas</span></a></li>
                <li class=" item"><a href="../../" target="_blank"><i
                            class="icon-globe"></i><span>WebSite eboa</span></a></li>
                
                <li class=" item"><a href="home.php?opcao=9"><i class="icon-lock3"></i><span>Perfil</span></a></li>
                <li class=" item"><a href="<?php if (isset($_SESSION['id'])) {
                                        echo "../../src/controller/process/sair.php?hash=".$_SESSION['id'];
                                    } ?>"><i class="icon-exit"></i><span>Terminar Sessão</span></a></li>
            </ul>
            <!-- FIM MENU================================================== -->

        </aside>
        <!-- PRINCIPAL-->
        <?php
        /* (Acesso)Carregamento de arquivos dentro da home.php */
        $opcao = @$_GET["opcao"];
        switch ($opcao) {
            case '2':
                include_once 'pontodevenda.php';
                break;
            case '3':
                include_once 'registrodevenda.php';
                break;

            case '4':

                if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                    include_once 'dashboard.php';
                } else {
                    include_once 'funcionarios.php';
                }
                break;
            case '4.1':

                if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                    include_once 'dashboard.php';
                } else {
                    include_once 'cadastrarfuncionario.php';
                }
                break;
            case '4.2':

                if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                    include_once 'dashboard.php';
                } else {
                    include_once 'asking.php';
                }
                break;
            case '4.3':

                if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                    include_once 'dashboard.php';
                } else {
                    include_once 'vermais.php';
                }
                break;
            case '5':
                if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                    include_once 'dashboard.php';
                } else {
                    include_once 'stock.php';
                }
                break;
            case '5.1':
                if (isset($_SESSION['funcao']) && $_SESSION['funcao'] == 'operador') {
                    include_once 'dashboard.php';
                } else {
                    include_once 'cadastrarstock.php';
                }
                break;
            case '6':
                if (isset($_SESSION['funcao']) && ($_SESSION['funcao'] == 'operador')) {
                    include_once 'dashboard.php';
                } else {
                    include_once 'encomendas.php';
                }
                break;
          
            case '9':
                include_once 'perfil.php';
                break;
            case '10':
                include_once 'dashboard.php';
                break;
            case '12':
                include_once 'clientes.php';
                break;
            case '12.1':
                include_once 'cadastrarcliente.php';
                break;

            default:
                include_once 'dashboard.php';
                break;
        }
        ?>
        <!-- FIM PRINCIPAL==================================================-->
    </div>
    <script src=" ../assets/js/script-home.js"></script>
</body>

</html>
