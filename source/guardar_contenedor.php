<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

		include ('bd/conexion.php');
		 $codigo_contenedor = $_POST['codigo_contenedor'];
		 $descripcion_contenedor = $_POST['descripcion_contenedor'];
		 $costo_contenedor = $_POST['costo_contenedor'];
		 $FI_contenedor = $_POST['FI_contenedor'];
		 $procedencia_contenedor = $_POST['procedencia_contenedor'];
		 

	$queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM contenedores WHERE Id_Contenedor='$codigo_contenedor'") or die (mysqli_error());

	$rowExiste=mysqli_fetch_array($queryVerificar);
	if($rowExiste['Existe']==0){
		$queryGuardar = mysqli_query($db, "INSERT INTO contenedores (Id_Contenedor, Descripcion, Costo, Fecha_Ingreso, Procedencia) VALUES ('$codigo_contenedor', '$descripcion_contenedor', '$costo_contenedor', '$FI_contenedor', '$procedencia_contenedor') ") or die(mysqli_error());
		echo 'Guardado';
	}
	if ($rowExiste['Existe']==1) {
            #echo 'Ya existe';
        }
            
    } else {
        header('location: page_denegado.php');
    }
?>