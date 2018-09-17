  <?php
    $page_title = 'Admin página de inicio';
    require_once('includes/load.php');
    // Checkin What level user has permission to view this page
    page_require_level(1);
  ?>
  <?php
    $d = make_date2();
    $cc = find_conta('contador');
  
    if($d!=$cc[0]['date']){   //solo actualiza si se cambiado el valor
      $query = "UPDATE contador SET ";        //Insertar la BD en la memoria de usuario
      $query .=" conta = 0, date = '{$d}' WHERE id = 1;";
      if($db->query($query)){
      }
    }


    $contador=$cc[0]['conta'];
    
    $year  = date('Y');
    $month = date('m');
    $day = date('d');

    $ventasPizzas = dailySales($year,$month,$day,'venta_pizzas');
    $ventasBebidas = dailySales($year,$month,$day,'venta_bebidas');
    $ventasIngredientes = dailySales($year,$month,$day,'venta_ingredientes');

    $total1;
    $total2;
    $total3;
    $val;

    foreach ($ventasPizzas as $vP){
      $p_llevar=0;
      if($vP['llevar_pizza']!='servirse' && $vP['tam_pizza']!='porcion'){
        if($vP['tam_pizza']=='familiar'||$vP['tam_pizza']=='extragrande') $p_llevar=1.25;
        else $p_llevar=1.00;
      }
      $val_e=0;
      $p_extras = explode(",", $vP['extras']);
      if(!$p_extras==''){
        $cos=costoExtra($vP['tam_pizza']);
        $val_e=$cos[0]['price']*(count($p_extras)-1);  //resta 1 porque hay una comma luego de extras
        
      }
      $total1=$total1+(float)remove_junk($vP['price'])+$p_llevar+$val_e;
    }

    foreach ($ventasBebidas as $vB){
      $total2=$total2+(float)remove_junk($vB['price']);
    }

    foreach ($ventasIngredientes as $vI){
      $total3=$total3+(float)remove_junk($vI['price']);
    }

    $ventasDiarias= $total1+$total2+$total3;


    $c_categorie     = count_by_id('categories');
    $c_product       = count_by_id('products');
    $c_sale          = count_by_id('sales');
    $c_user          = count_by_id('users');
    $products_sold_mediana   = find_higest_saleing_pizzas('3','mediana');
    $products_sold_familiar   = find_higest_saleing_pizzas('3','familiar');
    $products_sold_extragrande   = find_higest_saleing_pizzas('3','extragrande');

    $recent_products = find_bajostock_product();

    $recent_sales    = find_recent_sale_added('5');
    $array_tama=  array('mediana', 'familiar', 'extragrande'); 
    $prueba="a";
    $prueba="c";
    $item_compr= array();
    $lista_items=array();

   include_once('layouts/header.php'); 
  ?>

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
          <span class="info-box-number"><small >$</small><?php  echo number_format((float)$ventasDiarias, 2, '.', ''); ?></span>
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
    <!--Contador-->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-list"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Contador de ordenes</span>
          <span class="info-box-number"><?php  echo $contador; ?></span>
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
            <span>Pizzas extragrande más vendidas</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Sabor</th>
                <th class="text-center">Total vendido</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($products_sold_extragrande as  $product_sold): ?>
              <tr>
                <td class="text-center"><?php echo (int)$product_sold['totalQty']; ?></td>
                <td class="text-center"><?php echo remove_junk(first_character($product_sold['nam'])); ?></td>
                <td class="text-center">$ <?php echo number_format((float)$product_sold['totalprice'], 2, '.', ''); ?></td>   
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Pizzas familiar más vendidas</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Sabor</th>
                <th class="text-center">Total vendido</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($products_sold_familiar as  $product_sold): ?>
              <tr>
                <td class="text-center"><?php echo (int)$product_sold['totalQty']; ?></td>
                <td class="text-center"><?php echo remove_junk(first_character($product_sold['nam'])); ?></td>
                <td class="text-center">$ <?php echo number_format((float)$product_sold['totalprice'], 2, '.', ''); ?></td>   
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Pizzas medianas más vendidas</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Sabor</th>
                <th class="text-center">Total vendido</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($products_sold_mediana as  $product_sold): ?>
              <tr>
                <td class="text-center"><?php echo (int)$product_sold['totalQty']; ?></td>
                <td class="text-center"><?php echo remove_junk(first_character($product_sold['nam'])); ?></td>
                <td class="text-center">$ <?php echo number_format((float)$product_sold['totalprice'], 2, '.', ''); ?></td>   
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
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Valor de venta</th>
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
      <div class="col-md-6">
        <div class="panel">
          <div>     
            <label>Pizzas: </label>
          </div>
          <div>     
            <label>Bebidas: </label>
          </div>
          <div>     
            <label>Ingredientes</label>
          </div>
        </div>
      </div>
    </div>

    <!--Productos recientes-->
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Productos con stock bajo</span>
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

  <script>

    //alert('<?php echo $val?>');
    var user = "<?php echo $user['username']; ?>";
    var date = "<?php echo make_date(); ?>";
    var d = new Date();
    var date1=d.getFullYear().toString()+"_"+d.getMonth().toString()+"_"+d.getDate().toString()+"_"+d.getHours().toString()+"_"+d.getMinutes().toString();
    
    var efectivo=1; //0 con tarjeat, 1 con efectivo
    var servir=1; //0 llevar, 1 servirse
    var numorden=25;
    var subtotal=130;
    var  num_item=Number(<?php echo $num_items;?>);
    

    var orden = [
      <?php foreach ($lista_items as $list):?>
        ['<?php echo $list[0];?>','<?php echo $list[1];?>','<?php echo $list[2];?>'],
      <?php endforeach;?>
    ];

    //var win = window.open("realizar_venta_pdf.php?"+"servir="+servir+"&"+"numorden="+numorden+"&"+"efectivo="+efectivo+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1,"_blank"); // will open new tab on document ready
    //var win = window.open("realizar_pedido_pdf.php?"+"servir="+servir+"&"+"efectivo="+efectivo+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1,"_blank"); // will open new tab on document ready

  </script>

  <?php include_once('layouts/footer.php'); ?>
