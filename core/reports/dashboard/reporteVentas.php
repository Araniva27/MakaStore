<?php
require('reportePrueba.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/sales.php');
    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P', 'mm', 'Letter');
    $ventas = new Sales();
    $pdf->head('Reporte de ventas');
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(21, 67, 96);
    $pdf->SetFont('Arial','',12);
    $fecha = '';
    $pdf->Ln(0);
    $suma = 0;  
    $sumaF = 0;  
    $conta = 0;
    $data = $ventas->getSalesReport();
    foreach($data as $index){
        if($index['fecha'] != $fecha){
            if($conta != 0){
                $pdf->setFont('Arial', 'B', 12);
                $pdf->Cell(358,10, utf8_decode('Total($): '.$sumaF),0 , 0, 'C'); 
            }else{
                $conta++;
            }            
            $sumaF = 0;  
            $pdf->Ln();
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','B',17);
            $pdf->Cell(100,10, utf8_decode($index['fecha']),1 , 0, 'C', true);
            $pdf->Ln(16);
            $pdf->SetFont('Arial','I',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(60,8, utf8_decode('Producto'),1 , 0, 'C', true);
            $pdf->Cell(30,8, utf8_decode('Precio unitario'),1 , 0, 'C', true);
            $pdf->Cell(22,8, utf8_decode('Cantidad'),1 , 0, 'C', true);
            $pdf->Cell(60,8, utf8_decode('Cliente'),1 , 0, 'C', true);
            $pdf->Cell(25,8, utf8_decode('Subtotal $'),1 , 0, 'C', true);            
            $pdf->Ln(8);                         
            $fecha = $index['fecha'];
            
        }   
             
        $pdf->setTextColor(0,0,0);
        $pdf->Cell(60,10, utf8_decode($index['producto']),1 , 0, 'C');
        $pdf->Cell(30,10, utf8_decode($index['precioU']),1 , 0, 'C');
        $pdf->Cell(22,10, utf8_decode($index['cantidad']),1 , 0, 'C');        
        $pdf->Cell(60,10, utf8_decode($index['clienteN'].' '.$index['clienteA']),1 , 0, 'C');   
        $pdf->Cell(25,10, utf8_decode($index['total']),1 , 0, 'C');      
        $pdf->Ln();    
        $sumaF+= $index['total'];               
        $suma += $index['total'];
          
        
    }    
    $pdf->setFont('Arial', 'B', 12);
    $pdf->Cell(358,10, utf8_decode('Total($): '.$sumaF),0 , 0, 'C'); 
    $pdf->Output();
?>
