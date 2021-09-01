<?php
if (isset($_GET['id_publicidadpt'])) {
        include "../php/conexion.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $id = validate($_GET['id_publicidadpt']);

        $busqueda_id = "SELECT url_archivo, tipo_archivo, texto FROM publicidad WHERE id_publicidad=$id";
        $resultado = mysqli_query($mysqli, $busqueda_id);

        // $resultado = mysqli_fetch_array($resultado);
        $resultado = mysqli_fetch_assoc($resultado);
        //MOSTRAR EL VALOR DE LOS DISTINTOS ARRAY QUE SE CAPTURARON DENTRO DE LOS RESULTADO
        $archivo = $resultado['url_archivo'];
        $texto = $resultado['texto'];
        $tipo = $resultado['tipo_archivo'];


        //VALIDAR QUE NO TENGAN VALORES IMAGEN, VIDEO O TEXTO
        if ($archivo != null || $archivo != "" || $archivo != false || $texto !="" || $texto !=null) {
                
                $ar = $resultado['url_archivo'];
                if ($tipo == 'imagen') {

                        echo "<img src='multimedia/$ar'></img>";
                } else if ($tipo == 'video') {

                        echo "<div class='embed-responsive embed-responsive-21by9 rounded'>
                        <iframe class='embed-responsive-item' src='multimedia/$ar'></iframe>
                              </div>";

                } else if ($tipo == 'texto') {
                        echo "<MARQUEE SCROLLAMOUNT =20 loop='infinite' style='font-size: 100px; padding: 150px; margin: 5% 5% 5%'><b>$texto</b></MARQUEE>";

                } else if ($tipo == 'audio') {
                        echo "<div class='embed-responsive embed-responsive-21by9 rounded'>
                        <iframe class='embed-responsive-item' src='multimedia/$ar'></iframe>
                              </div>";
                } else {
                        echo "EL ARCHIVO NO ES COMPATIBLE.";
                }

        } else {
                echo strtoupper("No hay ningun tipo de archivo dentro de la url archivo.<br>");

        }       
}
