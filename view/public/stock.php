        <!-- PRINCIPAL STOCK-->
        <?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?>
        <main class="principal-stock ">


            <div class="titulo">
                <span class="sumario">Stock</span>
                <div><span>Home Stock</span></div>
            </div>
            <?php

            use App\model\entidades\MateriaPrima;
            use App\model\entidades\Produto;

            if (isset($_SESSION['geral_success'])) {
                echo "<div class='sucesso'>{$_SESSION['geral_success']}</div>";
            }
            unset($_SESSION['geral_success']);
            ?>
            <div class="charts">
                <div class="chart">
                    <h2>Matéria Prima em Stock</h2>
                    <canvas id="grfc-materia"></canvas>
                </div>
                <div class="chart">
                    <h2>Produto em Stock</h2>
                    <canvas id="grfc-produto"></canvas>
                </div>
            </div>
            <main class="stock">
                <?php
                /* ================Paginação produto local ======================= */
                $page_pl = 1;
                if (isset($_GET['page_pl'])) {
                    $page_pl = filter_input(INPUT_GET, 'page_pl', FILTER_VALIDATE_INT);
                }
                if (!$page_pl) {
                    $page_pl = 1;
                }
                $limite_pl = 4;
                $inicio_pl = ($page_pl * $limite_pl) - $limite_pl;

                $produto = new Produto;
                $registo_pl = $produto->listarProduto("SELECT * FROM produto_local ORDER BY id_produto DESC LIMIT $inicio_pl,$limite_pl", "produto_local");

                $numero_registo_pl = $produto->listarProduto("SELECT COUNT(nome) count FROM produto_local", 'produto_local')[0]['count'];

                $count_pl = ceil($numero_registo_pl / $limite_pl);
                /* ================Fim Paginação produto local ======================= */

                /* ================Paginação produto Web ======================= */
                $page_pw = 1;
                if (isset($_GET['page_pw'])) {
                    $page_pw = filter_input(INPUT_GET, 'page_pw', FILTER_VALIDATE_INT);
                }
                if (!$page_pw) {
                    $page_pw = 1;
                }
                $limite_pw = 4;
                $inicio_pw = ($page_pw * $limite_pw) - $limite_pw;

                $produto = new Produto;
                $registo_pw = $produto->listarProduto("SELECT * FROM produto_web ORDER BY id_produto DESC LIMIT $inicio_pw,$limite_pw", "produto_web");

                $numero_registo_pw = $produto->listarProduto("SELECT COUNT(nome) count FROM produto_web", 'produto_web')[0]['count'];

                $count_pw = ceil($numero_registo_pw / $limite_pw);
                /* ================Fim Paginação produto Web ======================= */

                /* ================Paginação Matéria Prima ======================= */
                $page_m = 1;
                if (isset($_GET['page_m'])) {
                    $page_m = filter_input(INPUT_GET, 'page_m', FILTER_VALIDATE_INT);
                }
                if (!$page_m) {
                    $page_m = 1;
                }
                $limite_m = 4;
                $inicio_m = ($page_m * $limite_m) - $limite_m;

                $materia = new MateriaPrima;
                $registo_m = $materia->listarMateria("SELECT * FROM materiaprima ORDER BY id_materiaprima DESC LIMIT $inicio_m,$limite_m", "materiaprima");

                $numero_registo_m = $materia->listarMateria("SELECT COUNT(nome) count FROM materiaprima", 'materiaprima')[0]['count'];

                $count_m = ceil($numero_registo_m / $limite_m);
                /* ================Fim Paginação Matéria Prima ======================= */

                ?>
                <span class="pl" style="visibility: hidden;"><?= $count_pl ?></span>
                <div class="stock">
                    <div class="tabelas">
                        <div class="tabela1 tb">
                            <div><span>Produtos WebSite</span> <a href="?opcao=5.1&art=art1"><button> + Cadastrar</button></a></div>
                            <table id="pw">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Nome</th>

                                        <th>Quantidade</th>
                                        <th>Validade(Data)</th>
                                        <th>Estado</th>
                                        <th>Acções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_pw = 0; ?>
                                    <?php foreach ($registo_pw as $registo) : ?>
                                        <?php extract($registo); ?>
                                        <tr>
                                            <td><img src="../assets/img/Produtos/<?= $foto ?>" alt=""></td>
                                            <td><?= ucwords($nome) ?></td>
                                            <td><?= $quantidade ?></td>
                                            <td><?= $data_validade ?></td>
                                            <?php $total_pw += $preco; ?>
                                            <td><a href="../../src/controller/process/editEstado.php?status=<?=$estado?>&ddsf=<?=$id_produto?>&tbl=produto_web#pw" <?php if (strtolower($estado) == "activo") {
                                                                echo "class='activo-q'";
                                                            } else if (mb_strtolower($estado) == "inactivo") {
                                                                echo "class='desactivo-q'";
                                                            } ?>><?php if (strtolower($estado) == "activo") {
                                            echo "Desativar";
                                        } else if (mb_strtolower($estado) == "inactivo") {
                                            echo "Activar";
                                        } ?></a></td>
                                            <td><a href="?opcao=4.3&pwv=<?= $id_produto ?>&view=produto_web"><i class="icon-eye"></i></a><a href="?opcao=4.2&pl=<?= $id_produto ?>&pln=<?= $nome ?>&plt=produto_web" style="color:red !important"><i class="icon-trash-b"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tabela1 tb">
                            <div><span>Produtos em Stock Local</span> <a href="?opcao=5.1&art=art1"><button> + Cadastrar</button></a></div>
                            <table id="pl">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Nome</th>

                                        <th>Quantidade</th>
                                        <th>Validade(Data)</th>
                                        <th>Estado</th>
                                        <th>Acções</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $total_pl = 0; ?>
                                    <?php foreach ($registo_pl as $registo) : ?>
                                        <?php extract($registo); ?>
                                        <tr>
                                            <td><img src="../assets/img/Produtos/<?= $foto ?>" alt=""></td>
                                            <td><?= ucwords($nome) ?></td>
                                            <td><?= $quantidade ?></td>
                                            <td><?= $data_validade ?></td>
                                            <?php $total_pl += $preco; ?>
                                            <td><a href="../../src/controller/process/editEstado.php?aosxa=jshduweyusdwuwfuiwiuu1234722fs&status=<?= $estado?>&dkwg=rrfgegygey1gy2452545&tbl=produto_local&fddfbbmm=252656213sghwwwwieeeeeestee&ddsf=<?=$id_produto?>&sjh=1#pl" <?php if (strtolower($estado) == "activo") {
                                                                echo "class='activo-q'";
                                                            } else if (mb_strtolower($estado) == "inactivo") {
                                                                echo "class='desactivo-q'";
                                                            } ?>><?php if (strtolower($estado) == "activo") {
                                            echo "Desativar";
                                        } else if (mb_strtolower($estado) == "inactivo") {
                                            echo "Activar";
                                        } ?></a></td>
                                            <td><a href="?opcao=4.3&plv=<?= $id_produto ?>&viewpl=produto_local"><i class="icon-eye"></i></a><a href="?opcao=4.2&pl=<?= $id_produto ?>&pln=<?= $nome ?>&plt=produto_local" style="color:red !important"><i class="icon-trash-b"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php if ($count_pl > 1) : ?>
                                    <div class="page_pl" id="page_fun">
                                        <h4 style="color: var(--cor-texto)">Página</h4>
                                        <?php if ($page_pl > 1) : ?>
                                            <a href="?opcao=5&page_pl=1#pl">Primeira</a>
                                        <?php endif; ?>

                                        <?php if ($page_pl > 1) : ?>
                                            <a href="?opcao=5&page_pl=<?= $page_pl - 1 ?>#pl"><i class="icon-backspace-outline"></i></a>
                                        <?php endif; ?>

                                        <div class="page-n"><?= $page_pl ?></div>

                                        <?php if ($page_pl < $count_pl) : ?>
                                            <a href="?opcao=5&page_pl=<?= $page_pl + 1 ?>#pl"><i class="icon-next2"></i></a>
                                        <?php endif; ?>
                                        <?php if ($page_pl < $count_pl) : ?>
                                            <a href="?opcao=5&page_pl=<?= $count_pl ?>#pl">Ultima</i></a>
                                        <?php endif ?>
                                    </div>
                                <?php endif; ?>
                            </table>
                        </div>
                        <div class="tabela2 tb">
                            <div><span>Matérias Prima</span> <a href="?opcao=5.1&art=art2"><button> + Cadastrar</button></a></div>

                            <table id="m">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Nome</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Validade(Data)</th>
                                        <th>Acções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_m = 0; ?>

                                    <?php foreach ($registo_m as $registo) : ?>
                                        <?php extract($registo); ?>
                                        <tr>
                                            <td><img src="../assets/img/materiasprima/<?= $foto ?>" alt=""></td>
                                            <td><?= ucwords($nome) ?></td>
                                            <td><?= $quantidade ?></td>
                                            <td><?= $preco ?></td>
                                            <?php $total_m += $preco ?>
                                            <td><?= $data_validade ?></td>
                                            <td><a href="?opcao=4.2&dim=<?= $id_materiaprima ?>&m=<?= $nome ?>&mt=materiaprima" style="color:red !important"><i class="icon-trash-b"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php if ($count_m > 1) : ?>
                                    <div class="page_pl" id="page_fun">
                                        <h4 style="color: var(--cor-texto)">Página</h4>
                                        <?php if ($page_m > 1) : ?>
                                            <a href="?opcao=5&page_m=1#m">Primeira</a>
                                        <?php endif; ?>

                                        <?php if ($page_m > 1) : ?>
                                            <a href="?opcao=5&page_m=<?= $page_pl - 1 ?>#m"><i class="icon-backspace-outline"></i></a>
                                        <?php endif; ?>

                                        <div class="page-n"><?= $page_m ?></div>

                                        <?php if ($page_m < $count_m) : ?>
                                            <a href="?opcao=5&page_m=<?= $page_pl + 1 ?>#m"><i class="icon-next2"></i></a>
                                        <?php endif; ?>
                                        <?php if ($page_m < $count_m) : ?>
                                            <a href="?opcao=5&page_m=<?= $count_m ?>#m">Ultima</i></a>
                                        <?php endif ?>
                                    </div>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php
            ?>
            <span class="quant-materia" style="visibility: hidden !important;"><?= ($count_m * 1000) / 100 ?></span>
            <span class="quant-produto-web" style="visibility: hidden !important;"><?= ($count_pw * 1000) / 100 ?></span>
            <span class="quant-produto-local" style="visibility: hidden !important;"><?= ($count_pl * 1000) / 100 ?></span>

            <span class="quant-materia-total" style="visibility: hidden !important;"><?= ($total_m * 100) / $total_m ?></span>
            <span class="quant-produto-web-total" style="visibility: hidden !important;"><?= ($total_pw) / 100 ?></span>
            <span class="quant-produto-local-total" style="visibility: hidden !important;"><?= ($total_pl) / 100 ?></span>

            <!-- FIM PRINCIPAL STOCK=====================-->


            <script src="../assets/js/chart/Chart.min.js"></script>
            <script src="../assets/js/script-stock.js"></script>