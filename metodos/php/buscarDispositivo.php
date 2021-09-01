<?php 
include_once('../php/conexion.php');

$fk_sucursal = $_GET['id_sucursal'];

$consulta = "SELECT id_dispositivo, nombre_dispositivo FROM dispositivo WHERE fk_sucursal='$fk_sucursal' AND estatus=1";
$resultado = mysqli_query($mysqli, $consulta);


echo $html = "<option value='' selected='' disabled>Seleccionar un dispositivo</option>";

while($datos = mysqli_fetch_array($resultado)){
    echo $html = "<option value=".$datos['id_dispositivo'].">".$datos['nombre_dispositivo']."</option>";
}

?>