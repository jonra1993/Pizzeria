<?php
  $page_title = 'Ventas mensuales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
 
 $year = date('Y');

 if(isset($_GET['pestaña'])){
  $aux = mktime(0, 0, 0, $_GET["pestaña"] , date("d"), date("Y"));
  $month=date('m',$aux);
 } 
 else{
  $month = date('m');
 }  

 $sales = monthlySales($year,$month);
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
            <span>Ventas mensuales<?php echo $month.'/'.$year; ?></span>
          </strong>
          <ul class="nav nav-tabs">
            <li role="presentation"><a href="sales_montly.php?pestaña=1">En</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=2">Feb</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=3">Mar</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=4">Abr</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=5">May</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=6">Jun</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=7">Jul</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=8">Ago</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=9">Sep</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=10">Oct</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=11">Nov</a></li>
            <li role="presentation"><a href="sales_montly.php?pestaña=12">Dic</a></li>
          </ul>
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
                <td class="text-center" id="pri<?php echo remove_junk($sale['id']); ?>"> <?php echo remove_junk($sale['price']); ?></td>
              </tr>
             <?php endforeach; ?>
            </tbody>
            <tr>
              <th class="text-center" style="width: 10%;" colspan="5"> Total </th>
              <th class="text-center" style="width: 10%;" id="total"> </th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
myFunction();

  function myFunction() {

    var s = document.getElementById('total');

    var pri=0;

    "<?php foreach ($sales as $sale):?>";
      var id = "<?php echo $sale['id']; ?>";
      
      pri = pri + Number(document.getElementById("pri"+id).innerHTML);

    "<?php endforeach ?>";
    s.innerHTML =pri.toFixed(2);
  }

</script>

<?php include_once('layouts/footer.php'); ?>

