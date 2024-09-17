<?php

namespace App\controller\process;
if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
/** 
 * Esta classe serve para validar os campos do formulário
 * @author : Dev. Juliano Barros
 * @version : 0.1
 * @var array $dadosForm [campo => valor]
*/

class ValidarFormulario
{
    /** 
     * Este método permite verificar o campo se está vazio
     * @param string $string
     * 
    */
public function estavazio($string){
        trim($string);
        if(strlen($string) <= 0 ){
            return true;
        }else{
        return false;
        }
}
    /** 
     * verifica se contem caracteres especiais
     * @param string $string
     * @return boolean
    */
public function temCaracteresEspeciais($string){
        if(substr_count($string,'/') > 0 || substr_count($string,'&')> 0 || substr_count($string,'@')> 0 || substr_count($string,'$')> 0|| substr_count($string,'#') > 0 || substr_count($string,'%') > 0 || substr_count($string,'<') > 0 || substr_count($string,'>') > 0 || substr_count($string,'*') > 0|| substr_count($string,'-')> 0 || substr_count($string,'+') > 0 || substr_count($string,'.') > 0 || substr_count($string,',') > 0 || substr_count($string,'""') > 0 || substr_count($string,'_') > 0){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica se contem letras alfabéticas
     * @param string $string
     * @return boolean
    */
public function temNumero($string){
       strtolower($string);
        if(substr_count($string,'0') > 0 || substr_count($string,'1')> 0 || substr_count($string,'2')> 0 || substr_count($string,'3')> 0|| substr_count($string,'4') > 0 || substr_count($string,'5') > 0 || substr_count($string,'6') > 0 || substr_count($string,'7') > 0 || substr_count($string,'8') > 0|| substr_count($string,'9')> 0){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica se contem letras alfabéticas
     * @param string $string
     * @return boolean
    */
public function temLetra($string){
       strtolower($string);
        if(substr_count($string,'a') > 0 || substr_count($string,'b')> 0 || substr_count($string,'c')> 0 || substr_count($string,'d')> 0|| substr_count($string,'f') > 0 || substr_count($string,'g') > 0 || substr_count($string,'h') > 0 || substr_count($string,'i') > 0 || substr_count($string,'j') > 0|| substr_count($string,'k')> 0 || substr_count($string,'l') > 0 || substr_count($string,'m') > 0 || substr_count($string,'n') > 0 || substr_count($string,'o') > 0 || substr_count($string,'p') > 0|| substr_count($string,'q') > 0|| substr_count($string,'r') > 0|| substr_count($string,'s') > 0|| substr_count($string,'t') > 0|| substr_count($string,'u') > 0|| substr_count($string,'v') > 0|| substr_count($string,'x') > 0|| substr_count($string,'w') > 0|| substr_count($string,'x') > 0|| substr_count($string,'y') > 0|| substr_count($string,'z') > 0){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica se o tamanho é ou não é superior ao tamanho indicado
     * @param string $string
     * @param integer $tamanho
     * @return boolean
     * 
    */
public function verificarTamanho($string,$tamanho){
        if(strlen($string) > $tamanho){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica se o tamanho é ou não é superior ao tamanho indicado
     * @param string $string
     * @param integer $tamanho
     * @return boolean
     * 
    */
public function verificarTamanhoContacto($string,$min,$max){
        if(strlen($string) > $max || strlen($string) < $min){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica se o email é valido
     * @param string $string
     * @return boolean
     * 
    */
public function verificarEmail($string){
        if(filter_var($string,FILTER_VALIDATE_EMAIL)){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica se a data de nascimento é válida
     * @param string $data
     * @return boolean
     * 
    */
public function verificarDataNascimento($data){
    $data_v = strtotime($data);
    $actual_v = strtotime(date("y-12-31"));
        if($data_v > $actual_v){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica se a data de entrega é válida
     * @param string $data
     * @return boolean
     * 
    */
public function verificarDataEntrega($data){
    $data = strtotime($data);
    $actual = strtotime(date("y-12-31"));
        if($data < $actual){
            return true;
        }else {
            return false;
        }
}
    /** 
     * verifica da data validade
     * @param string $data
     * @return boolean
     * 
    */
public function verificarValidade($data){
    $data_v = strtotime($data);
    $actual_v = strtotime(date("y-m-d"));
        if($data_v > $actual_v){
            return true;
        }else {
            return false;
        }
}

    /**
     * Este é o metodo construtor que recebe os dados de login
     * @param array $dadosForm [campo => valor]
     * @return void
     */

    public function validarLogin($btn, $user, $pass){

  
        if (empty($btn)) {
            return false;
            die;
            }

        else{
            if(empty($user) || empty($pass)){
                return false;
        }else{
                return true;
            }
    }
  }
}