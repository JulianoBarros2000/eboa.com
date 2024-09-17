<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['cesto_web'])) {

    header("Location: ../../../../../");
    exit;
} ?>
<?php
if (isset($_GET['clear']) && $_GET['clear'] == "1") {
    unset($_SESSION['cesto_web']);
    echo "<meta rel<meta http-equiv='refresh' content='0; url=http://localhost/eboa.com/view/public/eboawebsite.com/view/public/carrinho.php?clear=0'>";
}
if (isset($_GET['remove'])) {
    foreach ($_SESSION['cesto_web'] as $keys => $item) {
        if ($item['id'] == $_GET['remove']) {
            unset($_SESSION['cesto_web'][$keys]);
        }
    }
    if (sizeOf($_SESSION['cesto_web']) <= 0) {
        unset($_SESSION['cesto_web']);
        echo "<meta rel<meta http-equiv='refresh' content='0; url=http://localhost/eboa.com/'>";
        exit;
    }
    echo "<meta rel<meta http-equiv='refresh' content='0; url=http://localhost/eboa.com/view/public/eboawebsite.com/view/public/carrinho.php?clear=0'>";
}
?>
</span>
</span>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/plugins/bootstrap-5/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="../assets/icon/icomoon.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <title>eboa.com</title>
</head>

<body>
    <!-------HEADER------->
    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i>eboa</a>

        <nav class="navbar">
            <a href="../../../../../index.php" class="active">Home</a>
            <a href="../../../../../index.php#dishes">Pratos</a>
            <a href="../../../../../index.php#about">Sobre</a>
            <a href="../../../../../index.php#menu">Menu</a>
            <!--   <a href="../../index.php#order">Encomenda</a> -->
        </nav>

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <!--  <i class="fas fa-search" id="search-icon"></i> -->
            <a href="#" class="fas fa-heart"></a>
            <i class="fas fa-shopping-cart" id="shopping-icon"></i>
            <span class="quantidade"><?php if (isset($_SESSION['cesto_web'])) {
                                            echo "<p>" . sizeof($_SESSION['cesto_web']) . "</p>";
                                        } ?></span>
        </div>
    </header><br><br><br><br>


    <!-- shopping form -->
    <form action="#" id="shopping-form">
        <!-- CARRINHO -->
        <div class="container-fluid">
            <?php if (isset($_SESSION['cesto_web'])) : ?>
                <h2>Meu Carrinho</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Imagem</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($_SESSION['cesto_web'] as $produto) : ?>
                            <?php extract($produto);
                            $total += intval($quantidade) * floatval($preco); ?>
                            <tr>
                                <td style="text-align: left;"><?= $nome_p ?></td>
                                <td><img src="../../../../assets/img/Produtos/<?= $foto ?>" alt=""></td>
                                <td><?= number_format($preco, 2, ",", ".") ?> kz</td>
                                <td><?= $quantidade ?></td>
                                <td><?= number_format(intval($quantidade) * floatval($preco), 2, ",", ".") ?> kz</td>
                                <td> <a href="?remove=<?= $id ?>"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" style="background: #0984f7;color:#fff;text-align:left;">Subtotal</td>
                            <td colspan="2" style="background: #0984f7;color:#fff;"><?= number_format($total, 2, ",", ".") ?> kz</td>
                        </tr>
                    </tbody>
                </table>


            <?php endif; ?>

    </form>
    <!-- PEDIDOS / ENCOMENDAS -->
    <!-- Order Section -->

    <section class="order" id="order">

        <form action="../../../../../src/controller/process/encomenda.php" method="POST">
            <?php if (isset($_SESSION['geral_erro'])) {
                echo "<div class='erro'>{$_SESSION['geral_erro']}</div>";
                unset($_SESSION['geral_erro']);
            } ?>
            <div class="inputBox">
                <div class="input">
                    <span>Seu nome</span>
                    <input type="text" name="nome" value="<?php if (isset($_SESSION['campos'])) {
                                                                extract($_SESSION['campos']);
                                                                echo $nome;
                                                            } ?>" requerid>
                    <span><?php if (isset($_SESSION['nome_erro'])) {
                                echo $_SESSION['nome_erro'];
                                unset($_SESSION['nome_erro']);
                            } ?></span>
                </div>

                <div class="input">
                    <span>Seu email</span>
                    <input type="email" name="email" value="<?php if (isset($_SESSION['campos'])) {
                                                                extract($_SESSION['campos']);
                                                                echo $email;
                                                            } ?>" required>
                    <span><?php if (isset($_SESSION['email_erro'])) {
                                echo $_SESSION['email_erro'];
                                unset($_SESSION['email_erro']);
                            } ?></span>
                </div>

                <div class="input">
                    <span>Seu número</span>
                    <input type="number" name="telemovel" requerid value="<?php if (isset($_SESSION['campos'])) {
                                                                                extract($_SESSION['campos']);
                                                                                echo $telemovel;
                                                                            } ?>">
                    <span><?php if (isset($_SESSION['telemovel_erro'])) {
                                echo $_SESSION['telemovel_erro'];
                                unset($_SESSION['telemovel_erro']);
                            } ?></span>
                </div>
                <div class="input">
                    <span>Seu número alternativo</span>
                    <input type="number" name="telefone_alt" requerid value="<?php if (isset($_SESSION['campos'])) {
                                                                                    extract($_SESSION['campos']);
                                                                                    echo $telefone_alt;
                                                                                } ?>">
                    <span><?php if (isset($_SESSION['telefone_alt_erro'])) {
                                echo $_SESSION['telefone_alt_erro'];
                                unset($_SESSION['telefone_alt_erro']);
                            } ?></span>
                </div>



                <div class="inputBox">
                    <div class="input">
                        <span>Municipio</span>
                        <input type="text" name="municipio" requerid value="<?php if (isset($_SESSION['campos'])) {
                                                                                extract($_SESSION['campos']);
                                                                                echo $municipio;
                                                                            } ?>">
                        <span><?php if (isset($_SESSION['municipio_erro'])) {
                                    echo $_SESSION['municipio_erro'];
                                    unset($_SESSION['municipio_erro']);
                                } ?></span>
                    </div>

                    <div class="input">
                        <span>Bairro</span>
                        <input type="test" name="bairro" requerid value="<?php if (isset($_SESSION['campos'])) {
                                                                                extract($_SESSION['campos']);
                                                                                echo $bairro;
                                                                            } ?>">
                        <span><?php if (isset($_SESSION['bairro_erro'])) {
                                    echo $_SESSION['bairro_erro'];
                                    unset($_SESSION['bairro_erro']);
                                } ?></span>
                    </div>
                </div>

                <div class="inputBox">
                    <div class="input">
                        <span>Nº Casa</span>
                        <input type="number" name="n_casa" requerid value="<?php if (isset($_SESSION['campos'])) {
                                                                                extract($_SESSION['campos']);
                                                                                echo $n_casa;
                                                                            } ?>">
                        <span><?php if (isset($_SESSION['n_casa_erro'])) {
                                    echo $_SESSION['n_casa_erro'];
                                    unset($_SESSION['n_casa_erro']);
                                } ?></span>
                    </div>

                    <div class="input">
                        <span>Data e Hora Prevista de Entrega</span>
                        <input type="datetime-local" name="data" id="" requerid value="<?php if (isset($_SESSION['campos'])) {
                                                                                            extract($_SESSION['campos']);
                                                                                            echo $data;
                                                                                        } ?>">
                        <span><?php if (isset($_SESSION['data_erro'])) {
                                    echo $_SESSION['data_erro'];
                                    unset($_SESSION['data_erro']);
                                } ?></span>
                    </div>
                </div>

                <div class="inputBox">

                    <div class="input">
                        <span>Sua mensagem</span>
                        <textarea name="mensagem" cols="60" rows="10" requerid  value="<?php if (isset($_SESSION['campos'])) {
                                                                                            extract($_SESSION['campos']);
                                                                                            echo $mensagem;
                                                                                        } ?>"></textarea>
                        <span><?php if (isset($_SESSION['mensagem_erro'])) {
                                    echo $_SESSION['mensagem_erro'];
                                    unset($_SESSION['mensagem_erro']);
                                } ?></span>
                    </div>
                </div>
                <div class="input">
                    <button class="btn1  text-uppercase" name="encomendar" value="encomendar" type="submit">encomendar</button>
                </div>


                <?php if (isset($_SESSION['campos'])) {

                    unset($_SESSION['campos']);
                } ?>


        </form>


    </section>

    <!-- //Order Section -->
    <!-- //PEDIDOS / ENCOMENDAS -->
    <section class="order" id="order">

    </section>
    <!-- RODAPÉ -->
    <!-------Footer------->

    <section class="footer">

        <div class="box-container">
            <div class="box">
                <h3>Links Rápidos</h3>
                <a href="#home">Home</a>
                <a href="#dishes">Pratos</a>
                <a href="#about">Sobre</a>
                <a href="#menu">Menu</a>
                <a href="#order">Encomenda</a>
            </div>

            <div class="box">
                <h3>Contactos</h3>
                <a href="#">+244-938-555-001</a>
                <a href="#">+244-938-696-815</a>
                <a href="#">eboa@gmail.com</a>
            </div>

            <div class="box">
                <h3>redes socias</h3>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Whatsapp</a>
            </div>

            <div class="box">
                <h3>Localização</h3>
                <a href="#" class="fas fa-location-dot"> Topo do cimiterios da Camama</a>
            </div>

        </div>

        <div class="credit">Direito autoral @ 2023 por <span>PAFIJUL Software (Prestaço de Serviço & Comerçio)</span>
        </div>

    </section>

    <!--//Footer------->
    <!-- //RODAPÉ -->

    <!-- Loader part -->

    <!-- <div class="loader-container">
        <img src="../assets/img/imgsite/loading_fast_food.gif" alt="">
    </div> -->

    <!-- //Loader part -->

    <!-------JavaScript------->
    <script src="../assets/js/script-site/swiper-bundle.min.js"></script>
    <script src="../assets/js/script-site/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap-5/js/bootstrap.min.js"></script>
    <script src="../assets/js/script-site/script.js"></script>
    <!--//JavaScript------->

</body>

</html>