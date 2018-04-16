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
    <title>Modificar Articulo | American Torres</title>
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
            <h1><i class="fa fa-plus-square"></i> Modificar informacion de categoria</h1>
            <p>Modificar categoria</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-institution fa-lg"></i></li>
              <li>Categorias</li>
              <li><a href="#"> Modificar existente</a></li>
            </ul>
          </div>
          <?php 
          $codigo_buscar=$_GET['codigo_buscar'];
          if ($codigo_buscar==null) {
              $codigo_categoria='';
              $nombre_categoria = '';
              $descripcion_categoria = '';
              
            
          } 
          if ($codigo_buscar!=null) {
            $queryObjeto = mysqli_query($db, "SELECT * FROM categorias WHERE Id_Categoria = '".$codigo_buscar."'") or die(mysqli_error());
            if ($rowObjeto=mysqli_fetch_array($queryObjeto)) {
              $codigo_categoria = $rowObjeto['Id_Categoria'];
              $nombre_categoria = $rowObjeto['Nombre'];
              $descripcion_categoria = $rowObjeto['Descripcion'];
             
              
            } else {
              $codigo_categoria='';
              $nombre_categoria = '';
              $descripcion_categoria = '';
              
            }
          }            
        ?>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-title">
               <!-- <h3 class="card-title" align="center">Formulario de registro</h3>-->
              </div>
              <div class="card-body">
                <form class="form-horizontal" method="GET" id="form_buscar">
                  <div class="form-group">
                    <label class="control-label col-md-3">Codigo de categoria</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" name="codigo_buscar" id="codigo_buscar" placeholder="Ingresar codigo de categoria" value="<?php echo $codigo_categoria;?>">
                    </div>
                  </div>        

                </form>
              </div>
              
             <div class="card-footer" align="center">
                <button class="btn btn-primary icon-btn" type="submit" form="form_buscar" id="buscar" name="buscar"><i class="fa fa-search" aria-hidden="true"></i>Buscar</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn btn-default icon-btn" type="button" onclick="limpiarTodo()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Limpiar</button>
              </div>
            </div>
          </div>
        </div>

             <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-title">
               <!-- <h3 class="card-title" align="center">Formulario de registro</h3>-->
              </div>
              <div class="card-body">
                <form class="form-horizontal" id="guardar_categoria">

                  <div class="form-group">
                    <label class="control-label col-md-3">Nombre</label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="4"  name="nombre_categoria" id="nombre_categoria" placeholder=""><?php echo $nombre_categoria;?></textarea>
                      <input type="hidden" name="codigo_categoria" id="codigo_categoria" value="<?php echo $codigo_categoria ?>">
                    </div>
                  </div>  


               <div class="form-group">
                    <label class="control-label col-md-3">Descripcion</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text"  name="descripcion_categoria" id="descripcion_categoria" placeholder="" value="<?php echo $descripcion_categoria;?>">
                    </div>
                  </div>

                
                </form>
              </div>
             <div class="card-footer" align="center">
                <button class="btn btn-primary icon-btn" type="button"  id="modificar" name="modificar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                &nbsp;&nbsp;&nbsp;
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
    <script src="js/tips/categoria_acciones.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script src="js/main.js"></script>
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