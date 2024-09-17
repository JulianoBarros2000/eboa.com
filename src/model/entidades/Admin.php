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
use App\model\entidades\Funcionario;
use \PDO;



class Admin extends Funcionario
{
    /**
     * Identificador único do Administrador 
     * @var integer 
     */
    public $id_admin;

    /**
     * Get identificador único do Administrador
     *
     * @return  integer
     */
    public function getId_admin()
    {
        return $this->id_admin;
    }

    /**
     * Set identificador único do Administrador
     *
     * @param  integer  $id_admin  Identificador único do Administrador
     *
     * @return  self
     */
    public function setId_admin($id_admin)
    {
        $this->id_admin = $id_admin;

        return $this;
    }

    /**
     * Este método permite cadastrar clientes no banco de dados
     * @param array $paramsCliente [campo => valor]
     * @param array $paramsCLienteMorada [campo => valor]
     * @param array $paramsClienteContactos [campo => valor]
     * @return boolean 
     */
    public function cadastrarCliente($paramsCliente = [], $paramsClienteMorada = [], $paramsClienteContactos = [])
    { 
          $conn = new BancoDados("morada");
        $id_morada = $conn->insert($paramsClienteMorada);
           
           
        
        $conn = new BancoDados("contactos");
        $id_contacto = $conn->insert($paramsClienteContactos);
        

        $conn = new BancoDados("cliente_sistema");
 
        array_keys($paramsCliente, "id_morada");
        $paramsCliente['id_morada'] = $id_morada;

        array_keys($paramsCliente, "id_contacto");
        $paramsCliente['id_contacto'] = $id_contacto;

       

        $conn->insert($paramsCliente);

        return true;
    }
    /**
     * Este método permite cadastrar funcionários no banco de dados
     * @param array $paramsFuncionario [campo => valor]
     * @param array $paramsFuncionarioMorada [campo => valor]
     * @param array $paramsFuncionarioContactos [campo => valor]
     * @return boolean 
     */
    public function cadastrarFuncionario($paramsFuncionario = [], $paramsFuncionarioMorada = [], $paramsFuncionarioContactos = [])
    {
    
        $conn = new BancoDados("morada");
        $id_morada = $conn->insert($paramsFuncionarioMorada);

        

        $conn = new BancoDados("contactos");
        $id_contacto = $conn->insert($paramsFuncionarioContactos);

        $conn = new BancoDados("funcionario");

        array_keys($paramsFuncionario, "id_contacto");
        $paramsFuncionario['id_contacto'] = $id_contacto;

        array_keys($paramsFuncionario, "id_morada");
        $paramsFuncionario['id_morada'] = $id_morada;

        $conn->insert($paramsFuncionario);

        return true;
    }

    /**
     * Este método permite actualizar os dados na base de dados
     * @param array $dados_funcionario [campo =>valor]
     * @param array $dados_funcionario_contactos [campo =>valor]
     * @param array $dados_funcionario_morada [campo =>valor]
     * @param integer $id_funcionario
     * @return boolean
     */
    public function editarCliente($query)
    {
        //Actualiza os contactos
        $banco = new BancoDados('contactos');
        $edit = $banco->getConexao()->prepare($query);
        return $edit->execute();

    }
    /**
     * Este método permite actualizar os dados na base de dados
     * @param array $dados_funcionario [campo =>valor]
     * @param array $dados_funcionario_contactos [campo =>valor]
     * @param array $dados_funcionario_morada [campo =>valor]
     * @param integer $id_funcionario
     * @return boolean
     */
    public function editarFuncionario($query)
    {
        //Actualiza os contactos
        $banco = new BancoDados('contactos');
        $edit = $banco->getConexao()->prepare($query);
        return $edit->execute();

    }

    /*
     * Este método serve para listar Funcionarios
     * @param string $query
     * @return array
     */
    public function listarFuncionario($query)
    {

        $banco = new BancoDados("funcionario");

        $result = $banco->select($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    /*
     * Este método serve para listar Encomendas
     * @param string $query
     * @return array
     */
    public function listarEncomenda($query)
    {

        $banco = new BancoDados("encomenda");

        $result = $banco->select($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    /*
     * Este método serve para listar os clientes cadastrados no  sistema
     * @param string $query
     * @return array
     */
    public function listarCliente($query)
    {

        $banco = new BancoDados("cliente_sistema");

        $result = $banco->select($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Este método permite eleminar dados da base de dados
     * @param integer $id
     * @param string $tabela
     * @return boolean
     */
    public function eliminarRegistro($id, $tabela)
    {
        $registro = new BancoDados($tabela);
        return $registro->delete($id);
    }

    /**
     * Este método permite eleminar Funcionários
     * @param string $query
     * @return boolean
     */
    public function eliminarFuncionario($query)
    {
        $banco = new BancoDados("funcionario");
        $rest = $banco->getConexao()->prepare($query);
        return $rest->execute();
    }
    /**
     * Este método permite eleminar Clientes
     * @param string $query
     * @return boolean
     */
    public function eliminarCliente($query)
    {
        $banco = new BancoDados("cliente_sistema");
        $rest = $banco->getConexao()->prepare($query);
        return $rest->execute();
    }
}
