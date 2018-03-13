<?php
  include ('constructor.php');
  include ('bd/conexion.php');
  //session_start();
  if (isset($_SESSION['username'])&&($_SESSION['type'])) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">     <!-- <link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css"> -->
    <title>Bloqueo | American Torres</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="lockscreen-content">
      <div class="logo">
        <h1>American Torres</h1>
      </div>
      <div class="lock-box"><img class="img-circle user-image" src="images/user.png">
        <?php echo "<h4 class='text-center user-name' id='usuario' name='usuario'>".$_SESSION['username']."</h4> ";?>
        <p class="text-center text-muted">Cuenta bloqueada</p>
        <form class="unlock-form" action="index.php">
          <div class="form-group">
            <label class="control-label">CONTRASEÑA</label>
            <input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION['username']; ?>">
            <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña" autofocus>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" id="desbloquear" name="desbloquear" >DESBLOQUEAR <i class="fa fa-unlock fa-lg"></i></button>
          </div>
        </form>
        <p><a href="page-logout.php"> ¿No eres <b><?php echo $_SESSION['username']; ?></b>? Inicia sesión aquí.</a></p>
      </div>
      <!-- <div id="tip"></div> -->
      <br />
    </section>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>
  <!-- Tips -->
  <script src="js/tips/login.js"></script>
</html>
<?php
    }else{
        header('location: page-error.php');
    }
?>