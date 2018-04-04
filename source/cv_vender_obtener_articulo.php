<?php
// Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include('bd/conexion.php');

        $Id_Articulo = $_POST['Id_Articulo'];
        
        $queryArticulo=mysqli_query($db, "SELECT * FROM articulos WHERE Id_Articulo='$Id_Articulo'") or die(mysqli_error());
        $rowArticulo=mysqli_fetch_array($queryArticulo);

        $jsondata = array();
        
        $jsondata['Id_Articulo'] = $rowArticulo['Id_Articulo'];
        $jsondata['Descripcion'] = $rowArticulo['Descripcion'];
        $jsondata['Precio_Unitario'] = $rowArticulo['Precio'];
        $jsondata['Existencias'] = $rowArticulo['Cantidad'];

        header('Content-type: application/json; charset=utf-8');
        
        echo json_encode($jsondata, JSON_FORCE_OBJECT);

        exit();
            
    } else {
        header('location: page_denegado.php');
    }
?>