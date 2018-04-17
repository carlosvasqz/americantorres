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
        <div class="row user">
          <div class="col-md-12">
            <div class="profile">
              <div class="info"><img class="user-img" src="images/user.png">
                <h4><?php echo $_SESSION['username']; ?></h4>
                <p><?php echo $_SESSION['type']; ?></p>
              </div>
              <div class="cover-image" src="images/nature.jpeg"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-0">
              <ul class="nav nav-tabs nav-stacked user-tabs">
                <!-- <li class="active"><a href="#user-timeline" data-toggle="tab">Timeline</a></li> -->
                <li class="active"><a href="#user-settings" data-toggle="tab">Perfil</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="tab-content">
              <!-- <div class="tab-pane fade" id="user-timeline">
                <div class="timeline">
                  <div class="post">
                    <div class="post-media"><a href="#"><img src="images/user.png"></a>
                      <div class="content">
                        <h5><a href="#">John Doe</a></h5>
                        <p class="text-muted"><small>2 January at 9:30</small></p>
                      </div>
                    </div>
                    <div class="post-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <ul class="post-utility">
                      <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                      <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                      <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                    </ul>
                  </div>
                  <div class="post">
                    <div class="post-media"><a href="#"><img src="images/user.png"></a>
                      <div class="content">
                        <h5><a href="#">John Doe</a></h5>
                        <p class="text-muted"><small>2 January at 9:30</small></p>
                      </div>
                    </div>
                    <div class="post-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <ul class="post-utility">
                      <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                      <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                      <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                    </ul>
                  </div>
                </div>
              </div> -->
              <div class="tab-pane active" id="user-settings">
                <div class="card user-settings">
                  <h4 class="line-head">Editar Perfil de Usuario</h4>
                  <!-- <form method="POST" action="usuario_modificar_self.php" id="userform"> -->
                    <div class="row m-10">
                      <div class="col-md-6">
                        <label>Codigo de Usuario:</label>
                        <input class="form-control" type="text" id="codigoUser" name="codigoUser" value="<?php echo $_SESSION['idUsuario']; ?>" disabled />
                      </div>
                    </div>
                    <br />
                    <div class="row m-10">
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <h3 class="panel-title">Cambio de Nombre de Usuario</h3>
                        </div>
                        <div class="panel-body">
                          <div class="row m-10">
                            <div class="col-md-6" id="divUserName">
                              <label>Nombre de Usuario:</label>
                              <input class="form-control col-lg-6" type="text" id="userName" name="userName" placeholder="Ingrese su/sus nombres" value="<?php echo $_SESSION['username']; ?>" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row m-10">
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                          <h3 class="panel-title">Cambio de Contrase&ntilde;a</h3>
                        </div>
                        <div class="panel-body">
                          <div class="row m-10">
                            <div class="col-md-6" id="divOldPass">
                              <label>Contrase&ntilde;a antigua:</label>
                              <input class="form-control col-lg-6" type="text" id="oldPass" name="oldPass" placeholder="Ingrese su contrase&ntilde;a" value="" required>
                              <input type="hidden" id="sessionPass" name="sessionPass" value="<?php echo $_SESSION['pass']; ?>">
                            </div>
                            <div class="col-md-6" id="divNewPass">
                              <label>Contrase&ntilde;a nueva <i class="text-danger small text-uppercase">(Proceda con precaucion)</i>:</label>
                              <input class="form-control col-lg-6" type="text" id="newPass" name="newPass" placeholder="Ingrese su nueva contrase&ntilde;a" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-10">
                      <div class="col-md-12">
                        <!--type="submit"-->
                        <button class="btn btn-primary" id="guardar" type="button" onclik=""><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                      </div>
                    </div>
                  <!-- </form> -->
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
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function (){        
        $("#guardar").click(function(){
          var codigoUser = document.getElementById("codigoUser").value;
          var userName = document.getElementById("userName").value;
          var oldPass = document.getElementById("oldPass").value;
          var sessionPass = document.getElementById("sessionPass").value;
          var newPass = document.getElementById("newPass").value;
          if (userName.length==0) {
            $("#divUserName").removeClass("has-error");
            $("#divOldPass").removeClass("has-error");
            $("#divNewPass").removeClass("has-error");
            $("#divUserName").addClass("has-error");
            $("#userName").focus();
            $.notify({
              title: "Error : ",
              message: "Por favor complete todos los campos.",
              icon: 'fa fa-times' 
            },{
              type: "danger"
            });
          } else if (oldPass.length==0) {
            $("#divUserName").removeClass("has-error");
            $("#divOldPass").removeClass("has-error");
            $("#divNewPass").removeClass("has-error");
            $("#divOldPass").addClass("has-error");
            $("#oldPass").focus();
            $.notify({
              title: "Error : ",
              message: "Por favor complete todos los campos.",
              icon: 'fa fa-times' 
            },{
              type: "danger"
            });
          } else if (newPass.length==0){
            $("#divUserName").removeClass("has-error");
            $("#divOldPass").removeClass("has-error");
            $("#divNewPass").removeClass("has-error");
            $("#divNewPass").addClass("has-error");
            $("#newPass").focus();
            $.notify({
              title: "Error : ",
              message: "Por favor complete todos los campos.",
              icon: 'fa fa-times' 
            },{
              type: "danger"
            });
          } else {
            if (oldPass!==sessionPass) {
              $("#divUserName").removeClass("has-error");
              $("#divOldPass").removeClass("has-error");
              $("#divNewPass").removeClass("has-error");
              $("#divOldPass").addClass("has-error");
              $("#oldPass").focus();
              $.notify({
                title: "Error : ",
                message: "La contrase&ntilde;a antigua es incorrecta.",
                icon: 'fa fa-times' 
              },{
                type: "danger"
              });
            } else {
              $("#divUserName").removeClass("has-error");
              $("#divOldPass").removeClass("has-error");
              $("#divNewPass").removeClass("has-error");
              $.post(
                "page-user-actualizar.php",
                {
                  Id_Usuario: codigoUser,
                  Nombre: userName,
                  Contrasenia: newPass
                },
                function (data){
                  console.log(data.trim());
                  if (data.trim()=="No existe") {
                    $.notify({
                      title: "Error : ",
                      message: "No se ha encontrado el usuario.",
                      icon: 'fa fa-times' 
                    },{
                      type: "danger"
                    });
                  } else if (data.trim()=="Actualizado") {
                    $.notify({
                      title: "Info : ",
                      message: "Sus datos de usuario han sido actualizados.",
                      icon: 'fa fa-check' 
                    },{
                      type: "info"
                    });
                    window.setTimeout('location.href="page-logout.php"', 1500); 
                  }
                }
              );

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