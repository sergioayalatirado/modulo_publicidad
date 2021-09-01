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
    $this->Cell(0,10,'PUBLICIDADES EN CURSO',0,0,'C');
    $this->Ln(10);
    $this->Cell(0,10,'Con fecha de: '.$fechaf,0,0,'');    // Salto de línea
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
$consulta="SELECT id_publicidad,titulo_publicidad, url_archivo,extension_archivo,fecha_creacion, fecha_modificacion, tipo_archivo,fecha_hora_inicio,fecha_hora_final,p.estatus,texto, nombre_sucursal,nombre_dispositivo, tipo_dispositivo FROM dispositivo d , publicidad p , sucursal s 
WHERE p.fk_dispositivo = d.id_dispositivo AND p.fk_sucursal= s.id_sucursal AND p.estatus=1 AND (CURRENT_TIMESTAMP > fecha_hora_inicio AND CURRENT_TIMESTAMP < fecha_hora_final) ORDER BY id_publicidad ASC";
$resultado = mysqli_query($mysqli,$consulta);


$i=0;
while($row=$resultado->fetch_assoc()){
    $i++;
    $titulo = strtoupper($row['titulo_publicidad']); 
    $fhi = strtoupper($row['fecha_hora_inicio']);
    $fhf = strtoupper($row['fecha_hora_final']);
    $ta = strtoupper($row['tipo_archivo']);
    $fc = strtoupper($row['fecha_creacion']);
    $ns = strtoupper($row['nombre_sucursal']);
    $nd = strtoupper($row['nombre_dispositivo']);
    $pn = "PUBLICIDAD No.";
   

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(154,90,85);
    $pdf->Cell(180,12,$pn.$i,1,2,'C',True);

    $pdf->SetTextColor(0,0,20);  // Establece el color del texto (en este caso es blanco)
    

    $pdf->MultiCell(180,8, utf8_decode('TITULO DE LA PUBLICIDAD: '.$titulo),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('FECHA DE INICIO Y HORARIO: '.$fhi),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('HASTA LA FECHA Y HORARIO: '.$fhf),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('TIPO DE ARCHIVO: '.$ta),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('FECHA DE CREACION: '.$fc),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('NOMBRE DE LA SUCURSAL: '.$ns),1,2,'',True);
    $pdf->MultiCell(180,8,utf8_decode('NOMBRE DEL DISPOSITIVO: '.$nd),1,2,'',True);
    $pdf->Ln(8);
}
$pdf->Output();




?>

