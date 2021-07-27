<?php

include_once "conexion.php";

$mostrar = "SELECT * FROM dispositivo d , publicidad p , sucursal s 
WHERE p.fk_dispositivo = d.id_dispositivo AND p.fk_sucursal= s.id_sucursal AND p.estatus=1 ORDER BY id_publicidad ASC";
$resultado = mysqli_query($mysqli, $mostrar);