<?php

require 'dompdf/vendor/autoload.php'; // Certifique-se de incluir o autoload do Dompdf



use Dompdf\Dompdf;
use Dompdf\Options;

// Criar uma instância do Dompdf
$options = new Options();

$dompdf = new Dompdf($options);

// Carregar o conteúdo HTML gerado por conteudo_gerado.php
$html ="<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8'>
    
  </head>
  <body>
  <div>
  <table class='table table-bordered table-striped'>
  <thead>
      <tr>
          <th scope='col'>ID </th>
          <th scope='col'>Projeto</th>
          <th scope='col'>GERENTE</th>
          <th scope='col'>DATA DE ENTREGA:</th>
      </tr>
  </thead>
  <tbody>
          <tr>;
          <td> 2 </td>;
          <td> 3 </td>;
          <td> 4 </td>;
          <td> 5 </td>;
          </tr>;
      
  </tbody>
  </table>
  </div>  </body>
</html>"; 


// Carregar o HTML no Dompdf
$dompdf->loadHtml($html);

// Definir o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderizar o PDF
$dompdf->render();

// Exibir o PDF ou salvá-lo em um arquivo
$dompdf->stream('documento.pdf');