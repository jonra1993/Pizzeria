<?php
// fuente http://www.fpdf.org/es/tutorial/index.php
include_once("fpdf/fpdf.php");
//require('fpdf/fpdf.php');

// Better table
function ImprovedTable($pdf,$header,$data,$subtotal)
{
    // Column widths
    $w = array(8, 40, 13, 13);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],4,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    foreach($data as $row)
    {
        $pdf->Cell($w[0],4,$row[0],'LR');
        $pdf->Cell($w[1],4,$row[1],'LR');
        $pdf->Cell($w[2],4,number_format($row[2]),'LR',0,'R');
        $pdf->Cell($w[3],4,number_format($row[3]),'LR',0,'R');
        $pdf->Ln();
    }
    // Closing line
    //footer
    $pdf->Cell(61,4,"Subtotal",1,0,'c');
    $pdf->Cell(13,4,$subtotal,1,0,'c');
    $pdf->Ln();

    $pdf->Cell(array_sum($w),0,'','T');
}


//$pdf = new FPDF('P','mm','A4');
$pdf = new FPDF('P','mm',array(80,80));  //ancho y alto
$pdf->SetMargins(3,3,3); //LEFT, TOP RIGHT
$pdf->AddPage();

$pdf->setFont("Courier","B",11);   //se establece el tipo de letra

$pdf->Cell(0,5,"Orden # xxxx","LBR",1,"C"); //imprime una celda de borse rectangular

$pdf->setFont("Courier",null,9);

$pdf->Cell(30,5,$_GET["date"],0,1);

$header = array('Cant', 'Desc', 'Precio', 'Total');


$orden = array
(
  array(1,utf8_decode("Pizza porción"),1,1),
  array(1,"Pizza mediana",15,15),
  array(2,utf8_decode("Pizza pequeña"),5,10),
  array(1,utf8_decode("Pizza mediana piña"),17,17)
);

ImprovedTable($pdf,$header,$orden,$_GET["subtotal"]);

//$pdf->Output("Reportes_PDF/notaVenta_".$_GET["user"].$_GET["date1"].".pdf","F");
$pdf->Output();


?>