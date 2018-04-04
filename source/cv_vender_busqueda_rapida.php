<?php
$mysqli = new mysqli("localhost","root", "", "americantorres");

$salida = "";
$query = "SELECT * FROM articulos WHERE Disponible='S' ORDER By Id_Articulo";

if(isset($_POST['consulta'])){
	$q = $mysqli->real_escape_string($_POST['consulta']);

	$query = "SELECT Id_Articulo, Descripcion, Precio, Cantidad, Disponible, Estado FROM articulos WHERE (Id_Articulo = '".$q."' OR Descripcion LIKE '%".$q."%') AND Disponible='S'";
}

$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
	$salida.="<table class='table table-condensed table-striped table-hover'>
				<thead>
				<tr>
				<th class='text-center'>Codigo Articulo</th>
				<th class='text-center'>Descripcion</th>
				<th class='text-center'>Precio</th>
				<th class='text-center'>Cantidad</th>
                <th class='text-center'>Estado</th>
                <th class='text-center hidden-print'><th>
				</tr>
				</thead>
				<tbody>";

				while($fila = $resultado->fetch_assoc()){
					$salida.="<tr class='text-center'>
							<td>".$fila['Id_Articulo']."</td>
							<td>".$fila['Descripcion']."</td>
							<td>L. ".$fila['Precio']."</td>
							<td>".$fila['Cantidad']."</td>
                            <td>".$fila['Estado']."</td>
                            <td class='hidden-print'>
                                <a><i class='fa fa-plus-circle fa-2x text-primary' id='".$fila['Id_Articulo']."' onClick='agregarArticulo(".$fila['Id_Articulo'].");'></i></a>
                            <td>
							</tr>";

				}

				$salida.="</tbody></table>";
}else{
	$salida.="No se encontraron datos";

}

echo $salida;
$mysqli->close();

?>