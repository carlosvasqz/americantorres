<?php
    // Iniciar Sesion
    session_start();
    //Seguridad de acceso
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        // Incluir el codigo de la conexion
        include('bd/conexion.php');

        $sql = "SELECT DISTINCT
            ventas.Id_Venta,
            ventas.Fecha,
            (
                SELECT
                    usuarios.Nombre
                FROM
                    usuarios
                WHERE
                    ventas.Id_Usuario = usuarios.Id_Usuario
            ) AS Vendedor,
            ventas.Cliente,
            (
                SELECT
                    SUM(detalles_ventas.Cantidad)
                FROM
                    detalles_ventas
                WHERE
                    ventas.Id_Venta = detalles_ventas.Id_Venta
            ) AS Cantidad,
            (
                (SELECT 
                    SUM(detalles_ventas.Precio) 
                FROM 
                    detalles_ventas 
                WHERE 
                    ventas.Id_Venta=detalles_ventas.Id_Venta)-(ventas.Descuento)
            ) AS Subtotal,
                ventas.Descuento,
            (
                SELECT 
                    SUM(detalles_ventas.Precio) 
                FROM 
                    detalles_ventas 
                WHERE 
                    ventas.Id_Venta=detalles_ventas.Id_Venta
            ) AS Total
            FROM
                ventas
            INNER JOIN detalles_ventas 
                ON ventas.Id_Venta = detalles_ventas.Id_Venta;
        ";
        $jsondata = array();
            $queryVenta = mysqli_query($db, $sql) or die(mysqli_error());
            if ($queryVenta->num_rows>0) {
                $jsondata['exito'] = true;
                $jsondata['datos']['mensaje'] = sprintf("Se han encontrado %d articulos", $queryVenta->num_rows);
                $jsondata['datos']['venta'] = array();
                while ($rowVenta = $queryVenta->fetch_object()) {
                    $jsondata['datos']['venta'][] = $rowVenta;
                }
            } else {
                
                $jsondata['exito'] = false;
                $jsondata["datos"] = array(
                    'mensaje' => 'No se encontró ningún resultado.'
                    );
                
            }
        
        header('Content-type: application/json; charset=utf-8');
        
        echo json_encode($jsondata, JSON_FORCE_OBJECT);

        exit();
            
    } else {
        header('location: page_denegado.php');
    }
?>