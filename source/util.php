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

    function dayToDia($day){
        switch ($day) {
            case 'Sunday':
                return 'Domingo';
                break;
            case 'Monday':
                return 'Lunes';
                break;
            case 'Tuesday':
                return 'Martes';
                break;
            case 'Wednesday':
                return 'Miercoles';
                break;
            case 'Thursday':
                return 'Jueves';
                break;
            case 'Friday':
                return 'Viernes';
                break;
            case 'Saturday':
                return 'Sabado';
                break;
        }
    }

    function monthToMes($mes){
        switch ($mes) {
            case 'January':
                return 'Enero';
                break;
            case 'February':
                return 'Febrero';
                break;
            case 'March':
                return 'Marzo';
                break;
            case 'April':
                return 'Abril';
                break;
            case 'May':
                return 'Mayo';
                break;
            case 'June':
                return 'Junio';
                break;
            case 'July':
                return 'Julio';
                break;
            case 'August':
                return 'Agosto';
                break;
            case 'September':
                return 'Septiembre';
                break;
            case 'October':
                return 'Octubre';
                break;
            case 'November':
                return 'Noviembre';
                break;
            case 'December':
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
        $meses31 = array(1, 3, 5, 7, 8, 10, 12);
        $meses30 = array(4, 6, 9, 11);
        if (in_array($numMes, $meses31)) {
            return 31;
        } else if (in_array($numMes, $meses30)){
            return 30;
        } else if ($numMes==2){
            if (esBis($ano)){
                return 29;
            }else{
                return 28;
            }
        } else {
            return false;
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
        $sqlVentas = "SELECT SUM(Precio) AS Ventas_Dia FROM ventas V INNER JOIN detalles_ventas DV ON V.Id_Venta=DV.Id_Venta WHERE V.Fecha='$fecha';";
        $queryVentas=mysqli_query($db, $sqlVentas) or die(mysqli_error());
        $rowVentas=mysqli_fetch_array($queryVentas);
        $sqlDescuentos = "SELECT SUM(Descuento) AS Descuentos_Dia FROM ventas WHERE Fecha='$fecha';";
        $queryDescuentos=mysqli_query($db, $sqlDescuentos) or die(mysqli_error());
        $rowDescuentos=mysqli_fetch_array($queryDescuentos);
        $ventasDia = $rowVentas['Ventas_Dia'] - $rowDescuentos['Descuentos_Dia'];
        if(is_null($ventasDia)){
            return 0;
        }else{
            return $ventasDia;
        }
        
    }

    function getTotalVentasMes($fechaMes){
        include ('bd/conexion.php');
        $sqlVentas = "SELECT SUM(Ventas_dia) AS Ventas_Mes FROM cierres_diarios WHERE Fecha LIKE '$fechaMes%';";
        $queryVentas=mysqli_query($db, $sqlVentas) or die(mysqli_error());
        $rowVentas=mysqli_fetch_array($queryVentas);
        if(is_null($rowVentas['Ventas_Mes'])){
            return 0;
        }else{
            return $rowVentas['Ventas_Mes'];
        }
    }

    function getTotalSPMes($fechaMes){
        include ('bd/conexion.php');
        $sqlSP = "SELECT SUM(Monto) AS Total_SP FROM pagos_servs_pubs WHERE Fecha LIKE '$fechaMes%';";
        $querySP=mysqli_query($db, $sqlSP) or die(mysqli_error());
        $rowSP=mysqli_fetch_array($querySP);
        if(is_null($rowSP['Total_SP'])){
            return 0;
        }else{
            return $rowSP['Total_SP'];
        }
    }

    function getTotalNominasMes($fechaMes){
        include ('bd/conexion.php');
        $sqlNomina = "SELECT SUM(Monto) AS Nominas_Mes FROM nominas WHERE Fecha LIKE '$fechaMes%';";
        $queryNomina=mysqli_query($db, $sqlNomina) or die(mysqli_error());
        $rowNomina=mysqli_fetch_array($queryNomina);
        if(is_null($rowNomina['Nominas_Mes'])){
            return 0;
        }else{
            return $rowNomina['Nominas_Mes'];
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
        if(is_null($rowNumVentas['Num_Ventas'])){
            return 0;
        }else{
            return $rowNumVentas['Num_Ventas'];
        }
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
        $subtotal = $totales[3] + $descuento;
        $sqlVenta = "INSERT INTO ventas(Id_Venta, Cliente, Direccion_Cliente, Telefono_Cliente, Id_Usuario, Descuento, Fecha, Subtotal, Total) VALUES ($idVenta, '$datosCliente[0]', '$datosCliente[1]', '$datosCliente[2]', '$idUsuario', $descuento, '$fecha', $subtotal, $totales[3])";
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

    function actualizarArts(){
        include ('bd/conexion.php');
        $queryArts=mysqli_query($db, "SELECT * FROM articulos WHERE Cantidad=0") or die(mysqli_error());
        while($rowArts=mysqli_fetch_array($queryArts)){
            $sqlUPDATES = "UPDATE articulos SET Disponible=0 WHERE Id_Articulo = '".$rowArts['Id_Articulo']."';";
            $actualizarArts=mysqli_query($db, $sqlUPDATES) or die(mysqli_error());
        }
    }

    function contarContenedores(){
        include ('bd/conexion.php');
        $sqlCantContenedores = "SELECT COUNT(*) AS Cantidad FROM contenedores;";
        $queryCantContenedores=mysqli_query($db, $sqlCantContenedores) or die(mysqli_error());
        $rowCantContenedores=mysqli_fetch_array($queryCantContenedores);
        if(is_null($rowCantContenedores['Cantidad'])){
            return 0;
        }else{
            return $rowCantContenedores['Cantidad'];
        }
    }

    function contarArticulos(){
        include ('bd/conexion.php');
        $sqlCantArticulos = "SELECT COUNT(*) AS Cantidad FROM articulos;";
        $queryCantArticulos=mysqli_query($db, $sqlCantArticulos) or die(mysqli_error());
        $rowCantArticulos=mysqli_fetch_array($queryCantArticulos);
        if(is_null($rowCantArticulos['Cantidad'])){
            return 0;
        }else{
            return $rowCantArticulos['Cantidad'];
        }
    }

    function totalDescuentos(){
        include ('bd/conexion.php');
        $sqlCantDescuentos = "SELECT SUM(Descuento) AS Total_Descuento FROM ventas;";
        $queryCantDescuentos=mysqli_query($db, $sqlCantDescuentos) or die(mysqli_error());
        $rowCantDescuentos=mysqli_fetch_array($queryCantDescuentos);
        if(is_null($rowCantDescuentos['Total_Descuento'])){
            return 0;
        }else{
            return $rowCantDescuentos['Total_Descuento'];
        }
    }

    function totalServPub(){
        include ('bd/conexion.php');
        $sqlCantServPub = "SELECT SUM(Monto) AS Total_Serv_Pub FROM pagos_servs_pubs;";
        $queryCantServPub=mysqli_query($db, $sqlCantServPub) or die(mysqli_error());
        $rowCantServPub=mysqli_fetch_array($queryCantServPub);
        if(is_null($rowCantServPub['Total_Serv_Pub'])){
            return 0;
        }else{
            return $rowCantServPub['Total_Serv_Pub'];
        }
    }

    function totalPlanillas(){
        include ('bd/conexion.php');
        $sqlCantPlanillas = "SELECT SUM(Total_Planilla) AS Total_Planilla FROM cierres_mensuales;";
        $queryCantPlanillas=mysqli_query($db, $sqlCantPlanillas) or die(mysqli_error());
        $rowCantPlanillas=mysqli_fetch_array($queryCantPlanillas);
        if(is_null($rowCantPlanillas['Total_Planilla'])){
            return 0;
        }else{
            return $rowCantPlanillas['Total_Planilla'];
        }
    }

    function totalEnVentas(){
        include ('bd/conexion.php');
        $queryTotalVentas=mysqli_query($db, "SELECT SUM(Precio) AS Total_Ventas FROM detalles_ventas") or die(mysqli_error());
        $rowTotalVentas=mysqli_fetch_array($queryTotalVentas); 
        $queryTotalDescuentos=mysqli_query($db, "SELECT SUM(Descuento) AS Total_Descuentos FROM ventas") or die(mysqli_error());
        $rowTotalDescuentos=mysqli_fetch_array($queryTotalDescuentos); 
        $totalVentas = $rowTotalVentas['Total_Ventas'] - $rowTotalDescuentos['Total_Descuentos'];
        if(is_null($totalVentas)){
            return 0;
        }else{
            return $totalVentas;
        }
    }

?>