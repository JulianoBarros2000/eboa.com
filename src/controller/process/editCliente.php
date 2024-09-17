<?php
 if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
require_once __DIR__ . "../../../../vendor/autoload.php";

use App\controller\process\ValidarFormulario;
use App\model\entidades\Admin;
use App\controller\Mensagem;
use App\Model\BancoDados;

if (!isset($_SESSION)) {
    session_start();
}

$mensagem = new Mensagem();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$foto = $_FILES;

/* Extração das chaves para variáveis */

      extract($dados);
     extract($foto);

/* ===========================Validação dos Campos================================ */
$validar = new ValidarFormulario;
if ($validar->estavazio($nome)) {
    $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($sobrenome)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($rua)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($rua)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($municipio)) {
    $mensagem->showError("municipio_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($bairro)) {
    $mensagem->showError("bairro_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($n_casa)) {
    $mensagem->showError("n_casa_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
/* if ($validar->estavazio($bi)) {
    $mensagem->showError("bi_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
} */
if ($validar->estavazio($telefone)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($email)) {
    $mensagem->showError("email_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}

if ($validar->estavazio($sexo)) {
    $mensagem->showError("sexo_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->estavazio($data)) {
    $mensagem->showError("data_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a data!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temCaracteresEspeciais($nome)) {
    $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanho($nome, 20)) {
    $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temNumero($nome)) {
    $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas letras");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}


if ($validar->temCaracteresEspeciais($sobrenome)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanho($sobrenome, 20)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temNumero($sobrenome)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Apenas letras");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}

if ($validar->temCaracteresEspeciais($rua)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanho($rua, 20)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temCaracteresEspeciais($municipio)) {
    $mensagem->showError("municipio_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanho($municipio, 20)) {
    $mensagem->showError("municipio_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temCaracteresEspeciais($bairro)) {
    $mensagem->showError("bairro_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanho($bairro, 20)) {
    $mensagem->showError("bairro_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temCaracteresEspeciais($n_casa)) {
    $mensagem->showError("n_casa_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanho($n_casa, 20)) {
    $mensagem->showError("n_casa_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanhoContacto($telefone, 9, 9)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Apenas 9 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temCaracteresEspeciais($telefone)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temLetra($telefone)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Apenas números 0 1 2 3 4 5 6 7 8 9");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->verificarTamanhoContacto($telefone_alt, 9, 9)) {
    $mensagem->showError("telefone_alt_erro", "<i class='icon-warning'></i> Apenas 9 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temCaracteresEspeciais($telefone_alt)) {
    $mensagem->showError("telefone_alt_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if ($validar->temLetra($telefone_alt)) {
    $mensagem->showError("telefone_alt_erro", "<i class='icon-warning'></i> Apenas números 0 1 2 3 4 5 6 7 8 9");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}
if (!$validar->verificarEmail($email)) {
    $mensagem->showError("email_erro", "<i class='icon-warning'></i> email invalido");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os campos!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}

if ($validar->verificarDataNascimento($data)) {
    $mensagem->showError("data_erro", "<i class='icon-warning'></i> Data inválida");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a data!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&dal={$_SESSION['id_cliente_edit']}");
    exit;
}

/* ===========================Fim Validação dos Campos================================ */


$nome = $nome . " " . $sobrenome;
$nome = trim(strtolower($nome));




    /* ====================Editar Cliente================== */
   

if(isset($_GET['dal'])){
    $id_cliente = filter_var($_GET['dal'],FILTER_VALIDATE_INT);
    $banco = new BancoDados("cliente_sistema");
    $registo = $banco->select("SELECT foto_perfil FROM cliente_sistema WHERE id_cliente=$id_cliente")->fetch();
    if($foto['name'] != $registro){
    move_uploaded_file($foto['tmp_name'],"../../../view/assets/img/clientes/{$foto['name']}");
    }
     $admin = new Admin();
     if($admin -> editarCliente("UPDATE `cliente_sistema` SET `nome`='$nome',`data_nasc`='$data',`sexo`='$sexo',`foto_perfil`='{$foto['name']}' WHERE id_cliente = '$id_cliente'") && $admin->editarCliente("UPDATE `cliente_sistema` cs join contactos c on cs.id_contacto=c.id_contactos set telemovel = '$telefone', telefone_alt ='$telefone_alt',email ='$email' WHERE id_cliente='$id_cliente'") && $admin->editarCliente("UPDATE `cliente_sistema` cs join morada m on cs.id_morada=m.id_morada set municipio = '$municpio', rua_casa ='$rua',numero_casa ='$n_casa' WHERE id_cliente='$id_cliente'")){
        $mensagem->showError("edit_success", "<i class='icon-success'></i> Funcionário actualizado com sucesso!");
        unset($_SESSION['id_cliente_edit']);
        header("Location: ../../../view/public/home.php?opcao=12");
        
     }
}


    
    