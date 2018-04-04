<?php
    // Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include('bd/conexion.php');

        // Recuperar los datos enviados a traves del metodo POST
        $campo = $_POST['campo'];
        $texto = $_POST['texto'];

        $sql = "SELECT articulos.Id_Articulo, articulos.Descripcion AS Descripcion_Art, articulos.Precio AS Precio_Art, articulos.Cantidad AS Cantidad_Art, articulos.Disponible AS Disponible_Art, articulos.Estado AS Estado_Art, contenedores.Id_Contenedor, contenedores.Descripcion AS Descripcion_Cont,contenedores.Costo AS Costo_Cont, contenedores.Fecha_Ingreso AS Fecha_Ingreso_Cont, contenedores.Procedencia AS Procedencia_Cont, categorias.Id_Categoria, categorias.Nombre AS Nombre_Cat, categorias.Descripcion AS Descripcion_Cat FROM contenedores INNER JOIN (categorias INNER JOIN articulos ON categorias.Id_Categoria=articulos.Id_Categoria) ON contenedores.Id_Contenedor=articulos.Id_Contenedor";
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
                $jsondata["datos"] = array(
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