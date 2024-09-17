<?php

namespace App\controller;
if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
class Upload
{

/**
 * Método responsável por verificar  extensão válida
 * @param string $extensao1
 * @param string $extensao2
 * @param string $arquivo
 * @return boolean
 */

    public function verificarExtencao($arquivo,$extensao1,$extensao2){
                if($arquivo['type'] == "image/$extensao1" || $arquivo['type'] == "image/$extensao2"){
                        return true;
                }else{
                    return false;
                }
    }
/**
 * Método responsável por verificar  o tamanho do arquivo
 * @param string $arquivo
 * @param string $tamanho
 * @return boolean
 */
    public function verificarTamanho($arquivo,$tamanho){
                if($arquivo['size'] < $tamanho){
                        return true;
                }else{
                    return false;
                }
    }

    /**
     * Este método perminte fazer o upload do arquivo
     *@param string $arquivo
     *@param string $tamanho - este é o tamanho pretendido
     *@param string $arquivo
     *@param string $extensao
     *@return boolean
     */
    public function mover($arquivo,$nome_entidade,$endereco){
            move_uploaded_file($arquivo["tmp_name"],$endereco.''.$arquivo["name"]);
        
            return $arquivo["name"];
        }



}
