<?php
 if(!isset($_SESSION)){
    session_start();
    }
    
    if(!isset($_SESSION['user'])){
        header("Location: ../../../view/public/index.php");
     exit;
    }
 $array =[];
if(isset($_GET['id'])){

$id_produto = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);


array_push($array,$id_produto);
$_SESSION['cesto']['id_produto'] = $array;

header("Location:../../../view/public/home.php?opcao=2");

}
