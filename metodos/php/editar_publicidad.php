<?php
include_once "../php/conexion.php";
//Mostrar por ID

function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

if (isset($_GET['id'])) {

    $id = validate($_GET['id']);
    // $mostrar = "SELECT * FROM dispositivo d , publicidad p , sucursal s WHERE p.fk_dispositivo = d.id_dispositivo AND p.fk_sucursal= s.id_sucursal AND id_publicidad=$id";
    $mostrar = "SELECT * FROM publicidad WHERE id_publicidad='$id'";
    $resultado = mysqli_query($mysqli, $mostrar);

    if (mysqli_num_rows($resultado)>0) {
        $row = mysqli_fetch_assoc($resultado);
        var_dump($row);
    } else {
        header("Location: ../../../formularios/leer_publicidad.php");
    }
} 



//Actualizar por ID
else if (isset($_POST['id_publicidad'])) {


    $id = validate($_POST['id']);

    $titulo_publicidad = validate($_POST['titulo_publicidad']);
    $texto = validate($_POST['texto']);
    $fecha_hora_inicio = validate($_POST['fecha_hora_inicio']);
    $fecha_hora_final = validate($_POST['fecha_hora_final']);
    $fk_sucursal = validate($_POST['fk_sucursal']);
    $fk_dispositivo = validate($_POST['fk_dispositivo']);

    $datos_usuario = 'titulo_publicidad=' . $titulo_publicidad . '&texto=' . $texto . '&fhi=' . $fecha_hora_inicio . '&fhf=' . $fecha_hora_final . '&fsuc=' . $fk_sucursal . '&fdis=' . $fk_dispositivo;


    if (empty($titulo_publicidad)) {
        header("Location: ../editar_publicidad.php?id=$id&error=titulo es requerido");
    } else if (empty($fecha_hora_final)) {
        header("Location: ../editar_publicidad.php?id=$id&error=fecha final es requerido");
    } else if (empty($fecha_hora_inicio)) {
        header("Location: ../editar_publicidad.php?id=$id&error=fecha inicio es requerido");
    } else if (empty($fk_sucursal)) {
        header("Location: ../editar_publicidad.php?id=$id&error=Sucursal es requerido");
    } else if (empty($fk_dispositivo)) {
        header("Location: ../editar_publicidad.php?id=$id&error=Dispositivo es requerido");
    } else if ($fecha_hora_inicio > $fecha_hora_final) {
        header("Location: ../editar_publicidad.php?id=$id&error=Hora inicio es mayor a la final");
    } else {

        include("conexion.php");
        $sqlid = "SELECT * FROM publicidad WHERE id_publicidad='$id'";
        $resultado = mysqli_query($mysqli, $sqlid);

        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
        } else {
            echo "No hay nada";
        }
        //NOTA 21/06/2021 REVISAR EL COMO ACTUALIZAR UNA PUBLICIDAD EN EL CASO DE QUE NO SE QUIERA ACTUALIZAR EL ARCHIVO PARA QUE SE INSERTEN TODOS LOS DATOS EXCEPTO EL ARCHIVO DE LA RUTA DE LA BDD 
        //REVISAR QUE SE ACTUALICE EN CASO DE QUE NO TENGA NINGUN ARCHIVO Y TOME COMO SI EL USUARIO NO QUIERE ACTUALIZAR EL ARCHIVO QUE SE ENCUENTRA DENTRO DE ESTA PUBLICIDAD
        //HASTA LA LINEA DE var_dump SIRVE LOS COMANDOS
        $tipo = $_FILES['archivo']['type'];
        var_dump($tipo);
        echo "Editar publicidad aun esta en modificacion";
    }
} else {
    echo "Entro al else";
}
