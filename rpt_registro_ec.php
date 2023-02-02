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

    $this->Cell(15, 10,utf8_decode('Ruc'), 1, 0, 'C', 0);
    $this->Cell(80, 10, 'Nombre Empresa', 1, 0, 'C', 0);
    $this->Cell(10, 10, 'Establecimiento', 1, 0, 'C', 0);
    $this->Cell(47, 10,utf8_decode('Alcance / Certificación'), 1, 0, 'C', 0);
    $this->Cell(18, 10, 'No. Certificado', 1, 0, 'C', 0);
    $this->Cell(12, 10,utf8_decode('Vig. / Certificación'), 1, 0, 'C', 0);
    $this->Cell(10, 10, 'Estado', 1, 1, 'C', 0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexion.php';
$consulta = "SELECT * FROM empresacertificada";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',5);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(15, 10, $row['ruc'], 1, 0, 'C', 0);
    $pdf->Cell(80, 10, $row['empresa'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['establecimiento'], 1, 0, 'C', 0);
    $pdf->Cell(47, 10, $row['alcance'], 1, 0, 'C', 0);
    $pdf->Cell(18, 10, $row['ncertificado'], 1, 0, 'C', 0);
    $pdf->Cell(12, 10, $row['vcertificacion'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['estado'], 1, 1, 'C', 0);
}

$pdf->Output();
?>
