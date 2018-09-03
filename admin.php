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

 $recent_products = find_bajostock_product();

 $recent_sales    = find_recent_sale_added('5');
 $array_tama=  array('mediana', 'familiar', 'extragrande'); 
 $prueba="a";
 $prueba="c";
 $item_compr= array();
 $lista_items=array();

 if(isset($_GET['num'])) {
  $prueba="b";
  $num_items=$_GET['num'];
  for($k=0;$k<$num_items;$k++){
    array_push($item_compr,$_GET['c_canti'.$k],$_GET['c_descrip'.$k],$_GET['c_precio'.$k]);
    array_push($lista_items,$item_compr);
    $item_compr= array();
  }
}
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php
     echo display_msg($msg); 
     echo $lista_items[0][0];
     echo $lista_items[0][1];
     echo $lista_items[0][2];
    //  echo $lista_items[1][0];
    //  echo $lista_items[1][1];
    //  echo $lista_items[1][2];?>
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
        <span class="info-box-number"><?php  echo $c_user['total']; ?></span>
      </div>
    </div>
  </div>
  <!--Ventas-->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-usd"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Ventas diarias</span>
        <span class="info-box-number"><small>$</small><?php  echo $c_sale['total']; ?></span>
      </div>
    </div>
  </div>
  <!--Procductos-->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-shopping-cart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Productos</span>
        <span class="info-box-number"><?php  echo $c_product['total']; ?></span>
      </div>
    </div>
  </div>
  <!--Categorias-->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Contador de ordenes</span>
        <span class="info-box-number"><?php  echo $c_categorie['total']; ?></span>
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
  <div class="col-md-5">
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
  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Productos con bajo stock</span>
        </strong>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <?php foreach ($recent_products as  $recent_product): ?>
            <a class="list-group-item clearfix" href="product.php">
              <h4 class="list-group-item-heading">
                <?php if($recent_product['media_id'] === '0'): ?>
                  <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="User Image"  width="100" height="100">
                <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="User Image"  width="100" height="100" />
                <?php endif;?>
                <?php echo remove_junk(first_character($recent_product['name']));?>
                  <span class="label label-warning pull-right"><?php echo (int)$recent_product['quantity']; ?></span>
              </h4>
              <span class="list-group-item-text pull-right"><?php echo remove_junk(first_character($recent_product['categorie'])); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once('layouts/footer.php'); ?>
