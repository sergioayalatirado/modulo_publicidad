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
    $this->Cell(0,10,'DISPOSITIVOS REGISTRADOS',0,0,'C');
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
$consulta="SELECT * FROM  dispositivo d, sucursal s WHERE d.fk_sucursal = s.id_sucursal GROUP BY d.nombre_dispositivo ORDER BY d.nombre_dispositivo ASC";
$resultado = mysqli_query($mysqli,$consulta);


$i=1;
$reg=0;
while($row= $resultado->fetch_assoc()){
    

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(154,90,85);
    $pdf->Cell(190,12,'Dispositivo No.'.$i,1,2,'C',True);

    $pdf->SetTextColor(0,0,20);  // Establece el color del texto (en este caso es blanco)
    

    $pdf->MultiCell(190,8, utf8_decode('NOMBRE DEL DISPOSITIVO: '.strtoupper($row['nombre_dispositivo'])),1,2,'',True);
    $pdf->MultiCell(190,8,utf8_decode('TIPO DE DISPOSITIVO: '.strtoupper($row['tipo_dispositivo'])),1,2,'',True);
    if($row['device_agent']==null){
        $pdf->MultiCell(190,8,utf8_decode('DEVICE AGENT: VACIO'),1,2,'',True);
    }else{
        $pdf->MultiCell(190,6,utf8_decode('DEVICE AGENT: '.$row['device_agent']),1,2,'',True);
    }

    //Verificando campo sucursal
    if($row['nombre_sucursal']==null){
    $pdf->MultiCell(190,8,utf8_decode('SUCURSAL: NO REGISTRADA'),1,2,'',True);
    }else{
    $pdf->MultiCell(190,8,utf8_decode('SUCURSAL: '.strtoupper($row['nombre_sucursal'])),1,2,'',True);
    }

    //Personalizando resultados del estatus de dispositivo
    if($row['estatus']==1){
    $pdf->MultiCell(190,8,utf8_decode('ESTATUS: ACTIVO'),1,2,'',True);
    }else{
    $pdf->MultiCell(190,8,utf8_decode('ESTATUS: INACTIVO'),1,2,'',True);
    }
    $reg++;
    if($reg==3){
        $reg=0;
        $pdf->AddPage();
    }

    $pdf->Ln(5);
    $i++;
}
$pdf->Output();
?>