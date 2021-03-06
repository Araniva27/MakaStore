<?php
require('plantillaComp.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/sales.php');
    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P', 'mm', 'Letter');
    $ventas = new Sales();
    $pdf->head('Comprobante de compra');
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(21, 67, 96);
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(0);
    $suma = 0;    
            
    if(isset($_SESSION['idCliente'])){
        if($ventas->setIdCliente($_SESSION['idCliente'])){
            $idVenta = $ventas->getLastSale();
            if($ventas->setId($idVenta['idV'])){
                $data = $ventas->getSaleDetailReport();
                $pdf->setTextColor(0,0,0); 
                $pdf->setFillColor(235, 245, 251); 
                $pdf->setFont('Arial', 'B', 12);
                $pdf->Cell(100,6, 'Datos generales:', 0, 1,'L', true);            
                $pdf->SetFont('Arial','',12);
                $pdf->Cell(100,6, utf8_decode('Cliente: '. $idVenta['CN'].' '.$idVenta['CA']),0, 0, 'L', true);            
                $pdf->Ln();
                $pdf->Cell(100,6, utf8_decode('Teléfono: '. $idVenta['telefono']),0 , 0, 'L', true);
                $pdf->Ln();
                $pdf->Cell(100,6, utf8_decode('Dirección: '. $idVenta['direccion']),0 , 0, 'L', true);
                $pdf->Ln();
                $pdf->Cell(100,6, utf8_decode('Correo: '. $idVenta['correo']),0 , 0, 'L', true);
                $pdf->Ln();
                $pdf->Cell(100,6, utf8_decode('Fecha de compra: '. $idVenta['fecha']),0 , 0, 'L',true);
                $pdf->Ln(16);
                
                $pdf->setTextColor(255,255,255);
                $pdf->setFillColor(21, 67, 96);
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(100,10, utf8_decode('Producto'),1 , 0, 'C',true);
                $pdf->Cell(30,10, utf8_decode('Precio($)'),1 , 0, 'C',true);
                $pdf->Cell(30,10, utf8_decode('Cantidad'),1 , 0, 'C',true);
                $pdf->Cell(30,10, utf8_decode('Total($)'),1 , 0, 'C',true);
                $pdf->Ln();
                foreach($data as $index){
                    $pdf->setTextColor(0,0,0);
                    $pdf->setFont('Arial','',12);
                    $pdf->Cell(100,10, utf8_decode($index['producto']),1 , 0, 'C');
                    $pdf->Cell(30,10, utf8_decode($index['precio']),1 , 0, 'C');
                    $pdf->Cell(30,10, utf8_decode($index['cantidad']),1 , 0, 'C');
                    $pdf->Cell(30,10, utf8_decode($index['Total']),1 , 0, 'C');
                    $pdf->Ln();
                    $suma += $index['Total'];
                }
            }
        }
    }
    $pdf->Ln(1);
    $pdf->setFont('Arial', 'B',15);
    $pdf->Cell(188,8, utf8_decode('Total($):'. $suma),0 , 0, 'R', false);
    $pdf->Output();
?>