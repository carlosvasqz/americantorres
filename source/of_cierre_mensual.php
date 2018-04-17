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
    <!-- Sweetalert css -->
    <link href="css/sweetalert.css" rel="stylesheet">
    <title>Cierre de Caja (Mensual) | American Torres</title>
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
            <h1><i class="fa fa-dashboard"></i> Cierre de Caja</h1>
            <p>Realizar cierre de caja del mes</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-institution fa-lg"></i></li>
              <li>Finanzas</li>
              <li>Acciones</li>
              <li><a href="#"> Cierre de Caja (Mensual)</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
        <?php
          date_default_timezone_set('America/Tegucigalpa');
          $hoy = getdate();
          $fechaImpFullFormat = getNomDia($hoy['wday'])." ".$hoy['mday'].", ".getNomMes($hoy['mon'])." de ".$hoy['year'];
          $fechaHoyDB = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
          $fechaMesHoyDB = $hoy['year']."-".date("m"). "-";
          $tiempoCierre = date("h:i A");
          $tiempoCierreDB = date("H:i:s");

          $diaMax = getDiaMax($hoy['mon'], $hoy['year']);

          $fechaInicialFullFormat = "1 / ".getNomMes($hoy['mon'])." / ".$hoy['year'];
          $fechaInicialDB = $hoy['year']."-".$hoy['mon']."-1";
          $dia1Mes = mktime(0,0,0,$hoy['mon'],1,$hoy['year']);
          $dia1MesFullFormat = dayToDia(date("l", $dia1Mes)) . " " . date("j", $dia1Mes) . ", " . monthToMes(date("F", $dia1Mes)) . " de " . date("Y", $dia1Mes) ;

          $fechaFinalFullFormat = $diaMax." / ".getNomMes($hoy['mon'])." / ".$hoy['year'];
          $fechaFinalDB = $hoy['year']."-".$hoy['mon']."-".$diaMax;
          $diaFinalMes = mktime(0,0,0,$hoy['mon'],$diaMax,$hoy['year']);
          $diaFinalMesFullFormat = dayToDia(date("l", $diaFinalMes)) . " " . date("j", $diaFinalMes) . ", " . monthToMes(date("F", $diaFinalMes)) . " de " . date("Y", $diaFinalMes) ;
          
          $ventasMes = getTotalVentasMes($fechaMesHoyDB);
          $totalServPub = getTotalSPMes($fechaMesHoyDB);
          // $totalNominas = getTotalNominasMes($fechaMesHoyDB);
        ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-title">
             <h3 class="card-title" align="center">Datos del cierre mensual</h3>
            </div>
            <div class="card-body">   
              <div class="bs-component">
                <form class="form-horizontal">

                  <div class="panel panel-default" id="fechaHora">
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Fecha del cierre</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong><i class="fa fa-calendar"></i></strong></span>
                          <input class="form-control" type="text" name="fecha_cierre" id="fecha_cierre" placeholder="Fecha del cierre" value="<?php echo $fechaImpFullFormat;?>" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">Hora del cierre</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong><i class="fa fa-clock-o"></i></strong></span>
                          <input class="form-control" type="text" name="hora_cierre" id="hora_cierre" placeholder="Hora del cierre" value="<?php echo $tiempoCierre;?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default" id="rangoFechas">
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Fecha inicial del mes</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong><i class="fa fa-calendar"></i></strong></span>
                          <input class="form-control" type="text" name="fecha_inicial" id="fecha_inicial" placeholder="Rango inicial del cierre" value="<?php echo $dia1MesFullFormat ;?>" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">Fecha final del mes</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong><i class="fa fa-calendar"></i></strong></span>
                          <input class="form-control" type="text" name="fecha_final" id="fecha_final" placeholder="Rango final del cierre" value="<?php echo $diaFinalMesFullFormat;?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">    
                    <div class="panel-body">
                      <div class="form-group has-success">
                        <label class="control-label col-md-3">Total ventas del mes</label>
                        <div class="input-group col-md-8">
                          <span class="input-group-addon"><strong>L.</strong></span>
                          <input class="form-control" type="text" name="ventas_mes_formato" id="ventas_mes_formato" placeholder="Total ventas del mes" value="<?php echo number_format($ventasMes, 2); ?>" readonly>
                          <span class="input-group-addon"><strong><i>+</i> Activo</strong></span>
                        </div>
                      </div>
                      <div class="form-group has-warning">
                        <label class="control-label col-md-3">Total Servicios P&uacute;blicos</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong>L.</strong></span>
                          <input class="form-control" type="text" name="serv_pub_formato" id="serv_pub_formato" placeholder="Total pagos de servicios publicos" value="<?php echo number_format($totalServPub, 2); ?>" readonly>
                          <span class="input-group-addon"><strong><i>-</i> Pasivo</strong></span>
                        </div>
                      </div>
                      <div class="form-group has-warning" id="divNominas">
                        <label class="control-label col-md-3">Total N&oacute;minas empleados</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong>L.</strong></span>
                          <input class="form-control" type="number" min="0" step="0.01" name="nominas" id="nominas" placeholder="Total nominas de empleados" value="">
                          <span class="input-group-addon"><strong><i>-</i> Pasivo</strong></span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-footer">
                      <div class="form-group has-info">
                        <label class="control-label col-md-3">Utilidad neta del mes</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong>L.</strong></span>
                          <input class="form-control" type="text" name="utilidad" id="utilidad" placeholder="Total utilidad del mes" value="<?php ?>" readonly>
                          <span class="input-group-addon"><strong><i>=</i> Neto</strong></span>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>             
            </div>
            <div class="card-footer" align="center">
              <button class="btn btn-primary icon-btn" id="registrar" name="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-default icon-btn" href="of_cierre_mensual.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Limpiar</a>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- Datos -->
    <input type="hidden" id="fecha_hoy_db" value="<?php echo $fechaHoyDB;?>">
    <input type="hidden" id="tiempo_cierre_db" value="<?php echo $tiempoCierreDB;?>">
    <input type="hidden" id="fecha_inicial_db" value="<?php echo $fechaInicialDB;?>">
    <input type="hidden" id="fecha_final_db" value="<?php echo $fechaFinalDB;?>">
    <input type="hidden" id="ventas_mes" value="<?php echo $ventasMes; ?>">
    <input type="hidden" id="serv_pub" value="<?php echo $totalServPub; ?>">
    <input type="hidden" id="fecha_mes_db" value="<?php echo $fechaMesHoyDB; ?>">
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function (){
      function calcUtilidad(){
        var ventasMes = $("#ventas_mes").val();
        var servPubMes = $("#serv_pub").val();
        var nominasMes = $("#nominas").val();
        ventasMes = parseFloat(ventasMes);
        servPubMes = parseFloat(servPubMes);
        nominasMes = parseFloat(nominasMes);
        var utilidad = ventasMes - servPubMes - nominasMes;
        $("#utilidad").val(utilidad.toFixed(2)).value;
      }
      
      function hacerCierreHoy(){
        swal({
          title: "Error",
          text: "Debe registrar el cierre del dia de hoy antes de registrar el cierre mensual.",
          type: "error",
          closeOnConfirm: false,
          showCancelButton: true,
          confirmButtonText: "Registrar Cierre Diario"
        }, function (isConfirm) {
            if (isConfirm) {
              window.setTimeout('location.href="of_cierre_diario.php"', 1);
            }
        });
      }

      function registrarCierreMensual(data){
        // alert(data);
        // hacerCierreHoy();
        $.ajax({
          url: "of_cierre_mensual_guardar.php",
          data: data,
          type: "POST",			
          dataType: "html",
          //cache: false,
          //success
          success: function (data) {
            // alert(data.trim());
            console.log(data.trim());
            if (data.trim()==="NoExisteCierreDiaHoy") {
              hacerCierreHoy();              
              // alert(data.trim());
            }
            if (data.trim()=="ExisteCierreMensual") {
              //alert(data);
              $.notify({
                title: "Error : ",
                message: "Ya ha registrado un cierre para este mes.",
                icon: 'fa fa-times' 
              },{
                type: "danger"
              });   
            }
            if (data.trim()=="Guardado") {
              // alert(data);
              $.notify({
                title: "Exito : ",
                message: "¡El cierre ha sido registrado exitosamente!",
                icon: 'fa fa-check' 
              },{
                type: "success"
              });
              // window.setTimeout('location.href="of_cierre_mensual.php"', 2000);
            }
          },
          //error
          error : function(xhr, status) {
            // alert(status);
            $.notify({
              title: "Error : ",
              message: "La conexion al servidor ha fallado, error interno.",
              icon: 'fa fa-times' 
            },{
              type: "danger"
            });
          }
        });
      }

      
      // calcUtilidad();
      $("#nominas").focus();

      $("#nominas").on('change', function () {
        calcUtilidad();
      });

      $("#nominas").keyup(function () {
        calcUtilidad();
      });

      $("#registrar").click(function(){
        var fechaHoy = $("#fecha_hoy_db").val();
        var tiempoCierre = $("#tiempo_cierre_db").val();
        var fechaInicial = $("#fecha_inicial_db").val();
        var fechaFinal = $("#fecha_final_db").val();
        var ventasMes = $("#ventas_mes").val();
        var servPubMes = $("#serv_pub").val();
        var nominasMes = $("#nominas").val();
        var utilidad = $("#utilidad").val();
        var fechaMesDB = $("#fecha_mes_db").val();
        ventasMes = parseFloat(ventasMes);
        servPubMes = parseFloat(servPubMes);
        nominasMes = parseFloat(nominasMes); 
        utilidad = parseFloat(utilidad);
        if (nominasMes<=0||$("#nominas").val()=="") {
          $("#nominas").attr('reuired', true);
          $("#nominas").focus();
          $.notify({
            title: "Error : ",
            message: "Debe ingresar una cantidad valida.",
            icon: 'fa fa-times' 
          },{
            type: "danger"
          });
        } else {
          var data = "fechaCierre=" + fechaHoy + "&horaCierre=" + tiempoCierre + "&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal + "&ventasMes=" + ventasMes + "&servPubMes=" + servPubMes + "&nominasMes=" + nominasMes + "&utilidad=" + utilidad + "&fechaMesDB=" + fechaMesDB;
          if (fechaHoy===fechaFinal) {
            registrarCierreMensual(data);
          } else {
            swal({
              title: "¿Est&aacute; seguro?",
              text: "Hoy no es el d&iacute;a final del mes.<br>Se recomienda realizar los cierres mensuales el ultimo d&iacute;a del mes.",
              type: "warning",
              html: true,
              closeOnConfirm: true,
              showCancelButton: true,
              confirmButtonText: "Aceptar",
              cancelButtonText: "Cancelar",
            }, function (isConfirm) {
                if (isConfirm) {
                    registrarCierreMensual(data);
                    return false;
                }
            });
          } 
        }

      });
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
      		} else {
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