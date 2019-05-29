<?php
    // Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include ('bd/conexion.php');
        include ('util.php');
        $jsondata;
        $sqlInversion = "SELECT SUM(Costo) AS Total_Inversion FROM contenedores;";
        $queryInversion=mysqli_query($db, $sqlInversion) or die(mysqli_error());
        $rowInversion=mysqli_fetch_array($queryInversion);
        if(is_null($rowInversion['Total_Inversion'])){
            $jsondata = 0;
        }else{
            $jsondata = $rowInversion['Total_Inversion'];
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
        exit();
    } else {
        header('location: page_denegado.php');
    }
?>