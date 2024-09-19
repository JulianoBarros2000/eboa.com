<?php if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="stylesheet" href="../assets/icon/icomoon.css">
    <!-- ligação com a folha de estilo principal -->
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="shortcut icon" href="../assets/img/favicon/eboa-favicon.ico" type="image/x-icon">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eboa.com</title>
</head>
  <?php if (isset($_SESSION['erro_login'])) {
        echo "<div class='erro'>". $_SESSION['erro_login']. "</div>";
        unset($_SESSION['erro_login']);
    } ?>
<body>

    <div class="container">
  
        <div class="img">
            <img src="../assets/img/undraw_personalization_re_grty.svg">
        </div>
        <div class="login-content">
            <form action="../../src/controller/process/logar.php" method="POST">
                <img src="../assets/img/eboa.png">
                <h2 class="title">LOGIN</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="icon-user"></i>
                    </div>
                    <div class="div">
                        <h5>Nome do Utilizador</h5>
                        <input type="text" class="input" name="utilizador">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="icon-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Senha do Utilizador</h5>
                        <input type="password" class="input" name="senha">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login" name="btn_logar">
            </form>
        </div>
    </div>

    <script src="view/assets/js/script-login.js"></script>
</body>

</html>