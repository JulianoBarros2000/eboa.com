<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?>

        
        <!-- PRINCIPAL REGISTRO DE VENDA--> 
        <main class="principal-relatorioencomenda principal-minhaconta asking">
            <?php

            if (isset($_GET['shacs'])) {
                $shacs = filter_input(INPUT_GET, 'shacs',FILTER_DEFAULT);
            }
            if (isset($_GET['shac'])) {
                $shac = filter_input(INPUT_GET, 'shac', FILTER_VALIDATE_INT);
            }
           if (isset($_GET['cln'])) {
                $cln= filter_input(INPUT_GET, 'cln',FILTER_DEFAULT);
            
             }
             if (isset($_GET['cl'])){
                $cl = filter_input(INPUT_GET, 'cl', FILTER_VALIDATE_INT);
                 }
           if (isset($_GET['pln'])) {
                $pln= filter_input(INPUT_GET, 'pln',FILTER_DEFAULT);
            
             }
             if (isset($_GET['pl'])){
                $pl = filter_input(INPUT_GET, 'pl', FILTER_VALIDATE_INT);
                 }
             if (isset($_GET['plt'])){
                $plt = filter_input(INPUT_GET, 'plt', FILTER_DEFAULT);
                 }
           if (isset($_GET['m'])) {
                $m= filter_input(INPUT_GET, 'm',FILTER_DEFAULT);
            
             }
             if (isset($_GET['dim'])){
                $dim = filter_input(INPUT_GET, 'dim', FILTER_VALIDATE_INT);
                 }
             if (isset($_GET['mt'])){
                $mt = filter_input(INPUT_GET, 'mt', FILTER_DEFAULT);
                 }
             if (isset($_GET['vist']) && !empty(($_GET['vist']))){
                $visitante = filter_input(INPUT_GET, 'vist', FILTER_VALIDATE_INT);
                 }
            
           
            ?>
            <!--  ===================Asking para funcionário================================-->
            <?php if(isset($shacs) && isset($shac)):?>
            <div class="titulo">Deseja mesmo eliminar o funcionário <?php if(isset($shacs)){
                echo ucwords($shacs);
            } ?>?</div>
            <div class="control"><a href="../../src/controller/process/delfuncionario.php?shap=<?php if(isset($shac)){
                echo $shac;
            } ?>">Eliminar</a><a href="?opcao=4">Cancelar</a></div>
            <?php endif;?>
            <!--  ===================Asking para produto================================-->
            <?php if(isset($pl) && isset($pln) && isset($plt)):?>
            <div class="titulo">Deseja mesmo eliminar o produto <?php if(isset($pln)){
                echo ucwords($pln);
            } ?>?</div>
            <div class="control"><a href="../../src/controller/process/delstock.php?pl=<?=$pl?>&plt=<?=$plt?>">Eliminar</a><a href="?opcao=5">Cancelar</a></div>
            <?php endif;?>

            <!--  ===================Asking para Material================================-->
            <?php if(isset($m) && isset($mt) && isset($dim)):?>
            <div class="titulo">Deseja mesmo eliminar o material <?php if(isset($m)){
                echo ucwords($m);
            } ?>?</div>
            <div class="control"><a href="../../src/controller/process/delstock.php?dim=<?=$dim?>&mt=<?=$mt?>">Eliminar</a><a href="?opcao=5">Cancelar</a></div>
            <?php endif;?>
            <!--  ===================Asking para Encomenda================================-->
            <?php if(isset($visitante)):?>
            <div class="titulo">Deseja mesmo eliminar Essa Encomenda?</div>
            <div class="control"><a href="../../src/controller/process/delEncomenda.php?visitante=<?=$visitante?>">Eliminar</a><a href="?opcao=6">Cancelar</a></div>
            <?php endif;?>

        </main>
            



