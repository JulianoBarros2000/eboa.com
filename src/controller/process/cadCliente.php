<?php if(!isset($_SESSION)){
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
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($sobrenome)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o sobrenome!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($rua)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a rua!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($rua)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a rua!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($municipio)) {
    $mensagem->showError("municipio_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique município!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($bairro)) {
    $mensagem->showError("bairro_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o bairro!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($n_casa)) {
    $mensagem->showError("n_casa_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o número casa !");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($telefone)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o telefone!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($email)) {
    $mensagem->showError("email_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o email!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}


if ($validar->estavazio($sexo)) {
    $mensagem->showError("sexo_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o sexo!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->estavazio($data)) {
    $mensagem->showError("data_erro", "<i class='icon-warning'></i> Campo Obrigatório");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a data!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temCaracteresEspeciais($nome)) {
    $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->verificarTamanho($nome, 20)) {
    $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temNumero($nome)) {
    $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas letras");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}


if ($validar->temCaracteresEspeciais($sobrenome)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o ultimo nome!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->verificarTamanho($sobrenome, 20)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o ultimo nome!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temNumero($sobrenome)) {
    $mensagem->showError("sobrenome_erro", "<i class='icon-warning'></i> Apenas letras");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o ultimo nome!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}

if ($validar->temCaracteresEspeciais($rua)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a rua!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->verificarTamanho($rua, 20)) {
    $mensagem->showError("rua_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a rua!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temCaracteresEspeciais($municipio)) {
    $mensagem->showError("municipio_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o município!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->verificarTamanho($municipio, 20)) {
    $mensagem->showError("municipio_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o município!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temCaracteresEspeciais($bairro)) {
    $mensagem->showError("bairro_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o bairro!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->verificarTamanho($bairro, 20)) {
    $mensagem->showError("bairro_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o bairro!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temCaracteresEspeciais($n_casa)) {
    $mensagem->showError("n_casa_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o número da casa!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->verificarTamanho($n_casa, 20)) {
    $mensagem->showError("n_casa_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o número da casa!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}


if ($validar->verificarTamanhoContacto($telefone, 9, 9)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Apenas 9 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o telefone!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temCaracteresEspeciais($telefone)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o telefone!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temLetra($telefone)) {
    $mensagem->showError("telefone_erro", "<i class='icon-warning'></i> Apenas números 0 1 2 3 4 5 6 7 8 9");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o telefone!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->verificarTamanhoContacto($telefone_alt, 9, 9)) {
    $mensagem->showError("telefone_alt_erro", "<i class='icon-warning'></i> Apenas 9 dígitos");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique os telefone alternativo!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temCaracteresEspeciais($telefone_alt)) {
    $mensagem->showError("telefone_alt_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o telefone alternativo!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if ($validar->temLetra($telefone_alt)) {
    $mensagem->showError("telefone_alt_erro", "<i class='icon-warning'></i> Apenas números 0 1 2 3 4 5 6 7 8 9");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o telefone alternativo!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}
if (!$validar->verificarEmail($email)) {
    $mensagem->showError("email_erro", "<i class='icon-warning'></i> email invalido");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o email!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}

if ($validar->verificarDataNascimento($data)) {
    $mensagem->showError("data_erro", "<i class='icon-warning'></i> Data inválida");
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a data!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
    exit;
}

/* ===========================Fim Validação dos Campos================================ */


$nome = $nome . " " . $sobrenome;
$nome = trim(strtolower($nome));
$banco = new BancoDados("cliente_sistema");
$registo = $banco->select("SELECT cs.id_cliente FROM cliente_sistema cs join contactos c on cs.id_contacto=c.id_contactos join morada m on cs.id_morada=m.id_morada WHERE nome='$nome' and email='$email'")->fetch();



if (empty($registo)) {

    /* ====================Cadastrar cliente================== */
    $admin = new Admin();
    if (!in_array("", $foto)) {
        if ($admin->cadastrarCliente([
            'nome' => $nome,
            'sexo' => trim(strtolower($sexo)),
            'data_nasc' => $data,
            'foto_perfil' => $foto['name']
        ], [
            'municipio' => $municipio,
            'rua_casa' => $rua,
            'numero_casa' => $n_casa,
            'bairro' => $bairro
        ], [
            'telemovel' => $telefone,
            'telefone_alt' => $telefone_alt,
            'email' => $email
        ])) {
            move_uploaded_file($foto['tmp_name'], "../../../view/assets/img/clientes/{$foto['name']}");
            $mensagem->showError("geral_success", "<i class='icon-success'></i> Cliente cadastrado com sucesso!");
            header("Location: ../../../view/public/home.php?opcao=12");
        }
    } else {
        if ($admin->cadastrarCliente([
            'nome' => $nome,
            'sexo' => trim(strtolower($sexo)),
            'data_nasc' => $data,
            'foto_perfil' => "none.jpeg"
        ], [
            'municipio' => $municipio,
            'rua_casa' => $rua,
            'numero_casa' => $n_casa,
            'bairro' => $bairro
        ], [
            'telemovel' => $telefone,
            'telefone_alt' => $telefone_alt,
            'email' => $email
        ])) {
           
            $mensagem->showError("geral_success", "<i class='icon-success'></i> Cliente cadastrado com sucesso!");
            header("Location: ../../../view/public/home.php?opcao=12");
        }
    }
} else {
    $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Já existe um cliente cadastrado!");
    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=12.1&cd=dc");
}
 
