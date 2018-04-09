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
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Sweetalert css -->
    <link href="css/sweetalert.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/us.png" />
    <title>Cierre de Caja (Diario) | American Torres</title>
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
            <p>Realizar cierre de caja del día</p>
          </div>
          <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-institution fa-lg"></i></li>
            <li>Finanzas</li>
            <li>Acciones</li>
            <li><a href="#"> Cierre de Caja (Diario)</a></li>
          </ul>
          </div>
        </div>
        <div class="row">
          <?php
            date_default_timezone_set('America/Tegucigalpa');
            $hoy = getdate();
            $fechaImpFullFormat = getNomDia($hoy['wday'])." ".$hoy['mday'].", ".getNomMes($hoy['mon'])." de ".$hoy['year'];
            $fechaHoyImpNum = $hoy['mday']."/".$hoy['mon']."/".$hoy['year'];
            $fechaHoyImpNom = $hoy['mday']."/". getNomMes($hoy['mon'])."/".$hoy['year'];
            $fechaHoyDB = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
            $tiempoCierre = date("h:i A");
            $tiempoCierreDB = date("H:i:s");
            $dineroParaCaja = 1000.00;
          ?>
          <div class="col-md-12">
            <div class="card">
              <div class="card-title">
               <h3 class="card-title" align="center">Datos del cierre diario</h3>
              </div>
              <div class="card-body">   

                <form class="form-horizontal">

                  <div class="panel panel-default col-md-12" id="fechaHora">
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Fecha del cierre</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong><i class="fa fa-calendar"></i></strong></span>
                          <input class="form-control" type="text" name="fecha_cierre" id="fecha_cierre" placeholder="Fecha del cierre" value="<?php echo $fechaImpFullFormat;?>" readonly>
                          <input type="hidden" id="fecha_hoy_db" value="<?php echo $fechaHoyDB;?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3">Hora del cierre</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong><i class="fa fa-clock-o"></i></strong></span>
                          <input class="form-control" type="text" name="hora_cierre" id="hora_cierre" placeholder="Hora del cierre" value="<?php echo $tiempoCierre;?>" readonly>
                          <input type="hidden" id="tiempo_cierre_db" value="<?php echo $tiempoCierreDB;?>">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default col-md-12" id="dineroCaja">    
                    <div class="panel-body">
                      <div class="form-inline">
                        <div class="form-group col-md-9 has-success">
                          <label class="control-label col-md-4">Dinero en caja</label>
                          <div class="input-group col-md-8">
                            <span class="input-group-addon"><strong>L.</strong></span>
                            <input class="form-control" type="number" step="0.01" min=0 name="dinero_caja" id="dinero_caja" placeholder="Ingrese el monto que hay en caja" autofocus>
                          </div>
                        </div>
                        <div class="form-group col-md-3 text-center">
                          <!-- <div class="form-group"> -->
                            <button class="btn btn-success icon-btn" type="button" id="comparar" name="comparar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Comparar</button>
                          <!-- </div> -->
                        </div>
                        <!-- <div class="form-group col-md-6">
                          <label class="control-label col-md-6">Dinero para el dia siguiente</label>
                          <div class="input-group">
                            <span class="input-group-addon"><strong>L.</strong></span> -->
                            <input type="hidden" name="dinero_caja_dia_siguiente" id="dinero_caja_dia_siguiente" value="<?php echo $dineroParaCaja;?>">
                          <!-- </div>
                        </div> -->
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default col-md-12" id="comparacionVentas">    
                    <div class="panel-body">
                      <div class="form-group col-md-6 colorComparacion">
                        <label class="control-label col-md-6">Total ventas hoy</label>
                        <div class="input-group">
                          <span class="input-group-addon"><strong>L.</strong></span>
                          <input class="form-control" type="text" name="ventas_hoy_formato" id="ventas_hoy_formato" placeholder="Total de ventas hoy" value="<?php echo number_format(getTotalVentas($fechaHoyDB), 2);?>" readonly>
                          <input type="hidden" id="ventas_hoy" value="<?php echo getTotalVentas($fechaHoyDB);?>">
                        </div>
                      </div>
                      <div class="form-group col-md-6 colorComparacion">
                        <label class="control-label col-md-6">Dinero neto en caja</label>
                        <div class="input-group">
                          <span class="input-group-addon"><strong>L.</strong></span>
                          <input class="form-control" type="text" name="neto_caja" id="neto_caja" placeholder="Dinero neto en caja" value="0.00" readonly>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default col-md-12" id="datosDiferencia">    
                    <div class="panel-body">
                      <div class="form-group has-warning divDiferencia">
                        <label class="control-label col-md-3">Diferencia</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong>L.</strong></span>
                          <input class="form-control" type="text" name="diferencia" id="diferencia" placeholder="Diferencia" readonly>
                          <span class="input-group-addon"><i class="text-uppercase"><strong id="tipo_diferencia">Ninguno</strong></i></span>
                        </div>
                      </div>
                      
                      <div class="form-group has-warning divDiferencia">
                        <label class="control-label col-md-3">Descripcion de diferencia</label>
                        <div class="col-md-8 input-group">
                          <span class="input-group-addon"><strong> <i class="fa fa-check"></i> </strong></span>
                          <textarea class="form-control" rows="2" name="descripcion_diferencia" id="descripcion_diferencia" placeholder="Escriba una breve descripcion del porque no coinciden los valores del sistema y de caja"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
              <div class="card-footer" align="center">
                <button class="btn btn-primary icon-btn" id="registrar" name="registrar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-default icon-btn" href="of_cierre_diario.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Limpiar</a>
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
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function (){
      function colorComparacion(opcion){
        switch (opcion) {
          case 0:
            $(".colorComparacion").removeClass("has-error");
            $(".colorComparacion").removeClass("has-success");
            break;
          case 1:
            $(".colorComparacion").removeClass("has-error");
            $(".colorComparacion").removeClass("has-success");
            $(".colorComparacion").addClass("has-success");
            break;
          case 2:
            $(".colorComparacion").removeClass("has-error");
            $(".colorComparacion").removeClass("has-success");
            $(".colorComparacion").addClass("has-error");
            break;
          default:
            alert("Opcion Incorrecta");
            break;
        }
      }
      function limpiarDiferencia(){
        $("#diferencia").val("").value;
        $("#tipo_diferencia").html("Ninguno");
        $("#descripcion_diferencia").val("").value;
      }
      function verDiferencia(opcion){
        if (opcion) {
          $("#datosDiferencia").show();    
        } else {
          $("#datosDiferencia").hide();    
        }
      }
      verDiferencia(false);
      colorComparacion(0);
      function setDiferencia(diferencia){
          $("#diferencia").val(diferencia).value;
          if (diferencia>0) {
            $("#tipo_diferencia").html("Sobrante en caja");
          } else if (diferencia<0) {
            $("#tipo_diferencia").html("Faltante en caja");
          }
      }
      function calcNetoCaja(){
        var enCaja = $("#dinero_caja").val();
        var diaSigCaja = $("#dinero_caja_dia_siguiente").val();
        // alert(enCaja + " " + diaSigCaja);
        if (enCaja!=="") {
          enCaja = parseFloat(enCaja);
          diaSigCaja = parseFloat(diaSigCaja);
          $("#neto_caja").val((enCaja-diaSigCaja).toFixed(2)).value; 
        } else {
          $("#neto_caja").val(0.00).value; 
        }
      }
      function sonIguales(){
        var ventasHoy = $("#ventas_hoy").val();
        var netoCaja = $("#neto_caja").val();
        ventasHoy = parseFloat(ventasHoy);
        netoCaja = parseFloat(netoCaja);
        var diferencia = netoCaja - ventasHoy;
        var resultados = [];
        if (diferencia===0) {
          resultados[0] = true;
        } else {
          resultados[0] = false;
        }
        resultados[1] = diferencia.toFixed(2);
        return resultados;
      }
      function showHtmlMessage(cambioCaja) {
        swal({
            title: "<i class='fa fa-money fa-3x text-success'></i>",
            text: "Devuelva L." + cambioCaja + " a caja, que es la cantidad que ser&aacute; utilizada ma&ntilde;ana como cambio.",
            html: true,
            closeOnConfirm: false,
            showCancelButton: true,
            confirmButtonText: "Listo",
            cancelButtonText: "Cancelar",
        }, function (isConfirm) {
            if (isConfirm) {
                calcNetoCaja();
                var resultados = sonIguales();
                // alert("igual = " + resultados[0] + " diferencia = " + resultados[1]);
                if (resultados[0]===true) {
                    swal("¡Felicidades!", "Las ventas registradas en el sistema COINCIDEN con el dinero en caja.", "success");
                    colorComparacion(1);
                    verDiferencia(false);
                    limpiarDiferencia();
                } else {
                    swal("¡Error!", "Las ventas registradas en el sistema NO COINCIDEN con el dinero en caja.", "error");
                    colorComparacion(2)
                    setDiferencia(resultados[1]);
                    verDiferencia(true);
                    document.getElementById("diferencia").focus();
                }
            }
        });
      }
      $("#comparar").click(function(){
        showHtmlMessage($("#dinero_caja_dia_siguiente").val());
      });
      $("#registrar").click(function(){
        var fechaHoy = $("#fecha_hoy_db").val();
        var tiempoCierre = $("#tiempo_cierre_db").val();
        var enCaja = $("#dinero_caja").val();
        var ventasHoy = $("#ventas_hoy").val();
        var netoCaja = $("#neto_caja").val();
        var cajaDiaSig = $("#dinero_caja_dia_siguiente").val();
        var coincidio = 0;
        var tipoDiferencia = 0;
        var diferenciaValor = $("#diferencia").val();
        var diferenciaDesc = $("#descripcion_diferencia").val();
        if (diferenciaValor=="") {
          diferenciaValor = 0;
          coincidio = 1;
        } else {
          diferenciaValor = parseFloat(diferenciaValor);
          coincidio = 0;
        }
        ventasHoy = parseFloat(ventasHoy);   
        netoCaja = parseFloat(netoCaja);
        cajaDiaSig = parseFloat(cajaDiaSig); 
        if (diferenciaValor>0) {
          tipoDiferencia = 2;
        } else if (diferenciaValor<0) {
          tipoDiferencia = 1;
        }else if(diferencia==0){
          tipoDiferencia = 0;
        }
        if (enCaja=='') {
          $("#dinero_caja").attr('required',true);
          // document.getElementById("dinero_caja").style.border="2px solid #a94442";
          document.getElementById("dinero_caja").focus();
          $.notify({
						title: "Error : ",
						message: "Debe ingresar el monto que hay en caja para comparar y realizar el cierre.",
						icon: 'fa fa-times' 
					},{
						type: "danger"
					});
          return false;
        }else{
          if (netoCaja==0) {
            document.getElementById("comparar").style.border="2px solid #3c763d";
            document.getElementById("comparar").focus();
            $.notify({
              title: "Error : ",
              message: "Debe hacer clic el boton COMPARAR para comparar y realizar el cierre.",
              icon: 'fa fa-times' 
            },{
              type: "danger"
            });
            return false;
          } else {
            var data = "fechaCierre=" + fechaHoy + "&horaCierre=" + tiempoCierre + "&ventasDia=" + netoCaja + "&cajaDiaSig=" + cajaDiaSig + "&coincidio=" + coincidio + "&tipoDiferencia=" + tipoDiferencia + "&diferenciaValor=" + diferenciaValor + "&diferenciaDesc=" + diferenciaDesc;
            // alert(data);
            $.ajax({
              url: "of_cierre_diario_guardar.php",
              data: data,
              type: "POST",			
              dataType: "html",
              //cache: false,
              //success
              success: function (data) {
                //  alert(data.trim());
                console.log(data.trim());
                if (data.trim()=="Guardado") {
                  // alert(data);
                  $.notify({
                    title: "Exito : ",
                    message: "¡El cierre ha sido registrado exitosamente!",
                    icon: 'fa fa-check' 
                  },{
                    type: "success"
                  });
                  window.setTimeout('location.href="of_cierre_diario.php"', 2000);
                }
                if (data.trim()=="Ya existe") {
                  //alert(data);
                  $.notify({
                    title: "Error : ",
                    message: "Ya registro un cierre el dia de hoy.",
                    icon: 'fa fa-times' 
                  },{
                    type: "danger"
                  });        
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
              },
              complete : function(xhr, status) {
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