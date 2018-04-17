<?php
    // Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include ('bd/conexion.php');
        include ('util.php');
        $jsondata;
        $sqlGanancias = "SELECT SUM(Utilidad) AS Total_Ganancias FROM cierres_mensuales;";
        $queryGanancias=mysqli_query($db, $sqlGanancias) or die(mysqli_error());
        $rowGanancias=mysqli_fetch_array($queryGanancias);
        if(is_null($rowGanancias['Total_Ganancias'])){
            $jsondata = 0;
        }else{
            $jsondata = $rowGanancias['Total_Ganancias'];
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
        exit();
    } else {
        header('location: page_denegado.php');
    }
?>