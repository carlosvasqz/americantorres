 <?php
 session_start();
function menuGeneral() {
 ?>
 <meta charset="utf-8">
 <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="images/user.png" alt="User Image"></div>
            <title>American Torres</title>
            <div class="pull-left info">
            <?php
              echo "
                <p>".$_SESSION['username']."</p>
                <p class='designation'>".$_SESSION['type']."</p>
              ";
            ?>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Abastecimiento</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="ab_registrar_contenedor.php"><i class="fa fa-circle-o"></i>Registrar Contenedor</a></li>
                <li><a href="ab_registrar_articulo.php"><i class="fa fa-circle-o"></i>Registrar Articulo</a></li>
              </ul>
            </li>           
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Control de Inventario</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="ci_consultar_articulo.php"><i class="fa fa-circle-o"></i>Consultar Articulo</a></li>
                <li><a href="ci_modificar_articulo.php"><i class="fa fa-circle-o"></i>Modificar Articulo</a></li>
                <li><a href="ci_catalogo.php"><i class="fa fa-circle-o"></i>Catalago de Articulos</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Control de Ventas</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="cv_vender.php"><i class="fa fa-circle-o"></i>Registrar Venta</a></li>
              </ul>
            </li> 
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Finanzas</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li class="treeview"><a href="#"><i class="fa fa-dollar"></i><span>Acciones</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="of_cierre_diario.php"><i class="fa fa-circle-o"></i>Cierre de Caja (Diario)</a></li>
                    <li><a href="of_cierre_mensual.php"><i class="fa fa-circle-o"></i>Cierre de Caja (Mensual)</a></li>
                  </ul>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-dollar"></i><span>Consultas</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                  <li><a href="of_consultar_cierre_diario.php"><i class="fa fa-circle-o"></i>Consultar Cierre Diario</a></li>
                  <li><a href="of_consultar_cierre_mensual.php"><i class="fa fa-circle-o"></i>Consultar Cierre Mensual</a></li>
                  </ul>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-dollar"></i><span>Historiales</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                  <li><a href="of_historial_inversion.php"><i class="fa fa-circle-o"></i>Historial de Inversiones</a></li>
                  <li><a href="of_historial_ventas.php"><i class="fa fa-circle-o"></i>Historial de Ventas </a></li>
                  </ul>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-dollar"></i><span>Reportes</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="of_reporte_ventas.php"><i class="fa fa-circle-o"></i>Reporte de Ventas</a></li>
                    <li><a href="of_reporte_general.php"><i class="fa fa-circle-o"></i>Reporte General</a></li>
                  </ul>
                </li>
              </ul>
            </li>  
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Configuracion</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="page-user.php"><i class="fa fa-circle-o"></i>Perfil</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Sesion</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#" class="alert" style="margin:0px;"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesi&oacute;n</a></li>
              </ul>
            </li> 
          </ul>
        </section>
      </aside>
      <?php
}
      ?>