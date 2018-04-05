<?php
    // Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include ('bd/conexion.php');
        include ('util.php');
        $jsondata = array();
        $fechaDom = getFechaDom();
        date_default_timezone_set('America/Tegucigalpa');        
        $hoy = getdate();
        for ($i=0; $i <=6 ; $i++) { 
            $fecha = getSumFecha($fechaDom['ano'], $fechaDom['mes'],$fechaDom['dia'], $i);
            $fechaFormat = $fecha['ano']."-".$fecha['mes']."-".$fecha['dia'];
            $numDiaId = "dia".$i;
            $jsondata[$numDiaId] = array();
            $jsondata[$numDiaId]['Num'] = $i;
            $jsondata[$numDiaId]['Nom'] = labelDay($i);
            $jsondata[$numDiaId]['Fecha'] = $fecha['dia']."-".$fecha['mes']."-".$fecha['ano'];
            $jsondata[$numDiaId]['Ventas'] = getTotalVentas($fechaFormat);
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
        exit();
    } else {
        header('location: page_denegado.php');
    }
?>