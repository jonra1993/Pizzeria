<?php
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $categorias = join_categories_table();
   $tam_pizzas= join_tampizza_table();
   $tipo_pizzas=join_tipopizza_table();
   $extra_pizzas=join_extrapizza_table();
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5');
 $cars = array("Volvo", "BMW", "Toyota");
 $arrlength = count($cars);
?>
<?php include_once('layouts/header.php'); ?>
<?php
 if(isset($_GET['pizz_tam'])){
    $p_tam  = $_GET['pizz_tam'];
    $p_tipo  = $_GET['pizz_tipo'];
    $p_extra  = $_GET['pizz_extra'];
    $p_form   = $_GET['pizz_forma'];
    
   
  }
?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <!--.......Cuadrados de visualizacion......-->
  <div class="row">
  <!--Seleccion de Productos-->
  <div class="col-md-8">
    <div id="cont_categ" class="row">
    <!--Categorias-->
      <?php foreach ($categorias as $cat):?>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <?php if($cat['media_id'] === '0'): ?>
              <a href="#" onclick="selec_categ('<?php echo remove_junk(ucfirst($cat['name'])); ?>');" title="Seleccionar Categoria"> 
               <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
              </a>
            <?php else: ?>
          
                <a href="#"  onclick="selec_categ('<?php echo remove_junk(ucfirst($cat['name'])); ?>');" title="Seleccionar Categoria"> 
                  <img class="card-img-top img-responsive" src="uploads/products/<?php echo $cat['image']; ?>" alt="">
                </a>
                
            <?php endif; ?>
            <h4 class="card-title center"> <?php echo remove_junk(ucfirst($cat['name'])); ?> </h4>    <!--Lee nombres de categrias-->
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Contenedor de productos -->
    <div class="row">
      <div id="selec_productos" class="container-fluid text-center" style="background-color: #A3ABA7;">
        <!-- regresar -->
        <div id="funcion_regresar" class="row" style="display: none;">
          <button type="button" class="btn btn-success" style="width: auto" onclick="regresar_carac()">
            <i class="glyphicon glyphicon-arrow-left"></i>
          Regresar
          </button>
        </div>
        <!-- Presentacion de opciones -->
        <div id="selc_pizzas_tam" class="row" style="display: none;">
          <?php foreach ($tam_pizzas as $tam):?>
            <div class="col-sm-3">
              <div class="card" style="width: 18rem;">
                <?php if($tam['media_id'] === '0'): ?>
                  <a href="#" onclick="tam_pizzas('<?php echo remove_junk(ucfirst($tam['name'])); ?>');" title="Seleccionar Producto"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="tam_pizzas('<?php echo remove_junk(ucfirst($tam['name'])); ?>');" title="Seleccionar <?php echo remove_junk(ucfirst($tam['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $tam['image']; ?>" alt="">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($tam['name'])); ?> </h4>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Pizza especial o normal -->
        <div id="selc_pizzas_nor_esp" class="row justify-content-around"  style="display: none; ">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="pizzas_espec();" title="Seleccionar Pizza Especial"> 
              <img class="card-img-top img-responsive" src="uploads/products/pizza_especial.png" alt="">
              </a>
              <h4 class="card-title center"> Pizza Especial </h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="pizzas_normal();" title="Seleccionar Pizza Normal"> 
              <img class="card-img-top img-responsive" src="uploads/products/pizza_normal.png" alt="">
              </a>
              <h4 class="card-title center"> Pizza Normal </h4>
            </div>
          </div>  
        </div>
        <!-- Tipo de pizza -->
        <div id="selc_pizzas_tipo" class="row justify-content-around" style="display: none;">
          <?php foreach ($tipo_pizzas as $tip):?>
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <?php if($tip['media_id'] === '0'): ?>
                  <a href="#" onclick="tip_pizza('<?php echo remove_junk(ucfirst($tip['name'])); ?>');" title="Seleccionar Tipo"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="tip_pizza('<?php echo remove_junk(ucfirst($tip['name'])); ?>');" title="Seleccionar <?php echo remove_junk(ucfirst($tip['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $tip['image']; ?>" alt=""  style="height: 100px; display: block; margin-left: auto;margin-right: auto;">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($tip['name'])); ?> </h4>
                <p class="card-body"> Ingedientes: <?php echo remove_junk(ucfirst($tip['tipo_descrip'])); ?> </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Ingredientes Extras -->
        <div id="selc_extra" class="row justify-content-around" style="display: none;">
          <?php foreach ($extra_pizzas as $extra):?>
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <?php if($tip['media_id'] === '0'): ?>
                  <a href="#" onclick="ingre_extra('<?php echo remove_junk(ucfirst($extra['name'])); ?>');" title="Seleccionar Extra"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="ingre_extra('<?php echo remove_junk(ucfirst($extra['name'])); ?>');" title="Seleccionar <?php echo remove_junk(ucfirst($extra['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $extra['image']; ?>" alt=""   style="height: 100px; display: block; margin-left: auto;margin-right: auto;">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($extra['name'])); ?> </h4>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Servirse o llevar-->
        <div id="selc_pizzas_forma" class="row justify-content-around"  style="display: none; ">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="forma_servir('Servirse');" title="Seleccionar Pizza Especial"> 
              <img class="card-img-top img-responsive" src="uploads/products/forma_servirse.png" alt="">
              </a>
              <h4 class="card-title center"> Para Servirse </h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="forma_servir('Llevar')" title="Seleccionar Llevar"> 
              <img class="card-img-top img-responsive" src="uploads/products/forma_llevar.png" alt="">
              </a>
              <h4 class="card-title center"> Para Llevar </h4>
            </div>
          </div>  
        </div>

      </div>
    </div>
  </div>
  <!--Factura-->
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th-list"></span>
          <span>Comprobante de venta</span>
        </strong>
      </div>
      <div class="panel-body">
        <table id="tabla_factura" class="table table-striped table-hover table-condensed">
          <thead>
            <tr>
              <th style="width:20%">Cantidad</th>
              <th style="width:40%">Descrip</th>
              <th style="width:20%">Precio</th>
              <th style="width:10%">Accion</th>
            <tr>
          </thead>
          <tbody id="tb_factura" >
            <tr>
              <td class="text-center"><input type='number' value='1' min='1' style="width: 60%;"></input></td>
              <td class="text-justify"><?php echo "Pizza "," $p_tam ","$p_tipo ","Extras:"," $p_extra ",". Para ","$p_form"?></td>
              <td class="text-center">$Precio</td>
              <td class="text-center">
                <span href=""  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                  <span class="glyphicon glyphicon-trash"></span>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="libs/js/realizar_venta.js"></script>

<?php include_once('layouts/footer.php'); ?>
