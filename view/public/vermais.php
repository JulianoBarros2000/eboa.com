<!-- PRINCIPAL-->
<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?>
<?php

use App\model\entidades\Admin;
use App\model\entidades\Produto;

?>
<?php if (isset($_GET['nat']) && !empty($_GET['nat'])) : ?>
    <main class="principal-minhaconta">
        <div class="titulo">
            <span class="sumario">Sobre Funcionário</span>
            <div><span>Home >Sobre Funcionário</span></div>
        </div>
        <div class="perfil-card">
            <div>
                <?php
                $id = filter_var($_GET['nat'], FILTER_VALIDATE_INT);

                $admin = new Admin;

                $funcionario = $admin->listarFuncionario("SELECT * FROM funcionario f JOIN contactos c ON f.id_contacto = c.id_contactos JOIN morada m ON f.id_morada = m.id_morada WHERE id_funcionario = $id");

                ?>
                <?php if (!empty($funcionario)) : ?>
                    <div class="img">
                        <img src="../assets/img/funcionarios/<?= $funcionario[0]['foto_perfil'] ?>">
                    </div>
                    <div class="perfil-info">
                        <span></span>
                        <span> Nome: <?= ucwords($funcionario[0]['nome']) ?></span>
                        <span> <i class="icon-phone"></i> +244 <?= $funcionario[0]['telemovel'] ?></span>
                        <span> <i class="icon-location"></i>Municipio: <?= $funcionario[0]['municipio'] ?>, Bairro <?= $funcionario[0]['bairro'] ?>, <?= $funcionario[0]['rua_casa'] ?>, Nª da casa <?= $funcionario[0]['numero_casa'] ?></span>
                    </div>
            </div>
            <div>
                <a href="home.php?opcao=4.1&adbrd=teidra&eloua=<?= $id ?>" class="edit-botao">Editar</a>
            </div>
        </div>
        <div class="dados-f">
            <div class="maisdetalhes">
                <div class="header">
                    <span>Dados Pessoais</span>
                </div>
                <div class="corpo">
                    <div class="dados">
                        <span>Nome: <span><?= ucwords($funcionario[0]['nome']) ?></span></span>
                        <span>Sexo: <span><?= ucwords($funcionario[0]['sexo']) ?></span></span>
                        <span>Nº BI: <span><?= $funcionario[0]['bi'] ?></span></span>
                        <span>Aniversário: <span><?= $funcionario[0]['data_nasc'] ?></span></span>
                        <span>Email: <span><?= $funcionario[0]['email'] ?></span></span>
                        <span>Telemóvel: <span>+244 <?= $funcionario[0]['telemovel'] ?></span></span>
                        <span>Telefone Alternativo: <span>+244 <?= $funcionario[0]['telefone_alt'] ?></span></span>
                        <span>Endereço: <span><i class="icon-location"></i> Municipio: <?= $funcionario[0]['municipio'] ?>,Bairro <?= $funcionario[0]['bairro'] ?>,Rua <?= $funcionario[0]['rua_casa'] ?>,Nª da casa<?= $funcionario[0]['numero_casa'] ?></span>
                    </div>

                </div>
            </div>
            <div class="maisdetalhes">
                <div class="header">
                    <span>Dados do Funcionário</span>
                </div>
                <div class="corpo">
                    <div class="dados">
                        <span>Cargo: <span><?= ucwords($funcionario[0]['cargo']) ?></span></span>
                        <span>Salário: <span><?= number_format($funcionario[0]['salario'], 2, ',', '.') ?> kz/mês</span></span>
                        <span>Estado: <span><?php if ($funcionario[0]['estado_log'] == '1') {
                                                echo "<span style='color:green;'>Online</span>";
                                            } else if ($funcionario[0]['estado_log'] == '0') {
                                                echo "<span style='color:red;'>Offline</span>";
                                            } ?></span></span>
                    </div> <?php endif; ?>
                <?php if (empty($funcionario)) : ?>
                    <meta http-equiv="refresh" content="0; url=http://localhost/eboa.com/view/public/home.php?opcao=4">
                <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- FIM PRINCIPAL==================================================-->
    <script src="../assets/js/script-perfil.js"></script>

<?php endif; ?>








<!-- ver Sobre o Cliente -->


<?php if (isset($_GET['cld']) && !empty($_GET['cld'])) : ?>
    <main class="principal-minhaconta">
        <div class="titulo">
            <span class="sumario">Sobre Cliente</span>
            <div><span>Home > Sobre Cliente</span></div>
        </div>
        <div class="perfil-card">
            <div>
                <?php
                $id_cliente = filter_var($_GET['cld'], FILTER_VALIDATE_INT);

                $admin = new Admin;

                $cliente = $admin->listarCliente("SELECT * FROM cliente_sistema cs JOIN contactos c ON cs.id_contacto = c.id_contactos JOIN morada m ON cs.id_morada = m.id_morada WHERE id_cliente = $id_cliente");

                ?>
                <?php if (!empty($cliente)) : ?>
                    <div class="img">
                        <img src="../assets/img/clientes/<?= $cliente[0]['foto_perfil'] ?>">
                    </div>
                    <div class="perfil-info">
                        <span></span>
                        <span> Nome: <?= ucwords($cliente[0]['nome']) ?></span>
                        <span> <i class="icon-phone"></i> +244 <?= $cliente[0]['telemovel'] ?></span>
                        <span> <i class="icon-location"></i>Municipio: <?= $cliente[0]['municipio'] ?>, Bairro <?= $cliente[0]['bairro'] ?>, <?= $cliente[0]['rua_casa'] ?>, Nª da casa <?= $cliente[0]['numero_casa'] ?></span>
                    </div>
            </div>
            <div>
                <a href="home.php?opcao=12.1&rd=cfc&dal=<?= $id_cliente ?>" class="edit-botao">Editar</a>
            </div>
        </div>
        <div class="dados-f">
            <div class="maisdetalhes">
                <div class="header">
                    <span>Dados Pessoais</span>
                </div>
                <div class="corpo">
                    <div class="dados">
                        <span>Nome: <span><?= ucwords($cliente[0]['nome']) ?></span></span>
                        <span>Sexo: <span><?= ucwords($cliente[0]['sexo']) ?></span></span>
                        <span>Aniversário: <span><?= $cliente[0]['data_nasc'] ?></span></span>
                        <span>Email: <span><?= $cliente[0]['email'] ?></span></span>
                        <span>Telemóvel: <span>+244 <?= $cliente[0]['telemovel'] ?></span></span>
                        <span>Telefone Alternativo: <span>+244 <?= $cliente[0]['telefone_alt'] ?></span></span>
                        <span>Endereço: <span><i class="icon-location"></i> Municipio: <?= $cliente[0]['municipio'] ?>,Bairro <?= $cliente[0]['bairro'] ?>,Rua <?= $cliente[0]['rua_casa'] ?>,Nª da casa<?= $cliente[0]['numero_casa'] ?></span>
                    </div>

                </div>
            </div>
        <?php endif; ?>
    </main>

    <!-- FIM PRINCIPAL==================================================-->
    <script src="../assets/js/script-perfil.js"></script>
    <?php if (empty($cliente)) : ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/eboa.com/view/public/home.php?opcao=12">
    <?php endif; ?>

<?php endif; ?>

<!-- Ver Produto Local-->
<?php if ((isset($_GET['pwv']) && !empty($_GET['pwv'])) && (isset($_GET['view']) && !empty($_GET['view']))) : ?>
    <main class="principal-minhaconta">
        <div class="titulo">
            <span class="sumario">Sobre Produto</span>
            <div><span>Home >Sobre Produto</span></div>
        </div>
        <div class="perfil-card">
            <div>
                <?php
                $id = filter_var($_GET['pwv'], FILTER_VALIDATE_INT);
                $tabela = filter_var($_GET['view'], FILTER_DEFAULT);

                $produto = new Produto;

                $pwv = $produto->listarProduto("SELECT * FROM $tabela  WHERE id_produto = $id", $tabela);


                ?>
                <?php if (!empty($pwv)) : ?>
                    <div class="img">
                        <img src="../assets/img/Produtos/<?= $pwv[0]['foto'] ?>">
                    </div>
                    <div class="perfil-info">
                        <span></span>
                        <span> Nome: <?= ucwords($pwv[0]['nome']) ?></span>
                        <span>Código: <?= $pwv[0]['codigo_barra'] ?></span>
                        <span> <i class="icon-status"></i>Estado:
                            <?php if ($pwv[0]['estado'] == "Activo") {
                                echo"<span style='color:green;'>{$pwv[0]['estado']}</span>";
                            }else{
                                echo"<span style='color:red;'>{$pwv[0]['estado']}</span>";
                            } ?>
                    </div>
            </div>
            <div>
                <!-- <a href="home.php?opcao=4.1&adbrd=teidra&eloua=<?= $id ?>" class="edit-botao">Editar</a> -->
                <div></div>
            </div>
        </div>
        <div class="dados-f">
            <div class="maisdetalhes">
                <div class="header">
                    <span>Detalhes</span>
                </div>
                <div class="corpo">
                    <div class="dados">
                        <span>Nome: <span><?= ucwords($pwv[0]['nome']) ?></span></span>
                        <span>Preço: <span><?= number_format($pwv[0]['preco'],2,",",".") ?></span></span>
                        <span>Quantidade: <span><?= $pwv[0]['quantidade'] ?></span></span>
                        <span>Tipo de Produto: <span><?= ucwords($pwv[0]['tipo']) ?></span></span>
                        <span>Fornecedor: <span><?= ucwords($pwv[0]['fornecedor']) ?></span></span>
                        <span> Código: </i><?= $pwv[0]['codigo_barra'] ?></span>
                        <span>Data de Validade: <span><?=$pwv[0]['data_validade'] ?></span></span>
                        <span>Data de Cadastro: <span><?=$pwv[0]['data_cadastro'] ?></span></span>
                        <span>Estado: <?php if ($pwv[0]['estado'] == "Activo") {
                                echo"<span style='color:green;'>{$pwv[0]['estado']}</span>";
                            }else{
                                echo"<span style='color:red;'>{$pwv[0]['estado']}</span>";
                            } ?></span>
                        <span>Stock: <span>Stock Local</span></span>

                    </div>

                </div>
            </div>
            <div class="maisdetalhes">
                <div class="header">
                    <span>Descrição</span>
                </div>
                <div class="corpo">
                    <div class="dados">
                        <span> <span style="text-align: justify;"><?= $pwv[0]['descricao'] ?>.</span></span>

                    </div>
                </div>
            </div>

    </main>

    <!-- FIM PRINCIPAL==================================================-->
    <script src="../assets/js/script-perfil.js"></script>
<?php endif; ?>
<?php endif; ?>

<!-- Ver Produto Web-->
<?php if ((isset($_GET['plv']) && !empty($_GET['plv'])) && (isset($_GET['viewpl']) && !empty($_GET['viewpl']))) : ?>
    <main class="principal-minhaconta">
        <div class="titulo">
            <span class="sumario">Sobre Produto</span>
            <div><span>Home >Sobre Produto</span></div>
        </div>
        <div class="perfil-card">
            <div>
                <?php
                $id = filter_var($_GET['plv'], FILTER_VALIDATE_INT);
                $tabela = filter_var($_GET['viewpl'], FILTER_DEFAULT);

                $produto = new Produto;

                $pwv = $produto->listarProduto("SELECT * FROM $tabela  WHERE id_produto = $id", $tabela);


                ?>
                <?php if (!empty($pwv)) : ?>
                    <div class="img">
                        <img src="../assets/img/Produtos/<?= $pwv[0]['foto'] ?>">
                    </div>
                    <div class="perfil-info">
                        <span></span>
                        <span> Nome: <?= ucwords($pwv[0]['nome']) ?></span>
                        <span>Código: <?= $pwv[0]['codigo_barra'] ?></span>
                        <span> <i class="icon-status"></i>Estado:
                            <?php if ($pwv[0]['estado'] == "Activo") {
                                echo"<span style='color:green;'>{$pwv[0]['estado']}</span>";
                            }else{
                                echo"<span style='color:red;'>{$pwv[0]['estado']}</span>";
                            } ?>
                    </div>
            </div>
            <div>
                <!-- <a href="home.php?opcao=4.1&adbrd=teidra&eloua=<?= $id ?>" class="edit-botao">Editar</a> -->
                <div></div>
            </div>
        </div>
        <div class="dados-f">
            <div class="maisdetalhes">
                <div class="header">
                    <span>Detalhes</span>
                </div>
                <div class="corpo">
                    <div class="dados">
                        <span>Nome: <span><?= ucwords($pwv[0]['nome']) ?></span></span>
                        <span>Preço: <span><?= number_format($pwv[0]['preco'],2,",",".") ?></span></span>
                        <span>Quantidade: <span><?= $pwv[0]['quantidade'] ?></span></span>
                        <span>Tipo de Produto: <span><?= ucwords($pwv[0]['tipo']) ?></span></span>
                        <span>Fornecedor: <span><?= ucwords($pwv[0]['fornecedor']) ?></span></span>
                        <span> Código: </i><?= $pwv[0]['codigo_barra'] ?></span>
                        <span>Data de Validade: <span><?=$pwv[0]['data_validade'] ?></span></span>
                        <span>Data de Cadastro: <span><?=$pwv[0]['data_cadastro'] ?></span></span>
                        <span>Estado: <?php if ($pwv[0]['estado'] == "Activo") {
                                echo"<span style='color:green;'>{$pwv[0]['estado']}</span>";
                            }else{
                                echo"<span style='color:red;'>{$pwv[0]['estado']}</span>";
                            } ?></span>
                        <span>Stock: <span>Stock WebSite</span></span>

                    </div>

                </div>
            </div>
            <div class="maisdetalhes">
                <div class="header">
                    <span>Descrição</span>
                </div>
                <div class="corpo">
                    <div class="dados">
                        <span> <span style="text-align: justify;"><?= $pwv[0]['descricao'] ?>.</span></span>

                    </div>
                </div>
            </div>

    </main>

    <!-- FIM PRINCIPAL==================================================-->
    <script src="../assets/js/script-perfil.js"></script>
<?php endif; ?>
<?php endif; ?>