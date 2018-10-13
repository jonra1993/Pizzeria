<?php
$page_title = 'Resumen de venta';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);

  $efectivo=$_GET['p_efect'];
  $vuelto=$_GET['p_vuelto'];
  $forma=$_GET['p_pago'];

  $products = join_product_table();

?>

<?php include_once('layouts/header.php'); ?>

<?php 
    //-----CONTADOR DE PRODUCTOS
      $products = join_product_table();
      $sabor_pizzas=join_tipopizza_table();
      $pizzas_espec=join_pizzaespecilal_table();
      $tam_pizzas= join_tampizza_table();

      $div_personalizada=0;
      $year  = date('Y');
      $month = date('m');
      $day = date('d');
      $ventasPizzas = dailySales($year,$month,$day,'venta_pizzas');

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
    

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Resumen</span>
        </strong>
      </div>
      <div class="panel-body">
        <div class="panel-body text-center">
          <div class="form-group text-center" >
            <button type="button" class="btn btn-lg btn-block btn-primary" onclick="reeimpresion()">Reeimprimir comprobante</button>
          </div>
          <a style="visibility:hidden;">aaaa</a>
          <h1>Efectivo <span class="label label-warning"><?php echo number_format((float)$efectivo, 2, '.', '');?></span></h1>
          <h1>Vuelto <span class="label label-success"><?php echo number_format((float)$vuelto, 2, '.', '');?></span></h1>
          <a style="visibility:hidden;">aaaa</a>
          <h4>Pago <?php if($forma=="efectivo") echo " en efectivo"; else echo "con tarjeta";?></h4>
          <h4><?php if($_GET['status']=="siImpreso") echo " Documento impreso"; else echo "Documento no impreso";?></h4>
                  
          <a style="visibility:hidden;">aaaa</a>        
          <div class="form-group text-center" >
            <button type="button" class="btn btn-lg btn-block btn-success" onclick="f_final()">Finalizar Venta</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script >

  var DOMAIN = "http://localhost/Pizzeria/";
  //............CONTADOR DE MASAS .................................
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

  var val_aprox_Masas=masas;
  var val_aprox_CajasMedianas=0;
  var val_aprox_CajasGrandes=0;
  var val_aprox_Harina = (0.5*masas).toFixed(2);
  var val_aprox_Queso = (0.357*masas).toFixed(2);
  var val_aprox_Jamón = (0.05*masas_mixta+0.1*masas_hawayana+0.0125*masas_amangiare+0.025*masas_tradicionalPollo+0.075*masas_tradicionalHawayana).toFixed(2);
  var val_aprox_Mortadela = (0.1*masas_mixta+0.025*masas_amangiare+0.05*masas_tradicionalPollo+0.05*masas_tradicionalHawayana).toFixed(2);
  var val_aprox_Salami = (0.05*masas_mixta+0.0125*masas_amangiare+0.025*masas_tradicionalPollo+0.025*masas_tradicionalHawayana+0.1*masas_napolitana).toFixed(2);
  var val_aprox_Peperoni = (0.05*masas_mixta+0.0125*masas_amangiare+0.025*masas_tradicionalPollo+0.025*masas_tradicionalHawayana+0.1*masas_mexicana).toFixed(2);
  var val_aprox_Salsa = (0.0625*masas).toFixed(2);
  var val_aprox_Piña = (0.3333*masas_hawayana+0.3333*masas_tropical+0.0833*masas_amangiare+0.1667*masas_tradicionalHawayana).toFixed(2);
  var val_aprox_Durazno = (0.5*masas_tropical).toFixed(2);   
  var val_aprox_Pollo = (0.25*masas_pollo+0.125*masas_tradicionalPollo+0.0625*masas_amangiare).toFixed(2); 
  var val_aprox_Champiñones = (0.2*masas_pollo+0.1*masas_tradicionalPollo+0.1*masas_amangiare+0.1*masas_carne+0.2*masas_tocino+0.2*masas_vegetariana).toFixed(2); //+0.2*masas_vegana
  var val_aprox_Carne = (0.22*masas_carne+0.22*masas_criolla+0.22*masas_mexicana).toFixed(2);
  var val_aprox_Tocino = (0.2*masas_tocino+0.05*masas_criolla+0.05*masas_amangiare).toFixed(2);
  var val_aprox_Aceite = (0.42*masas).toFixed(2);
  var val_aprox_Levadura = (0.43*masas).toFixed(2);


  <?php foreach ($products as $prod) :?>
    $.ajax({url: DOMAIN+"guardar_invent_aprox.php?p_producto="+'<?php echo remove_junk($prod['name']); ?>'+"&p_cantidad="+val_aprox_<?php echo remove_junk($prod['name']); ?>   //Guardar en BD aproximados
    });
  <?php endforeach; ?>
//--------------------------------------------------------------------------------------
  pdf_prueb();
  
  function pdf_prueb(){
    //window.open(DOMAIN+"realizar_venta.php","_self");
    var servir = '<?php echo $_GET['servir']; ?>';
    var numorden = '<?php echo $_GET['numorden']; ?>';
    var user = '<?php echo $_GET['user']; ?>';
    var date = '<?php echo $_GET['date']; ?>';
    var subtotal = '<?php echo $_GET['subtotal']; ?>';
    var orden = '<?php echo $_GET['orden']; ?>';
    var date1 = '<?php echo $_GET['date1']; ?>';
    var p_efect = '<?php echo $_GET['p_efect']; ?>';
    var p_vuelto = '<?php echo $_GET['p_vuelto']; ?>';
    var p_pago = '<?php echo $_GET['p_pago']; ?>';
    var win = window.open("realizar_venta_pdf.php?"+"servir="+servir+"&"+"numorden="+numorden+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1+"&p_efect="+p_efect+"&p_vuelto="+p_vuelto+"&p_pago="+p_pago); 
  }


  function reeimpresion(){
    var DOMAIN = "http://localhost/Pizzeria/";
    //window.open(DOMAIN+"realizar_venta.php","_self");
    var servir = '<?php echo $_GET['servir']; ?>';
    var numorden = '<?php echo $_GET['numorden']; ?>';
    var user = '<?php echo $_GET['user']; ?>';
    var date = '<?php echo $_GET['date']; ?>';
    var subtotal = '<?php echo $_GET['subtotal']; ?>';
    var orden = '<?php echo $_GET['orden']; ?>';
    var date1 = '<?php echo $_GET['date1']; ?>';
    var p_efect = '<?php echo $_GET['p_efect']; ?>';
    var p_vuelto = '<?php echo $_GET['p_vuelto']; ?>';
    var p_pago = '<?php echo $_GET['p_pago']; ?>';
    //var win = window.open("escpos-php/hello_reimpresion.php?"+"servir="+servir+"&"+"numorden="+numorden+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1+"&p_efect="+p_efect+"&p_vuelto="+p_vuelto+"&p_pago="+p_pago,"_SELF"); // will open new tab on document ready


    $.ajax({url: DOMAIN+"escpos-php/hello_reimpresion.php?"+"servir="+servir+"&"+"numorden="+numorden+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1+"&p_efect="+p_efect+"&p_vuelto="+p_vuelto+"&p_pago="+p_pago,
      success: function(result){
        alert("Comprobante reimpreso");
      }});

  }
  function f_final(){
    var DOMAIN = "http://localhost/Pizzeria/";
    window.open(DOMAIN+"realizar_venta.php","_self");
  }
</script>
<?php include_once('layouts/footer.php'); ?>
