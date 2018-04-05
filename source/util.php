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
        date_default_timezone_set('America/Tegucigalpa');        
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
        $sql = "SELECT SUM(Precio)-Descuento AS Ventas_Dia FROM ventas V INNER JOIN detalles_ventas DV ON V.Id_Venta=DV.Id_Venta WHERE V.Fecha='$fecha';";
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
        date_default_timezone_set('America/Tegucigalpa');        
        $hoy = getdate();
        // $hoyWDay = $hoy['wday']-1;
        $hoyWDay = $hoy['wday'];
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

    function array_1d_to_2d($array1d, $width){
        $length = count($array1d);    
        $array2d = array();
        $xn;
        $yn;
        for($i = 0; $i < $length; $i++){
            $yn = floor($i/$width);
            $xn = $i - $yn*$width;
            $array2d[$yn][$xn] = $array1d[$i];
        }
        return $array2d;
    } 

    function array_2d_to_1d($array2d){
        $height  = count($array2d);
        $array1d = array(); 
        $a = 0;
        for($i = 0; $i < $height; $i++)
        {
            for($j = 0; $j < count($array2d, $i); $j++)
            {
                $array1d[$a++] = $array2d[$i][$j];
            }
        }
        return $array1d;
    }

    function getIdUsser($nombre){
        include ('bd/conexion.php');
        $sql = "SELECT Id_Usuario FROM usuarios WHERE Nombre='$nombre'";
        $queryUsser=mysqli_query($db, $sql) or die(mysqli_error());
        $rowUsserId=mysqli_fetch_array($queryUsser);
        return $rowUsserId['Id_Usuario'];
    }

    function getLastSell(){
        include ('bd/conexion.php');
        $sql = "SELECT MAX(Id_Venta) AS UltimoId FROM ventas";
        $queryLast=mysqli_query($db, $sql) or die(mysqli_error());
        $rowLastSell=mysqli_fetch_array($queryLast);
        return $rowLastSell['UltimoId'];
    }

    function guardarDetalles($values){
        include ('bd/conexion.php');
        $sqlDetalles = "INSERT INTO detalles_ventas(Id_Venta, Num_Detalle, Id_Articulo, Cantidad, Precio) VALUES $values";
        $guardarDatos=mysqli_query($db, $sqlDetalles) or die(mysqli_error());
        return true;
    }

    function guardarVenta($datosCliente, $nombreUsuario, $fecha, $totales){
        include ('bd/conexion.php');
        $idUsuario = getIdUsser($nombreUsuario);
        $descuento;
        if ($totales[1]=="Valor") {
            $descuento = $totales[2];
        } else if ($totales[1]=="Porcentaje"){
            $descuento = $totales[0]*($totales[2]/100);
        }
        $idVenta = getLastSell() + 1;
        $fecha = trim($fecha);
        $sqlVenta = "INSERT INTO ventas(Id_Venta, Cliente, Id_Usuario, Descuento, Fecha) VALUES ($idVenta, '$datosCliente[0]', '$idUsuario', $descuento, '$fecha')";
        $guardarDatos=mysqli_query($db, $sqlVenta) or die(mysqli_error());
        // $rowRespuesta=mysqli_fetch_array($guardarDatos);
        // if($rowRespuesta=mysqli_fetch_array($guardarDatos)){
            // guardarDetalles();
        // }else{

        // }
        // if ($rowRespuesta){
            return true;
        // }else{
        //     return false;
        // }
    }

    function arrToStrArtsVenta($arrArtData2D){
        $values = "";
        foreach($arrArtData2D as $count => $row){
          $idVenta = getLastSell()+1;
          $values = $values . "(" . $idVenta . ",";
          for ($i=0; $i < 6; $i++) { 
            if($i==1){
              $values = $values . "'" . $arrArtData2D[$count][$i] . "',";
            }else if($i==2||$i==4){
            }else if ($i==5) {
              $values = $values . $arrArtData2D[$count][$i];
            }else{
              $values = $values . $arrArtData2D[$count][$i] . ",";
            }
          }
          $values = $values . "),";
        }
        $valuesLength = strlen($values);
        $valuesSQL = substr($values, 0, $valuesLength-1);
        return $valuesSQL;
    }

    function restarArts($arrArtData2D){
        include ('bd/conexion.php');
        foreach($arrArtData2D as $index => $valor){
            $sqlUPDATES = "UPDATE articulos SET Cantidad = Cantidad-$valor[3] WHERE Id_Articulo = '$valor[1]';";
            $actualizarArts=mysqli_query($db, $sqlUPDATES) or die(mysqli_error());
        }
    }
?>