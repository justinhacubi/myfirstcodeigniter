<?php
require('fpdf.php');



$totalsales=0;





class PDF extends FPDF
{
// Page header

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('');
$pdf->SetFont('Times','',12);



$width = 38;
$height = 10;

$pdf->SetX(85);
$pdf->Cell($width,$height,'Report', 0, 0, 'C');

$pdf->SetY(30);

$pdf->Cell($width,$height,"Cashier", 1 , 0 , 'C');
$pdf->Cell($width,$height,"Product Name", 1, 0, 'C');
$pdf->Cell($width,$height,"Quantity", 1 , 0 , 'C');
$pdf->Cell($width,$height,"Total", 1 , 0 , 'C');
$pdf->Cell($width,$height,"Date", 1 , 0 , 'C');



$pdf->SetY($pdf->GetY() + 10);


foreach($gsales as $gs){



$pdf->Cell($width,$height,$gs['u_name'], 1, 0, 'C');
$pdf->Cell($width,$height,$gs['p_name'],  1, 0, 'C');
$pdf->Cell($width,$height,$gs['s_qty'],  1, 0, 'C');
$pdf->Cell($width,$height,$gs['s_qty'] * $gs['p_price'],  1, 0, 'C');
$pdf->Cell($width,$height,$gs['s_date'],  1, 0, 'C');

$gt= $gs['s_qty'] * $gs['p_price'];

$totalsales+= $gt;

$pdf->SetY( $pdf->GetY() + $height);


}
$pdf->SetFont('Times','',15);
$pdf->SetX(120);
$pdf->Cell(60 ,$height,'Total: P '.$totalsales,  0, 0, 'L');











    
$pdf->Output();
?>