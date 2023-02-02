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
    $this->Cell(80,10,'Reporte de Certificados',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(12, 10,utf8_decode('Cédula'), 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Nombres', 1, 0, 'C', 0);
    $this->Cell(23, 10, 'Correo', 1, 0, 'C', 0);
    $this->Cell(15, 10,utf8_decode('Dirección'), 1, 0, 'C', 0);
    $this->Cell(13, 10,utf8_decode('Teléfono'), 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Empresa', 1, 0, 'C', 0);
    $this->Cell(10, 10, 'T. Curso', 1, 0, 'C', 0);
    $this->Cell(15, 10,utf8_decode('F. Certificación'), 1, 0, 'C', 0);
    $this->Cell(13, 10,utf8_decode('F. Emisión'), 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Fecha Vigencia', 1, 1, 'C', 0);

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
$consulta = "SELECT * FROM certificacionpersonas";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',5);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(12, 10, $row['cedula'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['nya'], 1, 0, 'C', 0);
    $pdf->Cell(23, 10, $row['correo'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['direccion'], 1, 0, 'C', 0);
    $pdf->Cell(13, 10, $row['telefono'], 1, 0, 'C', 0);
    $pdf->Cell(50, 10, $row['empresa'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['tcurso'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['fcert'], 1, 0, 'C', 0);
    $pdf->Cell(13, 10, $row['femision'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['fvigencia'], 1, 1, 'C', 0);
}

$pdf->Output();
?>
