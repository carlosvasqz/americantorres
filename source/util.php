<?php
    //1
    function getNomDia($numDia){
        switch ($numDia) {
            case 0:
                return 'Domingo';
                break;
            case 1:
                return 'Lunes';
                break;
            case 2:
                return 'Martes';
                break;
            case 3:
                return 'Miercoles';
                break;
            case 4:
                return 'Jueves';
                break;
            case 5:
                return 'Viernes';
                break;
            case 6:
                return 'Sabado';
                break;
        }
    }

    function getNomMes($numMes){
        switch ($numMes) {
            case 1:
                return 'Enero';
                break;
            case 2:
                return 'Febrero';
                break;
            case 3:
                return 'Marzo';
                break;
            case 4:
                return 'Abril';
                break;
            case 5:
                return 'Mayo';
                break;
            case 6:
                return 'Junio';
                break;
            case 7:
                return 'Julio';
                break;
            case 8:
                return 'Agosto';
                break;
            case 9:
                return 'Septiembre';
                break;
            case 10:
                return 'Octubre';
                break;
            case 11:
                return 'Noviembre';
                break;
            case 12:
                return 'Diciembre';
                break;
        }
    }

    function esBis($ano){
        $dif = $ano - 4;
        if (($dif%4)!==0) {
            return false;
        } else {
            return true;
        }    
    }

    function getDiaMax($numMes, $ano){
        switch ($numMes) {
            case 1 || 3 || 5 || 7 || 8 || 10 || 12:
                return 31;
                break;
            case 4 || 6 || 9 || 11:
                return 30;
                break;
            case 2:
                if (esBis($ano)){
                    return 29;
                }else{
                    return 28;
                }
                break;
            default:
                return false;
                break;
        }
    }

    function getDiaDom($neg, $ano, $mes){
        $pos = abs($neg);
        $diaDomVal = getDiaMax($mes, $ano) - $pos;
        return $diaDomVal;
    }

    function getFechaDom(){
        $hoy = getdate();
        $numDiaSem = $hoy['wday'];
        $numMes = $hoy['mon'];
        $numAno = $hoy['year'];
        $numDia = $hoy['mday'];
        $fechaHoy = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
        $diaDom = $numDia - $numDiaSem;
        if ($diaDom==0) {
            $numMes -= 1;
            if ($numMes==0) {
                $numAno -= 1;
                $numMes = 12;
                $diaDom = getDiaMax($numMes, $numAno);
            } else {
                $diaDom = getDiaMax($numMes, $numAno);
            }
        }
        if ($diaDom<0) {
            $diaMes -= 1;
            if ($numMes==0) {
                $numAno -= 1;
                $numMes = 12;
                $diaDom = getDiaDom($diaDom, $numAno, $numMes);
            } else {
                $diaDom = getDiaDom($diaDom, $numAno, $numMes);
            }
        }
        $fechaDom = array();
        $fechaDom['dia'] = $diaDom;
        $fechaDom['mes'] = $numMes;
        $fechaDom['ano'] = $numAno;
        return $fechaDom;
    }

    //2
    function getTotalVentas($fecha){
        include ('bd/conexion.php');
        $sql = "SELECT SUM(Precio) AS Ventas_Dia FROM ventas V INNER JOIN detalles_ventas DV ON V.Id_Venta=DV.Id_Venta WHERE V.Fecha='$fecha';";
        $queryVentas=mysqli_query($db, $sql) or die(mysqli_error());
        $rowVentas=mysqli_fetch_array($queryVentas);
        $ventasDia = $rowVentas['Ventas_Dia'];
        if(is_null($ventasDia)){
            return 0;
        }else{
            return $ventasDia;
        }
        
    }

    function labelDay($i){
        $hoy = getdate();
        $hoyWDay = $hoy['wday']-1;
        if ($hoyWDay<=0) {
            $hoyWDay = 0;
        }
        if ($hoyWDay==$i) {
            return "Hoy ".getNomDia($i);
        } else {
            return getNomDia($i);
        }
    }

    function getSumFecha($ano, $mes, $dia, $numDiaSem){
        $sigDia = $dia + $numDiaSem;
        if ($sigDia>getDiaMax($mes, $ano)) {
            $sigMes = $mes + 1;
            if ($sigMes>12) {
                $sigAno = $ano + 1;
                $sigMes = 1;
            } else {
                $sigAno = $ano;
            }
            $sigDia -= getDiaMax($mes, $ano);
        } else {
            $sigMes = $mes;
            $sigAno = $ano;
        }
        $fecha = array();
        $fecha['dia'] = $sigDia;
        $fecha['mes'] = $sigMes;
        $fecha['ano'] = $sigAno;
        return $fecha;
    }

    function getNumVentas(){
        include ('bd/conexion.php');
        $queryNumVentas=mysqli_query($db, "SELECT COUNT(*) AS Num_Ventas FROM ventas") or die(mysqli_error());
        $rowNumVentas=mysqli_fetch_array($queryNumVentas);
        return $rowNumVentas['Num_Ventas'];
    }

    function getArticulo($id){
        include ('bd/conexion.php');
        $queryNumVentas=mysqli_query($db, "SELECT * FROM articulos WHERE Id_Articulo='$id'") or die(mysqli_error());
        $rowNumVentas=mysqli_fetch_array($queryNumVentas);
        return $rowNumVentas;
    }

    // function setDatos(){
    //     $jsondata = array();
    //     $fechaDom = getFechaDom();
    //     $hoy = getdate();
    //     for ($i=0; $i <=6 ; $i++) { 
    //         $fecha = getSumFecha($fechaDom['ano'], $fechaDom['mes'],$fechaDom['dia'], $i);
    //         $numDiaId = "dia".$i;
    //         $jsondata[$numDiaId] = array();
    //         $jsondata[$numDiaId]['Num'] = $i;
    //         $jsondata[$numDiaId]['Nom'] = labelDay($hoy['wday'], $i);
    //         $jsondata[$numDiaId]['Fecha'] = $fecha['dia']."-".$fecha['mes']."-".$fecha['ano'];
    //         $ventas = getTotalVentas($fecha);
    //         if ($ventas!==null) {
    //             $jsondata[$numDiaId]['Ventas'] = $ventas;
    //         } else {
    //             $jsondata[$numDiaId]['Ventas'] = 0;
    //         }
    //     }
    // }
?>