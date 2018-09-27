<?php
$page_title = 'Reporte de Inventario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);

?>

<?php
  require_once('realizar_z.php');

if(isset($_GET['p_efect'])) {
    $efectivo=$_GET['p_efect'];
    $vuelto=$_GET['p_vuelto'];
    $compra=$_GET['p_desVenta'];
    $forma=$_GET['p_pago'];
    
    $cc = find_conta('contador');
    $contador;
    foreach($cc as $c){
     $contador=$c['conta'];
    }

    $contador++;
    $query = "UPDATE contador SET ";        //Insertar la BD en la memoria de usuario
    $query .=" conta = '{$contador}' WHERE id = 1;";
    if($db->query($query)){}


    GuardarVentasGenerales($_GET["numorden"], $_GET["subtotal"], $_GET["p_efect"],$_GET["p_vuelto"],$_GET["date"], $_GET["user"], $_GET["p_pago"]);

    
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
        <h1>Efectivo <span class="label label-warning"><?php echo number_format((float)$efectivo, 2, '.', '');?></span></h1>
        <h1>Vuelto <span class="label label-success"><?php echo number_format((float)$vuelto, 2, '.', '');?></span></h1>
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
  window.open(DOMAIN+"realizar_venta.php","_self");
}
</script>
<?php include_once('layouts/footer.php'); ?>
