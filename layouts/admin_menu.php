<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
<li class="sidebar-toggler-wrapper hide">
  <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
  <div class="sidebar-toggler"> </div>
  <!-- END SIDEBAR TOGGLER BUTTON -->
</li>

<li>
  <a href="admin.php">
    <i class="glyphicon glyphicon-home"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
    <span class="title">Panel de control</span>
  </a>
</li>
<li  class="treeview">
  <a href="#">
    <i class="glyphicon glyphicon-user"></i>
    <span class="title">Accesos</span>
  </a>
  <ul class="treeview-menu">
    <li><a href="group.php"><i class="fa fa-circle-o"></i>Administrar grupos</a> </li>
    <li><a href="users.php"><i class="fa fa-circle-o"></i>Administrar usuarios</a> </li>
  </ul>
</li>
<!--li>
  <a href="categorie.php" >
    <i class="glyphicon glyphicon-indent-left"></i>
    <span class="title">Categorías</span>
  </a>
</li-->
<!--Lista de productos a vender-->
<li  class="treeview">
  <a href="#"  >
    <i class="glyphicon glyphicon-shopping-cart"></i>
    <span class="title">Catalogo de Productos</span>
  </a>
  <ul class="treeview-menu">
    <li><a href="catalogo_pizzas.php"><i class="fa fa-circle-o"></i>Pizzas</a> </li>
    <li><a href="catalogo_bebidas.php"><i class="fa fa-circle-o"></i>Bebidas</a> </li>
    <li><a href="catalogo_extras.php"><i class="fa fa-circle-o"></i>Extras</a> </li>
  </ul>
</li>
<!--Iventario-->
<li  class="treeview">
  <a href="#"  >
    <i class=" glyphicon glyphicon-check"></i>
    <span class="title">Inventario</span>
  </a>
  <ul class="treeview-menu">
    <li><a href="product.php"><i class="fa fa-circle-o"></i>Manejo de inventario</a> </li>
    <li ><a href="product_update.php"><i class="fa fa-circle-o"></i>Actualización de inventario</a> </li>
    <li ><a href="product_report.php"><i class="fa fa-circle-o"></i>Reportes de inventario</a> </li>

  </ul>
</li>

<li>
  <a href="media.php"  >
    <i class="glyphicon glyphicon-picture"></i>
    <span class="title">Media</span>
  </a>
</li>

<li>
  <a href="sales.php"   >
    <i class="glyphicon glyphicon-th-list"></i>
      <span class="title">Registro de Ventas</span>
    </a>
</li>
<!-- Realizar una Nueva Venta -->
<li>
  <a href="realizar_venta.php" >
    <i class="glyphicon glyphicon-tags"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
    <span class="title">Nueva Venta</span>
  </a>
</li>

<li class="treeview">
  <a href="#" >
    <i class="glyphicon glyphicon-signal"></i>
      <span class="title">Reporte de ventas</span>
    </a>
    <ul class="treeview-menu">
      <li ><a href="sales_report.php"><i class="fa fa-circle-o"></i>Ventas por fecha </a></li>
      <li ><a href="monthly_sales.php"><i class="fa fa-circle-o"></i>Ventas mensuales</a></li>
      <li ><a href="daily_sales.php"><i class="fa fa-circle-o"></i>Ventas diarias</a> </li>
    </ul>
</li>

<!--Apertura y cierre de caja-->
<li>
  <a href="caja_apertura.php" >
    <i class="glyphicon glyphicon-folder-open"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
    <span class="title">Apertura de caja</span>
  </a>
</li>

<li>
  <a href="caja_cierre.php" >
    <i class="glyphicon glyphicon-folder-close"></i>      <!--Iconos de boostrap ver: https://getbootstrap.com/docs/3.3/components/-->
    <span class="title">Cierre de Caja</span>
  </a>
</li>



<li  class="treeview">
  <a href="#" >
    <i class="glyphicon glyphicon-folder-close"></i>
      <span class="title">Reportes de Cierres</span>
    </a>
    <ul class="treeview-menu">
      <li ><a href="caja_cierre_general.php"><i class="fa fa-circle-o"></i>Cierres por fecha </a></li>
      <li ><a href="caja_cierre_monthly.php"><i class="fa fa-circle-o"></i>Cierres mensuales</a></li>
      <li ><a href="caja_cierre_daily.php"><i class="fa fa-circle-o"></i>Cierres diarias</a> </li>
    </ul>
</li>

<li>
  <a href="caja_ingreso_retiro.php" >
    <i class="glyphicon glyphicon-usd"></i>
      <span class="title">Ingresos-Retiro de caja</span>
    </a>
</li>

<li>
  <a href="#" >
    <i class="glyphicon glyphicon-usd"></i>
      <span class="title">Ingresos-Egresos</span>
    </a>
</li>


