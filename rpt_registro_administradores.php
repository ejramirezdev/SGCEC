<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',9);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,10,'Reporte de Administradores',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(25, 10,utf8_decode('Cédula'), 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Nombres', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Apellidos', 1, 0, 'C', 0);
    $this->Cell(70, 10, 'Correo', 1, 0, 'C', 0);
    $this->Cell(22, 10, 'Privilegio', 1, 0, 'C', 0);
    $this->Cell(15, 10, 'Estado', 1, 1, 'C', 0);

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
$consulta = "SELECT * FROM administradores";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(25, 10, $row['cedula'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['nombres'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['apellidos'], 1, 0, 'C', 0);
    $pdf->Cell(70, 10, $row['correo'], 1, 0, 'C', 0);
    $pdf->Cell(22, 10, $row['privilegio'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['estado'], 1, 1, 'C', 0);
}

$pdf->Output();
?>
