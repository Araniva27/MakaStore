<?php
require('reportePrueba.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/sales.php');
    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $ventas = new Sales();
    $pdf->head('Reporte de ventas');
    $pdf->SetFont('Times','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(91,143,247);
    $pdf->SetFont('Arial','I',12);
    $fecha = '';
    $pdf->Ln(0);
    $suma = 0;    
    $data = $ventas->getSalesReport();
    foreach($data as $index){
        if($index['fecha'] != $fecha){
            $pdf->Ln();
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','I',17);
            $pdf->Cell(100,10, utf8_decode($index['fecha']),1 , 0, 'C', true);
            $pdf->Ln(16);
            $pdf->SetFont('Arial','I',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(68,10, utf8_decode('Producto'),1 , 0, 'C', true);
            $pdf->Cell(17,10, utf8_decode('C/U'),1 , 0, 'C', true);
            $pdf->Cell(22,10, utf8_decode('Cantidad'),1 , 0, 'C', true);
            $pdf->Cell(60,10, utf8_decode('Cliente'),1 , 0, 'C', true);
            $pdf->Cell(25,10, utf8_decode('Total $'),1 , 0, 'C', true);            
            $pdf->Ln(10);            
            /* $sumaF+= $index['total']; */
            $fecha = $index['fecha'];
        }        
        $pdf->setTextColor(0,0,0);
        $pdf->Cell(68,10, utf8_decode($index['producto']),1 , 0, 'C');
        $pdf->Cell(17,10, utf8_decode($index['precioU']),1 , 0, 'C');
        $pdf->Cell(22,10, utf8_decode($index['cantidad']),1 , 0, 'C');        
        $pdf->Cell(60,10, utf8_decode($index['clienteN'].' '.$index['clienteA']),1 , 0, 'C');   
        $pdf->Cell(25,10, utf8_decode($index['total']),1 , 0, 'C');          
        $suma += $index['total'];
        $pdf->Ln();        
        
    }    
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(190,20, utf8_decode('Total $:'.$suma),0 , 0, 'R', false); 
    $pdf->Output();
?>
