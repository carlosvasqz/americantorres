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
    <title>Reporte General | American Torres</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <?php
      //Codigo
    ?>
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
            <h1><i class="fa fa-dashboard"></i> Reporte General</h1>
            <p>Ver reporte general</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
                <li>Finanzas</li>
                <li>Reportes</li>
                <li><a href="#"> Reporte General</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-title">
              <h3 class="card-title" align="center">Reporte Estadistico</h3>
            </div>

            <div class="card-body">
              <div class="bs-component" id="tabs">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                  <li><a href="#inversiones" data-toggle="tab" id="linkInv">Inversiones</a></li>
                  <li><a href="#articulos" data-toggle="tab">Articulos</a></li>
                  <li><a href="#ventas" data-toggle="tab">Ventas</a></li>
                  
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade active in" id="general">
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card col-md-5">
                          <!-- <h3 class="card-title">Bar Chart</h3> -->
                          <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="graficoGanancias"></canvas>
                          </div>
                        </div>
                        <div class="col-md-7 pull-right">
                          <div class="panel panel-info">    
                            <div class="panel-heading">
                              <h3 class="panel-title">Inversiones</h3>
                            </div>
                            <div class="panel-body">
                              <p><b>Contenedores registrados:</b> <?php echo contarContenedores(); ?></p>
                              <p><b>Articulos registrados:</b> <?php echo contarArticulos(); ?></p>
                            </div>   
                          </div>
                          <div class="panel panel-primary">    
                            <div class="panel-heading">
                              <h3 class="panel-title">Ganancias</h3>
                            </div>
                            <div class="panel-body">
                              <p><b>Ventas registradas:</b> <?php echo getNumVentas(); ?></p>
                              <p><b>Total en ventas registradas:</b> <?php echo number_format(totalEnVentas(),2); ?></p>
                            </div>   
                          </div>
                          <div class="panel panel-danger">    
                            <div class="panel-heading">
                              <h3 class="panel-title">Gastos</h3>
                            </div>
                            <div class="panel-body">
                              <p><b>Total en descuentos realizados:</b> L. <?php echo number_format(totalDescuentos(), 2); ?></p>
                              <p><b>Total en pagos a Servicios Publicos:</b> L. <?php echo number_format(totalServPub(), 2); ?></p>
                              <p><b>Total en pagos de planillas:</b> <?php echo number_format(totalPlanillas(), 2); ?></p>
                            </div>   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="inversiones">
                  <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card col-md-5">
                          <!-- <h3 class="card-title">Bar Chart</h3> -->
                          <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="graficoContenedores"></canvas>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="articulos">
                    Articulos
                  </div>
                  <div class="tab-pane fade" id="ventas">
                    Ventas
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript">
      $('body').removeClass("sidebar-mini").addClass("sidebar-collapse");
    jQuery(document).ready(function(){

      function datosGenerales() {
        $.ajax({
          type: "POST",
          url: "of_reporte_general_inversiones.php",
          data: "data",
          dataType: "json",
        }).done(function( inversion, textStatus, jqXHR ){
          console.log("Total en inversiones = " + inversion);

            $.ajax({
              type: "POST",
              url: "of_reporte_general_ganancias.php",
              data: "data",
              dataType: "json",
            }).done(function( ganancias, textStatus, jqXHR ){
              console.log("Total en ganancias = " + ganancias);

              var data = {
                labels: ["Inversiones - Ganancias"],
                datasets: [
                  {
                    label: "Inversiones",
                    fillColor: "rgba(105, 154, 187, 0.685)",
                    strokeColor: "rgba(105, 154, 187, 0.685)",
                    pointColor: "rgba(105, 154, 187, 0.685)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(105, 154, 187, 0.685)",
                    data: [inversion]
                  },
                  {
                    label: "Ganancias",
                    fillColor: "rgba(151, 205, 151, 0.705)",
                    strokeColor: "rgba(151, 205, 151, 0.705)",
                    pointColor: "rgba(151, 205, 151, 0.705)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgb(151, 205, 156)",
                    data: [ganancias]
                  }
                ]
              };
              var ctxb = $("#graficoGanancias").get(0).getContext("2d");
              var barChart = new Chart(ctxb).Bar(data);
              
            }).fail(function( json, textStatus, jqXHR ){
              console.log(json);
              alert(".fail");
            });

        }).fail(function( json, textStatus, jqXHR ){
          console.log(json);
          alert(".fail");
        });
      }

      datosGenerales();
      // datosContenedores();

      $("#tabs").tabs("load", "of_reporte_general_tab_inversiones.php");

    });
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