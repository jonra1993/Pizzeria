<?php
// fuente http://www.fpdf.org/es/tutorial/index.php
include_once("fpdf/fpdf.php");
//require('fpdf/fpdf.php');

// Better table
function ImprovedTable($pdf,$header,$data,$subtotal)
{
    // Column widths
    $q=4;
    $w = array(4, 48, 11, 11);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],4,utf8_decode($header[$i]),1,0,"C");
    $pdf->Ln();
    // Data
    for ($x = 0; $x < (sizeof($data)/4); $x++) {
        $pdf->Cell($w[0],4,utf8_decode($data[$x*$q]),'LR',0,"C");
        $pdf->Cell($w[1],4,utf8_decode($data[$x*$q+1]),'LR',0,"C");
        $pdf->Cell($w[2],4,utf8_decode($data[$x*$q+2]),'LR',0,"C");
        $pdf->Cell($w[3],4,utf8_decode($data[$x*$q+3]),'LR',0,"C");
        $pdf->Ln();
    }

    // Closing line
    //footer
    $pdf->Cell(63,4,"Subtotal",1,0,"C");
    $pdf->Cell(11,4,$subtotal,1,0,"C");
    $pdf->Ln();
    $pdf->Cell(array_sum($w),0,'','T',1);

    if($_GET["efectivo"]==0) $pdf->Cell(40,4,"Tar",0);
    else $pdf->Cell(40,4,"Ef",0);
    if($_GET["servir"]==0) $pdf->Cell(10,4,"Para llevar",0,0,'C');
    else $pdf->Cell(10,4,"Para servir",0,1,'C');
   // $pdf->Ln();


    
}


//$pdf = new FPDF('P','mm','A4');
$pdf = new FPDF('P','mm',array(80,80));  //ancho y alto
$pdf->SetMargins(3,3,3); //LEFT, TOP RIGHT
$pdf->AddPage();

$pdf->setFont("Courier","B",11);   //se establece el tipo de letra

$pdf->Cell(0,5,utf8_decode("Pizzería Mangiare"),"LBRT",1,"C"); //imprime una celda de borse rectangular
$pdf->Cell(0,5,"Orden # xxxx",0,1,"C"); //imprime una celda de borse rectangular

$pdf->setFont("Courier",null,9);

$pdf->Cell(43,5,$_GET["date"],0);
$pdf->Cell(26,5,"Telf: 02-3442096",0);
$pdf->Ln();

$header = array('C', 'Descripción', 'Valor', 'Total');

/*
$orden = array
(
  array(1,utf8_decode("Pizza porción"),1,1),
  array(1,"Pizza mediana",15,15),
  array(2,utf8_decode("Pizza pequeña"),5,10),
  array(1,utf8_decode("Pizza mediana piña"),17,17)
);*/

$values = explode(",", $_GET["orden"]);
ImprovedTable($pdf,$header,$values,$_GET["subtotal"]);

//$pdf->Output("Reportes_PDF/notaVenta_".$_GET["user"].$_GET["date1"].".pdf","F");
$pdf->Output();


?>