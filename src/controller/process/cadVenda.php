<?php
 if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
session_start();
/* Auto Carregamento de classes usando Composer */

use App\controller\Mensagem;
use App\Model\BancoDados;
use App\model\entidades\OperadorCaixa;


require_once __DIR__ . "/../../../vendor/autoload.php";

/* Objecto mensagem */
$sms = new Mensagem();
$produtos = "";
if (isset($_SESSION['cesto'])) {

    if (isset($_POST['fim-venda'])) {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $total = floatval($dados['total']);

        if (!empty($_SESSION['cesto'])) {

            foreach ($_SESSION['cesto'] as  $produto) {
                $produtos .= " " . $produto['nome'] . "(" . $produto['quantidade'] . "),";
            }
            $quantidade = sizeof($_SESSION['cesto']);
        } else {
            $_SESSION['erro_venda'] = "<i class='icon-warning'></i> Nenhum produto selecionado";

            header("Location: ../../../view/public/home.php?opcao=2#btn");
            $_SESSION["dados"] = $dados;

            exit;
        }


        if (strlen($dados['valorPago']) > 0) {

            if (!($total <= floatval($dados['valorPago']))) {
                $_SESSION['erro_venda'] = "<i class='icon-warning'></i> Valor insufuciente";
                $_SESSION["dados"] = $dados;
                header("Location: ../../../view/public/home.php?opcao=2#btn");;
                exit;
            } else {
                if ($dados['formaPagamento'] == "Multicaixa" || $dados['formaPagamento'] == "Numeral") {
                    if ($dados['formaPagamento'] == "Multicaixa") {
                        # cadastrar sem troco
                        $operador = new OperadorCaixa;
                        if ($operador->realizarVenda($produtos, $quantidade, $total, $_SESSION['id'], $dados['formaPagamento'])) {
                            $produto = new BancoDados("produto_local");
                            foreach ($_SESSION['cesto'] as $key => $value) {
                                $quantidade_produto = $produto->select("SELECT quantidade FROM produto_local WHERE id_produto ={$value['id']} ")->fetch()['quantidade'];
                                $produto->update("id_produto=".$value['id'], [
                                    'quantidade' => intval($quantidade_produto) - intval($value['quantidade'])
                                ]);
                            }



                            if (isset($_SESSION["dados"])) {
                                unset($_SESSION["dados"]);
                            }
                            if (isset($_SESSION["cesto"])) {
                                unset($_SESSION["cesto"]);
                            }
                            $_SESSION['sucesso_venda'] = "<i class='icon-like'></i> Vendido com sucesso";
                            header("Location: ../../../view/public/home.php?opcao=2#btn");
                            exit;
                        }
                        exit;
                    } else if ($dados['formaPagamento'] == "Numeral") {
                        # cadastrar com troco
                        $troco = floatval($dados['valorPago']) - $total;
                        
                        $operador = new OperadorCaixa;
                        if ($operador->realizarVendaNumeral($produtos, $quantidade, $total, $_SESSION['id'],$troco, $dados['formaPagamento'])) {
                            $produto = new BancoDados("produto_local");
                            foreach ($_SESSION['cesto'] as $key => $value) {
                                $quantidade_produto = $produto->select("SELECT quantidade FROM produto_local WHERE id_produto ={$value['id']} ")->fetch()['quantidade'];
                                $produto->update("id_produto=".$value['id'], [
                                    'quantidade' => intval($quantidade_produto) - intval($value['quantidade'])
                                ]);
                            }



                            if (isset($_SESSION["dados"])) {
                                unset($_SESSION["dados"]);
                            }
                            if (isset($_SESSION["cesto"])) {
                                unset($_SESSION["cesto"]);
                            }
                            $_SESSION['sucesso_venda'] = "<p style='text-align:center;'><i class='icon-like'></i> Vendido com sucesso</p>
                            <p style='text-align:center;'>Troco: ".number_format($troco)." kz</p>";
                            header("Location: ../../../view/public/home.php?opcao=2#btn");
                            exit;
                        }
                        exit;
                    }
                } else {
                    $_SESSION["dados"] = $dados;
                    $_SESSION['erro_venda'] = "<i class='icon-warning'></i> Selecione a forma de pagamento";
                    header("Location: ../../../view/public/home.php?opcao=2#btn");
                    exit;
                }
            }
        } else {
            $_SESSION["dados"] = $dados;
            $_SESSION['erro_venda'] = "<i class='icon-warning'></i> Introduz o valor pago";
            header("Location: ../../../view/public/home.php?opcao=2#btn");
            exit;
        }
    }
} else {
    $_SESSION["dados"] = $dados;
    $_SESSION['erro_venda'] = "<i class='icon-warning'></i> Nenhum produto selecionado";
    header("Location: ../../../view/public/home.php?opcao=2#btn");
    exit;
}
