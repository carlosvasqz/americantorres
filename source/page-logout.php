<?php
    session_start();
    include('bd/conexion.php');
    if (isset($_SESSION['username'])&&($_SESSION['type'])) {
        session_destroy();
        header('Location: page-login.php');
    }else {
        echo '<h3>Operaci&oacute;n incorrecta.</h3>';
    }
?>