  <?php
  //referencia http://www.menuspararestaurantes.com/como_controlar_el_inventario_en_tu_restaurante/
  // Inventario Inicial + Compras – Inventario final = Inventario Utilizado
  $page_title = 'Actualización de Inventario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
  $sabor_pizzas=join_tipopizza_table();
  $pizzas_espec=join_pizzaespecilal_table();
  $tam_pizzas= join_tampizza_table();

  // $div_personalizada=0;
  // $year  = date('Y');
  // $month = date('m');
  // $day = date('d');
  // $ventasPizzas = dailySales($year,$month,$day,'venta_pizzas');
?>

<?php

  if($_GET['hello']==1){
    $user = current_user();
    $aux = remove_junk(ucwords($user['username']));
    foreach ($products as $product) {     
      $p_id =  remove_junk($product['id']);
      $p_date    = make_date();
      $newQuantity=remove_junk($db->escape($_POST['hola'.$p_id]));

      if($newQuantity!=''){   //solo actualiza si se cambiado el valor
        $query = "UPDATE products SET ";        //Insertar la BD en la memoria de usuario
        $query .=" quantity = '{$newQuantity}', date = '{$p_date}', qtyAproximada = '0' WHERE id =";
        $query .=" '{$p_id}' ;";
  
        if($db->query($query)){
          $p_name  = remove_junk($product['name']);
          $p_prov   = remove_junk($product['proveedor_id']);
          $p_qty   = remove_junk($product['quantity']);
          $p_uni   = remove_junk($product['unidades']);
          $p_buy   = remove_junk($product['buy_price']);
          $p_date    = make_date();
          $gasto    = ($newQuantity-$product['quantity'])*$p_buy;
  
          $query2  = "INSERT INTO products_add_records (";
          $query2 .=" `name`, `last_quantity`, `new_quantity`, `unidades`, `buy_price`, `gasto`,`date`, `username`, `proveedor_id`";
          $query2 .=") VALUES (";
          $query2 .=" '{$p_name}','{$p_qty}','{$newQuantity}', '{$p_uni}', '{$p_buy}','{$gasto}', '{$p_date}', '{$aux}', '{$p_prov}'";
          $query2 .=")";

          if($db->query($query2)){
          }
        } 
      }
    }
    $session->msg('s',"Cantidad Actualizada");
    redirect('product_update.php', false);
  }
  //-----CONTADOR DE PRODUCTOS
  //Contador de Masas
  // $masa_porcion=contador_masas('porcion','venta_pizzas');
  // foreach ($masa_porcion as $porcion){ $v_masa_porcion=remove_junk($porcion['sum(qty)']); if($v_masa_porcion==NULL)$v_masa_porcion=0;}
  // $masa_mediana=contador_masas('mediana','venta_pizzas');
  // foreach ($masa_mediana as $mediana){ $v_masa_mediana=remove_junk($mediana['sum(qty)']); if($v_masa_mediana==NULL)$v_masa_familiar=0;}
  // $masa_familiar=contador_masas('familiar','venta_pizzas');
  // foreach ($masa_familiar as $familiar){ $v_masa_familiar=remove_junk($familiar['sum(qty)']);if($v_masa_familiar==NULL)$v_masa_familiar=0;}
  // $masa_extragrande=contador_masas('extragrande','venta_pizzas');
  // foreach ($masa_extragrande as $extragrande){ $v_masa_extragrande=remove_junk($extragrande['sum(qty)']); if($v_masa_extragrande==NULL)$v_masa_extragrande=0;}
 
  // $masa_totales=(0.5*(float)$v_masa_mediana)+(0.125*(float)$v_masa_porcion)+(float)$v_masa_familiar+(float)$v_masa_extragrande;

  // //SABORES
  // //Tipo Especial
  // //Conteo de Pizzas Especiales
  // foreach ($pizzas_espec as $sab) {
  //   $nombre_sab=remove_junk($sab['name']); 
  //   if($nombre_sab=="personalizada"){
  //     foreach ($ventasPizzas as $vP){
  //       if($vP['sabor_pizza']=="personalizada"){               //Escogo solo pizzas personalizada
  //         $arrayExtras = explode(",", $vP['extras']);  // se obtiene un vector de extras
  //         foreach($sabor_pizzas as $sp){
  //           $nombre_sp=remove_junk($sp['name']); 
  //           ${'v_masa_perso_'.$nombre_sp}=0;
  //           foreach($arrayExtras as $aE){
  //             if($aE==ucwords($nombre_sp)){
  //               $div_personalizada++;
  //               if($vP['tam_pizza']!="porcion"){
  //                 if($vP['tam_pizza']=="mediana")
  //                   ${'v_masa_perso_'.$nombre_sp}=0.5;
  //                 else
  //                   ${'v_masa_perso_'.$nombre_sp}=1;
  //               }
  //             }  
  //           }
  //         }
  //       }
  //     }
  //   }
  // }
  // //Diferentes a personalizadas
  // foreach ($pizzas_espec as $sab) {
  //   $nombre_sab=remove_junk($sab['name']); 
  //   if($nombre_sab!="personalizada"){
  //     foreach ($tam_pizzas as $tam) {
  //       $nombre_tam=remove_junk($tam['name']);
  //       ${'masa_'.$nombre_tam.'_sabor'}=contador_masas_sabor(remove_junk($tam['name']),'venta_pizzas',remove_junk($sab['name']));
  //       foreach (${'masa_'.$nombre_tam.'_sabor'} as $tms){ ${'v_masa_'.$nombre_tam.'_sabor'}=remove_junk($tms['sum(qty)']); if( ${'v_masa_'.$nombre_tam.'_sabor'}==NULL) ${'v_masa_'.$nombre_tam.'_sabor'}=0;}
  //     }
  //     ${'v_masa_'.$nombre_sab}=(0.5*(float)$v_masa_mediana_sabor)+(0.125*(float)$v_masa_porcion_sabor)+(float)$v_masa_familiar_sabor+(float)$v_masa_extragrande_sabor;
  //   }
  // }

  // //Tipo Normal
  // foreach ($sabor_pizzas as $sab) {
  //   $nombre_sab=remove_junk($sab['name']); 
  //   foreach ($tam_pizzas as $tam) {
  //     $nombre_tam=remove_junk($tam['name']);
  //     ${'masa_'.$nombre_tam.'_sabor'}=contador_masas_sabor(remove_junk($tam['name']),'venta_pizzas',remove_junk($sab['name']));
  //     foreach (${'masa_'.$nombre_tam.'_sabor'} as $tms){ ${'v_masa_'.$nombre_tam.'_sabor'}=remove_junk($tms['sum(qty)']); if( ${'v_masa_'.$nombre_tam.'_sabor'}==NULL) ${'v_masa_'.$nombre_tam.'_sabor'}=0;}
  //   }
  //   ${'v_masa_'.$nombre_sab}=(0.5*(float)$v_masa_mediana_sabor)+(0.125*(float)$v_masa_porcion_sabor)+(float)$v_masa_familiar_sabor+(float)$v_masa_extragrande_sabor+(float)${'v_masa_personalizada_'.$nombre_sab};

  //   if($div_personalizada!=0){        //Evitar division para cero si el numero de div de personalizada es 0
  //     ${'v_masa_'.$nombre_sab}+=(1/(float)$div_personalizada)*(${'v_masa_perso_'.$nombre_sab});   //Sumar la parte de pizza personalizada
  //   }
  // }
?>

<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Actualización de Inventario</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Imagen</th>
                <th> Descripción </th>
                <th class="text-center" style="width: 10%;"> Categoría </th>
                <th class="text-center" style="width: 10%;"> Unidades </th>
                <th class="text-center" style="width: 10%;"> Proveedor </th>
                <th class="text-center" style="width: 10%;"> Stock Inicial</th>
                <th class="text-center" style="width: 10%;"> Stock Final </th>
                <th class="text-center" style="width: 10%;"> Stock Utilizado Aprox </th>
                <th class="text-center" style="width: 10%;"> Fecha </th>
                <th class="text-center" style="width: 10%;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
            <form method="post" action="product_update.php?hello=1" class="clearfix" id="get_form">
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td>
                  <?php if($product['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="User Image"  width="100" height="100">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $product['image']; ?>" alt="User Image"  width="100" height="100">
                <?php endif; ?>
                </td>
                <?php if($product['quantity'] <= 2): ?>
                <td style="background-color:#ff4d5f"> <?php echo remove_junk($product['name']); ?></td>
                <?php else: ?>
                <td> <?php echo remove_junk($product['name']); ?></td>
                <?php endif; ?>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['unidades']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['pro']); ?></td>
                <td class="text-center" id="i<?php echo remove_junk($product['id']); ?>"> <?php echo remove_junk($product['quantity']); ?></td>
                <td class="text-center"><input name="hola<?php echo remove_junk($product['id']); ?>" id="f<?php echo remove_junk($product['id']); ?>" min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" type="number" onchange="myFunction(<?php echo remove_junk($product['id']); ?>)" class="form-control"></td>
                <td class="text-center" id="aprox_<?php echo remove_junk($product['name']); ?>"></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a onclick="funct()" class="btn btn-success btn-xs"  title="Actualizar" data-toggle="tooltip">
                      <span  class="glyphicon glyphicon-ok"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
             </form>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
  var DOMAIN = "http://localhost/Pizzeria/";
  var masas_aprox = document.getElementById('aprox_Masas');

  <?php foreach ($products as $prod) :?>
    $.ajax({url: DOMAIN+"buscar_producto_aprox.php?p_nombre="+'<?php echo remove_junk($prod['name']); ?>', success: function(result){
      document.getElementById('aprox_'+'<?php echo remove_junk($prod['name']); ?>').innerHTML = result; // masas;
    }});
  <?php endforeach; ?>
  
  
  function isInputNumber(evt){
      var ch = String.fromCharCode(evt.which);
      if(!(/[0-9]/.test(ch))){
          evt.preventDefault();
      }     
  }

  function myFunction(id) {
    var inicial = document.getElementById("i"+id);
    var final = document.getElementById("f"+id).value;
    var utilizado = document.getElementById("aprox_"+id);
    var resta= inicial.innerHTML-final;
    if(resta>=0) utilizado.innerHTML = ""+resta;
    else document.getElementById("f"+id).value=""+Number(inicial.innerHTML);
  }

  function funct(){
    document.getElementById("get_form").submit();
  }
</script>

<?php include_once('layouts/footer.php'); ?>
