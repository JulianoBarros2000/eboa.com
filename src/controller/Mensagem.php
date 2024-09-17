<?php

namespace App\controller;

if(!isset($_SESSION)){
   session_start();
   }
   
   if(!isset($_SESSION['user'])){
       header("Location: ../../view/public/index.php");
    exit;
   }

class Mensagem
{


/**
 * Este Método permite criar uma mensagem de erro usando sessões
 * @param string $sessao
 * @param string $texto
 */
    public function showError($sessao,$texto)
    {
       if(!isset($_SESSION)){
            session_start();
       }
       $_SESSION[$sessao] = $texto;
    }
/**
 * Este Método permite criar uma mensagem de sucesso usando sessões
 * @param string $sessao
 * @param string $texto
 */
    public function showSuccess($sessao,$texto)
    {
       if(!isset($_SESSION)){
            session_start();
       }
       $_SESSION[$sessao] = $texto;
    }
}
