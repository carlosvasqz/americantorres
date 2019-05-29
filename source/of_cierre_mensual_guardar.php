<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) {
		include ('bd/conexion.php');
        $fechaCierre = $_POST['fechaCierre'];
        $horaCierre = $_POST['horaCierre'];
        $fechaInicial = $_POST['fechaInicial'];
        $fechaFinal = $_POST['fechaFinal'];
        $ventasMes = $_POST['ventasMes'];
        $servPubMes = $_POST['servPubMes'];
        $nominasMes = $_POST['nominasMes'];
        $utilidad = $_POST['utilidad'];
        $fechaMesDB = $_POST['fechaMesDB'];
        $queryVerificarCierreMes = mysqli_query($db, "SELECT COUNT(*) as Existe FROM cierres_mensuales WHERE Fecha_Cierre LIKE '$fechaMesDB%'") or die (mysqli_error());
        $rowExisteCierreMes=mysqli_fetch_array($queryVerificarCierreMes);
        if ($rowExisteCierreMes['Existe']==0) {   
            $queryVerificarCierreDiaHoy = mysqli_query($db, "SELECT COUNT(*) as Existe FROM cierres_diarios WHERE Fecha='$fechaCierre'") or die (mysqli_error());
            $rowExisteCierreDiaHoy=mysqli_fetch_array($queryVerificarCierreDiaHoy);
            if ($rowExisteCierreDiaHoy['Existe']==0) {
                echo "NoExisteCierreDiaHoy";
            } else {
                $queryInsert = "INSERT INTO cierres_mensuales(Fecha_Inicial, Fecha_Final, Fecha_Cierre, Hora_Cierre, Total_Ventas_Mes, Total_Serv_Pub, Total_Planilla, Utilidad) VALUES ('$fechaInicial', '$fechaFinal', '$fechaCierre', '$horaCierre', $ventasMes, $servPubMes, $nominasMes, $utilidad);";
                $queryGuardar = mysqli_query($db, $queryInsert) or die(mysqli_error());
                // $rowGuardar = mysqli_fetch_array($queryGuardar);
                echo 'Guardado';
            }
        } else {
            echo "ExisteCierreMensual";
        }
    } else {
        header('location: page_denegado.php');
    }
?>