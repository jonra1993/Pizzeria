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
  <!--.......Cuadrados de visualizacion......-->
  <div class="row">
  <!--Tamaño de Pizzas-->
  <div class="col-md-8">
    <div class="row">
    <!--Usuarios-->
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="uploads/imagenes/pizza.jpg" alt="Card image cap">
          <!-- <div class="card-img-top" "bg-green">
            <i class="glyphicon glyphicon-user"></i>
          </div> -->
          <div class="card-body">
            <h2 class="card-title"> <?php  echo $c_user['total']; ?> </h2>    <!--Lee # de usuarios-->
            <p class="text-muted">Usuarios</p>
          </div>
        </div>
      </div>
      <!--Categorias-->
      <div class="col-md-3">
        <div class="panel panel-box clearfix">
          <div class="panel-icon pull-left bg-red">
            <i class="glyphicon glyphicon-list"></i>
          </div>
          <div class="panel-value pull-right">
            <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>   <!--Lee # de Categorias-->
            <p class="text-muted">Categorías</p>
          </div>
        </div>
      </div>
      <!--Procductos-->
      <div class="col-md-3">
        <div class="panel panel-box clearfix">
          <div class="panel-icon pull-left bg-blue">
            <i class="glyphicon glyphicon-shopping-cart"></i>
          </div>
          <div class="panel-value pull-right">
            <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
            <p class="text-muted">Productos</p>
          </div>
        </div>
      </div>
      <!--Ventas-->
      <div class="col-md-3">
        <div class="panel panel-box clearfix">
          <div class="panel-icon pull-left bg-yellow">
            <i class="glyphicon glyphicon-usd"></i>
          </div>
          <div class="panel-value pull-right">
            <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
            <p class="text-muted">Ventas</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <nav class="navbar navbar-light text-center" style="background-color: #A3ABA7;">
        <form class="form-inline">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-success active btn-lg">
              <input type="radio" name="options" id="option1" autocomplete="off" checked> Tamaño Pizza
            </label>
            <label class="btn btn-success btn-lg">
              <input type="radio" name="options" id="option2" autocomplete="off"> Tipo
            </label>
            <label class="btn btn-success btn-lg">
              <input type="radio" name="options" id="option3" autocomplete="off"> Ingredietes
            </label>
          </div>
        </form>
      </nav>
    </div>
  </div>
  <!--Productos recientes-->
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th-list"></span>
          <span>Comprobante de venta</span>
        </strong>
      </div>
      <div class="panel-body">

        <div class="list-group">
      <?php foreach ($recent_products as  $recent_product): ?>
            <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>">
                <h4 class="list-group-item-heading">
                 <?php if($recent_product['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                <?php endif;?>
                <?php echo remove_junk(first_character($recent_product['name']));?>
                  <span class="label label-warning pull-right">
                 $<?php echo (int)$recent_product['sale_price']; ?>
                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
              </span>
          </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
