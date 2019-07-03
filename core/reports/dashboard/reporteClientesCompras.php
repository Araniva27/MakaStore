<?php
require('reportePrueba.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/sales.php');
    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    //Las medidas en mm de una pagina tamaño carta son 216 x 279 medidas que se definen a continuacion
    $pdf = new PDF('P','mm', 'Letter');
    $ventas = new Sales();
    $pdf->head('Reporte de compras por cliente');
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(21, 67, 96);
    $pdf->SetFont('Arial','I',12);    
    $pdf->Ln(0);        
    $data = $ventas->getCustomerSales();
    $pdf->SetFont('Arial','B',12);
    $pdf->setTextColor(255,255,255);
    $pdf->Cell(95,8, utf8_decode('Cliente'),1 , 0, 'C', true);
    $pdf->Cell(95,8, utf8_decode('Compras realizadas'),1 , 0, 'C', true);                   
    $pdf->Ln();                       
    foreach($data as $index){                           

        $pdf->setTextColor(0,0,0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(95,8, utf8_decode($index['CN'].' '.$index['CA']),1 , 0, 'C');
        $pdf->Cell(95,8, utf8_decode($index['compras']),1 , 0, 'C');
       /*  $pdf->Cell(17,10, utf8_decode($index['precioU']),1 , 0, 'C');
        $pdf->Cell(22,10, utf8_decode($index['cantidad']),1 , 0, 'C');        
        $pdf->Cell(60,10, utf8_decode($index['clienteN'].' '.$index['clienteA']),1 , 0, 'C');     */                   
        $pdf->Ln();        
        
    }    
    $pdf->SetFont('Arial','B',18);      
    $pdf->Output();
?>