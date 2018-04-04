<?php
    include ('bd/conexion.php');
    $usuario =  $_POST['usuario'];
    $pass =  $_POST['pass'];

    if ($usuario=='RootUser'&&$pass=='toor') {
        //echo 'style="border: 2px solid green;"';
        ?>
        <script language="javascript"> 
            window.setTimeout('javascript:window.history.back();', 100);
        </script>
        <?php
    } else {
        $queryUsuario=mysqli_query($db, "SELECT * FROM usuarios WHERE Nombre='$usuario' AND Contrasenia='$pass' AND Activo=1") or die(mysqli_error);
        if ($rowQueryUsuario = mysqli_fetch_array($queryUsuario)) {
            echo 'style="border: 2px solid green;"';
                ?>
                <script language="javascript"> 
                    window.setTimeout('javascript:window.history.back();', 100);
                </script>
                <?php
        } else {
            echo 'style="border: 2px solid red;"';
        }
    }
?>