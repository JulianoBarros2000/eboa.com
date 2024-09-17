<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?><!-- PRINCIPAL REGISTRO DE VENDA-->
        <main class="principal-registrodevenda principal-minhaconta">
            <div class="titulo">
                <span class="sumario">Registro de vendas</span>
                <div><span>Home > Registro de venda</span></div>
            </div>
            <?php
            require_once __DIR__ ."/../../vendor/autoload.php";

            use App\model\entidades\OperadorCaixa;

            $operador = new OperadorCaixa;
            $vendas = $operador->listarVendas("SELECT * FROM vendas v join funcionario f on v.operador=f.id_funcionario ORDER BY id_venda DESC LIMIT 0,20");
            $vendasAll = $operador->listarVendas("SELECT * FROM vendas v join funcionario f on v.operador=f.id_funcionario ORDER BY id_venda DESC LIMIT 0,50");
            ?>
            <div class="cab">
                <div>
                    <span class="selected" id="hoje">Hoje</span>
                    <span id="todos">Todos</span>
                </div>
                <a href="#"><i class="icon-download"></i><span>Fazer backup</span></a>
            </div>
            <div class="subcontainer">
                <div class="hoje-container">
                    <table>
                        <thead>
                            <tr>
                               
                                <th>Operador/a</th>
                                <th>Q. Produtos</th>
                                <th>Total</th>
                                <th>Forma de Pagamento</th>
                                <th>Troco</th>
                                <th>Data</th>
                                <th>Imprimir</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($vendas as $venda) :?>
                                <?php extract($venda);?>
                            <tr>
                                
                                <td><?=ucwords($nome)?></td>
                                <td><?=$quantidade?></td>
                                <td><?=number_format(floatval($total),2,",",".")?> kz</td>
                                <td><?=$modo_pagamento?></td>
                                
                                <td><?=number_format(floatval($troco),2,",",".")?> kz</td>
                                <td><?=date("d/m/Y H:i:s",strtotime($data))?></td>
                                <td><a href="../../src/controller//process//imprimirVenda.php?venda=<?=$id_venda?>"><i class="icon-download"></i></a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="todos-container">
                    <table>
                        <thead>
                            <tr>
                              
                                <th>Operador/a</th>
                                <th>QTD. Produtos</th>
                                <th>Total</th>
                                <th>Forma de Pagamento</th>
                                
                                <th>Troco</th>
                                <th>Data</th>

                                <th>Imprimir</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($vendasAll as $venda) :?>
                                <?php extract($venda);?>
                            <tr>
                                
                                <td><?=ucwords($nome)?></td>
                                <td><?=$quantidade?></td>
                                <td><?=number_format(floatval($total),2,",",".")?> kz</td>
                                <td><?=$modo_pagamento?></td>
                                
                                <td><?=number_format(floatval($troco),2,",",".")?> kz</td>
                                <td><?=date("d/m/Y H:i:s",strtotime($data))?></td>
                                <td><a href="../../src/controller//process//imprimirVenda.php?venda=<?=$id_venda?>"><i class="icon-download"></i></a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!--FIM PRINCIPAL REGISTRO DE VENDA=====================-->
        </div>

        <script src="../assets/js/script-registrodevenda.js"></script>
        </body>

        </html>