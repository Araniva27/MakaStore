<?php
require('reportePrueba.php');
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/sales.php');
    session_start();
    ini_set('date.timezone', 'America/El_Salvador');
    //Se define 'P' para página vertical, p es portrait8nnormal), mm la edida en milimettros 
    //y letter para pagina tamaño carta
    $pdf = new PDF('P','mm', 'Letter');
    $ventas = new Sales();
    //Nombre del reporte, nombre que saldrá de título
    $pdf->head('Reporte de pedidos');
    //colores de las letras
    $pdf->setTextColor(255,255,255);
    //Rellenar las cajitas de cada tabla
    $pdf->setFillColor(21, 67, 96);
    //Tipografía, modo y tamaño de la letra
    $pdf->SetFont('Arial','I',12);
    //Variable para agrupar por ventas 
    $venta = '';
    //Salto de linea 
    $pdf->Ln(0);
    $conta = 0;
    $suma = 0;  
    $suma2 = 0;  
    $data = $ventas->reportePedidos();
    foreach($data as $index){        
        if($index['idV'] != $venta){
            if($conta != 0){
                $pdf->SetFont('Arial','B',15);  
                $pdf->Cell(340,10, utf8_decode('Total($): '.number_format($suma2,2,".",",")),0 , 0, 'C'); 
            }else{
                $conta++;
            }
            $suma2 = 0;
            //Construcción de la tabla 
            $pdf->Ln();
            $pdf->setTextColor(0,0,0);
            $pdf->setFillColor(235, 245, 251);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(100,6,'Datos generales:',0, 1, 'L', true);
            $pdf->SetFont('Arial','',12);
            //Se define el ancho y largo de cada caja de la tabla, margen del texto, salto de linea y posicion
            $pdf->Cell(100,6, utf8_decode('N° de venta: '.$index['idV']),0 , 1, 'L', true);            
            $pdf->Cell(100,6, utf8_decode('Cliente: '.$index['clienteN'].' '.$index['clienteA']),0 , 1, 'L', true);    
            $pdf->Cell(100,6, utf8_decode('Correo: '.$index['correo']),0 , 1, 'L', true);                       
            $pdf->Cell(100,6, utf8_decode('Teléfono: '.$index['telefono']),0 , 1, 'L', true);            
            $pdf->Cell(100,6, utf8_decode('Dirección: '.$index['direccion']),0 , 0, 'L', true);             
            $pdf->Ln(15);
            $pdf->SetFont('Arial','B',12);
            $pdf->setTextColor(255,255,255);
            $pdf->setFillColor(21, 67, 96);
            //Se define el ancho y largo de cada caja de la tabla, margen del texto, salto de linea y posicion
            //Nombre del encabezado de cada celda
            $pdf->Cell(68,8, utf8_decode('Producto'),1 , 0, 'C', true);
            $pdf->Cell(50,8, utf8_decode('Precio unitario'),1 , 0, 'C', true);
            $pdf->Cell(22,8, utf8_decode('Cantidad'),1 , 0, 'C', true);            
            $pdf->Cell(50,8, utf8_decode('Subtotal($)'),1 , 0, 'C', true);                        ;               
            $pdf->Ln(8);            
            $venta = $index['idV'];
        }     
        //$suma2 +=  $index['total'];
        $pdf->setTextColor(0,0,0);
        $pdf->SetFont('Arial','',12);
        //Asignacion de valores para cada celda
        $pdf->Cell(68,8, utf8_decode($index['nombreP']),1 , 0, 'C');
        $pdf->Cell(50,8, utf8_decode(number_format($index['precioU'],2,".",",")),1 , 0, 'C');
        $pdf->Cell(22,8, utf8_decode($index['cantidad']),1 , 0, 'C');                
        $pdf->Cell(50,8, utf8_decode(number_format($index['subtotal'],2,".",",")),1 , 1, 'C');        
        $suma2 += $index['subtotal'];
               
        
    }    
   $pdf->SetFont('Arial','B',15);  
   $pdf->Cell(340,10, utf8_decode('Total($): '.$suma2),0 , 0, 'C'); 
   //El documento se cierra y se envía al navegador
    $pdf->Output();
?>