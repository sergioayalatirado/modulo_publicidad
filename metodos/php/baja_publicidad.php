<?php

include_once "conexion.php";

if (isset($_POST['id_publicidad'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_POST['id_publicidad']);

    $actualizar = "UPDATE publicidad SET estatus=0 WHERE id_publicidad='$id'";
    $resultado = mysqli_query($mysqli, $actualizar);

    // echo $resultado;
    if ($resultado > 0) {
        echo "Se ha eliminado exitosamente la publicidad.";
    } else {
        echo "Ocurrio un al eliminar la publicidad.";
    }
}else{
    echo "Error critico.";   
}
