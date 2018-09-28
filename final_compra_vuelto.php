<?php
$page_title = 'Resumen de venta';
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
function reeimpresion(){
  var DOMAIN = "http://localhost/Pizzeria/";
  //window.open(DOMAIN+"realizar_venta.php","_self");
  var servir = '<?php echo $_GET['servir']; ?>';
  var numorden = '<?php echo $_GET['numorden']; ?>';
  var e = '<?php echo $_GET['efectivo']; ?>';
  var user = '<?php echo $_GET['user']; ?>';
  var date = '<?php echo $_GET['date']; ?>';
  var subtotal = '<?php echo $_GET['subtotal']; ?>';
  var orden = '<?php echo $_GET['orden']; ?>';
  var date1 = '<?php echo $_GET['date1']; ?>';
  var p_efect = '<?php echo $_GET['p_efect']; ?>';
  var p_vuelto = '<?php echo $_GET['p_vuelto']; ?>';
  var p_pago = '<?php echo $_GET['p_pago']; ?>';
  //var win = window.open("escpos-php/hello_reimpresion.php?"+"servir="+servir+"&"+"numorden="+numorden+"&"+"efectivo="+e+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1+"&p_efect="+p_efect+"&p_vuelto="+p_vuelto+"&p_pago="+p_pago,"_SELF"); // will open new tab on document ready

  $.ajax({url: DOMAIN+"escpos-php/hello_reimpresion.php?"+"servir="+servir+"&"+"numorden="+numorden+"&"+"efectivo="+e+"&"+"user="+user+"&"+"date="+date+"&"+"subtotal="+subtotal+"&"+"orden="+orden+"&"+"date1="+date1+"&p_efect="+p_efect+"&p_vuelto="+p_vuelto+"&p_pago="+p_pago,
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
