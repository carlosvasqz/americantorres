<?php
  include ('constructor.php');
  include ('bd/conexion.php');
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
    <title>Catalogo | American Torres</title>
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
            <h1><i class="fa fa-dashboard"></i> Catalogo</h1>
            <p>Catalogo general de articulos</p>
          </div>
          <div>
          <ul class="breadcrumb">
            <li><i class="fa fa-institution fa-lg"></i></li>
            <li>Control de Inventario</li>
            <li><a href="#"> Catálogo</a></li>
          </ul>
          </div>
        </div>
        <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-title">
                <h3 class="card-title" align="center">Filtrar vista</h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal" method="GET" form="" id="form_filtrar">
                  <div class="form-group">
                    <label class="control-label col-md-2">Filtrar por</label>
                    <div class="col-md-4">
                    <select class="form-control" name="campo" id="campo">
                      <option value="Ninguno" selected>-- Ninguno --</option>
                      <option value="Id_Articulo">Codigo de Articulo</option>
                      <option value="Descripcion">Descripcion</option>
                      <option value="Precio">Precio</option>
                      <option value="Cantidad">Cantidad</option>
                      <option value="Id_Contenedor">Contenedor</option>
                      <option value="Id_Categoria">Categoria</option>
                          <!-- <?php
                          //if ($estado=='Activo') {
                            //echo '<option value="Activo" selected>Activo</option>';
                            //echo '<option value="Inactivo">Inactivo</option>';
                          //}else{
                            //echo '<option value="Activo" >Activo</option>';
                            //echo '<option value="Inactivo" selected>Inactivo</option>';
                          //}
                          ?> -->
                        </select>
                    </div>
                    <label class="control-label col-md-1">Campo</label>
                    <div class="col-md-4">
                      <input class="form-control" type="text" id="texto" name="texto" value="" placeholder="Texto de filtro" >
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          <?php 
            $queryListaCatalogo=mysqli_query($db, "SELECT * FROM articulos WHERE Disponible='S'") or die(mysqli_error());
            while ($rowCatalogo=mysqli_fetch_array($queryListaCatalogo)) {
              if ($rowCatalogo['Disponible']=="S") {
                $disponible = "Si";
              } else {
                $disponible = "No";
              }
              $queryCategoria=mysqli_query($db, "SELECT categorias.Nombre FROM categorias INNER JOIN articulos ON categorias.Id_Categoria = articulos.Id_Categoria WHERE articulos.Id_Categoria=".$rowCatalogo['Id_Categoria']."") or die(mysqli_error());
              $rowCategoria=mysqli_fetch_array($queryCategoria);
              echo '
              <div class="col-md-4">
                <div class="card">
                  <div class="card-title-w-btn">
                    <h3 class="title">'.$rowCatalogo['Id_Articulo'].'</h3>
                    <p><a class="btn btn-primary icon-btn" data-toggle="modal" data-target="#'.$rowCatalogo['Id_Articulo'].'"><i class="fa fa-plus"></i>Ver</a></p>
                  </div>
                  <div class="card-body">
                    <!-- <div class="pull-left image"><img class="img-circle" src="images/us.png" alt="User Image" style="width:120px;height:120px;" ></div> -->
                    '.$rowCatalogo['Descripcion'].'.<br>
                      <b>Precio:</b> L.'.$rowCatalogo['Precio'].'<br>
                      <b>Cantidad:</b> '.$rowCatalogo['Cantidad'].'<br>
                      <b>Estado:</b> '.$rowCatalogo['Estado'].'
                  </div>
                </div>
              </div>
              <!-- Modal Dialog ====================================================================================================================== -->
              <!-- Default Size -->
              <div class="modal fade" id="'.$rowCatalogo['Id_Articulo'].'" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="defaultModalLabel">Detalles de articulo</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Campo</th>
                                  <th>Detalle</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><b>Codigo de articulo:</b></td>
                                  <td>'.$rowCatalogo['Id_Articulo'].'</td>
                                </tr>
                                <tr>
                                  <td><b>Descripcion:</b></td>
                                  <td>'.$rowCatalogo['Descripcion'].'</td>
                                </tr>
                                <tr>
                                  <td><b>Precio:</b></td>
                                  <td>L. '.$rowCatalogo['Precio'].'</td>
                                </tr>
                                <tr>
                                  <td><b>Cantidad:</b></td>
                                  <td>'.$rowCatalogo['Cantidad'].'</td>
                                </tr>
                                <tr>
                                  <td><b>Disponible:</b></td>
                                  <td>'.$disponible.'</td>
                                </tr>
                                <tr>
                                  <td><b>Contenedor:</b></td>
                                  <td>'.$rowCatalogo['Id_Contenedor'].'</td>
                                </tr>
                                <tr>
                                  <td><b>Categoria:</b></td>
                                  <td>'.$rowCategoria['Nombre'].'</td>
                                </tr>
                                <tr>
                                  <td><b>Estado:</b></td>
                                  <td>'.$rowCatalogo['Estado'].'</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button> -->
                              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
                          </div>
                      </div>
                  </div>
              </div>
              ';  
            }
          ?>
        </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/modals.js"></script>
    <!-- <script src="js/tips/catalogo.js"></script> -->
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
