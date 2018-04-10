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

        
        $queryVerificar = mysqli_query($db, "SELECT COUNT(*) as Existe FROM articulos WHERE Id_Articulo='$codigo_articulo'") or die(mysqli_error());

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
            $queryVerificarTipoYCodigoRepetido = mysqli_query($db, "SELECT COUNT(*) as Existe FROM articulos WHERE Id_Articulo='$codigo_articulo'") or die(mysqli_error());

            //Variable que guarda los datos obtenidos
            $rowExisteTipoYCodigo=mysqli_fetch_array($queryVerificarTipoYCodigoRepetido); 

            //Si la variable anterior contiene datos [ya lo encontro]
            if ($rowExisteTipoYCodigo['Existe']!=0) {
                // Guardar el resultado del CAMBIO en todos los campos menos el de tipo (que no se modifico)
                $queryGuardar = mysqli_query($db, "UPDATE articulos SET Descripcion='$descripcion_articulo', Precio='$precio_articulo', Cantidad='$cantidad_articulo', Id_Contenedor='$contenedor_articulo', Id_Categoria='$categoria_articulo',  Disponible='$activo_disponible', Estado='$estado' WHERE Id_Articulo='$codigo_articulo'") or die(mysqli_error());

                //Imprimir algo, para que el metodo .ajax(); de jQuery Funcione y sepa que YA se INSERTO
                //"echo 'Modificado';"
            }
            //Si la variable anterior no contiene datos [no encontro registro con el mismo tipo y codigo ingresado]
      
        }
            
    } else {
        header('location: page_denegado.php');
    }
?>