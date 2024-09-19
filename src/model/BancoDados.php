<?php

namespace App\Model;

use \PDOException;
use \PDO;
use PDOStatement;

/**
 * Esta classe permite fazer conexão e manipular as tabelas da base de dados
 * @author Dev. Juliano Soca Barros
 * @copyright 
 * @version 0.1 
 * @method insert
 * @method select 
 * @method update
 * @method delete 
 * @method execute
 * @var const  HOST
 * @var const NOME
 * @var const UTILIZADOR
 * @var const PALAVRA_PASSE
 * @var string $tabela
 * @var PDO $conexao
 */
class BancoDados
{
    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';
    /**
     * Nome do banco de dados
     * @var string
     */
    const NOME = 'eboa';

    /**
     * Utilizador do banco de dados
     * @var string
     */
    const UTILIZADOR = 'root';

    /**
     * Palavra passe do banco de dados
     * @var string
     */
    const PALAVRA_PASSE = '';

    /**
     * Nome da tabela a ser manipulada no banco de dados
     * @var string
     */
    private $tabela;
    /**
     * Instância da conexão com o banco de dados
     * @var PDO
     */
    private $conexao;
/**
 * Este método retorna a instância da conexão PDO
 */
    public function getConexao(){
       return $this->conexao;
    }


    /**
     * Define a tabela, instância e conexão 
     * @var PDO
     * @param string $tabela
     */
    public function __construct($tabela)
    {
        $this->tabela = $tabela;
        $this->setConexao();
    }
  
    /**
     * Método responsável por criar uma conexão com o banco de dados 
     */
    public function setConexao()
    {
        try {
            $this->conexao = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NOME, self::UTILIZADOR, self::PALAVRA_PASSE);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('ERRO :' . $e->getMessage());
        }
    }
    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    private function execute($query, $params = [])
    {
       try{
            $statement = $this->conexao->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (\PDOException $e) {
            die('ERRO'.$e->getMessage());
        }
    }

    /**
     * Método responsável por inserir dados no banco de dados
     * @param array $valores [campo => valor]
     * @return integer ID inserido
     */
    public function insert($valores)
    {
        #dados da query
        $campos = array_keys($valores);
        $binds = array_pad([], count($campos), "?");

        #Montar query
        $query  = 'INSERT INTO '.$this->tabela.'(' . implode(',', $campos) . ') VALUES(' . implode(',', $binds) . ')';
        
        $this->execute($query, array_values($valores));
        
        return $this-> conexao -> lastInsertId();
    }

    /**
     * Método responsável por realizar consultas no banco de dados
     *@param string $query
     *@return PDOStatement 
     */
    public function select($query){

        return $this->execute($query);
    }

    /**
     * Método reponsável por actualizar dados em tabelas dentro do banco de dados 
     * @param string $onde
     * @param array $valores [campo => valor]
     * @return boolean    
     */
    public function update($onde, $valores) 
    {
        //Dados da query
        $campos = array_keys($valores);
        
        #Montar query
        $query = "UPDATE $this->tabela SET ".implode('=?,',$campos)."=? WHERE $onde";
        
        #executar query
        $this -> execute($query, array_values($valores));
         
        return true;
    }
    
    /**
     * Método responsável por eliminar registro dentro do banco de dados
     * @param string $onde
     * @return boolean
     */
    public function delete($onde)
    {
        #Montar query
        $query = "DELETE FROM $this->tabela WHERE $onde";
        
        $this -> execute($query);
        return true;
    }
}//Fim classe   