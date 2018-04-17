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
          <li class="treeview"><a href="#"><i class="fa fa-plus-circle"></i><span>Abastecimiento</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="ab_registrar_contenedor.php"><i class="fa fa-truck "></i>Registrar Contenedor</a></li>
              <li><a href="ab_registrar_articulo.php"><i class="fa fa-television"></i>Registrar Articulo</a></li>
            </ul>
          </li>           
          <li class="treeview"><a href="#"><i class="fa fa-list-alt"></i><span>Control de Inventario</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="ci_consultar_articulo.php"><i class="fa fa-search"></i>Consultar Articulo</a></li>
              <li><a href="ci_modificar_articulo.php?codigo_buscar=null"><i class="fa fa-refresh"></i>Modificar Articulo</a></li>
              <li><a href="ci_catalogo.php"><i class="fa fa-book"></i>Catalago de Articulos</a></li>
               <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Categorias</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="ic_agregar_categoria.php"><i class="fa fa-plus-square"></i>Agregar Categoria</a></li>
              <li><a href="ci_consultar_categoria.php"><i class="fa fa-search"></i>Consultar Categoria</a></li>
              <li><a href="ci_modificar_categoria.php?codigo_buscar=null"><i class="fa fa-refresh"></i>Modificar Categoria</a></li>
           </ul>
            </ul>
          </li>
          <li class="treeview"><a href="#"><i class="fa fa-shopping-cart"></i><span>Control de Ventas</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="cv_vender.php"><i class="fa fa-cart-plus"></i>Registrar Venta</a></li>
            </ul>
          </li> 
          <li class="treeview"><a href="#"><i class="fa fa-usd"></i><span>Finanzas</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li class="treeview"><a href="#"><i class="fa fa-check-square-o"></i><span>Acciones</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="of_cierre_diario.php"><i class="fa fa-sun-o"></i>Cierre de Caja (Diario)</a></li>
                  <li><a href="of_cierre_mensual.php"><i class="fa fa-calendar-check-o"></i>Cierre de Caja (Mensual)</a></li>
                  <li><a href="fi_pagos.php"><i class="fa fa-money"></i>Realizar pago</a></li>   
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-question"></i><span>Consultas</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="of_consultar_cierre_diario.php"><i class="fa fa-sun-o"></i>Consultar Cierre Diario</a></li>
                <li><a href="of_consultar_cierre_mensual.php"><i class="fa fa-calendar-check-o"></i>Consultar Cierre Mensual</a></li>
                </ul>
              </li>
              <li class="treeview"><a href="#"><i class="fa fa-history"></i><span>Historiales</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="of_historial_inversiones.php"><i class="fa fa-suitcase"></i>Historial de Inversiones</a></li>
                <li><a href="of_historial_ventas.php"><i class="fa fa-money"></i>Historial de Ventas </a></li>
                </ul>
              </li>

              <li class="treeview"><a href="#"><i class="fa fa-file-text-o"></i><span>Reportes</span><i class="fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="of_reporte_ventas.php"><i class="fa fa-money"></i>Reporte de Ventas</a></li>
                  <li class="treeview"><a href="#"><i class="fa fa-line-chart"></i><span>Reportes Estadisticos</span><i class="fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                      <li><a href="of_reporte_general.php"><i class="fa fa-bar-chart"></i>General</a></li>
                      <li><a href="of_estadisticas_ventas.php"><i class="fa fa-line-chart"></i>Ventas</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

            </ul>
          </li>  
          <li class="treeview"><a href="#"><i class="fa fa-cog"></i><span>Configuracion</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="page-user.php"><i class="fa fa-user-circle"></i>Perfil</a></li>
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