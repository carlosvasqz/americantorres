<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

		include ('bd/conexion.php');
		 $nombre_pago = $_POST['nombre_pago'];
		 $fecha_pago = $_POST['fecha_pago'];
		 $monto_pago = $_POST['monto_pago'];
		 $month = $_POST['month'];
		 $year = $_POST['year'];
		 
    $queryFecha = mysqli_query($db, "SELECT COUNT(*) as Realizado from pagos_servs_pubs WHERE YEAR(Fecha)='$year' AND MONTH(Fecha)='$month' AND Nombre='$nombre_pago'") or die (mysqli_error());

    $rowRealizado=mysqli_fetch_array($queryFecha);
    	if ($rowRealizado['Realizado']==0) {
		$queryGuardar = mysqli_query($db, "INSERT INTO pagos_servs_pubs (Nombre, Fecha, Monto) VALUES ('$nombre_pago', '$fecha_pago', '$monto_pago')") or die(mysqli_error());
		echo 'Guardado';
	}
	
else if ($rowRealizado['Realizado']>=1) {
            
    } else {
        header('location: page_denegado.php');
    }
}

?>