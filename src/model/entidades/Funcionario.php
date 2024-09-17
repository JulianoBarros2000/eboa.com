<?php

namespace App\model\entidades;

use \PDO;
use \App\Model\BancoDados;

class Funcionario
{
    /**
     * Identificador do funcionário
     * @var integer
     */
    public $id_funcionario;
    /**
     * Nome do funcionário
     * @var string
     */
    protected $nome;
    /**
     * Senha do funcionário
     * @var string
     */
    protected $senha;
    /**
     * data de nascimento do funcionário
     * @var date
     */
    protected $data_nasc;
    /**
     * Sexo(genero) do funcionário
     * @var string
     */
    protected $sexo;
    /**
     * Estado de log do funcionário
     * @var boolean
     */
    protected $estado_log;
    /**
     * Foto perfil do funcionário
     * @var string
     */
    protected $foto_perfil;
    /**
     * Anexo(um documento tipo curriculum) do funcionário
     * @var string
     */
    protected $anexo;
    /**
     * A função ou categoria do funcionário
     * @var string
     */
    protected $funcao;
    /**
     * Salário do funcionário
     * @var float
     */
    protected $salario;


    /**
     * Get identificador do funcionário
     *
     * @return  integer
     */
    public function getId_funcionario()
    {
        return $this->id_funcionario;
    }

    /**
     * Set identificador do funcionário
     *
     * @param  integer  $id_funcionario  Identificador do funcionário
     *
     * @return  self
     */
    public function setId_funcionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;

        return $this;
    }

    /**
     * Get nome do funcionário
     *
     * @return  string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set nome do funcionário
     *
     * @param  string  $nome  Nome do funcionário
     *
     * @return  self
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get senha do funcionário
     *
     * @return  string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set senha do funcionário
     *
     * @param  string  $senha  Senha do funcionário
     *
     * @return  self
     */
    public function setSenha(string $senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get data de nascimento do funcionário
     *
     * @return  date
     */
    public function getData_nasc()
    {
        return $this->data_nasc;
    }

    /**
     * Set data de nascimento do funcionário
     *
     * @param  date  $data_nasc  data de nascimento do funcionário
     *
     * @return  self
     */
    public function setData_nasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;

        return $this;
    }

    /**
     * Get sexo(genero) do funcionário
     *
     * @return  string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set sexo(genero) do funcionário
     *
     * @param  string  $sexo  Sexo(genero) do funcionário
     *
     * @return  self
     */
    public function setSexo(string $sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get estado de log do funcionário
     *
     * @return  boolean
     */
    public function getEstado_log()
    {
        return $this->estado_log;
    }

    /**
     * Set estado de log do funcionário
     *
     * @param  boolean  $estado_log  Estado de log do funcionário
     *
     * @return  self
     */
    public function setEstado_log($estado_log)
    {
        $this->estado_log = $estado_log;

        return $this;
    }

    /**
     * Get foto perfil do funcionário
     *
     * @return  string
     */
    public function getFoto_perfil()
    {
        return $this->foto_perfil;
    }

    /**
     * Set foto perfil do funcionário
     *
     * @param  string  $foto_perfil  Foto perfil do funcionário
     *
     * @return  self
     */
    public function setFoto_perfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;

        return $this;
    }

    /**
     * Get anexo(um documento tipo curriculum) do funcionário
     *
     * @return  string
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * Set anexo(um documento tipo curriculum) do funcionário
     *
     * @param  string  $anexo  Anexo(um documento tipo curriculum) do funcionário
     *
     * @return  self
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;

        return $this;
    }

    /**
     * Get a função ou categoria do funcionário
     *
     * @return  string
     */
    public function getFuncao()
    {
        return $this->funcao;
    }

    /**
     * Set a função ou categoria do funcionário
     *
     * @param  string  $funcao  A função ou categoria do funcionário
     *
     * @return  self
     */
    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;

        return $this;
    }

    /**
     * Get salário do funcionário
     *
     * @return  float
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set salário do funcionário
     *
     * @param  float  $salario  Salário do funcionário
     *
     * @return  self
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Este Método permite logar ao sistema
     * @param boolean $estado_log
     * @return boolean
     */

    public function logarSistema($nome_param, $senha_param)
    {

        $conn = new PDO('mysql:host=localhost;dbname=eboa;', "root", "");
        $res = $conn->prepare("SELECT * FROM funcionario");
        $res->execute();
        $consult = $res->fetchAll(PDO::FETCH_ASSOC);

        foreach ($consult as  $funcionario) {
            extract($funcionario);
            if ($nome == $nome_param && password_verify($senha_param, $senha)) {
                //Iniciar uma sessão
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['id'] = $id_funcionario;
                $_SESSION['user'] = $nome;
                $_SESSION['funcao'] = strtolower($cargo);
                $_SESSION['foto'] = $foto_perfil;
                $_SESSION['data_nasc'] = $data_nasc;
                $_SESSION['sexo'] = $sexo;

                $base = new BancoDados('funcionario');
                $base->update("id_funcionario = " . $id_funcionario, ["estado_log" => 1]);
                return true;
            }
        }
    }

    /**
     * Este método permite terminar sessão no sistema
     * @param integer $id
     * @return boolean
     */
    public function terminarSessao($id)
    {
        $conn = new BancoDados("funcionario");
        $conn->update("id_funcionario=".$id, [
            "estado_log" => 0
        ]);

        //Terminar a global SESSION

        if (isset($_SESSION)) {
            session_unset();
            session_destroy();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Este método permite actualizar os dados na base de dados
     * @param array $dados_funcionario [campo =>valor]
     * @param array $dados_funcionario_contactos [campo =>valor]
     * @param array $dados_funcionario_morada [campo =>valor]
     * @param integer $id_funcionario
     * @return boolean
     */
    public function actualizarDados($id_funcionario, $dados_funcionario = [], $dados_funcionario_contactos = [], $dados_funcionario_morada = [])
    {
        //Actualiza os contactos
        $actualizar_contactos = new BancoDados('contactos');
        $actualizar_contactos->update($id_funcionario, $dados_funcionario_contactos);

        //Actualiza morada
        $actualizar_morada = new BancoDados('morada');
        $actualizar_morada->update($id_funcionario, $dados_funcionario_morada);

        //Actualiza funcionário
        $actualizar = new BancoDados('funcionario');
        $actualizar->update($id_funcionario, $dados_funcionario);

        return true;
    }
}
