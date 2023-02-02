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
    $this->Cell(80,10,'REPORTE CURSOS GRATIS ZOOM',0,0,'C');
    // Salto de línea
    $this->Ln(15);

    $this->Cell(5, 10, 'ID', 1, 0, 'C', 0);
    $this->Cell(15, 10, utf8_decode('Cédula'), 1, 0, 'C', 0);
    $this->Cell(35, 10, utf8_decode('Nombres'), 1, 0, 'C', 0);
    $this->Cell(35, 10, utf8_decode('Dirección'), 1, 0, 'C', 0);
    $this->Cell(15, 10, utf8_decode('Teléfono'), 1, 0, 'C', 0);
    $this->Cell(33, 10, 'E-mail', 1, 0, 'C', 0);
    $this->Cell(23, 10, 'Empresa', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Cursos', 1, 1, 'C', 0);

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
$consulta = "SELECT * FROM formulario_cursos";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',5);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(5, 10, $row['id'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['cedula'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['nombres'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['direccion'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['telefono'], 1, 0, 'C', 0);
    $pdf->Cell(33, 10, $row['email'], 1, 0, 'C', 0);
    $pdf->Cell(23, 10, $row['empresa'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['ncurso'], 1, 1, 'C', 0);
}

$pdf->Output();
?>