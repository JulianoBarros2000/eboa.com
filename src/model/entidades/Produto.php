<?php

namespace App\model\entidades;
if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
use App\Model\BancoDados;
use \PDO;

class Produto
{
  




    /**
     * Este método serve para cadastrar o produto
     * @param array $camposProdutos [campo => volor]
     * @param string $tabela
     * @return boolean
     */
    public function cadastrarProduto($camposProdutos,$tabela){

        $banco = new BancoDados($tabela);
        $banco->insert($camposProdutos);

        return true;

    }
    /**
     * Este método serve para eliminar o produto
     * @param array $id_produto
     * @param string $tabela
     * @return boolean
     */
    public function eliminarProduto($id_produto,$tabela){

        $banco = new BancoDados($tabela);
        $banco->delete($id_produto);

        return true;

    }
    /**
     * Este método serve para listar produtos
     * @param string $query
     * @return array
     */
    public function listarProduto($query,$tabela){

        $banco = new BancoDados($tabela);
        
        $result = $banco->select($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }
}
