<?php
require_once __DIR__ . "/vendor/autoload.php";

use App\Model\BancoDados;

if (!isset($_SESSEION)) {
    session_start();
}

if (isset($_POST['btn-add'])) {
    if (isset($_SESSION['cesto_web'])) {
        $session_array_id = array_column($_SESSION['cesto_web'], "id");



        if (!in_array($_POST['id'], $session_array_id)) {
            $session_array = array(
                'id' => $_POST['id'],
                'nome_p' => $_POST['nome'],
                'preco' => $_POST['preco'],
                'foto' => $_POST['foto'],
                'quantidade' => $_POST['quantidade']
            );
            $_SESSION['cesto_web'][] = $session_array;
        }
    } else {
        $session_array = array(
            'id' => $_POST['id'],
            'nome_p' => $_POST['nome'],
            'preco' => $_POST['preco'],
            'foto' => $_POST['foto'],
            'quantidade' => $_POST['quantidade']
        );
        $_SESSION['cesto_web'][] = $session_array;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="view/public/eboawebsite.com/view/assets/plugins/bootstrap-5/css/bootstrap.min.css">

    <link rel="stylesheet" href="view/public/eboawebsite.com/view/assets/css/swiper-bundle.min.css">

    <link rel="stylesheet" href="view/public/eboawebsite.com/view/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="shortcut icon" href="view/public/eboawebsite.com/view/assets/img/favicon/eboa-favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="view/public/eboawebsite.com/view/assets/icon/icomoon.css">

    <link rel="stylesheet" href="view/public/eboawebsite.com/view/assets/css/style.css">

    <title>eboa</title>
</head>

<body>
    <!-------HEADER------->
    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i>eboa</a>

        <nav class="navbar">
            <a href="index.php#home" class="active">Home</a>
            <a href="#dishes">Pratos</a>
            <a href="#about">Sobre</a>
            <a href="#menu">Menu</a>
            <!--  <a href="#order">Encomenda</a> -->
        </nav>

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <!--  <i class="fas fa-search" id="search-icon"></i> -->
            <a href="#" class="fas fa-heart"></a>
            <a href="view/public/eboawebsite.com/view/public/carrinho.php"  id="shopping-icon" class=" fas fa-shopping-cart <?php if (isset($_SESSION['cesto_web'])) {
                                            echo "atencao";
                                           
                                        } ?>"></a>
            <span class="quantidade"><?php if (isset($_SESSION['cesto_web'])) {
                                            echo "<p>" . sizeof($_SESSION['cesto_web']) . "</p>";
                                           
                                        } ?></span>
        </div>
    </header><br>


    <!--//HEADER------->

    <!-------HOME START------->

    <section class="home" id="home">
   <?php if (isset($_SESSEION['geral_sucesso'])) {
  echo "<div class='sucesso'>".$_SESSEION['geral_sucesso']."</div>";
  unset($_SESSEION['geral_sucesso']);
}?>
        <div class="swiper home-slider">

            <div class="swiper-wrapper wrapper">
                <?php
                $banco = new BancoDados("produto_web");


                $produtos = $banco->select("SELECT * FROM produto_web  WHERE estado = 'activo' ORDER BY data_cadastro DESC LIMIT 0,4 ")->fetchAll(PDO::FETCH_ASSOC);
                $produtosAll = $banco->select("SELECT * FROM produto_web  WHERE estado = 'activo' LIMIT 0,12")->fetchAll(PDO::FETCH_ASSOC);
                $produtosFour = $banco->select("SELECT * FROM produto_web  WHERE estado = 'activo'ORDER BY data_cadastro DESC LIMIT 0,4 ")->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach ($produtos as $produto) : ?>
                    <?php extract($produto); ?>
                    <div class="swiper-slide slide">
                        <div class="content">
                            <span>Nosso maior especial</span>
                            <h3><?= $nome ?></h3>
                            <p><?= mb_strtoupper($descricao) ?></p>
                            <p><?= number_format(floatval($preco), 2, ",", ".") ?> kz</p>
                            <p>Taxa de entrega: <?= number_format(floatval(1000), 2, ",", ".") ?> kz</p>
                            <form action="#dishes" method="POST">
                                <input type="hidden" name="quantidade" value="1" min="1" max="<?= $quantidade ?>">
                                <input type="hidden" name="preco" value="<?= $preco ?>">
                                <input type="hidden" name="nome" value="<?= $nome ?>">
                                <input type="hidden" name="foto" value="<?= $foto ?>">
                                <input type="hidden" name="id" value="<?= $id_produto ?>">
                                <button type="submit" class="btn1 Add" value="Adicionar" name="btn-add">Peça Agora</button>
                            </form>

                        </div>
                        <div class="image">
                            <img src="view/assets/img/Produtos/<?= $foto ?>">
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!--//HOME------->

    <!-- CARRINHO -->

    <!-- pratos section start -->
    <section class="dishes" id="dishes">
        <h3 class="sub-heading">Nossos Fast Food</h3>
        <h1 class="heading">Nossos Populares Fast Food</h1>

        <div class="box-container">
            <?php foreach ($produtosAll as $produtos) : ?>
                <?php extract($produtos) ?>
                <div class="box">
                    <img src="view/assets/img/Produtos/<?= $foto ?>">
                    <h3><?= $nome ?></h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span><?= number_format(floatval($preco), 2, ",", ".") ?> kz</span>
                    <h3>Taxa de entrega: <?= number_format(floatval(1000), 2, ",", ".") ?> kz</h3>
                    <form action="" method="post">
                        <input type="number" class="input-number" name="quantidade" value="1" min="1" max="<?= $quantidade ?>">
                        <input type="hidden" name="preco" value="<?= $preco ?>">
                        <input type="hidden" name="nome" value="<?= $nome ?>">
                        <input type="hidden" name="foto" value="<?= $foto ?>">
                        <input type="hidden" name="id" value="<?= $id_produto ?>">
                        <button type="submit" class="btn1 Add" value="Adicionar" name="btn-add">Adicionar no Carrinho</button>
                    </form>

                </div>
            <?php endforeach; ?>

        </div>

    </section>
    <!-- //pratos section start -->



    <!-------SOBRE------->

    <section class="about" id="about">
        <h3 class="sub-heading">Sobre Nós</h3>
        <h1 class="heading">Porque escolher-nos?</h1>

        <div class="row">

            <div class="image">
                <img src="view/assets/img/eboa.png" alt="">
            </div>

            <div class="content">
                <h3>O melhor Fast Food do país</h3>
                <p>Fundado em 2019 e está localizado Angola,Luanda,Camama 1,topo do cemitério do Camama.</p>
                <p>Objectivos agilizar o processo de trabalho, deixar de
                    usar métodos manuais para a gestão e vendas, conhecer o seu público alvo, diminuir o
                    cansaço e aumentar a eficácia dos serviços da empresa</p>
                <div class="cont">
                    <div class="icons-container">
                        <div class="icons">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Entregas</span>
                        </div>
                    </div>

                    <div class="icons-container">
                        <div class="icons">
                            <i class="fas fa-money-bill-transfer"></i>
                            <span>Pagamentos facilitados</span>
                        </div>
                    </div>

                    <div class="icons-container">
                        <div class="icons">
                            <i class="fas fa-headset"></i>
                            <span>Serviços 24/24</span>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn1">Saber mais</a>
            </div>


        </div>

    </section>

    <!--//SOBRE------->

    <!-------Menu------->

    <section class="menu" id="menu">
        <h3 class="sub-heading">Nosso Cardápio</h3>
        <h1 class="heading">Especialidade de hoje</h1>

        <div class="box-container">

            <?php foreach ($produtosFour as $produto) : ?>
                <?php extract($produto); ?>
                <div class="box">
                    <div class="image">
                        <img src="view/assets/img/Produtos/<?= $foto ?>" alt="">
                    </div>

                    <div class="content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <h3><?= $nome ?></h3>
                        <p><?= $descricao ?></p>
                        <span class="price"><?= number_format(floatval($preco), 2, ",", ".") ?> kz</span>
                        <form action="" method="post">
                            <input type="number" class="input-number" name="quantidade" value="1" min="1" max="<?= $quantidade ?>">
                            <input type="hidden" name="preco" value="<?= $preco ?>">
                            <input type="hidden" name="nome" value="<?= $nome ?>">
                            <input type="hidden" name="foto" value="<?= $foto ?>">
                            <input type="hidden" name="id" value="<?= $id_produto ?>">
                            <button type="submit" class="btn1 Add" value="Adicionar" name="btn-add">Adicionar no Carrinho</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </section>

    <!--//Menu------->

    <!--  COMETÁRIOS -->
    <!-- Review section -->

    <!--  <section class="review" id="review">
        <h3 class="sub-heading">Avaliação do cliente</h3>
        <h1 class="heading">O que eles disseram</h1>

        <div class="wrapper review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../assets/img/user/IMG-20230518-WA0002.jpg" alt="">
                        <div class="user-info">
                            <h3>Adriano Basisa</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ratione, nisi nobis. Unde laborum facere, beatae qui corporis nihil quia asperiores doloremque. 
                     Nulla minus, accusamus facere soluta dolores repellat voluptatibus tenetur?</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../assets/img/user/IMG_20220218_185204_823.jpg" alt="">
                        <div class="user-info">
                            <h3>Isildo Dala</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ratione, nisi nobis. Unde laborum facere, beatae qui corporis nihil quia asperiores doloremque. 
                     Nulla minus, accusamus facere soluta dolores repellat voluptatibus tenetur?</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../assets/img/user/IMG-20230518-WA0011.jpg" alt="">
                        <div class="user-info">
                            <h3>Fernando Quinjamgo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ratione, nisi nobis. Unde laborum facere, beatae qui corporis nihil quia asperiores doloremque. 
                     Nulla minus, accusamus facere soluta dolores repellat voluptatibus tenetur?</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="../assets/img/user/IMG-20230518-WA0009.jpg" alt="">
                        <div class="user-info">
                            <h3>Paulina Finda</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ratione, nisi nobis. Unde laborum facere, beatae qui corporis nihil quia asperiores doloremque. 
                     Nulla minus, accusamus facere soluta dolores repellat voluptatibus tenetur?</p>
                </div>

            </div>

        </div>

    </section> -->

    <!-- //Review section -->
    <!-- //COMENTÁRIOS -->


    <!-- PEDIDOS / ENCOMENDAS -->
    <!-- Order Section -->

    <!-- <section class="order" id="order">

    </section> -->

    <!-- //Order Section -->
    <!-- //PEDIDOS / ENCOMENDAS -->

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

     <div class="loader-container">
        <img src="view/public/eboawebsite.com/view/assets/img/imgsite/loading_fast_food.gif" alt="">
    </div>

    <!-- //Loader part -->

    <!-------JavaScript------->
    <script src="view/public/eboawebsite.com/view/assets/js/script-site/swiper-bundle.min.js"></script>
    <script src="view/public/eboawebsite.com/view/assets/js/script-site/popper.min.js"></script>
    <script src="view/public/eboawebsite.com/view/assets/plugins/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="view/public/eboawebsite.com/view/assets/js/script-site/script.js"></script>
    <!--//JavaScript------->

</body>

</html>