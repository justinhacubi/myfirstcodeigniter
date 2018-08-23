<?php
require('fpdf.php');


$gstr=urldecode($page_str);
$gsplit= explode("^", $gstr);


$sname=$gsplit[0];
$sqty=$gsplit[1];
$sprice=$gsplit[2];
$gbill=$gsplit[3];
$gpay=$gsplit[4];
$gchange=$gsplit[5];
$guser=$gsplit[6];
$gref=$gsplit[7];

$gname= explode("-", $sname);
$gqty= explode("-", $sqty);
$gprice =explode("-", $sprice);




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
$pdf->AddPage();
$pdf->SetFont('Times','',12);


//$y = $pdf->GetY();
//$x = $pdf->GetX();


$width = 60;
$height = 10;

$pdf->SetX(70);
$pdf->Cell($width,$height,'Receipt #'.$gref, 0, 0, 'C');

$pdf->SetY(30);

$pdf->Cell($width,$height,"Product Name", 1, 0, 'C');
$pdf->Cell($width,$height,"Quantity", 1 , 0 , 'C');
$pdf->Cell($width,$height,"Price", 1 , 0 , 'C');

$pdf->SetY($pdf->GetY() + 10);
for($x=0; $x < sizeof($gname) ; $x++){



$pdf->Cell($width,$height,$gname[$x], 1, 0, 'C');
$pdf->Cell($width,$height,$gqty[$x],  1, 0, 'C');
$pdf->Cell($width,$height,$gprice[$x],  1, 0, 'C');



$pdf->SetY( $pdf->GetY() + $height);

 
}

$pdf->SetFont('Times','',15);
$pdf->SetX(137);
$pdf->Cell(60 ,$height,'Total:    '. $gbill,  0, 0, 'L');
$pdf->SetY( $pdf->GetY() + $height);
$pdf->SetX(137);
$pdf->Cell(60 ,$height,'Cash:     '.$gpay ,  0, 0, 'L');
$pdf->SetY( $pdf->GetY() + $height);
$pdf->SetX(137);
$pdf->Cell(60 ,$height,'Change: '.$gchange ,  0, 0, 'L');
$pdf->SetY( $pdf->GetY() + $height);
$pdf->SetX(137);
$pdf->Cell(60 ,$height,'Cashier: '.$guser ,  0, 0, 'L');








    
$pdf->Output();
?>