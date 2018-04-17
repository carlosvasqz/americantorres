<?php
   session_start();
    if (isset($_SESSION['username'])&&($_SESSION['type'])) { 
        include ('bd/conexion.php');
        
        $Id_Usuario = $_POST['Id_Usuario'];
        $Nombre = $_POST['Nombre'];
        $Contrasenia = $_POST['Contrasenia'];

        $queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM usuarios WHERE Id_Usuario='$Id_Usuario'") or die(mysqli_error());
        $rowExiste=mysqli_fetch_array($queryVerificar); 
        if ($rowExiste['Existe']==0) {
            echo "No existe";
        } else {
            $queryGuardar = mysqli_query($db, "UPDATE usuarios SET Nombre='$Nombre', Contrasenia='$Contrasenia' WHERE Id_Usuario='$Id_Usuario'") or die(mysqli_error());
            echo 'Actualizado';
        }
    }
?>