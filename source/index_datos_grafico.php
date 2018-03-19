<?php
    // Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include ('bd/conexion.php');
        include ('util.php');
        /*
        function datosPrueba(){
            $hoy = getdate();
            $jsondata = array();
            $jsondata['dias'] = array();
            $fechaHoy = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']; 
            $jd = gregoriantojd( $hoy['mon'] , $hoy['mday'] , $hoy['year'] );
            $jd = gregoriantojd(3,18,1018);
            echo jddayofweek($jd,1);
            $sql = "SELECT articulos.Id_Articulo, articulos.Descripcion AS Descripcion_Art, articulos.Precio AS Precio_Art, articulos.Cantidad AS Cantidad_Art, articulos.Disponible AS Disponible_Art, articulos.Estado AS Estado_Art, contenedores.Id_Contenedor, contenedores.Descripcion AS Descripcion_Cont,contenedores.Costo AS Costo_Cont, contenedores.Fecha_Ingreso AS Fecha_Ingreso_Cont, contenedores.Procedencia AS Procedencia_Cont, categorias.Id_Categoria, categorias.Nombre AS Nombre_Cat, categorias.Descripcion AS Descripcion_Cat FROM contenedores INNER JOIN (categorias INNER JOIN articulos ON categorias.Id_Categoria=articulos.Id_Categoria) ON contenedores.Id_Contenedor=articulos.Id_Contenedor WHERE articulos.$campo LIKE '%$texto%'";
            $jsondata['Hoy'] = getDay($hoy['wday']);
            $jsondata['HoyNum'] = $hoy['wday'];
            for ($i=0; $i < 7; $i++) {
                $diaNum = 'dia' . $i ;
                if ($i==$hoy['wday']) {
                    $jsondata['dias'][$diaNum] = "Hoy " . getDay($i) ;
                } else {
                    $jsondata['dias'][$diaNum] = getDay($i);
                }
            }
        }
        */
        $jsondata = array();
        $fechaDom = getFechaDom();
        $hoy = getdate();
        for ($i=0; $i <=6 ; $i++) { 
             $fecha = getSumFecha($fechaDom['ano'], $fechaDom['mes'],$fechaDom['dia'], $i);
             $fechaFormat = $fecha['ano']."-".$fecha['mes']."-".$fecha['dia'];
             $numDiaId = "dia".$i;
            $jsondata[$numDiaId] = array();
            $jsondata[$numDiaId]['Num'] = $i;
            $jsondata[$numDiaId]['Nom'] = labelDay($hoy['wday'], $i);
            $jsondata[$numDiaId]['Fecha'] = $fecha['dia']."-".$fecha['mes']."-".$fecha['ano'];
            // $ventas = getTotalVentas($fecha);
            $jsondata[$numDiaId]['Ventas'] = getTotalVentas($fechaFormat);
        }
        //$jsondata['FechaDom'] = $fechaDom;
        
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata, JSON_FORCE_OBJECT);
        exit();
    } else {
        header('location: page_denegado.php');
    }
?>