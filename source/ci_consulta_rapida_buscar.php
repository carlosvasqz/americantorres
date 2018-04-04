<?php
$mysqli = new mysqli("localhost","root", "DexScorp", "americantorres");

$salida = "";
$query = "SELECT * FROM articulos ORDER By Id_Articulo";

if(isset($_POST['consulta'])){
	$q = $mysqli->real_escape_string($_POST['consulta']);

	$query = "SELECT Id_Articulo, Descripcion, Precio, Cantidad, Disponible, Estado FROM articulos WHERE Id_Articulo = '".$q."' OR Descripcion LIKE '%".$q."%'";
}

$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
	$salida.="<table class='table table-striped table-hover'>
				<thead>
				<tr>
				<th>Codigo Articulo</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Disponible</th>
				<th>Estado</th>
				</tr>
				</thead>
				<tbody>";

				while($fila = $resultado->fetch_assoc()){
					$disponible = "";
					if ($fila['Disponible']=="S") {
						$disponible = "Si";
					}else{
						$disponible = "No";
					}
					$salida.="<tr>
							<td>".$fila['Id_Articulo']."</td>
							<td>".$fila['Descripcion']."</td>
							<td>L. ".$fila['Precio']."</td>
							<td>".$fila['Cantidad']."</td>
							<td>".$disponible."</td>
							<td>".$fila['Estado']."</td>
							</tr>";

				}

				$salida.="</tbody></table>";
}else{
	$salida.="<h5 class='text-center text-info'><i class='fa fa-info-circle'></i> No se encontraron datos</h5>";

}

echo $salida;
$mysqli->close();

?>