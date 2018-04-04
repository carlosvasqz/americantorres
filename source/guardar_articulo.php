<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

		include ('bd/conexion.php');
		 $codigo_articulo = $_POST['codigo_articulo'];
		 $descripcion_articulo = $_POST['descripcion_articulo'];
		 $precio_articulo = $_POST['precio_articulo'];
		 $cantidad_articulo = $_POST['cantidad_articulo'];
		 $contenedor_articulo = $_POST['contenedor_articulo'];
		 $categoria_articulo = $_POST['categoria_articulo'];
		 $activo_disponible = $_POST['activo_disponible'];
		 $estado = $_POST['estado'];

	$queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM articulos WHERE Id_Articulo='$codigo_articulo'") or die (mysqli_error());

	$rowExiste=mysqli_fetch_array($queryVerificar);
	if($rowExiste['Existe']==0){
		$queryGuardar = mysqli_query($db, "INSERT INTO articulos (Id_Articulo, Descripcion, Precio, Cantidad, Disponible, Id_Contenedor, Id_Categoria, Estado) VALUES ('$codigo_articulo', '$descripcion_articulo', '$precio_articulo', '$cantidad_articulo', '$activo_disponible', '$contenedor_articulo', '$categoria_articulo', '$estado') ") or die(mysqli_error());
		echo 'Guardado';
	}
	if ($rowExiste['Existe']==1) {
            #echo 'Ya existe';
        }
            
    } else {
        header('location: page_denegado.php');
    }
?>