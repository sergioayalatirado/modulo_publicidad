<?php 
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../fpdf/logos/publicidad.png',10,8,60);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Ln(20);
    $date = new DateTime('now');
    $date->setTimezone(new DateTimeZone('UTC'));
    $fechaf = $date->format('d-m-Y');
    $this->Cell(0,10,'PUBLICIDADES REGISTRADAS',0,0,'C');
    $this->Ln(10);
    $this->Cell(0,10,'Con fecha de: '.$fechaf,0,0,'');    // Salto de línea
    // Salto de línea
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);


require('conexion.php');
$consulta="SELECT p.titulo_publicidad, p.fecha_hora_inicio, p.fecha_hora_final, p.tipo_archivo, p.fecha_creacion, s.nombre_sucursal, d.nombre_dispositivo FROM  publicidad p , sucursal s, dispositivo d GROUP BY p.titulo_publicidad ORDER BY p.fecha_creacion DESC";
$resultado = mysqli_query($mysqli,$consulta);


$i=1;
while($row= $resultado->fetch_assoc()){
    

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(154,90,85);
    $pdf->Cell(180,12,'PUBLICIDAD No.'.$i,1,2,'C',True);

    $pdf->SetTextColor(0,0,20);  // Establece el color del texto (en este caso es blanco)
    

    $pdf->MultiCell(180,8, utf8_decode('TITULO DE LA PUBLICIDAD: '.$row['titulo_publicidad']),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('FECHA DE INICIO Y HORARIO: '.$row['fecha_hora_inicio']),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('HASTA LA FECHA Y HORARIO: '.$row['fecha_hora_final']),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('TIPO DE ARCHIVO: '.$row['tipo_archivo']),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('FECHA DE CREACION: '.$row['fecha_creacion']),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('NOMBRE DE LA SUCURSAL: '.$row['nombre_sucursal']),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('NOMBRE DEL DISPOSITIVO: '.$row['nombre_dispositivo']),1,2,'',True);
    $pdf->Ln(8);
    $i++;
}


$pdf->Output();




?>