<?php
require('reportePrueba.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/products.php');

    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF();
    $producto = new Productos();
    $pdf->head('Reporte de productos por compañia');
    $pdf->SetFont('Times','',12);
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(91,143,247);
    $pdf->SetFont('Arial','I',12);
    $proveedor = '';
    $pdf->Ln(0);

    $data = $producto->getProductoCompañia();
    foreach($data as $index){
        if(utf8_decode($index['nombreProveedor'] != $proveedor)){
            $pdf->Ln();
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','I',17);
            $pdf->Cell(100,10, utf8_decode($index['nombreProveedor']),1 , 0, 'C', true);
            $pdf->Ln(16);
            $pdf->SetFont('Arial','I',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(70,10, utf8_decode('Producto'),1 , 0, 'C', true);
            $pdf->Cell(25,10, utf8_decode('Precio $'),1 , 0, 'C', true);
            $pdf->Cell(25,10, utf8_decode('Cantidad'),1 , 0, 'C', true);
            $pdf->Cell(60,10, utf8_decode('Categoría'),1 , 0, 'C', true); 
            $pdf->Ln(10);
            $proveedor = $index['nombreProveedor'];
        }

        $pdf->setTextColor(0,0,0);
        $pdf->Cell(70,10, utf8_decode($index['nombre']),1 , 0, 'C');
        $pdf->Cell(25,10, utf8_decode($index['precio']),1 , 0, 'C');
        $pdf->Cell(25,10, utf8_decode($index['cantidad']),1 , 0, 'C');
        $pdf->Cell(60,10, utf8_decode($index['categoria']),1 , 0, 'C');       
        $pdf->Ln();
    }
    $pdf->Output();
?>