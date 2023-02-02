<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',5);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,10,'Reporte Inspección Vehicular',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(13, 10,utf8_decode('T. Inspección'), 1, 0, 'C', 0);
    $this->Cell(28, 10,utf8_decode('Código'), 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Cliente', 1, 0, 'C', 0);
    $this->Cell(10, 10,utf8_decode('Placa'), 1, 0, 'C', 0);
    $this->Cell(13, 10,utf8_decode('F. Inspección'), 1, 0, 'C', 0);
    $this->Cell(18, 10, 'Eq. Inspectores', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Exp. Certificado', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Vig. Certificado', 1, 0, 'C', 0);
    $this->Cell(14, 10, 'Act. Certificado', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Vigencia Años', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM inspvehicular";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',5);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(13, 10, $row['inspeccion'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['codigo'], 1, 0, 'C', 0);
    $pdf->Cell(50, 10, $row['cliente'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['placa'], 1, 0, 'C', 0);
    $pdf->Cell(13, 10, $row['finspeccion'], 1, 0, 'C', 0);
    $pdf->Cell(18, 10, $row['einspectores'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['expcertificado'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['vigcertificado'], 1, 0, 'C', 0);
    $pdf->Cell(14, 10, $row['actcertificado'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['viganios'], 1, 1, 'C', 0);
}

$pdf->Output();
?>
