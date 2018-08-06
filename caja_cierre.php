<?php
  $page_title = 'Cierre de caja';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
$user = current_user();
if(isset($_POST['cerrar_caja'])){
   $req_fields = array('dinero');
   validate_fields($req_fields);
   if(empty($errors)){
     $aux = remove_junk(ucwords($user['username']));
     $p_dinero = remove_junk($db->escape($_POST['dinero']));
     $p_user = remove_junk($db->escape($_POST['username']));
     $p_id = remove_junk($db->escape($_POST['id']));
     $p_bloqueo = true;

     $p_date    = make_date();

     $query  = "INSERT INTO tabla_aperturas_cajas (";        //Insertar la BD en donde se va a ingresar los datos
     $query .=" dinero_apertura,username,date";
     $query .=") VALUES (";
     $query .=" '{$p_dinero}', '{$aux}', '{$p_date}'";
     $query .="); ";


    if($db->query($query)){
      $session->msg('s',"Caja Abierta");
      $query2 = "UPDATE users SET ";        //Insertar la BD en la memoria de usuario
      $query2 .=" bloqueocaja = true WHERE id =";
      $query2 .=" '{$p_id}' ;";
      if($db->query($query2)) redirect('admin.php', false);
      else $session->msg('d',' Lo siento, registro memoria.');        
    } else {
      $session->msg('d',' Lo siento, registro falló.');
      redirect('caja_cierre.php', false);         //Regresar a administrar productos a vender
    }

   } else{
     $session->msg("d", $errors);
     redirect('caja_cierre.php',false);
   }
}
if(isset($_POST['no_cerrar'])) redirect('admin.php', false);
else{
  if($user['bloqueocaja']==false){
    $session->msg("d", 'La caja se encuentra cerrada, abrala primero!');
    redirect('admin.php', false); //ojo depende de q menu este user, admin o special no todos van a admin
  }
} 
?>

<?php include_once('layouts/header.php'); ?>
<div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
</div>
<div class="row">

  <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Caja</span>
       </strong>
      </div>
      <div class="panel-body">
      <form method="post" action="caja_cierre.php" class="clearfix">
        <table class="table table-bordered table-striped table-hover">
          <thead>                                                             <!--Cabecera dentro de la tabla-->
              <tr>
                  <th>Descripción</th><th class="text-center" style="width: 100px;">    Valor    </th>
              </tr>
          </thead>
          <tbody>                                                              <!--Cuerpo dentro de la tabla-->
            <tr><td>Apertura de caja</td><td class="text-center" name="apertura_caja">0</td></tr>
            <tr><td>Cobros en efectivo</td><td class="text-center " name="cobros_efectivo">0</td></tr>
            <tr><td>Cobros con tarjeta</td><td class="text-center" name="cobros_tarjeta">0</td></tr>
            <tr style="background-color:#0099ff"><td>Total de ventas</td><td class="text-center" name="total_ventas">0</td></tr>
            <tr><td>Autoconsumo</td><td class="text-center" name="autoconsumo">0</td></tr>
            <tr><td>Ingreso de efectivo en caja</td><td class="text-center" name="ingreso_ef_caja">0</td></tr>
            <tr><td>Retiro de efectivo en caja</td><td class="text-center" name="retiro_ef_caja">0</td></tr>
            <tr style="background-color:#0099ff"><td>Dinero a entregar</td><td class="text-center"id="dinero_entregar" name="dinero_entregar">0</td></tr>
            <tr style="background-color:#0099ff"><td>Dinero entregado</td><td class="text-center" id="dinero_entregado" name="dinero_entregado">0</td></tr>
            <tr><td id="dinero_sobra_txt">a</td><td class="text-center" id="dinero_sobra" name="dinero_sobra">0</td></tr>
          </tbody>
          </form>
        </table>
        <button type="submit" name="cerrar_caja" class="btn btn-success">Cerrar Caja</button>
        <button type="submit" name="no_cerrar" class="btn btn-danger">Cancelar</button>
      </div>
    </div>
  </div>

  <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Billetes</span>
        </strong>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-striped table-hover">
          <thead>                                                             <!--Cabecera dentro de la tabla-->
              <tr>
                  <th>Denominación</th><th class="text-center" style="width: 100px;">Cantidad</th>
              </tr>
          </thead>
          <tbody> 
            <tr><td>$1</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="un_d"type="text"></td></tr>
            <tr><td>$5</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cinco_d"type="number"></td></tr>
            <tr><td>$10</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0"  min="0" id="diez_d" type="number"></td></tr>
            <tr><td>$20</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="veinte_d" type="number"></td></tr>
            <tr><td>$50</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cincuenta_d" type="number"></td></tr>
            <tr><td>$100</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cien_d" type="number"></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

    <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Monedas</span>
        </strong>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-striped table-hover">
          <thead>                                                             <!--Cabecera dentro de la tabla-->
              <tr>
                  <th>Denominación</th><th class="text-center" style="width: 100px;">Cantidad</th>
              </tr>
          </thead>
          <tbody>
            <tr><td>1 ctv</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="un_c" type="number"></td></tr>
            <tr><td>5 ctv</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cinco_c" type="number"></td></tr>
            <tr><td>10 ctv</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="diez_c" type="number"></td></tr>
            <tr><td>25 ctv</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0"  min="0" id="veinte_c" type="number"></td></tr>
            <tr><td>50 ctv</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cincuenta_c"type="number"></td></tr>
            <tr><td>$1</td><td class="text-center"><input style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cien_c"type="text"></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<script>
  myFunction();
  function myFunction() {

    var d_sobra_txt = document.getElementById("dinero_sobra_txt");
    var d_entregado = document.getElementById("dinero_entregado");
    var d_entregar = document.getElementById("dinero_entregar");
    var d_sobra = document.getElementById("dinero_sobra");

    //dolares
    var cien = document.getElementById("cien_d").value;
    var cincuenta = document.getElementById("cincuenta_d").value;
    var veinte = document.getElementById("veinte_d").value;
    var diez = document.getElementById("diez_d").value;
    var cinco = document.getElementById("cinco_d").value;;
    var un = document.getElementById("un_d").value;
    if(!isInt(cien)||!isInt(cincuenta)||!isInt(veinte)||!isInt(diez)||!isInt(cinco)||!isInt(un)){
      alert("Sólo se aceptan números enteros"); return;
    } 
    var suma1= (100*cien)+(50*cincuenta)+(20*veinte)+(10*diez)+(5*cinco)+1*un;

    //centavos
    var cien = document.getElementById("cien_c").value;
    var cincuenta = document.getElementById("cincuenta_c").value;
    var veinte = document.getElementById("veinte_c").value;
    var diez = document.getElementById("diez_c").value;
    var cinco = document.getElementById("cinco_c").value;;
    var un = document.getElementById("un_c").value;
    if(!isInt(cien)||!isInt(cincuenta)||!isInt(veinte)||!isInt(diez)||!isInt(cinco)||!isInt(un)){
      alert("Sólo se aceptan números enteros"); return;
    } 
    var suma2= 1*cien+0.01*((50*cincuenta)+(25*veinte)+(10*diez)+(5*cinco)+1*un);
    var k=suma2+suma1;
    var t=k.toFixed(2);
    d_entregado.innerHTML = t;


    var tempo=100;
    d_entregar.innerHTML = tempo;

    var sobra=k-tempo;
    if(sobra<0){
      d_sobra.style.backgroundColor = "#ff9933";
      d_sobra_txt.style.backgroundColor = "#ff9933";
      d_sobra_txt.innerHTML = "Falta dinero en caja";
    } 
    else{
      d_sobra.style.backgroundColor = "#66ff66";
      d_sobra_txt.style.backgroundColor = "#66ff66";
      d_sobra_txt.innerHTML = "Sobra dinero en caja";
    } 

    sobra=sobra.toFixed(2);
    d_sobra.innerHTML = sobra;

  }

  function isInt(n) {
    return n % 1 === 0;
  }

</script>

<?php include_once('layouts/footer.php'); ?>
