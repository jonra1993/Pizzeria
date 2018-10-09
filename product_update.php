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

  $div_personalizada=0;
  $year  = date('Y');
  $month = date('m');
  $day = date('d');
  $ventasPizzas = dailySales($year,$month,$day,'venta_pizzas');
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
        $query .=" quantity = '{$newQuantity}', date = '{$p_date}' WHERE id =";
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
  $masa_porcion=contador_masas('porcion','venta_pizzas');
  foreach ($masa_porcion as $porcion){ $v_masa_porcion=remove_junk($porcion['sum(qty)']); if($v_masa_porcion==NULL)$v_masa_porcion=0;}
  $masa_mediana=contador_masas('mediana','venta_pizzas');
  foreach ($masa_mediana as $mediana){ $v_masa_mediana=remove_junk($mediana['sum(qty)']); if($v_masa_mediana==NULL)$v_masa_familiar=0;}
  $masa_familiar=contador_masas('familiar','venta_pizzas');
  foreach ($masa_familiar as $familiar){ $v_masa_familiar=remove_junk($familiar['sum(qty)']);if($v_masa_familiar==NULL)$v_masa_familiar=0;}
  $masa_extragrande=contador_masas('extragrande','venta_pizzas');
  foreach ($masa_extragrande as $extragrande){ $v_masa_extragrande=remove_junk($extragrande['sum(qty)']); if($v_masa_extragrande==NULL)$v_masa_extragrande=0;}
 
  $masa_totales=(0.5*(float)$v_masa_mediana)+(0.125*(float)$v_masa_porcion)+(float)$v_masa_familiar+(float)$v_masa_extragrande;

  //SABORES
  //Tipo Especial
  //Conteo de Pizzas Especiales
  foreach ($pizzas_espec as $sab) {
    $nombre_sab=remove_junk($sab['name']); 
    if($nombre_sab=="personalizada"){
      foreach ($ventasPizzas as $vP){
        if($vP['sabor_pizza']=="personalizada"){               //Escogo solo pizzas personalizada
          $arrayExtras = explode(",", $vP['extras']);  // se obtiene un vector de extras
          foreach($sabor_pizzas as $sp){
            $nombre_sp=remove_junk($sp['name']); 
            ${'v_masa_perso_'.$nombre_sp}=0;
            foreach($arrayExtras as $aE){
              if($aE==ucwords($nombre_sp)){
                $div_personalizada++;
                if($vP['tam_pizza']!="porcion"){
                  if($vP['tam_pizza']=="mediana")
                    ${'v_masa_perso_'.$nombre_sp}=0.5;
                  else
                    ${'v_masa_perso_'.$nombre_sp}=1;
                }
              }  
            }
          }
        }
      }
    }
  }
  //Diferentes a personalizadas
  foreach ($pizzas_espec as $sab) {
    $nombre_sab=remove_junk($sab['name']); 
    if($nombre_sab!="personalizada"){
      foreach ($tam_pizzas as $tam) {
        $nombre_tam=remove_junk($tam['name']);
        ${'masa_'.$nombre_tam.'_sabor'}=contador_masas_sabor(remove_junk($tam['name']),'venta_pizzas',remove_junk($sab['name']));
        foreach (${'masa_'.$nombre_tam.'_sabor'} as $tms){ ${'v_masa_'.$nombre_tam.'_sabor'}=remove_junk($tms['sum(qty)']); if( ${'v_masa_'.$nombre_tam.'_sabor'}==NULL) ${'v_masa_'.$nombre_tam.'_sabor'}=0;}
      }
      ${'v_masa_'.$nombre_sab}=(0.5*(float)$v_masa_mediana_sabor)+(0.125*(float)$v_masa_porcion_sabor)+(float)$v_masa_familiar_sabor+(float)$v_masa_extragrande_sabor;
    }
  }

  //Tipo Normal
  foreach ($sabor_pizzas as $sab) {
    $nombre_sab=remove_junk($sab['name']); 
    foreach ($tam_pizzas as $tam) {
      $nombre_tam=remove_junk($tam['name']);
      ${'masa_'.$nombre_tam.'_sabor'}=contador_masas_sabor(remove_junk($tam['name']),'venta_pizzas',remove_junk($sab['name']));
      foreach (${'masa_'.$nombre_tam.'_sabor'} as $tms){ ${'v_masa_'.$nombre_tam.'_sabor'}=remove_junk($tms['sum(qty)']); if( ${'v_masa_'.$nombre_tam.'_sabor'}==NULL) ${'v_masa_'.$nombre_tam.'_sabor'}=0;}
    }
    ${'v_masa_'.$nombre_sab}=(0.5*(float)$v_masa_mediana_sabor)+(0.125*(float)$v_masa_porcion_sabor)+(float)$v_masa_familiar_sabor+(float)$v_masa_extragrande_sabor+(float)${'v_masa_personalizada_'.$nombre_sab};

    if($div_personalizada!=0){        //Evitar division para cero si el numero de div de personalizada es 0
      ${'v_masa_'.$nombre_sab}+=(1/(float)$div_personalizada)*(${'v_masa_perso_'.$nombre_sab});   //Sumar la parte de pizza personalizada
    }
  }
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
                <td class="text-center"><input name="hola<?php echo remove_junk($product['id']); ?>" id="f<?php echo remove_junk($product['id']); ?>" min="0" onkeypress="isInputNumber(event)" onchange="myFunction(<?php echo remove_junk($product['id']); ?>)" type="number" class="form-control"></td>
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

  var masas=Number("<?php echo $masa_totales?>");

 //SABORES NORMALES
  var masas_mixta=Number("<?php echo $v_masa_mixta?>");
  var masas_hawayana=Number("<?php echo $v_masa_hawayana?>");
  var masas_pollo=Number("<?php echo $v_masa_pollo?>");
  var masas_vegetariana=Number("<?php echo $v_masa_vegetariana?>");
  var masas_carne=Number("<?php echo $v_masa_carne?>");
  var masas_tocino=Number("<?php echo $v_masa_tocino?>");
  var masas_napolitana=Number("<?php echo $v_masa_napolitana?>");
  var masas_criolla=Number("<?php echo $v_masa_criolla?>");
  var masas_tropical=Number("<?php echo $v_masa_tropical?>");
  var masas_mexicana=Number("<?php echo $v_masa_mexicana?>");

  //SABORES ESPECIALES
  var masas_amangiare=Number("<?php echo $v_masa_amangiare?>");
  var masas_tradicionalHawayana=Number("<?php echo $v_masa_tradicionalHawayana?>");
  var masas_tradicionalPollo=Number("<?php echo $v_masa_tradicionalPollo?>");


  var masas_aprox = document.getElementById('aprox_Masas');
  masas_aprox.innerHTML = masas; // masas;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Masas'+"&p_cantidad="+masas   //Guardar en BD aproximados
  });

  var harina_aprox = document.getElementById('aprox_Harina');
  var val_aprox_Harina = (0.5*masas).toFixed(2);
  harina_aprox.innerHTML = val_aprox_Harina;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Harina'+"&p_cantidad="+val_aprox_Harina   //Guardar en BD aproximados
  });

  var queso_aprox = document.getElementById('aprox_Queso');
  var val_aprox_Queso = (0.357*masas).toFixed(2)
  queso_aprox.innerHTML = val_aprox_Queso; 
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Queso'+"&p_cantidad="+val_aprox_Queso   //Guardar en BD aproximados
  });

  var jamon_aprox = document.getElementById('aprox_Jamón');
  var val_aprox_Jamón = (0.05*masas_mixta+0.1*masas_hawayana+0.0125*masas_amangiare+0.025*masas_tradicionalPollo+0.075*masas_tradicionalHawayana).toFixed(2);
  jamon_aprox.innerHTML = val_aprox_Jamón;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Jamón'+"&p_cantidad="+val_aprox_Jamón   //Guardar en BD aproximados
  });

  var mortadela_aprox = document.getElementById('aprox_Mortadela');
  var val_aprox_Mortadela = (0.1*masas_mixta+0.025*masas_amangiare+0.05*masas_tradicionalPollo+0.05*masas_tradicionalHawayana).toFixed(2);
  mortadela_aprox.innerHTML = val_aprox_Mortadela;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Mortadela'+"&p_cantidad="+val_aprox_Mortadela   //Guardar en BD aproximados
  });

  var salami_aprox = document.getElementById('aprox_Salami');
  var val_aprox_Salami = (0.05*masas_mixta+0.0125*masas_amangiare+0.025*masas_tradicionalPollo+0.025*masas_tradicionalHawayana+0.1*masas_napolitana).toFixed(2);
  salami_aprox.innerHTML = val_aprox_Salami;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Salami'+"&p_cantidad="+val_aprox_Salami   //Guardar en BD aproximados
  });

  var peperoni_aprox = document.getElementById('aprox_Peperoni');
  var val_aprox_Peperoni = (0.05*masas_mixta+0.0125*masas_amangiare+0.025*masas_tradicionalPollo+0.025*masas_tradicionalHawayana+0.1*masas_mexicana).toFixed(2);
  peperoni_aprox.innerHTML = val_aprox_Peperoni;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Peperoni'+"&p_cantidad="+val_aprox_Peperoni   //Guardar en BD aproximados
  });

  var salsa_aprox = document.getElementById('aprox_Salsa');
  var val_aprox_Salsa = (0.0625*masas).toFixed(2);
  salsa_aprox.innerHTML = val_aprox_Salsa;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Salsa'+"&p_cantidad="+val_aprox_Salsa   //Guardar en BD aproximados
  });

  var piña_aprox = document.getElementById('aprox_Piña');
  var val_aprox_Piña = (0.3333*masas_hawayana+0.3333*masas_tropical+0.0833*masas_amangiare+0.1667*masas_tradicionalHawayana).toFixed(2);
  piña_aprox.innerHTML = val_aprox_Piña;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Piña'+"&p_cantidad="+val_aprox_Piña   //Guardar en BD aproximados
  });

  var durazno_aprox = document.getElementById('aprox_Durazno');
  var val_aprox_Durazno = (0.5*masas_tropical).toFixed(2);   
  durazno_aprox.innerHTML = val_aprox_Durazno;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Durazno'+"&p_cantidad="+val_aprox_Durazno   //Guardar en BD aproximados
  });

  var pollo_aprox = document.getElementById('aprox_Pollo');
  var val_aprox_Pollo = (0.25*masas_pollo+0.125*masas_tradicionalPollo+0.0625*masas_amangiare).toFixed(2); 
  pollo_aprox.innerHTML = val_aprox_Pollo;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Pollo'+"&p_cantidad="+val_aprox_Pollo   //Guardar en BD aproximados
  });

  var champiñones_aprox = document.getElementById('aprox_Champiñones');
  var val_aprox_Champiñones = (0.2*masas_pollo+0.1*masas_tradicionalPollo+0.1*masas_amangiare+0.1*masas_carne+0.2*masas_tocino+0.2*masas_vegetariana).toFixed(2); //+0.2*masas_vegana
  champiñones_aprox.innerHTML = val_aprox_Champiñones;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Champiñones'+"&p_cantidad="+val_aprox_Champiñones   //Guardar en BD aproximados
  }); 

  var carne_aprox = document.getElementById('aprox_Carne');
  var val_aprox_Carne = (0.22*masas_carne+0.22*masas_criolla+0.22*masas_mexicana).toFixed(2);
  carne_aprox.innerHTML = val_aprox_Carne;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Carne'+"&p_cantidad="+val_aprox_Carne   //Guardar en BD aproximados
  }); 

  var tocino_aprox = document.getElementById('aprox_Tocino');
  var val_aprox_Tocino = (0.2*masas_tocino+0.05*masas_criolla+0.05*masas_amangiare).toFixed(2);
  tocino_aprox.innerHTML = val_aprox_Tocino;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Tocino'+"&p_cantidad="+val_aprox_Tocino   //Guardar en BD aproximados
  });

  var aceite_aprox = document.getElementById('aprox_Aceite');
  var val_aprox_Aceite = (0.42*masas).toFixed(2);
  aceite_aprox.innerHTML = val_aprox_Aceite;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Aceite'+"&p_cantidad="+val_aprox_Aceite   //Guardar en BD aproximados
  });

  var levadura_aprox = document.getElementById('aprox_Levadura');
  var val_aprox_Levadura = (0.43*masas).toFixed(2);
  levadura_aprox.innerHTML = val_aprox_Levadura;
  $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'Levadura'+"&p_cantidad="+val_aprox_Levadura   //Guardar en BD aproximados
  });
  
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
