<?php
require('reportePrueba.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/products.php');

    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    $pdf = new PDF('P', 'mm', 'Letter');
    $producto = new Productos();
    $pdf->head('Reporte de productos por categoria');
    $pdf->setTextColor(255,255,255);
    $pdf->setFillColor(21, 67, 96);
    $pdf->SetFont('Arial','I',12);
    $categoria = '';    
    $pdf->Ln(0);
    $data = $producto->getProductosCategoria();    
    
    foreach($data as $datos){     
        if(utf8_decode($datos['categoria'] != $categoria)){
            $pdf->Ln(2);
            $pdf->setTextColor(255,255,255);
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(190,8, utf8_decode($datos['categoria']),1 , 0, 'C', true);
            $pdf->Ln(12);
            $pdf->SetFont('Arial','I',12);
            $pdf->setTextColor(255,255,255);
            $pdf->Cell(70,8, utf8_decode('Producto'),1 , 0, 'C', true);
            $pdf->Cell(30,8, utf8_decode('Precio $'),1 , 0, 'C', true);
            $pdf->Cell(30,8, utf8_decode('Cantidad'),1 , 0, 'C', true);
            $pdf->Cell(60,8, utf8_decode('Proveedor'),1 , 0, 'C', true); 
            $pdf->Ln(8);
            $categoria = $datos['categoria'];
        }

        $pdf->setTextColor(0,0,0);
        $pdf->Cell(70,8, utf8_decode($datos['nombre']),1 , 0, 'C');
        $pdf->Cell(30,8, utf8_decode($datos['precio']),1 , 0, 'C');
        $pdf->Cell(30,8, utf8_decode($datos['cantidad']),1 , 0, 'C');
        $pdf->Cell(60,8, utf8_decode($datos['nombreProveedor']),1 , 0, 'C');       
        $pdf->Ln();
        
    }      
    $pdf->Output();



?>