<?php
    include_once "../php/conexion.php";

    $id_sucursal = $_POST['id_sucursal'];

    $sucursal_dispositivo = "SELECT * FROM dispositivo d, sucursal s 
    WHERE d.fk_sucursal = s.id_sucursal 
    AND fk_sucursal = '$id_sucursal' 
    AND d.estatus=1 
    AND s.estatus=1";
    
    $consulta = mysqli_query($mysqli, $sucursal_dispositivo);
    

    if(mysqli_num_rows($consulta) > 0){
        $row = mysqli_fetch_array($consulta);
    }else{
        echo "No se ha obtenido ningun resultado";
    }

    

?>