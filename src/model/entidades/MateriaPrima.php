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


class MateriaPrima
{
    /**
     * Este método serve para cadastrar materia prima no banco de dados
     * @param array $camposMateriaPrima [campo => volor]
     * @return boolean
     */
    public function cadastrarMateria($camposMateriaPrima){

        $banco = new BancoDados("materiaprima");
        $banco->insert($camposMateriaPrima);

        return true;

    }

     /**
     * Este método serve para listar materia prima no banco de dados
     * @param string $query
     * @return array
     */
    public function listarMateria($query){

        $banco = new BancoDados("materiaprima");
         
        $result = $banco->select($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);


    }

        /**
     * Este método serve para eliminar o produto
     * @param array $id_produto
     * @param string $tabela
     * @return boolean
     */
    public function eliminarMateria($id_materiaprima,$tabela){

        $banco = new BancoDados($tabela);
        $banco->delete($id_materiaprima);

        return true;

    }
}