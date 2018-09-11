<?php
$page_title = 'Reporte de Inventario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>

<?php
if(isset($_GET['p_efect'])) {
    $efectivo=$_GET['p_efect'];
    $vuelto=$_GET['p_vuelto'];
    $compra=$_GET['p_desVenta'];
    $forma=$_GET['p_pago'];
    
    // for($k=0;$k<$num_items;$k++){
    //   array_push($item_compr,$_GET['c_canti'.$k],$_GET['c_descrip'.$k],$_GET['c_precio'.$k]);
    //   array_push($lista_items,$item_compr);
    //   $item_compr= array();
    // }
  }
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="row">
  <div class="container">
    <div class="panel">
      <div class="panel-body text-center">
        <h1>Efectivo <span class="label label-warning"><?php echo $efectivo;?></span></h1>
        <h1>Vuelto <span class="label label-success"><?php echo $vuelto;?></span></h1>
        <h4>Pago <?php echo $forma;?></h4>
            
            <div class="form-group text-center" >
              <button type="button" class="btn btn-lg btn-block btn-primary" onclick="f_final()">Finalizar</button>
            </div>
      </div>
    </div>
  </div>
</div>
<script >
function f_final(){
  var DOMAIN = "http://localhost/Pizzeria/";
  
  window.open(DOMAIN+"admin.php","_self");
}
</script>
<?php include_once('layouts/footer.php'); ?>
