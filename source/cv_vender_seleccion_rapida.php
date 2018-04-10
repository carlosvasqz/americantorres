<?php
// Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include('bd/conexion.php');

        $sql = "SELECT Id_Articulo, Descripcion, Precio, Cantidad, Estado FROM articulos";

        if (isset($_POST['filtro'])) {
            $filtro = $_POST['filtro'];
            $sql = "SELECT Id_Articulo, Descripcion, Precio, Cantidad, Estado FROM articulos WHERE Id_Articulo LIKE '%$filtro%' OR Descripcion LIKE '%$filtro%' AND Cantidad>0";
        }

        $jsondata = array();
        $queryArticulo = mysqli_query($db, $sql) or die(mysqli_error());
        if ($queryArticulo->num_rows>0) {
            $jsondata['exito'] = true;
            $jsondata['datos']['mensaje'] = sprintf("Se han encontrado %d articulos", $queryArticulo->num_rows);
            $jsondata['datos']['articulo'] = array();
            while ($rowArticulo = $queryArticulo->fetch_object()) {
                $jsondata['datos']['articulo'][] = $rowArticulo;
            }
        } else {
            
            $jsondata['exito'] = false;
            $jsondata['datos'] = array(
                'mensaje' => 'No se encontró ningún resultado.'
                );
            
        }
        
        header('Content-type: application/json; charset=utf-8');
        
        echo json_encode($jsondata, JSON_FORCE_OBJECT);

        exit();
            
    } else {
        header('location: page_denegado.php');
    }
?>