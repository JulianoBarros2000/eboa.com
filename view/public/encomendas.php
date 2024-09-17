<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?><!-- PRINCIPAL Encomenda-->
<main class="principal-encomenda principal-registrodevenda principal-minhaconta">
    <div class="titulo">
        <span class="sumario">Encomendas</span>
        <div><span>Home > Encomendas</span></div>
    </div>
    <?php

    use App\model\entidades\Admin;

    $admin = new Admin;
    $encomendas = $admin->listarEncomenda("SELECT * FROM visitante v join encomenda e on v.id_encomenda = e.id_encomenda LIMIT 0,10");
    $encomendasAll = $admin->listarEncomenda("SELECT * FROM visitante v join encomenda e on v.id_encomenda = e.id_encomenda LIMIT 0,50");
  
    ?>  
    <div class="cab">
        <div>
            <span class="selected" id="hoje">Recente</span>
            <span id="todos">Todos</span>
        </div>
        <div><input type="search" id="input-search" placeholder="Encontrar encomenda"></div>
        <a href="#" style="visibility: hidden;"><i class="icon-download"></i><span>Fazer backup</span></a>
    </div>
  
    <div class="subcontainer">

        <div class="hoje-container">
            <table>
                <thead>
                    <tr>

                        <th>Cliente</th>
                        
                        <th>Data para entrega</th>
                        <th>Total a pagar</th>
                        <th>Contactos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($encomendas as $encomenda):?>
                    <?php  extract($encomenda)?>
                    <tr>
                        
                        <td><?=strtoupper($nome)?></td>
                        
                        <td><?=date("d/m/Y H:i:s",strtotime($data_entrega))?></td>
                        <td><?= number_format(intval($total),2,",",".")?> kz</td>
                        <td><?=number_format($telemovel,0," "," ")?></td>
                       
                        <td class="center-show"><a href="../../src/controller/process/eboaEncomenda.php"><i class="icon-eye"></i></a><a href="?opcao=4.2&vist=<?=$id_visitante?>"><i class="icon-trash-a"></i></a></td>
                    </tr>
                    <?php endforeach;?>
        
                </tbody>
            </table>
        </div>
        <div class="todos-container">
            <table>
            <thead>
                    <tr>

                        <th>Cliente</th>
                        
                        <th>Data para entrega</th>
                        <th>Total a pagar</th>
                        <th>Contactos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($encomendasAll as $encomenda):?>
                    <?php  extract($encomenda)?>
                    <tr>
                        
                        <td><?=strtoupper($nome)?></td>
                        
                        <td><?=date("d/m/Y H:i:s",strtotime($data_entrega))?></td>
                        <td><?= number_format(intval($total),2,",",".")?> kz</td>
                        <td><?=number_format($telemovel,0," "," ")?></td>
                       
                        <td class="center-show"><a href="relatorioencomenda.php?vist=<?=$id_visitante?>"><i class="icon-eye"></i></a><a href="?opcao=4.2&vist=<?=$id_visitante?>"><i class="icon-trash-a"></i></a></td>
                    </tr>
                    <?php endforeach;?>
        
                </tbody>
            </table>

        </div>
    </div>
</main>
<!--FIM PRINCIPAL REGISTRO DE VENDA=====================-->
<script src="../assets/js/script-encomendas.js"></script>