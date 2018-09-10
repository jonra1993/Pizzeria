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
      $sales      = datesSales_pizzas($start_date,$end_date);

      $pri=0;
      foreach ($sales as $c){
        $pri=$pri+(float)remove_junk($c['price']);
      }
 
    else:
      $session->msg("d", $errors);
      redirect('sales_report.php', false);
    endif;

  } 
  else {
    $sales =null;

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
          <form class="clearfix" method="post" action="sales_report.php">
            <div class="form-group">
            <label class="form-label">Rango de fechas</label>
              <div class="input-group">
                <?php if ($sales != null):?>
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

  <?php if ($sales != null):?>
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Reportes de ventas  (<?php echo $start_date.' a '.$end_date; ?>)</span>
        </strong>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 12%;"> Fecha </th>
              <th class="text-center" style="width: 5%;"> Cantidad </th>
              <th class="text-center" style="width: 20%;"> Descripción </th>
              <th class="text-center" style="width: 10%;"> Extras</th>
              <th class="text-center" style="width: 5%;"> Servir</th>
              <th class="text-center" style="width: 10%;"> Valor</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sales as $sale):?>
            <tr>
                <td class="text-center"> <?php echo read_date($sale['date']); ?></td>
                <td class="text-center"> <?php echo remove_junk($sale['qty']); ?></td>
                <td > Pizza <?php echo remove_junk($sale['tam_pizza'])?> <?php echo remove_junk($sale['sabor_pizza']); ?></td>
                <td class="text-center"> <?php echo remove_junk($sale['extras']); ?></td>
                <td class="text-center"> <?php echo remove_junk($sale['llevar_pizza']); ?></td>
                <td class="text-center"> <?php echo remove_junk($sale['price']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tr>
            <th class="text-center" style="width: 10%;" colspan="5"> Total </th>
            <th class="text-center" style="width: 10%;" ><?php echo number_format((float)$pri, 2, '.', '')?> </th>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>

</div>


<?php include_once('layouts/footer.php'); ?>
