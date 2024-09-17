
<?php
 if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
require_once __DIR__ . "/../../../vendor/autoload.php";
if (!isset($_SESSION)) {
    session_start();
}
/* if (!isset($_SESSION['user'])) {
    header("Location: ../../../index.php?status=blockaccess");
}
 */

use App\controller\Mensagem;
use App\controller\process\ValidarFormulario;
use App\model\entidades\MateriaPrima;
use App\model\entidades\Produto;

/* Carregamento dos dados nos campos do formulãrio */

if (isset($_GET['prod'])) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $foto = $_FILES;
    extract($foto);

    echo "<pre>";


    array_map("trim", $dados); //Remove todos espaços em cada chave do array $stock 
    $mensagem = new Mensagem;

    /* Valida se todos os campos estão prenchidos */
    if (in_array("", $dados) || in_array("", $foto)) {

        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o os campos!");
        $mensagem->showError("erro_em_borda", "");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    extract($dados);

    $validar = new ValidarFormulario;

    if ($validar->temCaracteresEspeciais($nome)) {
        $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if ($validar->verificarTamanho($nome, 20)) {
        $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if ($validar->temNumero($nome)) {
        $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas letras");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }


    if ($validar->temCaracteresEspeciais($fornecedor)) {
        $mensagem->showError("fornecedor_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o ultimo nome!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if ($validar->verificarTamanho($fornecedor, 20)) {
        $mensagem->showError("fornecedor_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o fornecedor!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }

    if ($validar->temCaracteresEspeciais($preco)) {
        $mensagem->showError("preco_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o preço!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if ($validar->verificarTamanho($tp_produto, 20)) {
        $mensagem->showError("tp_produto_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique Tipo de produto!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if ($validar->temCaracteresEspeciais($quantidade)) {
        $mensagem->showError("quantidade_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a quantidade!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if ($validar->verificarTamanho($quantidade, 50)) {
        $mensagem->showError("quantidade_erro", "<i class='icon-warning'></i> Apenas 50 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a quantidade!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if ($validar->verificarTamanho($preco, 20)) {
        $mensagem->showError("preco_erro", "<i class='icon-warning'></i> Apenas 30 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o preço!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }

    if ($validar->verificarTamanho($descricao, 100)) {
        $mensagem->showError("descricao_erro", "<i class='icon-warning'></i> Apenas 60 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a descrição!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }


    if ($validar->temLetra($preco)) {
        $mensagem->showError("preco_erro", "<i class='icon-warning'></i> Apenas números 0 1 2 3 4 5 6 7 8 9");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique oo preço!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }


    if (!$validar->verificarValidade($data)) {
        $mensagem->showError("data_erro", "<i class='icon-warning'></i> Data não pode ser inferior a data actual");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a data!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }


    /* ==============================Cadastro de produto=============================== */
    $produto = new Produto;
    /* ================================Cadastro no stock web================================== */
    if ($foto['type'] == "image/jpeg") {
        $foto['name'] = $nome . ".jpeg";
    } else
if ($foto['type'] == "image/jpg") {
        $foto['name'] = $nome . ".jpg";
    } else if ($foto['type'] == "image/png") {
        $foto['name'] = $nome . ".png";
    } else {
        $mensagem->showError("foto_erro", "<i class='icon-warning'></i> Extenção .jpeg .jpg .png");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a o tipo de imagem!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
        exit;
    }
    if (strtolower($stock) == "stock website") {
        $registo = $produto->listarProduto("SELECT nome,codigo_barra FROM produto_web WHERE nome='$nome' AND codigo_barra='$codigo'", 'produto_web');

        if (empty($registo)) {
            $produto = new Produto;
            if ($produto->cadastrarProduto([
                'nome' => strtolower($nome),
                'codigo_barra' => strtolower($codigo),
                'quantidade' => strtolower($quantidade),
                'data_validade' => $data,
                'preco' => strtolower($preco),
                'tipo' => strtolower($tp_produto),
                'foto' => $foto['name'],
                'estado' => strtolower($estado),
                'fornecedor' => strtolower($fornecedor),
                'descricao' => strtolower($descricao)
            ], "produto_web")) {
                if (move_uploaded_file($foto['tmp_name'], "../../../view/assets/img/produtos/{$foto['name']}")) {
                    $mensagem->showSuccess("geral_success", "<i class='icon-like'></i> Produto Cadastrado no stock do WebSite com sucesso");
                    header("Location: ../../../view/public/home.php?opcao=5");
                    exit;
                }
            }
        } else {
            $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Produto já existe!");
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
            exit;
        }
        /* ==========================Cadastro no stock local================================================ */
    } else if (strtolower($stock) == "stock local") {

        $registo = $produto->listarProduto("SELECT nome,codigo_barra FROM produto_local WHERE nome='$nome' AND codigo_barra='$codigo'", 'produto_local');

        if (empty($registo)) {
            $produto = new Produto;
            if ($produto->cadastrarProduto([
                'nome' => strtolower($nome),
                'codigo_barra' => strtolower($codigo),
                'quantidade' => strtolower($quantidade),
                'data_validade' => $data,
                'preco' => strtolower($preco),
                'tipo' => strtolower($tp_produto),
                'foto' => $foto['name'],
                'estado' => strtolower($estado),
                'fornecedor' => strtolower($fornecedor),
                'descricao' => strtolower($descricao)
            ], "produto_local")) {
                if (move_uploaded_file($foto['tmp_name'], "../../../view/assets/img/produtos/{$foto['name']}")) {
                    $mensagem->showSuccess("geral_success", "<i class='icon-like'></i> Produto Cadastrado no stock local com sucesso");
                    header("Location: ../../../view/public/home.php?opcao=5");
                    exit;
                }
            }
        } else {
            $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Produto já existe!");
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
            exit;
        }
    }
} else if (isset($_GET['prod'])) {

    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=5.1&art=art1");
    exit;
}

if (isset($_GET['mat'])) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $foto = $_FILES;
    extract($foto);

    echo "<pre>";


    array_map("trim", $dados); //Remove todos espaços em cada chave do array $stock 
    $mensagem = new Mensagem;

    /* Valida se todos os campos estão prenchidos */
    if (in_array("", $dados) || in_array("", $foto)) {

        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o os campos!");
        $mensagem->showError("erro_em_borda", "");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    extract($dados);

    $validar = new ValidarFormulario;

    if ($validar->temCaracteresEspeciais($nome)) {
        $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    if ($validar->verificarTamanho($nome, 20)) {
        $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    if ($validar->temNumero($nome)) {
        $mensagem->showError("nome_erro", "<i class='icon-warning'></i> Apenas letras");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o nome");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }


    if ($validar->temCaracteresEspeciais($fornecedor)) {
        $mensagem->showError("fornecedor_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o ultimo nome!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    if ($validar->verificarTamanho($fornecedor, 20)) {
        $mensagem->showError("fornecedor_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o fornecedor!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }

    if ($validar->temCaracteresEspeciais($preco)) {
        $mensagem->showError("preco_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o preço!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    if ($validar->verificarTamanho($tp_produto, 20)) {
        $mensagem->showError("tp_produto_erro", "<i class='icon-warning'></i> Apenas 20 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique Tipo de produto!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    if ($validar->temCaracteresEspeciais($quantidade)) {
        $mensagem->showError("quantidade_erro", "<i class='icon-warning'></i> Sem Caracteres Especiais (!#,%,&,(),-,+...)");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a quantidade!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    if ($validar->verificarTamanho($quantidade, 50)) {
        $mensagem->showError("quantidade_erro", "<i class='icon-warning'></i> Apenas 50 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a quantidade!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
    if ($validar->verificarTamanho($preco, 20)) {
        $mensagem->showError("preco_erro", "<i class='icon-warning'></i> Apenas 30 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique o preço!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }

    if ($validar->verificarTamanho($descricao, 100)) {
        $mensagem->showError("descricao_erro", "<i class='icon-warning'></i> Apenas 60 dígitos");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a descrição!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }


    if ($validar->temLetra($preco)) {
        $mensagem->showError("preco_erro", "<i class='icon-warning'></i> Apenas números 0 1 2 3 4 5 6 7 8 9");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique oo preço!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }


    if (!$validar->verificarValidade($data)) {
        $mensagem->showError("data_erro", "<i class='icon-warning'></i> Data não pode ser inferior a data actual");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a data!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }


    /* ==============================Cadastro de Matéria Prima=============================== */
    $materia = new MateriaPrima;
    
    if ($foto['type'] == "image/jpeg") {
        $foto['name'] = $nome . ".jpeg";
    } else
if ($foto['type'] == "image/jpg") {
        $foto['name'] = $nome . ".jpg";
    } else if ($foto['type'] == "image/png") {
        $foto['name'] = $nome . ".png";
    } else {
        $mensagem->showError("foto_erro", "<i class='icon-warning'></i> Extenção .jpeg .jpg .png");
        $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Verifique a o tipo de imagem!");
        $_SESSION['campos'] = $dados;
        header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
        exit;
    }
      
        $registo = $materia->listarMateria("SELECT nome,codigo_barra FROM materiaprima WHERE nome='$nome' AND codigo_barra='$codigo'", 'materiaprima');

        if (empty($registo)) {
            
            if ($materia->cadastrarMateria([
                'nome' => strtolower($nome),
                'codigo_barra' => strtolower($codigo),
                'quantidade' => strtolower($quantidade),
                'data_validade' => $data,
                'preco' => strtolower($preco),
                'tipo' => strtolower($tp_produto),
                'foto' => $foto['name'],
                'estado' => strtolower($estado),
                'fornecedor' => strtolower($fornecedor),
                'descricao' => strtolower($descricao)
            ], "produto_local")) {
                if (move_uploaded_file($foto['tmp_name'], "../../../view/assets/img/materiasprima/{$foto['name']}")) {
                    $mensagem->showSuccess("geral_success", "<i class='icon-like'></i> Material cadastrado com sucesso");
                    header("Location: ../../../view/public/home.php?opcao=5");
                    exit;
                }
            }
        } else {
            $mensagem->showError("geral_erro", "<i class='icon-warning'></i> Material já existe!");
            $_SESSION['campos'] = $dados;
            header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
            exit;
        }
    
} else if (isset($_GET['prod'])) {

    $_SESSION['campos'] = $dados;
    header("Location: ../../../view/public/home.php?opcao=5.1&art=art2");
    exit;
}
