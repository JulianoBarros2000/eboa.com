<?php


use App\controller\Mensagem;
use App\controller\process\ValidarFormulario;
use App\Model\BancoDados;

require_once __DIR__ . "/../../../vendor/autoload.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['encomendar']) && isset($_SESSION['cesto_web'])) {

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!in_array("", $dados)) {
        $validar = new ValidarFormulario;
        echo "<pre>";
        print_r($dados);
        extract($dados);

        if ($validar->temCaracteresEspeciais($nome)) {
            $_SESSION['nome_erro'] = "<i class='fas fa-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o nome!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->verificarTamanho($nome, 90)) {
            $_SESSION['nome_erro'] = "<i class='fas fa-warning'></i> Apenas 90 dígitos";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o nome!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if (!$validar->verificarEmail($email)) {
            $_SESSION['email_erro'] = "<i class='fas fa-warning'></i> Email invalido";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Email!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->verificarTamanho($telemovel, 9)) {
            $_SESSION['telemovel_erro'] = "<i class='fas fa-warning'></i> Apenas 9 Números";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Número!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->verificarTamanho($telefone_alt, 9)) {
            $_SESSION['telefone_alt_erro'] = "<i class='fas fa-warning'></i> Apenas 9 Números";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Número!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->verificarTamanho($municipio, 100)) {
            $_SESSION['municipio_erro'] = "<i class='fas fa-warning'></i> Apenas 100 dígitos";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Município!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->temCaracteresEspeciais($municipio)) {
            $_SESSION['municipio_erro'] = "<i class='fas fa-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Município!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->verificarTamanho($bairro, 50)) {
            $_SESSION['municipio_erro'] = "<i class='fas fa-warning'></i> Apenas 50 dígitos";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Bairro!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->temCaracteresEspeciais($municipio)) {
            $_SESSION['municipio_erro'] = "<i class='fas fa-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Bairro!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->temLetra($n_casa)) {
            $_SESSION['n_casa_erro'] = "<i class='fas fa-warning'></i> Apenas Números";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Bairro!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }
        if ($validar->verificarTamanho($n_casa, 20)) {
            $_SESSION['n_casa_erro'] = "<i class='fas fa-warning'></i> Apenas 20 números";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique o Bairro!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }

        if ($validar->verificarTamanho($mensagem, 500)) {
            $_SESSION['mensagem_erro'] = "<i class='fas fa-warning'></i> Apenas 500 dígitos";
            $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Verifique a Mensagem!";
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
            exit;
        }

        $total = 0;
        foreach ($_SESSION['cesto_web'] as  $produto) {
            extract($produto);
            $produtos .= " " . $nome_p . ",";
            $total += intval($quantidade) * floatval($preco);
        }
        $quantidade = sizeof($_SESSION['cesto_web']);

        /* Cadastrar visitante e encomenda */
        $banco = new BancoDados("encomenda");
        $id_encomenda = $banco->insert([
            'produtos' => $produtos,
            'quantidade' => $quantidade,
            'total' => $total,
            'data_entrega' => $data
        ]);

        $banco = new BancoDados("visitante");
        $id_visitante=$banco->insert([
            'nome' => $nome,
            'email' => $email,
            'telemovel' => $telemovel,
            'telefone_alt' => $telefone_alt,
            'municipio' => $municipio,
            'bairro' => $bairro,
            'n_casa' => $n_casa,
            'mensagem' => $data,
            'id_encomenda' => $id_encomenda
        ]); 
        if ($id_visitante > 0) {
            $banco = new BancoDados("produto_web");
            foreach ($_SESSION['cesto_web'] as $key => $value) {

                $quantidade_produto = $banco->select("SELECT quantidade FROM produto_web WHERE id_produto ={$value['id']} ")->fetch()['quantidade'];

                $banco->update("id_produto=" . $value['id'], [
                    'quantidade' => intval($quantidade_produto) - intval($value['quantidade'])
                ]);
            }
            unset($_SESSION['cesto_web']);


            $_SESSION['geral_sucesso'] = " Encomenda Feita abra o ficheiro pdf que enviamos para ti <i class='fas fa-heart'></i>
            e aguande um instante entramos em contacto consigo!
            !";
            header("Location: ../../../");
            header("Location: eboaEncomenda.php?encomenda=$id_visitante");
            exit;
        }
    } else {
        header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
        $_SESSION['campos'] = $dados;
        $_SESSION['geral_erro'] = "<i class='fas fa-warning'></i> Todos os campos são obrigatórios";
        exit;
    }
} else {
    header("Location: ../../../view/public/eboawebsite.com/view/public/carrinho.php");
    $_SESSION['campos'] = $dados;
    exit;
}
