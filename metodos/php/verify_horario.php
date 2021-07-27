<?php
include_once '../php/conexion.php';
sleep(3);
$titulo = strtoupper($_POST['titulo_publicidad']);
$texto = $_POST['texto'];
$fecha_inicio = $_POST['fecha_inicio'];
$hora_inicio = $_POST['hora_inicio'];
$fecha_final = $_POST['fecha_final'];
$hora_final = $_POST['hora_final'];
$fk_sucursal = $_POST['fk_sucursal'];
$fk_dispositivo = $_POST['fk_dispositivo'];
$archivo = $_FILES['archivo'];
$tipo = $_FILES['archivo']['type'];
$archivo_tamano = $_FILES['archivo']['size'];

//Anadiendole 1 minuto al tiempo 
$parsedHI = strtotime($hora_inicio);
$parsedHF = strtotime($hora_final);

//Añadiendole y restandole a la hora recibida
$parsedHIP = ($parsedHI + 60);
$parsedHFM = ($parsedHF - 60);

//Conviertiendo la hora y minutos recibidos a hora valida (Hora y minutos)
$inicioHoraMMA = date("H:i", $parsedHIP);
$finHoraMME = date("H:i", $parsedHFM);

//Fecha y hora completas SOLO PARA REALIZAR LAS CONSULTAS, YA LA HORA DE INICIO TIENE UN MINUTO MAS Y LA FINAL TIENE UN MINUTO MENOS
$fecha_hora_inicioR = $fecha_inicio . " " . $inicioHoraMMA;
$fecha_hora_finalR = $fecha_final . " " . $finHoraMME;

$fech_hora_inicio = $fecha_inicio . " " . $hora_inicio;
$fech_hora_final = $fecha_final . " " . $hora_final;

$sql = "SELECT * FROM publicidad WHERE ( fecha_hora_inicio BETWEEN '$fecha_hora_inicioR' AND '$fecha_hora_finalR') OR
( fecha_hora_final  BETWEEN '$fecha_hora_inicioR' AND '$fecha_hora_finalR')";
$verificar_horario = mysqli_query($mysqli, $sql);
$resultado_rows = mysqli_num_rows($verificar_horario);

//CONSULTA PARA VERIFICAR EL DUPLICADO DE INSERCIONES DE REGISTROS O YA EXISTENTES DENTRO DE LA BASE DE DATOS
$sql2 = "SELECT * FROM publicidad WHERE (fecha_hora_inicio BETWEEN'$fech_hora_inicio' AND '$fech_hora_final') OR 
(fecha_hora_final BETWEEN '$fech_hora_inicio' AND '$fech_hora_final')";
$verificar_duplicado = mysqli_query($mysqli, $sql2);
$resultado_rows2 = mysqli_num_rows($verificar_duplicado);



if ($resultado_rows > 0) {

    $lista = "<ul>"; //Ul lista
    echo "El registro de la publicidad en curso mostro lo siguiente.<br><br>";
    echo "Se encontraron " . $resultado_rows . " publicidades dentro del horario seleccionado.<br><br>";
    while ($fila = mysqli_fetch_array($verificar_horario)) {
        $titulo_publicidad = $fila["titulo_publicidad"];
        $fecha_hora_inicio = $fila["fecha_hora_inicio"];
        $fecha_hora_final = $fila["fecha_hora_final"];

        $lista .= "<li>
        <b>TITULO DE LA PUBLICIDAD</b><br> $titulo_publicidad<br>
        <b>FECHA DE INICIO Y HORA DE INICIO</b><br> $fecha_hora_inicio<br> 
        <b>FECHA DE VENCIMIENTO Y HORA DE VENCIMIENTO</b><br> $fecha_hora_final</li>
        <br>
        ";
    }
    $lista .= "</ul>";
    echo $lista . "
   $fecha_hora_inicioR $fecha_hora_finalR
    <b>NOTA</b>
    <br><b>Considere elegir una fecha y hora distinta, o un horario libre para guardar su publicidad.</b>";
    die();
} 

else {
    if($resultado_rows2 > 0){
        echo "Se ha encontrado un registro con los mismos datos, por favor intentalo nuevamente.";

    }else{
        if (empty($titulo)) {
            echo "El titulo de publicidad esta vacio.";
        } else if (empty($fecha_inicio)) {
            echo "La fecha de inicio esta vacia.";
        } else if (empty($hora_inicio)) {
            echo "La hora de inicio se encuentra vacia.";
        } else if (empty($fecha_final)) {
            echo "La fecha final se encuentra vacia.";
        } else if (empty($hora_final)) {
            echo "La hora final se encuentra vacia.";
        } else if (empty($fech_hora_inicio)) {
            echo "Fecha Hora Inicial es requerida.";
        } else if (empty($fech_hora_final)) {
            echo $fech_hora_final;
            echo "Fecha Hora Final es requerido.";
        } else if (empty($fk_sucursal)) {
            echo "Sucursal es requerida.";
        } else if (empty($fk_dispositivo)) {
            echo "Dispositivo es requerido.";
        } else if ($fech_hora_inicio > $fech_hora_final) {
            echo "Fecha hora final menor a la inicial, ingresa una fecha valida nuevamente.";
        } else if ($fech_hora_inicio == $fech_hora_final) {
            echo "Las fechas son identicas, por favor verifica las fechas.";
        } else if ($_FILES['archivo']['name'] != null) { //ESTA LINEA IDENTIFICA QUE EL FILE TENGA NOMBRE OSEA QUE NO ESTE VACIO Y TAMBIEN QUE CONTENGA TEXTO
    
            // echo "Hay archivo prro";
            if ($tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/jpeg' || $tipo == 'image/gif') {
                // echo "Es una imagen prro";
                $archivo = $_FILES["archivo"]["name"];
                $archivo_ext = explode(".", $_FILES["archivo"]["name"]);
                $archivo_endext = end($archivo_ext);
                $archivo_name = strtolower(md5($archivo) . '.' . $archivo_endext);

                $archivo_name2 = $fk_sucursal.'_'.$fk_dispositivo.'_'.$archivo_name;
                $ruta = $_FILES['archivo']['tmp_name'];
                $archivo_tamano = $_FILES['archivo']['size'];
                $destino = "../../multimedia/".$archivo_name2;
                $limit_image = 1048576; //1MB Tamano maximo
    
                if ($archivo_tamano > $limit_image) {
                    echo "La imagen pesa mas de 1MB, por favor elige otra imagen de menor o igual tamaño para poder continuar.";
                } 
                
                
                else {
    
                    $extension_archivo = str_replace("image/", "", $tipo);
                    $tipo_archivo = "imagen";
    
                    if (!copy($ruta, $destino)) {
                        echo "<b>Error al copiar la imagen.</b>";
                        die();
                    } else {
    
                        $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
                        VALUES('$titulo','$archivo_name2','$extension_archivo','$tipo_archivo','$fech_hora_inicio','$fech_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";
    
                        $resultado = mysqli_query($mysqli, $sql);
    
                        if ($resultado > 0) {
                            echo "Imagen guardada exitosamente.";
                        } else {
                            echo "Ocurrio un error al guardar la imagen.";
                        }
                    }
                }
            } 
            
            
            
            else if ($tipo == 'video/mp4' || $tipo == 'video/avi' || $tipo == 'video/flv' || $tipo == 'video/mov' || $tipo == 'video/wmv' || $tipo == 'video/H.264' || $tipo == 'video/XVID' || $tipo == 'video/RM') {
                // echo "Hay un video prro!!";
                $archivo = $_FILES["archivo"]["name"];
                $video_ext = explode(".", $_FILES["archivo"]["name"]);
                $video_endext = end($video_ext);
                $video_name = strtolower(md5($archivo) . '.' . $video_endext);

                $video_name2 = $fk_sucursal.'_'.$fk_dispositivo.'_'.$video_name;
                $ruta = $_FILES["archivo"]["tmp_name"];
                $tamano_video = $_FILES['archivo']['size'];
                $destino = "../../multimedia/" . $video_name2;
                $limit_size = 52428800; //50MB limite
    
                if ($tamano_video > $limit_size) {
                    echo "El video excede el limite de 50MB, intenta nuevamente con otro archivo.<br>El archivo no se ha guardado.";
                } 
                
                else {
                    $extension_archivo = str_replace("video/", "", $tipo);
                    $tipo_archivo = "video";
    
    
                    if (!copy($ruta, $destino)) {
                        echo "Ocurrio un error al copiar el archivo a la ruta del servidor.<br>Verifique la conexion de su servidor.";
                        die();
                    } 
                    else {
                        $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
                                        VALUES('$titulo','$video_name2','$extension_archivo','$tipo_archivo','$fech_hora_inicio','$fech_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";
    
                        $resultado = mysqli_query($mysqli, $sql);
                        if ($resultado > 0) {
                            echo "La publicidad con un video se ha guardado exitosamente.";
                        } 
                        else {
                            echo "Ocurrio un error al guardar la publicidad con un video.";
                        }
                    }
                }
            } 
            
            
            //PONER EN LA LECTURA DE LA RUTA DE LOS ARCHIVOS LA RUTA ../../ 
            
            
            else if ($tipo == 'audio/mpeg' || $tipo == 'audio/mp3' || $tipo == 'audio/wav' || $tipo == 'audio/midi' || $tipo == 'audio/aac' || $tipo == 'audio/flac' || $tipo == 'audio/AIFF') {
                // echo "Hay un audio prro!!";
                $archivo = $_FILES["archivo"]["name"];
                $audio_ext = explode('.', $_FILES['archivo']['name']);
                $audio_endext = end($audio_ext);
                $audio_name = strtolower(md5($archivo) . '.' . $audio_endext);

                $audio_name2 = $fk_sucursal.'_'.$fk_dispositivo.'_'.$audio_name;
                $tamano_audio = $_FILES['archivo']['size'];
                $ruta = $_FILES["archivo"]["tmp_name"];
                $destino = "../../multimedia/" . $audio_name2;
    
                $limit_size = 10485760; //10MB audio
                if ($tamano_audio > $limit_size) {
                    echo "El Audio excede el limite de 10MB, intenta nuevamente con otro archivo.<br>El archivo no se ha guardado.<br>";
                } else {
                    
                    $extension_archivo = str_replace("audio/", "", $tipo);
                    $tipo_archivo = "audio";
    
                    if(!copy($ruta, $destino)){
                        echo "Error al copiar el audio a la ruta del servidor.<br>Por favor verifica la conexion a internet.";
                        die();
                    }else{
                        $sql = $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
                        VALUES('$titulo','$audio_name2','$extension_archivo','$tipo_archivo','$fech_hora_inicio','$fech_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";
       
                       $resultado = mysqli_query($mysqli, $sql);
       
                       if ($resultado > 0) {
                           echo "La publicidad que contiene un audio se ha guardado exitosamente.";
                       } else {
                           echo "Ocurrio un error al guardar el audio.";
                       }
                    }
    
                }
            }
        } 
        
        else {
            $tipo_archivo = "texto";
            $extension_archivo = "txt";
            $texto = $_POST['texto'];
    
            $str = $texto;
            $txtlenght = strlen($str);
            $titulo = strtoupper($titulo);
            if ($txtlenght < 5) {
                echo "El texto tiene que ser mayor a 5 caracteres.";
            } else {
    
                $sql = "INSERT INTO publicidad(titulo_publicidad,url_archivo,extension_archivo,tipo_archivo,fecha_hora_inicio,fecha_hora_final,estatus,texto, fk_sucursal,fk_dispositivo)
                 VALUES('$titulo','','$extension_archivo','$tipo_archivo','$fech_hora_inicio','$fech_hora_final',1,'$texto','$fk_sucursal','$fk_dispositivo')";
                $resultado = mysqli_query($mysqli, $sql);
    
                if ($resultado > 0) {
                    echo "Se ha guardado el texto exitosamente.";
                } else {
                    echo "Ocurrio un error al guardar el texto.";
                }
            }
        }

    }

} 