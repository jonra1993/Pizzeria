<?php
$page_title = 'Reporte de ventas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php
  if(isset($_POST['submit'])){
    $req_dates = array('start-date','end-date');
    validate_fields($req_dates);

    if(empty($errors)):
      $start_date   = remove_junk($db->escape($_POST['start-date']));
      $end_date     = remove_junk($db->escape($_POST['end-date']));
      $cierres      = by_dates_cierres_cajas($start_date,$end_date);
 
    else:
      $session->msg("d", $errors);
      redirect('caja_cierre_general.php', false);
    endif;

  } 
  else {
    $cierres =null;

  }
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-body">
          <form class="clearfix" method="post" action="caja_cierre_general.php">
            <div class="form-group">
            <label class="form-label">Rango de fechas</label>
              <div class="input-group">
                <?php if ($cierres != null):?>
                  <input type="text" class="datepicker form-control" name="start-date" value=<?php echo $start_date; ?> required autocomplete="off">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                  <input type="text" class="datepicker form-control" name="end-date" value=<?php echo $end_date; ?> required autocomplete="off">                 
                <?php else:?>
                  <input type="text" class="datepicker form-control" name="start-date" Placeholder='Desde' required autocomplete="off">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                  <input type="text" class="datepicker form-control" name="end-date" Placeholder='Hasta' required autocomplete="off">
                  <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
                 <button type="submit" name="submit" class="btn btn-primary">Generar Reporte</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <?php if ($cierres != null):?>
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Reportes de cierres de caja  (<?php echo $start_date.' a '.$end_date; ?>)</span>
        </strong>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 15%;"> Fecha </th>
              <th class="text-center" style="width: 10%;"> Usuario </th>
              <th class="text-center" style="width: 10%;"> Monto de Apertura </th>
              <th class="text-center" style="width: 10%;"> Cobros en Efectivo</th>
              <th class="text-center" style="width: 10%;"> Cobros con Tarjeta</th>
              <th class="text-center" style="width: 10%;"> Monto Entregado</th>
              <th class="text-center" style="width: 10%;"> Saldo </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cierres as $cierre):?>
            <tr>
              <td class="text-center"> <?php echo read_date($cierre['date']); ?></td>
              <td class="text-center"> <?php echo remove_junk($cierre['username']); ?></td>
              <td class="text-center" id="da<?php echo remove_junk($cierre['id']); ?>"> <?php echo remove_junk($cierre['dinero_apertura']); ?></td>
              <td class="text-center" id="cc<?php echo remove_junk($cierre['id']); ?>"> <?php echo remove_junk($cierre['cobros_en_caja']); ?></td>
              <td class="text-center" id="ct<?php echo remove_junk($cierre['id']); ?>"> <?php echo remove_junk($cierre['cobros_con_tarjeta']); ?></td>
              <td class="text-center" id="de<?php echo remove_junk($cierre['id']); ?>"> <?php echo remove_junk($cierre['dinero_entregado']); ?></td>
              <td class="text-center" id="s<?php echo remove_junk($cierre['id']); ?>"> <?php echo remove_junk($cierre['saldo']); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoo>
            <tr>
              <th class="text-center" style="width: 10%;" colspan="2"> Total </th>
              <th class="text-center" style="width: 10%;" id="dinero_apertura"> </th>
              <th class="text-center" style="width: 10%;" id="cobros_en_caja"> </th>
              <th class="text-center" style="width: 10%;" id="cobros_con_tarjeta"> </th>
              <th class="text-center" style="width: 10%;" id="dinero_entregado"> </th>
              <th class="text-center" style="width: 10%;" id="saldo"> </th>
            </tr>
          </tfoo>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>

</div>






<script>
myFunction();

  function myFunction() {
    "<?php if ($cierres != null):?>";
      var da = document.getElementById('dinero_apertura');
      var cc = document.getElementById('cobros_en_caja');
      var ct = document.getElementById('cobros_con_tarjeta');
      var de = document.getElementById('dinero_entregado');
      var s = document.getElementById('saldo');

      var da1=0;
      var cc1=0;
      var ct1=0; 
      var de1=0;
      var s1=0;
      "<?php foreach ($cierres as $cierre):?>";
        var id = "<?php echo $cierre['id']; ?>";
        
        da1 = da1 + Number(document.getElementById("da"+id).innerHTML);
        cc1 = cc1 + Number(document.getElementById("cc"+id).innerHTML);
        ct1 = ct1 + Number(document.getElementById("ct"+id).innerHTML);
        de1 = de1 + Number(document.getElementById("de"+id).innerHTML);
        s1 = s1 + Number(document.getElementById("s"+id).innerHTML);
      "<?php endforeach ?>";
      da.innerHTML =da1.toFixed(2);;
      cc.innerHTML =cc1.toFixed(2);;
      ct.innerHTML =ct1.toFixed(2);;
      de.innerHTML =de1.toFixed(2);;
      s.innerHTML =s1.toFixed(2);;
    "<?php endif;?>";
  }

</script>

<?php include_once('layouts/footer.php'); ?>
