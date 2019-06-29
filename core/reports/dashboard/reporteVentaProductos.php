<?php
require('reportePrueba.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/products.php');

    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    //Las medidas en mm de una pagina tamaño carta son 216 x 279 medidas que se definen a continuacion
    $pdf = new PDF('P','mm', array(216,279));
    $productos = new Productos();
    $pdf->head('Reporte de venta por productos');
    $pdf->SetFont('Times','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(91,143,247);
    $pdf->SetFont('Arial','I',12);   
    $pdf->setX(35); 
    $pdf->Cell(70,10, utf8_decode('Producto'),1 , 0, 'C', true);
    $pdf->Cell(40,10, utf8_decode('Unidades vendidas'),1 , 0, 'C', true);
    $pdf->Cell(25,10, utf8_decode('Total $'),1 , 0, 'C', true);    
    $pdf->Ln(10);
    $suma = 0;
    $data = $productos->getVentasProducto(); 

    foreach($data as $index){
        $pdf->setTextColor(0,0,0);
        $pdf->setX(35);
        $pdf->Cell(70,10, utf8_decode($index['producto']),1 , 0, 'C');
        $pdf->Cell(40,10, utf8_decode($index['Suma']),1 , 0, 'C');
        $pdf->Cell(25,10, utf8_decode($index['total']),1 , 0, 'C');
        $suma += $index['total'];
        $pdf->Ln();
    }
   $pdf->setX(70);
   $pdf->SetFont('Arial','B',15);   
   $pdf->Cell(100,10, utf8_decode('Total $:'.$suma),0 , 0, 'R');
   $pdf->Output();
?>