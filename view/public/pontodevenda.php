        <!-- PRINCIPAL PONTO DE VENDA-->
        <?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?>
        <?php
        if (isset($_POST['btn-add'])) {
            if (isset($_SESSION['cesto'])) {
                $session_array_id = array_column($_SESSION['cesto'], "id");


                if (!in_array($_POST['id'], $session_array_id)) {
                    $session_array = array(
                        'id' => $_POST['id'],
                        'nome' => $_POST['nome'],
                        'preco' => $_POST['preco'],
                        'foto' => $_POST['foto'],
                        'quantidade' => $_POST['quantidade']
                    );
                    $_SESSION['cesto'][] = $session_array;
                }
            } else {
                $session_array = array(
                    'id' => $_POST['id'],
                    'nome' => $_POST['nome'],
                    'preco' => $_POST['preco'],
                    'foto' => $_POST['foto'],
                    'quantidade' => $_POST['quantidade']
                );
                $_SESSION['cesto'][] = $session_array;
            }
        }
        if (isset($_GET['clear']) && $_GET['clear'] == "1") {
            unset($_SESSION['cesto']);
            echo "<meta rel<meta http-equiv='refresh' content='0; url=http://localhost/eboa.com/view/public/home.php?opcao=2&clear=0'>";
        }
        if (isset($_GET['remove'])) {
            foreach ($_SESSION['cesto'] as $keys => $item) {
                if ($item['id'] == $_GET['id']) {
                    unset($_SESSION['cesto'][$keys]);
                }
            }
            echo "<meta rel<meta http-equiv='refresh' content='0; url=http://localhost/eboa.com/view/public/home.php?opcao=2&clear=0'>";
        }
        ?>

        <main class="principal-pontodevenda">
       
            <div class="secao1">
            
                 
                <div class="pesq-prodt"><i class="icon-search"></i><input type="search" id="input-search" placeholder="Buscar produto!"></div>
                <div class="lista-prodt">
            
                    <span class="titulo-list-prodt"><i class="icon-shopping-basket"></i> Produtos</span>
                    <div class="prodt">
                        <?php

                        use App\model\entidades\Produto;

                        $produto = new Produto;

                        $registros = $produto->listarProduto("SELECT * FROM produto_local  WHERE estado = 'activo' ORDER BY nome", "produto_local");

                        ?>
                         <?php foreach ($registros as $produto) : ?>
                            <?php extract($produto); ?>
                            <div class="item-prodt">
                                <img src="../assets/img/Produtos/<?= $foto ?>">
                                <span style="text-align:center;"><?= ucwords($nome) ?></span>
                                <p><?= number_format($preco, 2, ",", ".") ?> kz</p>
                                <form action="" method="POST">
                                    <input type="number" name="quantidade" value="1" min="1" max="<?= $quantidade 
                ?>">
                                    <input type="hidden" name="preco" value="<?= $preco ?>">
                                    <input type="hidden" name="nome" value="<?= $nome ?>">
                                    <input type="hidden" name="foto" value="<?= $foto ?>">
                                    <input type="hidden" name="id" value="<?= $id_produto ?>">
                                    <input type="submit" value="Adicionar" name="btn-add">
                                </form>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
            <div>
                <form class=" secao2" action="../../src/controller/process/cadVenda.php" method="POST">

                    <table class="cesto-prodt">
                        <thead>
                            <tr class="header">
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--   <input type="text" id="cesto-input" style="visibility:hidden;" name="arrayCodigosProdutos"> -->
                            <?php $total = 0 ?>
                            <?php if (isset($_SESSION['cesto'])) {
                                if (!empty($_SESSION['cesto'])) {
                                    foreach ($_SESSION['cesto'] as  $produto) { 
                                        $total += intval($produto['quantidade']) * floatval($produto['preco']);
                                        echo "<tr>";
                                        echo "<td><img src='../assets/img/Produtos/{$produto['foto']}'></img></td>";
                                        $produto['preco'] = number_format($produto['preco'], 2, ",", ".");
                                        $produto['nome'] = ucwords($produto['nome']);
                                        echo "<td>{$produto['nome']}</td>";

                                        echo "<td><?=?>{$produto['preco']} kz</td>";
                                        echo "<td>{$produto['quantidade']}</td>";
                                        echo "<td><a href='?opcao=2&remove=1&id=" . $produto['id'] . "'><i class='icon-trash-o'></i></a></td>";
                                        echo "</tr>";
                                       
                                    }
                                    echo "<a href='?opcao=2&clear=1'>Limpar tudo</a>";
                                }
                            } ?>
                        </tbody>
                    </table>
                    <div class="fnl-compra">
                        <div class="compra-ttl">
                            
                            <h4>SubTotal : <span class="subtotal"><?= number_format($total, 2, ",", ".") ?> kz</span></h4>
                        </div>

                        <div class="form-pgmt">
                            <div>
                                <input type="number" id="valor-a-pagar" min="1" name="valorPago" placeholder="Valor a pagar" value="<?php 
                                    if (isset($_SESSION['dados'])) {
                                        echo $_SESSION['dados']['valorPago'];
                                        unset($_SESSION['dados']);
                                    }?>">

                            </div>
                            <h4>Forma de Pagamento</h4>
                            <div class="opcs-pgmt">
                                <div>
                                    <input type="text" class="pgmt-input" name="formaPagamento" value="<?php 
                                    if (isset($_SESSION['dados'])) {
                                        echo $_SESSION['dados']['formaPagamento'];
                                        unset($_SESSION['dados']);
                                    }?>">
                                    <span class="escolher"><?php 
                                    if (isset($_SESSION['dados'])) {
                                        echo $_SESSION['dados']['formaPagamento'];
                                        unset($_SESSION['dados']);
                                    }else{
                                        echo "Escolher";
                                    }?></span>
                                </div>

                                <div class="opcs-pgmt-item">
                                    <span id="opcs-numeral">Numeral</span>
                                    <span id="opcs-multicaixa">Multicaixa</span>
                                </div>

                            </div>

                            <div class="fnl-pgmt">
                                <span class="ttl-fnl">Total: <span class="total"><?= number_format($total, 2, ",", ".") ?> kz</span></span>
                                <input type="hidden" id="total-input" name="total" value="<?=$total?>" style="visibility:hidden;">
                                <button type="submit" name="fim-venda"><span>Vender</span> <i class="icon-shopping-cart"></i></button>
                                <?php if(isset($_SESSION['erro_venda'])){
                                        echo "<div class='erro' id='btn'>{$_SESSION['erro_venda']}</div>";
                                        unset($_SESSION['erro_venda']);
                                }?>
                                <?php if(isset($_SESSION['sucesso_venda'])){
                                        echo "<div class='sucesso' id='btn'>{$_SESSION['sucesso_venda']}</div>";
                                        unset($_SESSION['sucesso_venda']);
                                }?>
                                
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </main>
        <!--FIM PRINCIPAL PONTO DE VENDA=====================-->
        <script src="../assets/js/script-pontodevenda.js"></script>