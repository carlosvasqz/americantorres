<?php
    // Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include ('bd/conexion.php');
        include ('util.php');
        $jsondata = array();
        date_default_timezone_set('America/Tegucigalpa');        
        $hoy = getdate();
        for ($i=0; $i <=11 ; $i++) { 
            $fechaFormat = $hoy['year']."-".($i+1)."-1";
            $numMes = "mes".($i+1);
            $jsondata[$numMes] = utilidadMes($fechaFormat);
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
        exit();
    } else {
        header('location: page_denegado.php');
    }
?>