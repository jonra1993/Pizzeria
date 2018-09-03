<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
  <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
  <li class="sidebar-toggler-wrapper hide">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler"> </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
  </li>

  <li class="nav-item start ">
    <a href="admin.php" class="nav-link">
      <i class="glyphicon glyphicon-home"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
      <span class="title">Panel de control</span>
      <!--span class="selected"></span-->
      <!--span class="arrow open"></span-->
    </a>
  </li>
  <li  class="nav-item start">
    <a href="#"  class="nav-link nav-toggle">
      <i class="glyphicon glyphicon-user"></i>
      <span class="title">Accesos</span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item start "><a class="nav-link " href="group.php">Administrar grupos</a> </li>
      <li class="nav-item start "><a class="nav-link "href="users.php">Administrar usuarios</a> </li>
   </ul>
  </li>
  <!--li>
    <a href="categorie.php" >
      <i class="glyphicon glyphicon-indent-left"></i>
      <span class="title">Categorías</span>
    </a>
  </li-->
  <!--Lista de productos a vender-->
  <li  class="nav-item start">
    <a href="#"  class="nav-link nav-toggle">
      <i class="glyphicon glyphicon-shopping-cart"></i>
      <span class="title">Catalogo de Productos</span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item start "><a class="nav-link "href="catalogo_pizzas.php">Pizzas</a> </li>
      <li class="nav-item start "><a class="nav-link "href="catalogo_bebidas.php">Bebidas</a> </li>
      <li class="nav-item start "><a class="nav-link "href="catalogo_extras.php">Extras</a> </li>
   </ul>
  </li>
  <!--Iventario-->
  <li  class="nav-item start">
    <a href="#"  class="nav-link nav-toggle">
      <i class=" glyphicon glyphicon-check"></i>
      <span class="title">Inventario</span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item start "><a class="nav-link "href="product.php">Manejo de inventario</a> </li>
      <li class="nav-item start "><a class="nav-link "href="product_update.php">Actualización de inventario</a> </li>
      <li class="nav-item start "><a class="nav-link "href="product_report.php">Reportes de inventario</a> </li>

   </ul>
  </li>

  <li  class="nav-item start">
    <a href="Proveedores.php"  class="nav-link">
      <i class="glyphicon glyphicon-tasks"></i>
      <span class="title">Proveedores</span>
    </a>
  </li>

  <li  class="nav-item start">
    <a href="media.php"  class="nav-link">
      <i class="glyphicon glyphicon-picture"></i>
      <span class="title">Media</span>
    </a>
  </li>

  <li  class="nav-item start">
    <a href="sales.php" class="nav-link nav-toggle"  class="nav-link">
      <i class="glyphicon glyphicon-th-list"></i>
       <span class="title">Registro de Ventas</span>
      </a>
  </li>
  <!-- Realizar una Nueva Venta -->
  <li  class="nav-item start">
    <a href="realizar_venta.php" class="nav-link">
      <i class="glyphicon glyphicon-tags"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
      <span class="title">Nueva Venta</span>
    </a>
  </li>

  <li class="nav-item start">
    <a href="#" class="nav-link nav-toggle">
      <i class="glyphicon glyphicon-signal"></i>
       <span class="title">Reporte de ventas</span>
      </a>
      <ul class="sub-menu">
        <li class="nav-item start "><a class="nav-link "href="sales_report.php">Ventas por fecha </a></li>
        <li class="nav-item start "><a class="nav-link "href="monthly_sales.php">Ventas mensuales</a></li>
        <li class="nav-item start "><a class="nav-link "href="daily_sales.php">Ventas diarias</a> </li>
      </ul>
  </li>

  <!--Apertura y cierre de caja-->
  <li  class="nav-item start">
    <a href="caja_apertura.php" class="nav-link">
      <i class="glyphicon glyphicon-folder-open"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
      <span class="title">Apertura de caja</span>
    </a>
  </li>

  <li  class="nav-item start">
    <a href="caja_cierre.php" class="nav-link">
      <i class="glyphicon glyphicon-folder-close"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
      <span class="title">Cierre de Caja</span>
    </a>
  </li>



  <li  class="nav-item start">
    <a href="#" class="nav-link nav-toggle">
      <i class="glyphicon glyphicon-folder-close"></i>
       <span class="title">Reportes de Cierres</span>
      </a>
      <ul class="sub-menu">
        <li class="nav-item start "><a class="nav-link "href="caja_cierre_general.php">Cierres por fecha </a></li>
        <li class="nav-item start "><a class="nav-link "href="caja_cierre_monthly.php">Cierres mensuales</a></li>
        <li class="nav-item start "><a class="nav-link "href="caja_cierre_daily.php">Cierres diarias</a> </li>
      </ul>
  </li>

  <li  class="nav-item start">
    <a href="caja_ingreso_retiro.php" class="nav-link nav-toggle">
      <i class="glyphicon glyphicon-usd"></i>
       <span class="title">Ingresos-Retiro de caja</span>
      </a>
  </li>

  <li  class="nav-item start">
    <a href="prueba_impresora.php" class="nav-link nav-toggle">
      <i class="glyphicon glyphicon-usd"></i>
       <span class="title">Prueba Impresora</span>
      </a>
  </li>

</ul>
<script type="text/javascript" src="assets/jquery-1.10.2.min.js"></script>
