<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

		include ('bd/conexion.php');
		 $nombre_pago = $_POST['nombre_pago'];
		 $monto_pago = $_POST['monto_pago'];
		 $fecha_pago = $_POST['fecha_pago'];
		 

		$queryGuardar = mysqli_query($db, "INSERT INTO pagos_servs_pubs (Nombre, Fecha, Monto) VALUES ('$nombre_pago', '$fecha_pago', '$monto_pago') ") or die(mysqli_error());
		echo 'Guardado';

	}

?>