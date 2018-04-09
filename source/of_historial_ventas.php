<?php
  include ('constructor.php');
  include ('bd/conexion.php');
  include ('util.php');
  #session_start();
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
    <link rel="icon" type="image/png" href="images/us.png" />
    <title>Historial de Ventas | American Torres</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="index.php">American Torres</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <!-- <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                <ul class="dropdown-menu">
                  <li class="not-head">You have 4 new notifications.</li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
              </li> -->
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                <li><a href="page-user.php"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                <li><a href="page-lockscreen.php"><i class="fa fa-user fa-lg"></i> Bloquear</a></li>
                <li><a href="#" class="alert" style="margin:0px;"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesi&oacute;n</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <?php
      menu();
      ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Historial de Ventas</h1>
            <p>Ver el historial de ventas realizas</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-institution fa-lg"></i></li>
              <li>Finanzas</li>
              <li>Historiales</li>
              <li><a href="#"> Historial de Ventas</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-title">
                <h3 class="card-title" align="center">Historial de Ventas</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-condensed table-striped table-hover table-bordered" id="historialVentas">
                    <thead>
                      <tr class="text-uppercase">
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Cliente</th>
                        <th>Articulos</th>
                        <th>Subtotal (L.)</th>
                        <th>Descuento (L.)</th>
                        <th>Total (L.)</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $sql = "SELECT DISTINCT ventas.Id_Venta,ventas.Fecha,(SELECT usuarios.Nombre FROM usuarios WHERE ventas.Id_Usuario=usuarios.Id_Usuario) AS Vendedor,ventas.Cliente,(SELECT SUM(detalles_ventas.Cantidad) FROM detalles_ventas WHERE ventas.Id_Venta=detalles_ventas.Id_Venta) AS Cantidad,(SELECT SUM(detalles_ventas.Precio) FROM detalles_ventas WHERE ventas.Id_Venta=detalles_ventas.Id_Venta) AS Subtotal,ventas.Descuento,((SELECT SUM(detalles_ventas.Precio) FROM detalles_ventas WHERE ventas.Id_Venta=detalles_ventas.Id_Venta)-(ventas.Descuento)) AS Total FROM ventas INNER JOIN detalles_ventas ON ventas.Id_Venta=detalles_ventas.Id_Venta;";
                      $queryVenta = mysqli_query($db, $sql) or die(mysqli_error());
                      while ($rowVenta=mysqli_fetch_array($queryVenta)) {
                        echo '
                        <tr>
                          <td>'.$rowVenta['Id_Venta'].'</td>
                          <td>'.$rowVenta['Fecha'].'</td>
                          <td>'.$rowVenta['Vendedor'].'</td>
                          <td>'.$rowVenta['Cliente'].'</td>
                          <td>'.$rowVenta['Cantidad'].'</td>
                          <td>'.$rowVenta['Subtotal'].'</td>
                          <td>'.$rowVenta['Descuento'].'</td>
                          <td>'.$rowVenta['Total'].'</td>
                        </tr>
                        ';
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#historialVentas').DataTable();</script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript">
      
    </script>
    <script type="text/javascript">
      $('.alert').click(function(){
      	swal({
      		title: "Esta seguro?",
      		text: "Esta opcion cerrara la sesion actual",
      		type: "warning",
      		showCancelButton: true,
      		confirmButtonText: "Si, salir",
      		cancelButtonText: "No, mantener conectado",
      		closeOnConfirm: true,
      		closeOnCancel: true
      	}, function(isConfirm) {
      		if (isConfirm) {
            $(location).attr('href', 'page-logout.php');
            //$('#alert').html.attr('href', 'logout.php');
      			//swal("Deleted!", "Your imaginary file has been deleted.", "success");
      		} else {
            //return false;
      			//swal("Cancelled", "Your imaginary file is safe :)", "error");
      		}
      	});
      });
    </script>
  </body>
</html>
<?php
    }else {
        header('location: page-error.php');
    }
?>