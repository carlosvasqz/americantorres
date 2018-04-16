<?php
   session_start();
    if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

        include ('bd/conexion.php');
         $codigo_categoria = $_POST['codigo_categoria'];
         $nombre_categoria = $_POST['nombre_categoria'];
         $descripcion_categoria = $_POST['descripcion_categoria'];
         

        
        $queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM categorias WHERE Id_Categoria='$codigo_categoria'") or die(mysqli_error());

        $rowExiste=mysqli_fetch_array($queryVerificar); 

        //Si la variable anterior no contiene datos [no lo encontro]
        if ($rowExiste['Existe']==0) {
            //No imprimir nada, para que el metodo .ajax(); de jQuery Funcione y sepa que NO se MODIFICO
            // porque hubo error de que no encontro el que esta modificando
            #echo 'No existe';
        }
        //Si la variable anterior contiene datos [ya lo encontro]
        if ($rowExiste['Existe']!=0) {
            //Guardar en variable la consulta de si existe un registro con el mismo codigo y tipo del que se ingreso
            //Se realiza para que no muestre error cuando se quiera guardar los cambios del registro cuando no modifico el tipo
            $queryVerificarTipoYCodigoRepetido = mysqli_query($db, "SELECT COUNT(*) as Existe FROM categorias WHERE Id_Categoria='$codigo_categoria'") or die(mysqli_error());

            //Variable que guarda los datos obtenidos
            $rowExisteTipoYCodigo=mysqli_fetch_array($queryVerificarTipoYCodigoRepetido); 

            //Si la variable anterior contiene datos [ya lo encontro]
            if ($rowExisteTipoYCodigo['Existe']!=0) {
                // Guardar el resultado del CAMBIO en todos los campos menos el de tipo (que no se modifico)
                $queryGuardar = mysqli_query($db, "UPDATE categorias SET Nombre='$nombre_categoria', Descripcion='$descripcion_categoria' WHERE Id_Categoria='$codigo_categoria'") or die(mysqli_error());

                //Imprimir algo, para que el metodo .ajax(); de jQuery Funcione y sepa que YA se INSERTO
                //echo 'Modificado';
            }
            //Si la variable anterior no contiene datos [no encontro registro con el mismo tipo y codigo ingresado]
      
        }
            
    } else {
        header('location: page_denegado.php');
    }
?>