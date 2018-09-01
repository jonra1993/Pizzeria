<?php
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<!-- Info boxes -->
<div class="row">
  <!--Usuarios-->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Usuarios</span>
        <span class="info-box-number"><?php  echo $c_user['total']; ?><small>%</small></span>
      </div>
    </div>
  </div>
  <!--Categorias-->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Categorías</span>
        <span class="info-box-number"><?php  echo $c_categorie['total']; ?><small>%</small></span>
      </div>
    </div>
  </div>
  <!--Procductos-->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-shopping-cart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Productos</span>
        <span class="info-box-number"><?php  echo $c_product['total']; ?><small>%</small></span>
      </div>
    </div>
  </div>
  <!--Ventas-->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Ventas</span>
        <span class="info-box-number"><?php  echo $c_sale['total']; ?><small>%</small></span>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->

<!--.......Detalle de productos......-->
<div class="row">
  <!--Productos mas vedidos-->
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Productos más vendidos</span>
        </strong>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered table-condensed">
          <thead>
            <tr>
              <th class="text-center">Título</th>
              <th class="text-center">Total vendido</th>
              <th class="text-center">Cantidad total</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($products_sold as  $product_sold): ?>
            <tr>
              <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
              <td><?php echo (int)$product_sold['totalSold']; ?></td>
              <td><?php echo (int)$product_sold['totalQty']; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!--Ultimas Ventas-->
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Últimas ventas</span>
        </strong>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered table-condensed">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Producto</th>
              <th>Fecha</th>
              <th>Venta total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($recent_sales as  $recent_sale): ?>
            <tr>
              <td class="text-center"><?php echo count_id();?></td>
              <td>
              <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">    <!--Redireccionamiento a editar producto en el item especifico-->
                <?php echo remove_junk(first_character($recent_sale['name'])); ?>
              </a>
              </td>
              <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
              <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!--Productos recientes-->
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Productos recientemente añadidos</span>
        </strong>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($recent_products as  $recent_product): ?>
            <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo(int)$recent_product['id'];?>">
              <h4 class="list-group-item-heading">
                <?php if($recent_product['media_id'] === '0'): ?>
                  <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="User Image"  width="100" height="100">
                <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="User Image"  width="100" height="100" />
                <?php endif;?>
                <?php echo remove_junk(first_character($recent_product['name']));?>
                  <span class="label label-warning pull-right">$<?php echo (int)$recent_product['sale_price']; ?></span>
              </h4>
              <span class="list-group-item-text pull-right"><?php echo remove_junk(first_character($recent_product['categorie'])); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

</div>


<script>
    var user = "<?php echo $user['username']; ?>";
    var date = "<?php echo make_date(); ?>";
    var d = new Date();
    var date1=d.getFullYear().toString()+"_"+d.getMonth().toString()+"_"+d.getDate().toString()+"_"+d.getHours().toString()+"_"+d.getMinutes().toString();
    
    var efectivo=1; //0 con tarjeat, 1 con efectivo
    var servir=1; //0 llevar, 1 servirse

    var subtotal=130;

    var orden = [
      [1,"Pizza porción",1,1],
      [1,"Pizza mediana",15,15],
      [2,"Pizza pequeña",1,1],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza familiar piña",17,17],
      [1,"Pizza mangiare",17,17],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza mangiare",17,17],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza porción",1,1],
      [1,"Pizza mediana",15,15],
      [2,"Pizza pequeña",1,1],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza familiar piña",17,17],
      [1,"Pizza mangiare",17,17],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza mangiare",17,17],
      [1,"Pizza mediana piña",17,17],
      [1,"Pizza mediana piña",17,17]
      ];

  var win = window.open("realizar_venta_pdf.php?"+"servir="+servir+"&"+"efectivo="+efectivo+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1,"_blank"); // will open new tab on document ready
  //var win = window.open("realizar_pedido_pdf.php?"+"servir="+servir+"&"+"efectivo="+efectivo+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1,"_blank"); // will open new tab on document ready

</script>

<?php include_once('layouts/footer.php'); ?>
