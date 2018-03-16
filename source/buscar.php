<?php
$mysqli = new mysqli("localhost","root","tienda");

$salida = "";
$query = "SELECT * FROM articulos ORDER By Id_Articulo";

if(isset($_POST['Cconsulta'])){
	$q = $mysqli->real_escape_string($_POST['consulta']);

	$query = "SELECT Id_Articulo, Descripcion, Precio, Cantidad, Disponible FROM articulos WHERE Id_Articulo = '".$q"' OR Descripcion LIKE '%".$q"%'";
}

$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
	$salida.="<table class0='tabla_datos'>
				<thead>
				<tr>
				<td>Id_Articulo</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Cantidad</td>
				<td>Disponible</td>
				</tr>
				</thead>
				<tbody>";

				while($fila = $resultado->fetch_assoc()){
					$salida.="<tr>
							<td>".$fila['Id_Articulo']."</td>
							<td>".$fila['Descripcion']."</td>
							<td>".$fila['Precio']."</td>
							<td>".$fila['Cantidad']."</td>
							<td>".$fila['Disponible']."</td>
							</tr>";

				}

				$salida.="</tbody></table>"
}else{
	$salida.="No se encontraron datos"

}

echo $salida;
$mysqli->close();

?>