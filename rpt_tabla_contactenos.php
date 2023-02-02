<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',7);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,10,utf8_decode('Reporte Mensajes Contáctenos'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(30, 10,'Nombres', 1, 0, 'C', 0);
    $this->Cell(36, 10,utf8_decode('Dirección'), 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Ciudad', 1, 0, 'C', 0);
    $this->Cell(55, 10, 'E-mail', 1, 0, 'C', 0);
    $this->Cell(20, 10,utf8_decode('Teléfono'), 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Fecha', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM contactenos";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(30, 10, $row['nombres'], 1, 0, 'C', 0);
    $pdf->Cell(36, 10, $row['direccion'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['ciudad'], 1, 0, 'C', 0);
    $pdf->Cell(55, 10, $row['email'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['telefono'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['fecha'], 1, 1, 'C', 0);
}

$pdf->Output();
?>