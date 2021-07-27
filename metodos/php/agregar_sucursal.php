<?php
if (isset($_POST)) {
    include_once "../php/conexion.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
    $sucursal = validate($_POST['sucursal']);
    $tipo_suc = validate($_POST['tipo_sucursal']);

    $sql = "SELECT * from sucursal WHERE nombre_sucursal='$sucursal' AND tipo_sucursal='$tipo_suc'";
    $resultado1 = mysqli_query($mysqli, $sql);
    $r1_rows = mysqli_num_rows($resultado1);

    if ($r1_rows > 0) {
        echo "Existe un registro con los mismos datos, por favor verifica e intenta nuevamente.";
    } else {

        if (empty($sucursal)) {
            echo 'Sucursal requerida.';
        } else if (empty($tipo_suc)) {
            echo 'Tipo de sucursal requerido.';
        } else {
            $sql2 = "INSERT INTO sucursal(nombre_sucursal, tipo_sucursal)
                VALUES('$sucursal','$tipo_suc')";
            $resultado2 = mysqli_query($mysqli, $sql2);
            if ($resultado2 > 0) {
                echo 'Nueva sucursal agregada exitosamente.';
            } else {
                echo 'Ocurrio un error, verifica nuevamente.';
            }
        }
    }
}
