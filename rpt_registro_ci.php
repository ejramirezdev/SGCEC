<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',3);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,10,'Reporte de Administradores',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(16, 10,utf8_decode('T. Inspección'), 1, 0, 'C', 0);
    $this->Cell(20, 10,utf8_decode('Código'), 1, 0, 'C', 0);
    $this->Cell(55, 10, 'Cliente', 1, 0, 'C', 0);
    $this->Cell(20, 10,utf8_decode('F. Inspección'), 1, 0, 'C', 0);
    $this->Cell(42, 10, 'Eq. Inspectores', 1, 0, 'C', 0);
    $this->Cell(10, 10,utf8_decode('Exp. Certificado'), 1, 0, 'C', 0);
    $this->Cell(10, 10, 'Vig. Certificado', 1, 0, 'C', 0);
    $this->Cell(10, 10, 'Act. Certificado', 1, 0, 'C', 0);
    $this->Cell(8, 10, 'Vig. Años', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',3);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexion.php';
$consulta = "SELECT * FROM certificadosinspeccion";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',3);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(16, 10, $row['ti'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['codigo'], 1, 0, 'C', 0);
    $pdf->Cell(55, 10, $row['cliente'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['fi'], 1, 0, 'C', 0);
    $pdf->Cell(42, 10, $row['ei'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['fec'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['fvc'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['fac'], 1, 0, 'C', 0);
    $pdf->Cell(8, 10, $row['va'], 1, 1, 'C', 0);
}

$pdf->Output();
?>
