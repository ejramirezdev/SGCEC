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
    $this->Cell(80,10,'Reporte Formulario Cliente',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(11, 10,utf8_decode('Cédula'), 1, 0, 'C', 0);
    $this->Cell(36, 10, 'Nombres', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Correo', 1, 0, 'C', 0);
    $this->Cell(28, 10,utf8_decode('Empresa ó Institución'), 1, 0, 'C', 0);
    $this->Cell(12, 10,utf8_decode('Teléfono'), 1, 0, 'C', 0);
    $this->Cell(11, 10, 'Fecha', 1, 0, 'C', 0);
    $this->Cell(65, 10, 'Mensaje', 1, 1, 'C', 0);

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
$consulta = "SELECT * FROM formulariocliente";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',5);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(11, 10, $row['cedula'], 1, 0, 'C', 0);
    $pdf->Cell(36, 10, $row['nombres'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['correo'], 1, 0, 'C', 0);
    $pdf->Cell(28, 10, $row['empresa'], 1, 0, 'C', 0);
    $pdf->Cell(12, 10, $row['telefono'], 1, 0, 'C', 0);
    $pdf->Cell(11, 10, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(65, 10, $row['motivo'], 1, 1, 'C', 0);
}

$pdf->Output();
?>
