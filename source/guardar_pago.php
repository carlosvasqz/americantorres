<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

		include ('bd/conexion.php');
		 $tipo_de_servicio = $_POST['tipo_de_servicio'];
		 $monto_de_servicio = $_POST['monto_de_servicio'];
		 $fecha_de_pago = $_POST['fecha_de_pago'];
		 

	//$queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM pagos WHERE Id_Articulo='$codigo_articulo'") or die (mysqli_error());

	//$rowExiste=mysqli_fetch_array($queryVerificar);
	//if($rowExiste['Existe']==0){
		$queryGuardar = mysqli_query($db, "INSERT INTO pagos (Nombre, Fecha, Monto) VALUES ('$tipo_de_servicio', '$fecha_de_pago', '$monto_de_servicio',') ") or die(mysqli_error());
		echo 'Guardado';
	//}
	//if ($rowExiste['Existe']==1) {
            #echo 'Ya existe';
        }
            
    //} else {
        header('location: page_denegado.php');
    //}
?>