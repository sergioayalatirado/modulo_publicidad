<?php
if (isset($_POST['id_dispositivo'])) {
    include("../php/conexion.php");
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_POST['id_dispositivo']);

    $mostrar = "UPDATE dispositivo SET estatus=0 WHERE id_dispositivo=$id";
    $resultado = mysqli_query($mysqli, $mostrar);

    if ($resultado > 0) {
       echo "Dispositivo dado de baja exitosamente.";
    } else {
        echo "Ocurrio un error.";
    }
} 