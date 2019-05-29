<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 
		include ('bd/conexion.php');
        $fechaCierre = $_POST['fechaCierre'];
        $horaCierre = $_POST['horaCierre'];
        $ventasDia = $_POST['ventasDia'];
        $cajaDiaSig = $_POST['cajaDiaSig'];
        $coincidio = $_POST['coincidio'];
        $tipoDiferencia = $_POST['tipoDiferencia'];
        $diferenciaValor = $_POST['diferenciaValor'];
        $diferenciaValor = abs($diferenciaValor);
        $diferenciaDesc = $_POST['diferenciaDesc'];	
        $queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM cierres_diarios WHERE Fecha='$fechaCierre'") or die (mysqli_error());
        $rowExiste=mysqli_fetch_array($queryVerificar);
        if($rowExiste['Existe']==0){
            // VALUES ('2018-4-6','17:11:4',1187.5,1000,1,0,0,'')
            $queryInsert = "INSERT INTO cierres_diarios(Fecha, Hora, Ventas_dia, Caja_Base_Dia_Sig, Coincidio, Tipo_Diferencia, Diferencia, Descripcion_Diferencia) VALUES ('$fechaCierre', '$horaCierre', $ventasDia, $cajaDiaSig, $coincidio, $tipoDiferencia, $diferenciaValor, '$diferenciaDesc');";
            $queryGuardar = mysqli_query($db, $queryInsert) or die(mysqli_error());
            echo 'Guardado';
        }else if ($rowExiste['Existe']>=1) {
            echo 'Ya existe';
        }
    } else {
        header('location: page_denegado.php');
    }
?>