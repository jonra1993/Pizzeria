<?php
  $page_title = 'PIZZAS PARA ESCUELAS';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_photo = find_all('media');
  $all_proveedores = find_all('proveedores');
?>
<?php
 $uni=array("Unidad", "Kg", "Litro", "Latas", "gr");
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','product-quantity','desc-unidades','buying-price','nombre-proveedor' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_prov   = remove_junk($db->escape($_POST['nombre-proveedor']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_uni   = remove_junk($db->escape($_POST['desc-unidades']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));

     if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }
     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,quantity,unidades,buy_price,categorie_id,media_id,date,proveedor_id";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}','{$p_uni}', '{$p_buy}', '{$p_cat}', '{$media_id}', '{$date}', '{$p_prov}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
      $user = current_user();
      $aux = remove_junk(ucwords($user['username']));
      $gasto    = $p_qty*$p_buy;
      $query2  = "INSERT INTO products_add_records (";
      $query2 .=" `name`, `last_quantity`, `new_quantity`, `unidades`, `buy_price`, `gasto`,`date`, `username`, `proveedor_id`";
      $query2 .=") VALUES (";
      $query2 .=" '{$p_name}','0','{$p_qty}', '{$p_uni}', '{$p_buy}','{$gasto}', '{$p_date}', '{$aux}', '{$p_prov}'";
      $query2 .=")";
      if($db->query($query2)){
        $session->msg('s',"Producto agregado exitosamente. ");
       redirect('product.php', false);
      }
       
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }
 else if(isset($_POST['regresar'])) redirect('product.php',false);

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Pizzas para escuelas</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
              <!-- Masas utiliadas-->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-record"></i>
                      </span>
                      <input type="number" step="1"  min="0" pattern="^\d+(?:\.\d{1,2})?$" autocomplete="off" class="form-control" name="masas-usadas" placeholder="# Masas Usadas">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Cantidad y precio -->
              <div class="form-group">
               <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                    </span>
                    <input type="number" class="form-control" name="num-porciones" autocomplete="off" min="0" step="1" pattern="^\d+(?:\.\d{1,2})?$" placeholder="# Porciones obtenidas">
                  </div>
                 </div>
                 <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-paperclip"></i>
                      </span>
                      <input type="number" step="0.01"  min="0" pattern="^\d+(?:\.\d{1,2})?$" autocomplete="off" class="form-control" name="precio-porcion" placeholder="Precio por porcion">
                    </div>
                  </div>
                </div>
              </div>
              <!-- TOTAL-->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="number" step="0.01"  min="0" pattern="^\d+(?:\.\d{1,2})?$" autocomplete="off" class="form-control" name="precio-total" placeholder="Total venta escuelas">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Verrificacion de uso de cajas -->
              <div class="custom-control custom-checkbox my-1 mr-sm-2">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">  SE USO CAJAS PARA ESTA ENTREGA</label>
              </div>


              <!-- Opcines de cajas -->
              <div id="cajas-usadas" class="form-group" style="margin-top: 3%; display: none;">
                <div class="row">
                  <!-- cajas grandes -->
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-th-large"></i>
                      </span>
                      <input type="number" class="form-control" name="num-porciones" autocomplete="off" min="0" step="1" pattern="^\d+(?:\.\d{1,2})?$" placeholder="# Cajas Grandes">
                    </div>
                  </div>
                  <!-- cajas medianas -->
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-th"></i>
                      </span>
                      <input type="number" class="form-control" name="num-porciones" autocomplete="off" min="0" step="1" pattern="^\d+(?:\.\d{1,2})?$" placeholder="# Cajas Medianas">
                    </div>
                  </div>
                </div>
              </div>

              <button type="submit" name="add_escuelas" class="btn btn-success" style="margin-top: 3%;">Cargar valores a inventario</button>
              <button type="submit" name="regresar" class="btn btn-danger" style="margin-top: 3%;">Cancelar</button>

          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
