<?php
if(isset($_GET['id'])){
include "../php/conexion.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    
    $id = validate($_GET['id']);

    $busqueda_id = "SELECT url_archivo, tipo_archivo, texto FROM publicidad WHERE id_publicidad=$id";
    $resultado = mysqli_query($mysqli, $busqueda_id);

    // $resultado = mysqli_fetch_array($resultado);
    $resultado = mysqli_fetch_assoc($resultado);
    //MOSTRAR EL VALOR DE LOS DISTINTOS ARRAY QUE SE CAPTURARON DENTRO DE LOS RESULTADO
    $archivo = $resultado['url_archivo'];
    $texto = $resultado['texto'];
    $tipo = $resultado['tipo_archivo'];

    //MOSTRAR SI LA VARIABLE $IMAGEN ESTA NULA
    echo strtoupper($tipo).'.<br>';


    //VALIDAR QUE NO TENGAN VALORES IMAGEN, VIDEO O TEXTO
    if($archivo==null || $archivo="" || $archivo == false){
                echo strtoupper("No hay ningun tipo de archivo dentro de la url archivo.<br>");
    }else{
        if($tipo=='imagen'){
                echo strtoupper("Hay una imagen.<br>");
        }else if($tipo=='video'){
                echo strtoupper("Hay un video.<br>");
        }else if($tipo=='texto'){
                echo strtoupper("Hay texto.<br>");
        }else if($tipo=='audio'){
                echo strtoupper('Hay un audio.<br>');
        }
    }
}