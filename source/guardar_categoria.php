<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

		include ('bd/conexion.php');
		 $Id_categoria = $_POST['codigo_categoria'];
		 $Nombre = $_POST['nombre_categoria'];
		 $Descripcion = $_POST['descripcion_categoria'];
		

	$queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM categorias WHERE Id_Categoria='$Id_categoria'") or die (mysqli_error());

	$rowExiste=mysqli_fetch_array($queryVerificar);
	if($rowExiste['Existe']==0){
		$queryGuardar = mysqli_query($db, "INSERT INTO categorias (Id_Categoria, Nombre, Descripcion) VALUES ('$Id_categoria', '$Nombre', '$Descripcion') ") or die(mysqli_error());
		echo 'Guardado';
	}
	if ($rowExiste['Existe']==1) {
            #echo 'Ya existe';
        }
            
    } else {
        header('location: page_denegado.php');
    }
?>