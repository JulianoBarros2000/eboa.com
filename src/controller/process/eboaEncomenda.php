<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use App\Model\BancoDados;

use Dompdf\Dompdf;
use Dompdf\Options;

if(isset($_GET['encomenda'])){

   $id = filter_input(INPUT_GET,'encomenda',FILTER_VALIDATE_INT);

 


$op = new Options();
$op->set('chroot', realpath(""));
$op->setIsRemoteEnabled(true);
$relatorioFuncionario = new Dompdf($op);



$file = '';
$file .= '<!DOCTYPE html>';
$file .= '<html lang="pt">';
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
$file .= '<span class ="titulo">Recibo de Entrega</span>';
$file .= '<table style="border:none !important;">';
$file .= '<thead>
<tr>
<th>Descrição</th>
<th>Quantidade</th>
<th>Montante</th>
</tr>
</thead><tbody>';

  $banco = new BancoDados("visitante");
  $pedidos = $banco -> select("SELECT * FROM visitante v join encomenda e on v.id_encomenda= e.id_encomenda WHERE id_visitante=10");
$total_view =0;

foreach ( $pedidos as   $pedido) {
    extract( $pedido);
   $file.= '<tr>';
   $file.= '<td style="text-align:left">'.ucwords($produtos).'</td>';
   $file.= '<td>'.$quantidade.'</td>';
   $file.= '<td>'.number_format(intval($total),2,",",".").' kz</td>';

$total_view =$total;
   $file.= '</tr>';
   
}
$file .= '<tr><td colspan="2">Obrigado por escolher o nosso restaurante</td><td colspan="1">SubTotal</td><td colspan="1">'.number_format(intval($total_view),2,",",".").' kz</td></tr>';
$file .= '</tbody></table>';
$file .= '</tbody></table>';
$file .= '</body>';
$file .= '</html>';

$relatorioFuncionario->loadHtml($file);

$relatorioFuncionario->setPaper("A4", "portrait");

$relatorioFuncionario->render();

/*  header('content-type: application/pdf'); */

$relatorioFuncionario->stream("eboaPedido".strtotime(date("d-m-y h:m:s")), array("Attachment" => false));




}