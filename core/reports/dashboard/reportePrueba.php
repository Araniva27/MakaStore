<?php
require('../../libraries/fpdf.php');

class PDF extends FPDF
{
    private $title;      
    function head($title){
        $this->title = $title;
        $this->AliasNbPages();
        $this->AddPage();
    }


    function Header()
    {
        $this->Image('../../../resource/img/logo/logoMKStore.png',9,8, 21);
        $this->SetFont('Arial','B', 20);
        $this->Cell(30);
        $this->setTextColor(255,255,255);
        $this->setFillColor(33, 97, 140);
        $this->Cell(160,17, utf8_decode($this->title),1 , 0, 'C', true);
        $this->Ln(0);
        $this->setTextColor(0,0,0);
        $this->SetFont('Arial','',12);
        $this->Ln();
        $this->Cell(190,20, ('Fecha: '. date('d/m/Y')),0 , 0, 'R', false);
        $this->Ln(5);        
        $this->Cell(190,20, ('Hora: '.date('G:i:s')),0 , 1, 'R', false);
        $this->Cell(5);
                        
    }

    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','B',10);
        $this->SetTextColor(0,0,0);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        $this->Cell(0,10,utf8_decode('Realizado por: '.$_SESSION['nombre'].' '.$_SESSION['apellido']),0,'L','R');
        
    }
   
  
}

?>