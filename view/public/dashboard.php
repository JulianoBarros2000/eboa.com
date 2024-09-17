<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?><main class="principal">
    <div class="saudacao">
        <h2><span class="texto-saudacao">Olá </span>
            <span> <?php

                    /*       use App\model\entidades\Admin;
                    use App\model\entidades\MateriaPrima;
                    use App\model\entidades\Produto;
*/
                    if (isset($_SESSION['user'])) {
                        echo ucwords($_SESSION['user']);
                    } else {
                        header("Location: ../../");
                    }  ?>
            </span>
        </h2>
        <small>Dashboard</small>

    </div>
    <div class="cards">
        <div class="card">
            <div class="card-content">
                <div class="numero">0</div>
                <div class="card-nome">Funcionários</div>
            </div>
            <div class="caixa-icon">
                <i class="icon-android-people"></i>
            </div>
        </div>


        <div class="card">
            <div class="card-content">
                <div class="numero"><?= 0 ?></div>
                <div class="card-nome">Produtos</div>
            </div>
            <div class="caixa-icon">
                <i class="icon-product-hunt"></i>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="numero">12</div>
                <div class="card-nome">Novos Pedidos</div>
            </div>
            <div class="caixa-icon">
                <i class="icon-file-add"></i>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="numero"><?= 0 ?></div>
                <div class="card-nome">Matéria Prima</div>
            </div>
            <div class="caixa-icon">
                <i class="icon-globe"></i>
            </div>
        </div>
    </div>
    <div class="charts">
        <div class="chart">
            <h2>Balanço Anual(2022) - Produtos Vendidos</h2>
            <canvas id="balanco1"></canvas>
        </div>
        <div class="chart" id="doughnut-chart">
            <h2>Balanço Anual(Actual)</h2>
            <canvas id="balanco2"></canvas>
        </div>
    </div>
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

    <div class="tabela-section">
        <div class="header">
            <span>Funcionários</span>
            <div class="search-tabela"><input class="input-search" type="search" placeholder="Pesquisar funcionário">
            </div>
        </div>


        <table>

            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($funcionarios as $funcionario) : ?>
                                <?php extract($funcionario); ?>
                                <tr>
                                    <td><img src="../assets/img/funcionarios/<?= $foto_perfil ?>" alt=""></td>
                                    <td style="text-align: left;"><?= ucwords($nome) ?></td>
                                    <td style="text-align: left;"><?= $email ?></td>
                                    <td ><?= $cargo ?></td>
                                    <td> <span  class="estado"><?php if($estado_log == "1" ){
                                            echo "Online";
                                    }else{
                                        echo "Offline";
                                    }?></span></td>  
                                </tr>
                            <?php endforeach; ?>

            </tbody>
        </table>

    </div>


</main>
<script src="../assets/js/script-dashboard.js"></script>
<script src="../assets/js/chart/Chart.min.js"></script>
<script src="../assets/js/charts-config.js"></script>