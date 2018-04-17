<?php
	session_start();
	if (isset($_SESSION['username'])&&($_SESSION['type'])) { 

		include ('bd/conexion.php');
		 $month = $_POST['month'];
		 $year = $_POST['year'];

		 $queryFecha = mysqli_query($db, "SELECT COUNT(*) as Realizado from pagos_servs_pubs WHERE YEAR(Fecha)='year' AND MONTH(Fecha)='month'") or die (mysqli_error());
		
    	$rowRealizado=myqli_fetch_array($queryFecha);
    	if ($rowRealizado['Realizado']==1) {
    		echo 'Realizado'; // Si devueve 1 es porque ya se ha realizado el pago
    	}
if ($rowRealizado['Realizado']==0) {
            //
    } else {
        header('location: page_denegado.php');
    }
?>