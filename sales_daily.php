<?php
  $page_title = 'Ventas diarias';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
  $categorias = join_categories_table();
  $year  = date('Y');
  $month = date('m');
  $day = date('d');
  $listaExtras=buscar_catalogo("extra_pizzas");
?>

<?php
  if(isset($_GET['sel'])){  
    $selector=$_GET['sel'];
    if(empty($errors)){
      switch ($selector) {
        case 'Pizzas':
          $ventas = dailySales($year,$month,$day,'venta_pizzas');
          break;
        case 'Bebidas':
          $ventas = dailySales($year,$month,$day,'venta_bebidas');
          break;
        case 'Ingredientes':
          $ventas = dailySales($year,$month,$day,'venta_ingredientes');
          break;
      }
    }
    else{
      $session->msg("d", $errors);
      redirect('sales_daily.php', false);
    }
  } else {
    $ventas = dailySales($year,$month,$day,'venta_pizzas');
    $selector='Pizzas';
  }
?>


<?php include_once('layouts/header.php'); ?>
  <div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>

    <div class="col-md-12">
      <div class="col-md-6">
        <div class="panel">
          <div class="panel-body">     
            <label for="exampleFormControlSelect1">Seleccione la categoría</label>
            <select class="form-control" id="selector" onchange="nuevo();" required>
              <option><?php echo remove_junk($selector); ?></option>
              <?php foreach ($categorias as $cat):?>
                <?php if(remove_junk($cat['name'])!=remove_junk($selector)):?>
                  <option><?php echo remove_junk($cat['name']);?></option>
                <?php endif?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
    </div>

    <?php if ($ventas != null):?>    
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading clearfix">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Reportes de ventas de <?php echo  $selector;?> del día (<?php echo  $year.'/'.$month.'/'.$day; ?>)</span>
            </strong>
          </div>
          <?php switch($selector): 
            case 'Pizzas': ?>
              <div class="panel-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 12%;"> Fecha </th>
                      <th class="text-center" style="width: 5%;"> Cantidad </th>
                      <th class="text-center" style="width: 20%;"> Descripción </th>
                      <th class="text-center" style="width: 10%;"> Extras</th>
                      <th class="text-center" style="width: 5%;"> Para llevar</th>
                      <th class="text-center" style="width: 10%;"> Valor</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ventas as $sale):?>
                    <tr>
                      <td class="text-center"> <?php echo read_date($sale['date']); ?></td>
                      <td class="text-center"> <?php echo remove_junk($sale['qty']); ?></td>
                      <td > Pizza <?php echo remove_junk($sale['tam_pizza'])?> <?php echo remove_junk($sale['sabor_pizza']); ?></td>
                      <td class="text-center">
                        <?php if (remove_junk($sale['extras'])!==''): ?>
                        <div class="checkbox">
                          <label><input onclick="return false;" type="checkbox" value="" checked></label>
                        </div>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <?php if(remove_junk($sale['llevar_pizza'])!='servirse'): ?>
                          <div class="checkbox">
                            <label><input onclick="return false;" type="checkbox" value="" checked></label>
                          </div>
                        <?php endif; ?>
                      </td>
                      <td class="text-center" id="pri<?php echo remove_junk($sale['id']); ?>"> 
                        <?php
                          $p_llevar=0; 
                          if((remove_junk($sale['llevar_pizza'])!='servirse')&&($sale['tam_pizza']!='porcion')){
                            if(remove_junk($sale['tam_pizza'])=='familiar'||remove_junk($sale['tam_pizza'])=='extragrande') $p_llevar=1.25;
                            else $p_llevar=1.00;
                          }
                          $val_e=0;
                          if($sale['extras']!=null){
                            $arrayExtras = explode(",", $sale['extras']);  // se obtiene un vector de extras
                            $cos=costoExtra($sale['tam_pizza']);        //costo de extras en base al tamaño de la pizza
                            if($sale['sabor_pizza']!="personalizada")   $val_e=$cos[0]['price']*(count($arrayExtras)); // si no es personalizada solo cuenta y multiplica
                            else{
                              $auxConta=0;
                              foreach($listaExtras as $lE){
                                foreach($arrayExtras as $aE){
                                  if($lE['name']==$aE)  $auxConta++;
                                }
                              }
                              $val_e=$cos[0]['price']*$auxConta;
                            }
                          } 
                          $total1=(float)remove_junk($sale['price'])+$p_llevar+$val_e;
                          echo number_format((float)$total1, 2, '.', '');
                        ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                    <tr>
                      <th class="text-center" style="width: 10%;" colspan="5"> Total </th>
                      <th class="text-center" style="width: 10%;" id="total"> </th>
                    </tr>
                </table>
              </div>
            <?php break; ?>
            <?php case 'Bebidas': ?>
              <div class="panel-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 12%;"> Fecha </th>
                      <th class="text-center" style="width: 5%;"> Cantidad </th>
                      <th class="text-center" style="width: 20%;"> Tamaño </th>
                      <th class="text-center" style="width: 10%;"> Sabor</th>
                      <th class="text-center" style="width: 10%;"> Valor</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ventas as $sale):?>
                    <tr>
                      <td class="text-center"> <?php echo read_date($sale['date']); ?></td>
                      <td class="text-center"> <?php echo remove_junk($sale['qty']); ?></td>
                      <td class="text-center"> <?php echo remove_junk($sale['tam_bebida'])?> </td>
                      <td class="text-center"> <?php echo remove_junk($sale['sabor_bebida']); ?></td>
                      <td class="text-center" id="pri<?php echo remove_junk($sale['id']); ?>"> <?php echo remove_junk($sale['price']); ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                    <tr>
                      <th class="text-center" style="width: 10%;" colspan="4"> Total </th>
                      <th class="text-center" style="width: 10%;" id="total"> </th>
                    </tr>
                </table>
              </div>
            <?php break; ?>
            <?php case 'Ingredientes': ?>
              <div class="panel-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 12%;"> Fecha </th>
                      <th class="text-center" style="width: 5%;"> Cantidad </th>
                      <th class="text-center" style="width: 20%;"> Ingrediente </th>
                      <th class="text-center" style="width: 10%;"> Valor</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ventas as $sale):?>
                    <tr>
                      <td class="text-center"> <?php echo read_date($sale['date']); ?></td>
                      <td class="text-center"> <?php echo remove_junk($sale['qty']); ?></td>
                      <td class="text-center"> <?php echo remove_junk($sale['nombre_ingre']); ?></td>
                      <td class="text-center" id="pri<?php echo remove_junk($sale['id']); ?>"> <?php echo remove_junk($sale['price']); ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                    <tr>
                      <th class="text-center" style="width: 10%;" colspan="3"> Total </th>
                      <th class="text-center" style="width: 10%;" id="total"> </th>
                    </tr>
                </table>
              </div>
            <?php break; ?>
          <?php endswitch; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>

<script>
myFunction();

  function myFunction() {

    var s = document.getElementById('total');

    var pri=0;

    "<?php foreach ($ventas as $sale):?>";
      var id = "<?php echo $sale['id']; ?>";
      
      pri = pri + Number(document.getElementById("pri"+id).innerHTML);

    "<?php endforeach ?>";
    s.innerHTML =pri.toFixed(2);
  }

  function nuevo(){
    var sel=document.getElementById('selector').value;
    var win = window.open("sales_daily.php?"+"sel="+sel,"_SELF"); // will open new tab on document ready

  }

</script>

<?php include_once('layouts/footer.php'); ?>

