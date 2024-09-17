<?php

 require_once __DIR__ . "/../../../vendor/autoload.php";

use App\model\entidades\Admin;
use Dompdf\Dompdf;
use Dompdf\Options;

$op = new Options();
$op->set('chroot', realpath(""));
$op->setIsRemoteEnabled(true);
$relatorioFuncionario = new Dompdf($op);



$file = '';
$file .= '<!DOCTYPE html>';
$file .= '<html lang="en">';
$file .= '<head>';
$file .= '<meta charset="UTF-8">';
$file .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
$file .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$file .= '<link rel="stylesheet" type ="text/css " href="http://localhost/eboa.com/view/assets/css/relatorio.css" ">';
$file .= '<title>Document</title>';
$file .= '</head>';
$file .= '<body>';
$file .= '<header class ="cab">';
$file .= '<div class ="quadrado">';
$file .= '<div></div>';
$file .= '<div></div>';
$file .= '</div>';
$file .= '<div class ="info"><h3>Restaurante eboa</h3><h4>Email:eboa@gmail.com</h4><h4>Telefone:+244 938 696 815</h4><h4 class="data">Data  de processamento: '.date("d/m/Y H:m:s").'</h4></div>';
$file .= '<div class ="logo"><img src="eboa.jpeg"></div>';
$file .= '</header>';
$file .= '<span class ="titulo">Lista nominal dos Funcionários</span>';
$file .= '<table>';
$file .= '<thead>
<tr>
<th>Nome</th>
<th>Cargo</th>
<th>Salário</th>
<th>Telefone</th>
</tr>
</thead><tbody>';

  $admin = new Admin();
$funcionarios = $admin->listarFuncionario("SELECT * FROM funcionario f inner join contactos c on f.id_contacto = c.id_contactos");
foreach ($funcionarios as  $funcionario) {
    extract($funcionario);
   $file.= '<tr>';
   $file.= '<td>'.ucwords($nome).'</td>';
   $file.= '<td>'.$cargo.'</td>';
   $file.= '<td>'.$salario.'</td>';
 
   $file.= '<td>'.number_format($telemovel,3,""," ").'</td>';

   $file.= '</tr>';
    
}
$file .= '</tbody></table>';
$file .= '</body>';
$file .= '</html>';

$relatorioFuncionario->loadHtml($file);

$relatorioFuncionario->setPaper("A4", "portrait");

$relatorioFuncionario->render();

/*  header('content-type: application/pdf'); */

$relatorioFuncionario->stream("relatoriofuncionarios".strtotime(date("d-m-y h:m:s")), array("Attachment" => false));




