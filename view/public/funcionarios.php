<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?><!-- PRINCIPAL LISTA FUNCIONÁRIO-->
        <main class="principal-funcionario">
            <div class="titulo">
                <span class="sumario">Todos Funcionários</span>
                
                <div><span>Home > Funcionários</span></div>
            </div>
            <?php if (isset($_SESSION['shap'])) {
                echo "<div class='sucesso'>{$_SESSION['shap']}</div>";
            }
            if (isset($_SESSION['edit_success'])) {
                echo "<div class='sucesso'>{$_SESSION['edit_success']}</div>";
             } 
    
            unset($_SESSION['shap']);
            unset($_SESSION['edit_success']);
            ?>
            <?php

            /* ====================LISTAR FUNCIONÁRIOS======================== */

            use App\model\entidades\Admin;

            $page_f = 1;
            if (isset($_GET['page_fun'])) {
                $page_f = filter_input(INPUT_GET, 'page_fun', FILTER_VALIDATE_INT);
            }
            if (!$page_f) {
                $page_f = 1;
            }
            $limite_f = 4;
            $inicio_f = ($page_f * $limite_f) - $limite_f;

            $admin = new Admin();
            $funcionarios = $admin->listarFuncionario("SELECT * FROM funcionario f join contactos c on f.id_contacto = c.id_contactos join morada m on f.id_morada = m.id_morada ORDER BY f.nome LIMIT $inicio_f,$limite_f");

            $numero_registo_f = $admin->listarFuncionario("SELECT COUNT(nome) count FROM funcionario")[0]['count'];

            $count_f = ceil($numero_registo_f / $limite_f);


            ?>
            <div class="tabela-funcionario">
                <div class="cab-tabela">
                    <span id="render">Funcionários</span>
                    <div><a href="../../src/controller/process/relatorioFuncionario.php" class="imprimir"><i class="icon-download"></i></a> <a href="home.php?opcao=4.1"> + Cadastrar</a>
                    </div>
                </div>
                <div class="search-input"><span>Pesquisa:</span><input class="input-search" type="search" placeholder="Pesquise o Funcionário"></div>
                <div class="tabela-view">
                    <table>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Telemóvel</th>
                                <th>Município</th>
                                <th>Cargo</th>
                                <th>Salário</th>
                                <th>Acções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($funcionarios as $funcionario) : ?>
                                <?php extract($funcionario); ?>
                                <tr>
                                    <td><img src="../assets/img/funcionarios/<?= $foto_perfil ?>" alt=""></td>
                                    <td style="text-align: left;"><?= ucwords($nome) ?></td>
                                    <td><?= $sexo ?></td>
                                    <td style="text-align: left;"><?= $email ?></td>
                                    <td><?= $telemovel ?></td>
                                    <td><?= ucwords($municipio) ?></td>
                                    <td style="text-align: left;"><?= $cargo ?></td>
                                    <td><?= number_format($salario, 2, ',', '.') ?> kz/mês</td>
                                    <td><a href="?opcao=4.3&nat=<?= $id_funcionario ?>"><i class="icon-eye"></i></a><a href="home.php?opcao=4.1&adbrd=teidra&eloua=<?=$id_funcionario ?>"><i class="icon-edit2"></i></a><a href="?opcao=4.2&shac=<?= $id_funcionario ?>&shacs=<?= $nome ?>"><i class="icon-trash-b"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($count_f > 1) : ?>
                        <div id="page_fun">
                            <h4 style="color: var(--cor-texto)">Página</h4>
                            <?php if ($page_f > 1) : ?>
                                <a href="?opcao=4&page_fun=1">Primeira</a>
                            <?php endif; ?>

                            <?php if ($page_f > 1) : ?>
                                <a href="?opcao=4&page_fun=<?= $page_f - 1 ?>"><i class="icon-backspace-outline"></i></a>
                            <?php endif; ?>

                            <div class="page-n"><?= $page_f ?></div>

                            <?php if ($page_f < $count_f) : ?>
                                <a href="?opcao=4&page_fun=<?= $page_f + 1 ?>"><i class="icon-next2"></i></a>
                            <?php endif; ?>
                            <?php if ($page_f < $count_f) : ?>
                                <a href="?opcao=4&page_fun=<?= $count_f ?>">Ultima</i></a>
                            <?php endif ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </main>
        <!-- FIM PRINCIPAL LISTA FUNCIONÁRIO=====================-->
        </div>
        <script src="../assets/js/script-funcionarios.js"></script>
        </body>