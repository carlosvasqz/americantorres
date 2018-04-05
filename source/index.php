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
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css"> -->
    <link rel="icon" type="image/png" href="images/us.png" />
    <title>American Torres</title>
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
          <!-- Sidebar toggle button-->
          <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
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
                  <!--<li><a href="page-user.php"><i class="fa fa-cog fa-lg"></i> Settings</a></li>-->
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
     <?PHP
     menu();
     ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Inicio</h1>
            <p>Pantalla de inicio</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Inicio</a></li>
            </ul>
          </div>
        </div>
         <div class="row">
         <!-- <div class="col-md-3"><a href="ab_registrar_contenedor.php">
            <div class="card">
              <div class="card-body text-center">
                <i class="icon fa fa-plus-square fa-3x" tip="Add Item"></i>
              </div>  
            </div></a>
          </div> -->
          <div class="col-md-3"><a href="ab_registrar_contenedor.php">
            <div class="widget-small primary"><i class="icon fa fa-circle-o"></i>
              <div class="info">
                <h4>Registrar contenedor</h4>
              </div>
            </div></a>
          </div>
          <div class="col-md-3"><a href="ab_registrar_articulo.php">
            <div class="widget-small primary"><i class="icon fa fa-circle-o"></i>
              <div class="info">
                <h4>Registrar articulo</h4>
              </div>
            </div></a>
          </div>
          <div class="col-md-3"><a href="ci_catalogo.php">
            <div class="widget-small primary"><i class="icon fa fa-circle-o"></i>
              <div class="info">
                <h4>Catalogo</h4>
              </div>
            </div></a>
          </div>
          <div class="col-md-3"><a href="cv_vender.php">
            <div class="widget-small primary"><i class="icon fa fa-circle-o"></i>
              <div class="info">
                <h4>Registrar venta</h4>
              </div>
            </div></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <h4 class="card-title">Ventas de esta semana</h4>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center text-primary">
                <span class="text-muted">TOTAL VENTAS</span>
                <h1><?php 
                          $queryTotalVentas=mysqli_query($db, "SELECT SUM(Precio) AS Total_Ventas FROM detalles_ventas") or die(mysqli_error());
                          $rowTotalVentas=mysqli_fetch_array($queryTotalVentas); 
                          $queryTotalDescuentos=mysqli_query($db, "SELECT SUM(Descuento) AS Total_Descuentos FROM ventas") or die(mysqli_error());
                          $rowTotalDescuentos=mysqli_fetch_array($queryTotalDescuentos); 
                          $totalVentas = $rowTotalVentas['Total_Ventas'] - $rowTotalDescuentos['Total_Descuentos'];
                          $totalVentas = number_format($totalVentas, 2);
                          // if ($totalVentas==0) {
                          //   echo 'L. 0.00';
                          // } else {
                            echo 'L. '.$totalVentas; 
                          // }
                    ?></h1>
                <!-- <i class="icon fa fa-plus-square fa-3x" tip="Add Item"></i> -->
              </div>  
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center text-primary">
                <span class="text-muted">TOTAL VENTAS HOY </span>
                <h1><?php 
                      date_default_timezone_set('America/Tegucigalpa');                          
                      $hoy = getdate();
                      $fechaHoy = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']; 
                      $queryVentasHoy=mysqli_query($db, "SELECT SUM(Precio)-Descuento AS Ventas_Hoy FROM ventas INNER JOIN detalles_ventas ON ventas.Id_Venta=detalles_ventas.Id_Venta WHERE Fecha = '$fechaHoy'") or die(mysqli_error());
                      $rowVentasHoy=mysqli_fetch_array($queryVentasHoy);
                      $ventasHoy = number_format($rowVentasHoy['Ventas_Hoy'], 2);
                      // if ($rowVentasHoy['Ventas_Hoy']=="") {
                      //   echo 'L. 0.00';
                      // } else {
                        echo 'L. '.$ventasHoy;
                      // }
                    ?></h1>
                <!-- <i class="icon fa fa-plus-square fa-3x" tip="Add Item"></i> -->
              </div>  
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center text-primary">
                <span class="text-muted">CANTIDAD VENTAS HOY</span>
                <h1><?php 
                      date_default_timezone_set('America/Tegucigalpa');                          
                      $hoy = getdate();
                      $fechaHoy = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']; 
                      $queryVentasHoy=mysqli_query($db, "SELECT COUNT(*) AS Num_Ventas_Hoy FROM ventas WHERE Fecha = '$fechaHoy'") or die(mysqli_error());
                      $rowVentasHoy=mysqli_fetch_array($queryVentasHoy);
                      echo $rowVentasHoy['Num_Ventas_Hoy'];
                    ?></h1>
                <!-- <i class="icon fa fa-plus-square fa-3x" tip="Add Item"></i> -->
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
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/fullcalendar.min.js"></script> 
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript" src="js/tips/grafico_index.js"></script>
  </body>
</html>
<?php
    }else{
        header('location: page-login.php');
    }
?>