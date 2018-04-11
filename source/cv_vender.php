<?php
  include ('constructor.php');
  include ('bd/conexion.php');
  include ('util.php');
  #session_start();
  if (isset($_SESSION['username'])&&($_SESSION['type'])) {  
    date_default_timezone_set('America/Tegucigalpa');
    $hoy = getdate();
    $fechaImpFullFormat = getNomDia($hoy['wday'])." ".$hoy['mday'].", ".getNomMes($hoy['mon'])." de ".$hoy['year'];
    $fechaHoyImpNum = $hoy['mday']."/".$hoy['mon']."/".$hoy['year'];
    $fechaHoyImpNom = $hoy['mday']."/". getNomMes($hoy['mon'])."/".$hoy['year'];
    $fechaHoyDB = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
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
    <title>Registrar Venta | American Torres</title>
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
        <div class="page-title hidden-print">
          <div>
            <h1><i class="fa fa-dashboard"></i> Registrar Venta</h1>
            <p>Registrar nueva venta</p>
          </div>
          <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-institution fa-lg"></i></li>
            <li>Control de Ventas</li>
            <li><a href="#"> Registrar Venta</a></li>
          </ul>
          </div>
        </div>
        
        <div class="row">
          
          <div class="col-md-4 hidden-print small">
            <a href="#" data-toggle="modal" data-target="#insertarDatosCliente" id="btn-datosCliente">
              <div class="widget-small primary"><i class="icon fa fa-pencil-square fa-2x"></i>
                <div class="info">
                  <h4>Datos del cliente</h4>
                </div>
              </div>
            </a>
          </div>

          <!-- <div class="col-md-4 hidden-print small">
            <a href="#" data-toggle="modal" data-target="#insertarArticulo" id="btn-datosArticulo">
              <div class="widget-small danger"><i class="icon fa fa-trash fa-2x text-error"></i>
                <div class="info">
                  <h4>Eliminar articulo</h4>
                </div>
              </div>
            </a>
          </div> -->

          <div class="col-md-4 hidden-print small">
            <a href="#" data-toggle="modal" data-target="#insertarArticulo" id="btn-datosArticulo">
              <div class="widget-small info"><i class="icon fa fa-plus-circle fa-2x"></i>
                <div class="info">
                  <h4>Agregar articulo</h4>
                </div>
              </div>
            </a>
          </div>
          
          <div class="col-md-4 hidden-print small">
            <a href="cv_vender.php">
              <div class="widget-small warning"><i class="icon fa fa-times-circle fa-2x"></i>
                <div class="info">
                  <h4>Limpiar datos</h4>
                </div>
              </div>
            </a>
          </div>
<!-- <form action="cv_vender_imprimir.php" method="post"> -->
        <div class="col-md-12">
          <div class="card">
            <section class="invoice">
              <div class="row">
                <div class="col-xs-12">
                  <div class="text-center"><small class><span class="agregarRow">RECIBO DE PAGO</span></small></div>
                  <h2 class="page-header">
                    <i class="fa fa-globe"></i> American Torres
                    <small class="pull-right">Fecha: 
                      <span id="dateData"><?php echo $fechaHoyImpNom; ?></span>
                      <br>
                      <i class="pull-right small">
                        <small>
                          <span id="dateDB">
                            <?php echo $fechaHoyDB; ?>
                          </span>
                          <?php echo date("H:i:s");?>
                          &nbsp;&nbsp;&nbsp;
                        </small>
                      </i>
                    </small>
                  </h2>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-xs-4"><i class="text-uppercase"><b>Sucursal principal:</b></i><br>
                  <strong>Barrio El Parnaso</strong>, 6 cuadras al oeste y media cuadra al norte del parque central.<br>
                  <strong>Telefono:</strong> (504) 9999-9999
                </div>
                <div class="col-xs-4" id="datosCliente" ><i class="text-uppercase"><b>Cliente:</b></i><br>
                  <span class="cliente"><strong><span id="nombreClienteTexto"></span></strong><br></span>
                  <span class="cliente"><span id="direccionClienteTexto"></span><br></span>
                  <span class="cliente"><strong>Telefono: </strong><span id="telefonoClienteTexto"></span></span>
                </div>
                <div class="col-xs-4"><b>Recibo de venta:</b> #<span id="numRecData"><?php echo getNumVentas()+1;?></span><br><br><b>Vendedor:</b> <span id="usserData"><?php echo $_SESSION['username'];?></span><br><b>Forma de pago:</b> Contado</div>
              </div>
              <br><br>
              <div class="row">
                <div class="col-xs-12 table-responsive" id="recibo">
                  <table class="table table-striped table-hover table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Codigo</th>
                        <th>Descripcion de articulo</th>
                        <th class="text-center col-xs-2">Cantidad</th>
                        <th class="text-center">Precio unitario</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center text-danger hidden-print">Quitar</th>
                      </tr>
                    </thead>
                    <tbody id="rowLista">
                    <?php
                      $queryArticulo=mysqli_query($db, "SELECT Id_Articulo, Descripcion, Precio, Cantidad, Estado FROM articulos WHERE Disponible=1") or die(mysqli_error());
                      // $i =1;
                      while ($rowArticulo=mysqli_fetch_array($queryArticulo)) {
                        echo '
                          <tr id="row'.$rowArticulo['Id_Articulo'].'" class="rowListaId text-center">
                          <td class="rowsNum" id="row'.$rowArticulo['Id_Articulo'].'Num">0</td>
                          <td id="row'.$rowArticulo['Id_Articulo'].'Id">'.$rowArticulo['Id_Articulo'].'</td>
                          <td class="text-left" id="row'.$rowArticulo['Id_Articulo'].'Descripcion">'.$rowArticulo['Descripcion'].'</td>
                          <td><input class="form-control inputCantidad" type="number" name="row'.$rowArticulo['Id_Articulo'].'Cantidad" id="row'.$rowArticulo['Id_Articulo'].'Cantidad" placeholder="Unidades" value=1 min=1 max='.$rowArticulo['Cantidad'].'><i class="hidden-print">m&aacute;x: '.$rowArticulo['Cantidad'].'</i></td>
                          <td id="row'.$rowArticulo['Id_Articulo'].'PrecioU">'.$rowArticulo['Precio'].'</td>
                          <td class="rowsPrecio" id="row'.$rowArticulo['Id_Articulo'].'Precio">0</td>
                          <td class="hidden-print">
                            <a class="eliminarRow" id="'.$rowArticulo['Id_Articulo'].'"><i class="fa fa-trash fa-2x text-danger"></i></a>
                          </td>
                          </tr>
                        ';
                        // $i++;
                      }
                    ?>
                    </tbody>
                  </table>
                  <div id="divInsertarArticulos">
                    <div class="row text-center">
                      <span class='text-warning'><strong id='textoAdvertenciaArt'><i class='fa fa-warning fa-1x'></i> ¡Insertar articulos!</strong></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 small">
                      <div class="col-xs-5 pull-left">
                        <br /><br /><br />
                        Recib&iacute; de <strong><span id="nombreClienteRecibo"></span></strong>,<br />
                        la Suma de <strong><span id="sumaTotal"></span></strong> Lempiras,
                        por cuenta de un total de <strong><span id="numArticulos"></span></strong> articulo(s) descritos en la tabla que arriba se muestra,
                        el d&iacute;a de hoy <br /><strong><span id="fechaRecibo"><?php echo $fechaImpFullFormat;?></span></strong>.<br />
                        <br /><br /><br />
                        <div class="text-center">
                          <strong>________________________________________</strong><br />
                          <strong><i>FIRMA</i></strong>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3" >
                      <div class="pull-right">
                        <table class="table">
                          <thead>
                            <tr>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><small><strong class="pull-right">SUBTOTAL</strong></small></td>
                              <td><input class="form-control input-sm" type="text" name="Subtotal" id="Subtotal" placeholder="Subtotal" readonly></td>
                            </tr>
                            <tr>
                              <td><small><strong class="pull-right">DESC.</strong></small></td>
                              <td>
                                <div class="input-group small">
                                  <span class="input-group-btn small">
                                    <select class="input-group input-sm" name="tipoDescuento" id="tipoDescuento" onclick="calcTotal()">
                                      <option value="Valor" selected>L.</option>
                                      <option value="Porcentaje">%</option>
                                    </select>
                                  </span>
                                  <input class="form-control input-sm" type="number" min="0" name="Descuento" id="Descuento" placeholder="Descuento" onchange="calcTotal()" onkeyup="calcTotal()" value=0>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><small><strong class="pull-right">TOTAL</strong></small></td>
                              <td><input class="form-control input-sm" type="text" name="Total" id="Total" placeholder="Total" readonly></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row hidden-print mt-20" id="btn-Vender">
                <div class="col-xs-12 text-center" ><a class="btn btn-primary btn-lg" ><i class="fa fa-money"></i> VENDER</a></div>
              </div>
            </section>
            <!-- Modal Dialog ====================================================================================================================== -->
            <div class='modal fade' id='insertarDatosCliente' tabindex='-1' role='dialog'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h4 class='modal-title' id='defaultModalLabel'>Datos del cliente</h4>
                  </div>
                  <div class='modal-body'>
                    <form action="" id="formDatosCliente">
                      <table class="table">
                        <thead>
                          <tr>
                            <th><strong>Campo</strong></th>
                            <th><strong>Detalle</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>Nombre</strong></td>
                            <td>
                              <div class="form-group" id="divNombreCliente">
                                <input class="form-control" type="text" name="NombreCliente" id="NombreCliente" placeholder="Ingrese el nombre" autofocus>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><strong>Direccion:</strong></td>
                            <td>
                              <div class="form-group" id="divDireccionCliente">
                                <textarea class="form-control" rows="3" name="DireccionCliente" id="DireccionCliente" placeholder="Ingrese la direccion"></textarea>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><strong>Telefono:</strong></td>
                            <td>
                            <div class="form-group" id="divTelefonoCliente">
                              <input class="form-control" type="text" name="TelefonoCliente" id="TelefonoCliente" placeholder="ejemplo: (504) 9999-9999">
                            </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </form>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' id="btn-aceptarCliente" class='btn btn-link waves-effect' data-dismiss='modal'>ACEPTAR</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Dialog ====================================================================================================================== -->
            <div class='modal fade' id='insertarArticulo' tabindex='-1' role='dialog'>
              <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h4 class='modal-title' id='defaultModalLabel'>Agregar articulo a la lista</h4>
                  </div>
                  <div class='modal-body'>
                    <!-- <br> -->
                    <div class="row">
                        <form class="form-horizontal col-xs-12">
                          <div class="form-group">
                              <label for ="input_busqueda" class="control-label col-xs-4">Campo de Filtro</label>
                            <div class="col-xs-5">
                              <input class="form-control" type="text" name="textoBusqueda" id="textoBusqueda" placeholder="ej. A-0001 &oacute; bicicleta">
                            </div>
                          </div>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-xs-12 table-responsive">
                        <div class="card-body">
                          <form class="form-horizontal">
                            <div id="datos">
                              <table class='table table-condensed table-striped table-hover'>
                                <thead>
                                  <tr>
                                    <th class='text-center'>Codigo Articulo</th>
                                    <th class='text-center'>Descripcion</th>
                                    <th class='text-center'>Precio</th>
                                    <th class='text-center'>Cantidad</th>
                                    <th class='text-center'>Estado</th>
                                    <th class='text-center hidden-print'><th>
                                  </tr>
                                </thead>
                                <tbody id="rowsSeleccionRapida">
                                <?php
                                $queryHayDisponibles=mysqli_query($db, "SELECT COUNT(*) AS Disponible FROM articulos WHERE Disponible=1") or die(mysqli_error());
                                $rowHayDisponibles=mysqli_fetch_array($queryHayDisponibles);
                                if ($rowHayDisponibles['Disponible']>0){
                                    $queryArticulo=mysqli_query($db, "SELECT Id_Articulo, Descripcion, Precio, Cantidad, Estado FROM articulos WHERE Disponible=1") or die(mysqli_error());
                                    while ($rowArticulo=mysqli_fetch_array($queryArticulo)) {
                                    // foreach ($rowArticulo as $key => $value) {
                                    echo '
                                        <tr id="listaId'.$rowArticulo['Id_Articulo'].'" class="rowBusqueda text-center">
                                        <td>'.$rowArticulo['Id_Articulo'].'</td>
                                        <td>'.$rowArticulo['Descripcion'].'</td>
                                        <td>L. '.$rowArticulo['Precio'].'</td>
                                        <td>'.$rowArticulo['Cantidad'].'</td>
                                        <td>'.$rowArticulo['Estado'].'</td>
                                        <td>
                                        <a class="agregarRow" id="'.$rowArticulo['Id_Articulo'].'"><i class="fa fa-plus-circle fa-2x text-info"></i></a>
                                        </td>
                                        </tr>
                                    ';
                                    } 
                                    echo '
                                    </tbody>
                                    </table>
                                    ';
                                } else if ($rowHayDisponibles['Disponible']==0) {
                                    echo '
                                        </tbody>
                                    </table>
                                    ';
                                    echo '
                                        <div class="hidden-print col-md-12 text-center">
                                            <i class="fa fa-info-circle text-info"></i>
                                            <b class="text-info">No Hay art&iacute;culos disponibles</b>
                                            <br><br>
                                            <div class="col-xs-12 text-center" >
                                                <a class="btn btn-primary btn-sm" href="ab_registrar_articulo.php">
                                                    <i class="fa fa-check-circle"></i> 
                                                    Registrar Articulos
                                                </a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a class="btn btn-primary btn-sm" href="ci_catalogo.php">
                                                    <i class="fa fa-check-circle"></i> 
                                                    Ver Catalogo
                                                </a>
                                            </div>
                                        </div>
                                    ';
                                }
                                ?>
                              <!-- Cuidado con las etiquetas de cierre -->
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-link waves-effect' data-dismiss='modal'>CERRAR</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Dialog ====================================================================================================================== -->
            <div class="modal fade" id="cancelarVenta" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center" id="smallModalLabel">Registrar Venta</h4>
                        </div>
                        <div class="modal-body text-center">
                          <form>
                            <div class="form-group has-success">
                                <label class="control-label">Total venta</label>
                                <div class="input-group text-info">
                                  <span class="input-group-addon input-lg"><strong>L.</strong></span>
                                  <input type="number" name="cantTotalVenta" id="cantTotalVenta" class="form-control input-lg" placeholder="Cantidad Total" min=0 disabled>
                                </div>
                            </div>
                            <br>
                            <div class="form-group has-warning">
                                <label class="control-label">Monto de pago</label>
                                <div class="input-group">
                                  <span class="input-group-addon input-lg"><strong>L.</strong></span>
                                  <input type="number" name="montoDePago" id="montoDePago" class="form-control input-lg" placeholder="Monto de pago" min=0 onchange="calcCambio()" onkeyup="calcCambio()" required autofocus multiple>
                                </div>
                            </div>
                            <br>
                            <div class="form-group has-error">
                                <label class="control-label">Cambio</label>
                                <div class="input-group">
                                  <span class="input-group-addon input-lg"><strong>L.</strong></span>
                                  <input type="number" name="cambio" id="cambio" class="form-control input-lg" placeholder="Cambio a devolver" min=0 disabled>
                                </div>
                            </div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <!-- <div class="col-xs-12 center-block"> -->
                            <button type="button" class="btn btn-link waves-effect col-xs-5 pull-left" data-dismiss="modal"><i class="fa fa-times-circle fa-3x text-danger" ></i></button>
                            <button type="submit" class="btn btn-link waves-effect col-xs-5 pull-right" form="formCambio"><i class="fa fa-check-circle fa-3x" ></i></button>
                          <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
  <!-- </form> -->
            <form id="formCambio" action="cv_vender_imprimir.php" method="POST">
              <!-- Area from hidden inputs data -->
              <input type="hidden" id="systData" name="systData" value="">
              <input type="hidden" id="clntData" name="clntData" value="">
              <input type="hidden" id="artsData" name="artsData" value="">
              <input type="hidden" id="totlData" name="totlData" value="">
              <!-- <input type="submit" value="ENVIAR"> -->
              <!-- <button type="submit" class="btn btn-link waves-effect col-xs-5 pull-right"><i class="fa fa-check-circle fa-3x" ></i></button> -->
            </form>
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
    <!-- <script src="js/modals.js"></script> -->
    <!-- <script src="js/tips/vender_busqueda_rapida.js"></script> -->
    <script src="js/igorescobar-jQuery-Mask-Plugin/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript">
    // jQuery(document).ready(function (){
      $("#TelefonoCliente").mask("(999) 9999-9999");
      $('body').removeClass("sidebar-mini").addClass("sidebar-collapse");
      
      function rellenarSystData() {
        tmp = $("#dateData").html() + ":" + $("#fechaRecibo").html() + ":" + $("#dateDB").html() + ":" + $("#numRecData").html() + ":" + $("#usserData").html();
        $("#systData").val(tmp).value;
        // alert($("#systData").val());
      }
      rellenarSystData();

      function rellenarClntData(nombre, direccion, telefono){
        $("#clntData").val(nombre + ":" + direccion + ":" + telefono).value;
        // alert($("#clntData").val());
      }

      function rellenarTotlData(subtotal, tipoDesc, descuento, total) {
        tmp = subtotal + ":" + tipoDesc + ":" + descuento + ":" + total;
        $("#totlData").val(tmp).value;
        // alert($("#totlData").val());
      }

      function rellenarArtsData() {
        var tmp = $("#numArticulos").html() + ":";
        // var index = 1;
        $(".rowsNum").each(function(key, value){
          // alert($(this).html());
          parent = $(this).parent();
          idRow = "#"+$(parent).attr('id');
          Num = parseFloat($(this).html());
          if(Num!==0){
            tmp += Num + ":";
            tmp += $(idRow+"Id").html() + ":";
            tmp += $(idRow+"Descripcion").html() + ":";
            tmp += $(idRow+"Cantidad").val() + ":";
            tmp += $(idRow+"PrecioU").html() + ":";
            tmp += $(idRow+"Precio").html() + ":";
            // alert(idNum);
            // $(idNum).html(index);
            // contarArts()
            // index++;
          }
          // if(Num==0){
          //   $(idNum).html(0);
          // }
        });
        $("#artsData").val(tmp).value;
        // alert($("#artsData").val());
      }

      function agregarArticulo(idArticulo) {
        
        $.ajax({
                    type: "POST",
                    url: "cv_vender_obtener_articulo.php",
                    data: "Id_Articulo="+idArticulo,
                    dataType: "json",
                })
                .done(function( data, textStatus, jqXHR ){
                    //alert(".done - data.exito=" + data.exito + " mensaje="+data.datos.mensaje+" articulo="+data.datos.articulo.Id_Articulo);
                      console.log(data);
                      var tdArticulo = "<tr id='row" + data.Id_Articulo + "'>" +
                        "<td class='text-center' id='Num" + data.Id_Articulo + "'>1</td>"+
                        "<td class='text-center' id='Id" + data.Id_Articulo + "'>" + data.Id_Articulo + "</td>"+
                        "<td id='Desc" + data.Id_Articulo + "'>" + data.Descripcion + "</td>"+
                        // "<td><input class='form-control input-sm col-xs-4 Cantidad" + data.Id_Articulo + "' type='number' name='Cantidad" + data.Id_Articulo + "' id='Cantidad" + data.Id_Articulo + "' value=1 min='1' max='" + data.Existencias + "' placeholder='Cantidad de unidades'></td>"+
                        "<td class='text-center' id='Cantidad" + data.Id_Articulo + "'>1</td>"+
                        "<td class='text-center' id='PecUnit" + data.Id_Articulo + "'>" + data.Precio_Unitario + "</td>"+
                        "<td class='text-center' id='Prec" + data.Id_Articulo + "'>" + data.Precio_Unitario + "</td>"+
                        // "<td class='hidden-print'>"+
                        //   "<a class='eliminarRow' id='" + data.Id_Articulo + "'><i class='fa fa-trash fa-2x text-danger' ></i></a>"+
                        // "</td>"+
                      "</tr>";
                      $( "#rowLista" ).append(tdArticulo);
                      $("#divInsertarArticulos").hide();
                })
                .fail(function( data, textStatus, jqXHR ){
                    alert(".fail");
                });
              
      }
      function clienteVacio(){
        $(".cliente").hide();
        var sinDatos = "<strong class='text-warning' id='textoAdvertencia'><i class='fa fa-warning fa-1x'></i> ¡Insertar datos del cliente!</strong>"
        $("#datosCliente").append(sinDatos);
        $("#nombreClienteRecibo").html("");
      }
      function clienteLleno() {
        $("#textoAdvertencia").remove();
        $(".cliente").show();
        $.notify({
            title: "Info : ",
            message: "Se han completado los datos del cliente.",
            icon: 'fa fa-info-circle' 
          },{
            type: "info"
          });
      }
      // function seleccionarConsulta(){}
      $(".agregarRow").click(function(){
        // alert(this.id);
        // agregarArticulo(this.id);
        $("#row"+this.id).show();
        $("#divInsertarArticulos").hide();
        var rowCantidad = "#row" + this.id + "Cantidad";
        // alert(rowCantidad);
        calcPrecioArts($(rowCantidad));
        contarRows();
        contarArts();
        $.notify({
            title: "Info : ",
            message: "El articulo se ha a&ntilde;adido a la lista de venta.",
            icon: 'fa fa-info-circle' 
          },{
            type: "info"
          });
      });

      clienteVacio();
      $("#btn-datosCliente").click(function(){
        $("#NombreCliente").val($("#nombreClienteTexto").html()).val;
        $("#DireccionCliente").val($("#direccionClienteTexto").html()).val;
        $("#TelefonoCliente").val($("#telefonoClienteTexto").html()).val;
      });
      $("#btn-aceptarCliente").click(function(){
        $("#divNombreCliente").removeClass("has-success");
        $("#divDireccionCliente").removeClass("has-success");
        $("#divTelefonoCliente").removeClass("has-success");
        $("#divTelefonoCliente").removeClass("has-error");
        var NombreCliente = $("#NombreCliente").val();
        var DireccionCliente = $("#DireccionCliente").val();
        var TelefonoCliente = $("#TelefonoCliente").val();
        // alert( "Nombre: " + NombreCliente + " con length " + NombreCliente.length + ", Direccion: " + DireccionCliente + " con length " + DireccionCliente.length + " Telefono: " + TelefonoCliente + " con length " + TelefonoCliente.length + "" );
        if (NombreCliente.length==0&&DireccionCliente.length==0&&TelefonoCliente.length!==15) {
          $("#divNombreCliente").addClass("has-error");
          $("#divDireccionCliente").addClass("has-error");
          $("#divTelefonoCliente").addClass("has-error");
          $("#NombreCliente").attr('required', true) ;
          return false;
        }else {
          $("#divNombreCliente").removeClass("has-error");
          $("#divDireccionCliente").removeClass("has-error");
          $("#divTelefonoCliente").removeClass("has-error");
          if(NombreCliente.length!==0){
            if (DireccionCliente.length!==0) {
              if (TelefonoCliente.length==15) {                
                clienteLleno();
                $("#nombreClienteTexto").html($("#NombreCliente").val());
                $("#direccionClienteTexto").html($("#DireccionCliente").val());
                $("#telefonoClienteTexto").html($("#TelefonoCliente").val());
                $("#nombreClienteRecibo").html($("#NombreCliente").val());
                rellenarClntData($("#NombreCliente").val(), $("#DireccionCliente").val(), $("#TelefonoCliente").val());
                // alert($("#clntData").val())
              }else{
                $("#TelefonoCliente").attr('required',true);
                $("#divTelefonoCliente").addClass("has-error");
                return false;
              }
            }else{
              $("#DireccionCliente").attr('required',true);
              $("#divDireccionCliente").addClass("has-error");
              return false;
            }
          }else{
            $("#divNombreCliente").addClass("has-error");
            $("#NombreCliente").attr('required',true);
            return false;
          }
        }
      });
      $("#btn-limpiarDatos").click(function(){});
      function imprimir(){
        $('#recibo').print();
      }

      // function seMuestran() {
      //   var mostrado = false;
      //     $.each($(".rowListaId").show(), function(key, value) {
      //       alert("key = " + key + ", value = " + value + ", id = " + value.id);
          //   var id = "#" + value.id + "";
          //   // alert(id);
          //   var row = $(id);
          //   // alert(row);
          //   // if(!row.show()==true){
          //   //   mostrado = true;
          //   // }
          // });
          // if (mostrado) {
          //   return true;
          // } else {
          //   return false;
          // }
      // }
      // seMuestran();
      jQuery(document).ready(function (){
        $('.eliminarRow').click(function(){
          var id = "#row" + this.id;
          // alert(id);
          $(id).hide();
          $("#row"+this.id+"Precio").html(0);
          subTotal();
          if($("#Subtotal").val()=='0.00'){
            $("#divInsertarArticulos").show();
          }
          contarRows();
          contarArts();
          $.notify({
            title: "Info : ",
            message: "Se ha quitado el art&iacute;culo de la lista de venta.",
            icon: 'fa fa-info-circle' 
          },{
            type: "info"
          });
        });
      });

      $("#textoBusqueda").keyup(function(){
        var data = "filtro=";
        if (this.value!=="") {
          data += this.value;
        }
        $.ajax({
                    type: "POST",
                    url: "cv_vender_seleccion_rapida.php",
                    data: data,
                    dataType: "json",
                })
                .done(function( data, textStatus, jqXHR ){
                  console.log(data);
                    //alert(".done - data.exito=" + data.exito + " mensaje="+data.datos.mensaje+" articulo="+data.datos.articulo.Id_Articulo);
                    if (data.exito) {
                        //console.log(data);
                        $(".rowBusqueda").hide();
                        $("#sinResultados").remove();
                        $.each(data.datos.articulo, function( key, value ) {
                          //alert(value['Id_Articulo']);
                          // $.each($("tr"), function(id, valor){
                            var listaId = "#listaId"+value['Id_Articulo'];
                            if ($(listaId)) {
                              $(listaId).show();
                            }
                          // });
                        });
                        // alert(row);
                    }else{
                        //alert(data.exito);
                        $("#sinResultados").remove();
                        var sinResultados = ""+
                            "<div class='text-center text-info' id='sinResultados'>" +
                                "<h5><i class='fa fa-info-circle'></i> No se han encontrado resultados</h5>" +
                            "</div>";
                        $(".rowBusqueda").hide();
                        $( "#datos" ).append(sinResultados);
                    }
                })
                .fail(function( data, textStatus, jqXHR ){
                  console.log(data);
                    alert(".fail");
                });
      });
      
      /*$("#textoBusqueda").keyup(function() {
        $(".rowArticulo").remove();
        $("#rowSinResultados").remove();
        var data = "filtro=";
        if (this.value!=="") {
          data += this.value;
        }
        $.ajax({
                    type: "POST",
                    url: "cv_vender_seleccion_rapida.php",
                    data: data,
                    dataType: "json",
                })
                .done(function( data, textStatus, jqXHR ){
                  console.log(data);
                    //alert(".done - data.exito=" + data.exito + " mensaje="+data.datos.mensaje+" articulo="+data.datos.articulo.Id_Articulo);
                    if (data.exito) {
                        //console.log(data);
                        
                        $.each(data.datos.articulo, function( key, value ) {
                            //alert(data.datos.articulo.id);
                            var row = "";
                            row += "<tr class='rowArticulo text-center'>" +
                                      "<td>" + value['Id_Articulo'] + "</td>"+
                                      "<td>" + value['Descripcion'] + "</td>"+
                                      "<td>" + value['Precio'] + "</td>"+
                                      "<td>" + value['Cantidad'] + "</td>"+
                                      "<td>" + value['Estado'] + "</td>"+
                                      "<td class='hidden-print'>"+
                                        "<a id='" + value['Id_Articulo'] + "'><i class='fa fa-plus-circle fa-2x text-primary'></i></a>"+
                                      "</td>"+
                            "</tr>";
                            $( "#rowsSeleccionRapida" ).append(row);
                        });
                        // alert(row);
                    }else{
                        //alert(data.exito);
                        var sinResultados = ""+
                            "<div class='text-center text-primary' id='rowSinResultados'>" +
                                "<h5>No se han encontrado resultados</h5>"
                            "</div>" +
    
                        $( "#datos" ).append(sinResultados);
                    }
                })
                .fail(function( data, textStatus, jqXHR ){
                  console.log(data);
                    alert(".fail");
                });
      });
      });*/

      // $("#Subtotal").on('change', function(){
      //   $("#Descuento").attr('max', this.value);
      // });

      function calcTotal(){
        var SubTotalStr = $("#Subtotal").val();
        if (SubTotalStr.length!==0||SubTotalStr!=="") {
          var Total = 0;
          switch ($("#tipoDescuento").val()) {
            case 'Valor':
              if ($("#Descuento").val()>parseFloat($("#Subtotal").val())) {
                $("#Descuento").val(parseFloat($("#Subtotal").val())).value;
              }else{
                $("#Descuento").attr('max', parseFloat($("#Subtotal").val()));
                SubTotal = parseFloat(SubTotalStr);
                Descuento = parseFloat($("#Descuento").val());
                Total = SubTotal-Descuento;
                $("#Total").val(Total.toFixed(2)).value;
                $("#sumaTotal").html(Total.toFixed(2));
                $("#cantTotalVenta").val(Total.toFixed(2)).value;
              }
              break;
            case 'Porcentaje':
              if ($("#Descuento").val()>100) {
                $("#Descuento").val(100).value;
              } else {
                $("#Descuento").attr('max', 100);
                SubTotal = parseFloat(SubTotalStr);
                Descuento = parseFloat($("#Descuento").val());
                Total = SubTotal-(SubTotal*(Descuento/100));
                $("#Total").val(Total.toFixed(2)).value;
                $("#sumaTotal").html(Total.toFixed(2));
                $("#cantTotalVenta").val(Total.toFixed(2)).value;
              }
              break;
            default:
              break;
          }
        }
      }

      // $("#Descuento").keyup(function(){
      //   calcTotal();
      // });

      // $("#Descuento").on('change', function(){
      //   calcTotal();
      // });

      function ocultarLista(){
        $.each($("tr"), function( key, value ) {
          $(".rowListaId").hide();
        });
      }

      ocultarLista();
      subTotal();

      function subTotal() {
        var subTotal = 0;
        $.each($(".rowsPrecio"), function(key, value){
          tmp = $(value).html();
          subTotal += parseFloat(tmp);
        });
        $("#Subtotal").val(subTotal.toFixed(2)).val;
        calcTotal();
      }

      function calcPrecioArts(object) {
        parent = $(object).parent();
        parent2 = $(parent).parent();
        var precioU = $("#"+parent2.attr('id')+"PrecioU").html();
        // alert("precioU = "+precioU);
        // var precio = $(object).attr('value')*parseFloat(precioU);
        var precio = object.value*parseFloat(precioU);
        //  alert(precio);
        // if(typeof precio === 'undefined'){precio = object.value*parseFloat(precioU);}
        if(isNaN(precio)){precio = $(object).attr('value')*parseFloat(precioU);}
        // alert("$(object).attr('value') = "+$(object).attr('value'));
        // alert("precio = "+precio);
        $("#"+parent2.attr('id')+"Precio").html(precio.toFixed(2));
        precio='';
        subTotal();
      }

      $(".inputCantidad").keyup(function(){
        // alert($(this).value);
        calcPrecioArts(this);
        contarArts();
        // alert(this.id);
        // parent = $(this).parent();
        // // alert(parent.html());
        // parent2 = $(parent).parent();
        // // alert(parent2.attr('id'));
        // var precioU = $("#"+parent2.attr('id')+"PrecioU").html();
        // // alert(precioU);
        // var precio = this.value*parseFloat(precioU);
        // $("#"+parent2.attr('id')+"Precio").html(precio.toFixed(2));
      });

      $(".inputCantidad").on('change', function(){
        calcPrecioArts(this);
        contarArts();
        // parent = $(this).parent();
        // parent2 = $(parent).parent();
        // var precioU = $("#"+parent2.attr('id')+"PrecioU").html();
        // var precio = this.value*parseFloat(precioU);
        // $("#"+parent2.attr('id')+"Precio").html(precio.toFixed(2));
      });

      function contarRows(){
        var index = 1;
        $(".rowsPrecio").each(function(key, value){
          // alert($(this).html());
          parent = $(this).parent();
          idNum = "#"+$(parent).attr('id')+"Num";
          Num = parseFloat($(this).html());
          if(Num!==0){
            // alert(idNum);
            $(idNum).html(index);
            // contarArts()
            index++;
          }
          if(Num==0){
            $(idNum).html(0);
          }
        });
      }
      contarRows();

      function contarArts(){
        var cuenta = 0;
        $(".rowsPrecio").each(function(key, value){
          parent = $(this).parent();
          idCant = "#"+$(parent).attr('id')+"Cantidad";
          Precio = parseFloat($(this).html());
          if(Precio!==0){
            // alert(idPrecio);
            cuenta += parseFloat($(idCant).val());
          }
          if(Precio==0){
            cuenta;
          }
        });
        $("#numArticulos").html(cuenta);
      }
      contarArts();

      function calcCambio(){
        var total = parseFloat($("#cantTotalVenta").val());
        var monto = parseFloat($("#montoDePago").val());
        var cambio = monto-total;
        $("#cambio").val(cambio.toFixed(2)).val;
      }

      $("#btn-Vender").click(function(){
        if (($("#nombreClienteTexto").html()!=="")&&($("#direccionClienteTexto").html()!=="")&&($("#telefonoClienteTexto").html()!=="")) {
          if ($("#Subtotal").val()!=='0.00') {
            rellenarArtsData();
            rellenarTotlData($("#Subtotal").val(), $("#tipoDescuento").val(), $("#Descuento").val(), $("#Total").val());
            $('#cancelarVenta').modal('show');
          } else {
            $.notify({
            title: "Error : ",
            message: "Debe agregar al menos un articulo a la lista de venta.",
            icon: 'fa fa-times' 
          },{
            type: "danger"
          });
          }
        } else {
          $.notify({
            title: "Error : ",
            message: "Debe ingresar los datos de cliente antes de realizar la venta.",
            icon: 'fa fa-times' 
          },{
            type: "danger"
          });
        }
      });
      
      
      
    </script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
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
