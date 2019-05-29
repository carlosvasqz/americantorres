<?php
$mysqli = new mysqli("localhost","root", "", "americantorres");

$salida = "";
$query = "SELECT * FROM categorias ORDER By Id_Categoria";

if(isset($_POST['consulta'])){
  $q = $mysqli->real_escape_string($_POST['consulta']);

  $query = "SELECT Id_Categoria, Nombre, Descripcion FROM categorias WHERE Id_Categoria = '".$q."' OR Descripcion LIKE '%".$q."%'";
}

$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
  $salida.="<table class='table'>
        <thead>
        <tr>
        <td>Codigo Categoria</td>
        <td>Nombre</td>
        <td>Descripcion</td>
        
       
        </tr>
        </thead>
        <tbody>";

        while($fila = $resultado->fetch_assoc()){
          $salida.="<tr>
              <td>".$fila['Id_Categoria']."</td>
              <td>".$fila['Nombre']."</td>
              <td>".$fila['Descripcion']."</td>
              
              </tr>";

        }

        $salida.="</tbody></table>";
}else{
  $salida.="No se encontraron datos";

}

echo $salida;
$mysqli->close();

?>