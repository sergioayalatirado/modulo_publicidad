<?php 
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('../../fpdf/logos/publicidad.png',10,8,60);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Ln(10);
    $date = new DateTime('now');
    $date->setTimezone(new DateTimeZone('UTC'));
    $fechaf = $date->format('d-m-Y');
    $this->Cell(0,10,'SUCURSALES REGISTRADAS',0,0,'C');
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
$consulta="SELECT * FROM sucursal s GROUP BY s.nombre_sucursal ORDER BY s.nombre_sucursal ASC";
$resultado = mysqli_query($mysqli,$consulta);


$i=1;
$reg=0;
while($row= $resultado->fetch_assoc()){
    

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(154,90,85);
    $pdf->Cell(190,12,'Sucursal No.'.$i,1,2,'C',True);

    $pdf->SetTextColor(0,0,20);  // Establece el color del texto (en este caso es blanco)
    

    $pdf->MultiCell(190,8, utf8_decode('NOMBRE DEL DISPOSITIVO: '.strtoupper($row['nombre_sucursal'])),1,2,'',True);
    $pdf->MultiCell(190,8,utf8_decode('TIPO DE DISPOSITIVO: '.strtoupper($row['tipo_sucursal'])),1,2,'',True);


    //Personalizando resultados del estatus de la sucursal
    if($row['estatus']==1){
    $pdf->MultiCell(190,8,utf8_decode('ESTATUS: EN SERVICIO'),1,2,'',True);
    }else{
    $pdf->MultiCell(190,8,utf8_decode('ESTATUS: INACTIVA'),1,2,'',True);
    }
    $reg++;
    if($reg==5){
        $reg=0;
        $pdf->AddPage();
    }

    $pdf->Ln(7);
    $i++;
}
$pdf->Output();
?>