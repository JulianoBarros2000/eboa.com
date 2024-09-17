<?php

namespace App\model\entidades;
if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
require_once __DIR__."/../../../vendor/autoload.php";
use App\Model\BancoDados;
use App\model\entidades\Funcionario;
use PDO;
use PDOStatement;

class OperadorCaixa extends Funcionario
{
    /**
     * Identificador do Operador de caixa
     * @var integer
     */
    private $id_operador;

    /**
     * Get identificador do Operador de caixa
     *
     * @return  integer
     */
    public function getId_operador()
    {
        return $this->id_operador;
    }

    /**
     * Set identificador do Operador de caixa
     *
     * @param  integer  $id_operador  Identificador do Operador de caixa
     *
     * @return  self
     */
    public function setId_operador($id_operador)
    {
        $this->id_operador = $id_operador;

        return $this;
    }

    /**
     * Função que possibilita ao operador de caixa  a realizar venda
     * @param array $produtos [campo =>valor]
     * @param array $quantidade [campo =>valor]
     * @param float $total
     * @param string $operador 
     * @param date $data date("Y-m-d H:m:s") 
     * @return boolean
     */
    public function realizarVenda($produtos, $quantidade, $total, $operador, $modo)
    {
        $venda = new BancoDados("vendas");
        $venda->insert([
            "operador" => $operador,
            "produtos" => $produtos,
            "quantidade" => $quantidade,
            "total" => $total,
            "modo_pagamento" => $modo,

        ]);
      
        return true;
    }
    public function realizarVendaNumeral($produtos, $quantidade, $total, $operador, $troco, $modo)
    {
        $venda = new BancoDados("vendas");
        $venda->insert([
            "operador" => $operador,
            "produtos" => $produtos,
            "quantidade" => $quantidade,
            "total" => $total,
            "modo_pagamento" => $modo,
            "troco" => $troco
        ]);
    
        return true;
    }
 
 /**
  * Este método permite listar vendas feitas registradas na base de dados
  * @param $query
  * @return PDOStatement
  */
     public function listarVendas($query){
        $banco = new BancoDados("vendas");
        return $banco->select($query)->fetchAll(PDO::FETCH_ASSOC);
     }
}
