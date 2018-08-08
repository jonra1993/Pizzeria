<?php
  $page_title = 'Cierre de caja';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
$user = current_user();
$open=find_last_open_box();

if(isset($_POST['cerrar_caja'])){
   if(empty($errors)){   
     $p_apertura_caja = remove_junk($db->escape($_POST['apertura_caja']));
     $p_cobros_efectivo = remove_junk($db->escape($_POST['cobros_efectivo']));
     $p_cobros_tarjeta = remove_junk($db->escape($_POST['cobros_tarjeta']));
     $p_total_ventas = remove_junk($db->escape($_POST['total_ventas']));
     $p_autoconsumo = remove_junk($db->escape($_POST['autoconsumo']));
     $p_ingreso_ef_caja = remove_junk($db->escape($_POST['ingreso_ef_caja']));
     $p_retiro_ef_caja = remove_junk($db->escape($_POST['retiro_ef_caja']));
     $p_dinero_entregar = remove_junk($db->escape($_POST['dinero_entregar']));
     $p_dinero_entregado = remove_junk($db->escape($_POST['dinero_entregado']));
     $p_dinero_sobra = remove_junk($db->escape($_POST['dinero_sobra']));
     $p_date    = make_date();
     $p_user = remove_junk(ucwords($user['username']));

     $query  = "INSERT INTO tabla_cierres_cajas (";        //Insertar la BD en donde se va a ingresar los datos
     $query .=" dinero_apertura, cobros_en_caja, cobros_con_tarjeta, total_ventas, 	autoconsumo, 	ingreso_efectivo_en_caja, retiro_efectivo_en_caja, dinero_a_entregar, dinero_entregado, saldo, 	date, username";
     $query .=") VALUES (";
     $query .=" '{$p_apertura_caja}','{$p_cobros_efectivo}','{$p_cobros_tarjeta}','{$p_total_ventas}','{$p_autoconsumo}','{$p_ingreso_ef_caja}','{$p_retiro_ef_caja}','{$p_dinero_entregar}','{$p_dinero_entregado}','{$p_dinero_sobra}','{$p_date}','{$p_user}'";
     $query .="); ";


    if($db->query($query)){
      $session->msg('s',"Cerrada correctamente");
      $p_id = remove_junk(ucwords($user['id']));
      $query2 = "UPDATE users SET ";        //Insertar la BD en la memoria de usuario
      $query2 .=" bloqueocaja = 0 WHERE id =";
      $query2 .=" '{$p_id}' ;";
      if($db->query($query2)) redirect('admin.php', false);
      else $session->msg('d',' Lo siento, registro memoria.');        
    } else {
      $session->msg('d',' Lo siento, registro falló.');
      redirect('caja_cierre.php', false);  
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

<?php include_once('layouts/header.php');?>
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
            <tr><td>Apertura de caja</td><td class="text-center" >
              <input readonly type="number" style="text-align:center" id="apertura_caja" name="apertura_caja" value=<?php echo remove_junk(ucwords($open['dinero_apertura']));?> />
            </td></tr>
            <tr><td>Cobros en efectivo</td><td class="text-center ">
              <input readonly style="text-align:center" id="cobros_efectivo" name="cobros_efectivo" value="0"/>
            </td></tr>
            <tr><td>Cobros con tarjeta</td><td class="text-center">
              <input readonly style="text-align:center"  id="cobros_tarjeta" name="cobros_tarjeta"  value="0"/>
            </td></tr>
            <tr><td style="background-color:#0099ff">Total de ventas</td><td class="text-center">
              <input readonly style="text-align:center"   id="total_ventas" name="total_ventas" value="0"  style="color:#0099ff"/>
            </td></tr>
            <tr><td>Autoconsumo</td><td class="text-center">
              <input readonly style="text-align:center"  id="autoconsumo"  name="autoconsumo" value="0"/>
            </td></tr>
            <tr><td>Ingreso de efectivo en caja</td><td class="text-center">
              <input readonly style="text-align:center" id="ingreso_ef_caja" name="ingreso_ef_caja" value="0"/>
            </td></tr>
            <tr><td>Retiro de efectivo en caja</td><td class="text-center">
              <input readonly style="text-align:center" id="retiro_ef_caja" name="retiro_ef_caja" value="0"/>
            </td></tr>
            <tr><td style="background-color:#0099ff">Dinero a entregar</td><td class="text-center">
              <input readonly style="text-align:center"  id="dinero_entregar" name="dinero_entregar"/>
            </td></tr>
            <tr><td  style="background-color:#0099ff">Dinero entregado</td><td class="text-center" >
              <input readonly style="text-align:center"  id="dinero_entregado" name="dinero_entregado"/>
            </td></tr>
            <tr id="color_saldo"><td id="dinero_sobra_txt">a</td><td class="text-center">
              <input readonly style="text-align:center"  id="dinero_sobra" name="dinero_sobra"/>
            </td></tr>
          </tbody>
        </table>
        <button type="submit" name="cerrar_caja" class="btn btn-success">Cerrar Caja</button>
        <button type="submit" name="no_cerrar" class="btn btn-danger">Cancelar</button>
        </form>
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
    var color_saldo = document.getElementById("color_saldo");

    var d_apertura = document.getElementById("apertura_caja");
    var d_cobro_ef = document.getElementById("cobros_efectivo");
    var d_cobro_tar = document.getElementById("cobros_tarjeta");
    var d_total_v = document.getElementById("total_ventas");
    var d_autoconsumo = document.getElementById("autoconsumo");
    var d_ing_ef_caja = document.getElementById("ingreso_ef_caja");
    var d_ret_ef_caja = document.getElementById("retiro_ef_caja");

    var d_entregado = document.getElementById("dinero_entregado");
    var d_entregar = document.getElementById("dinero_entregar");
    var d_sobra_txt = document.getElementById("dinero_sobra_txt");
    var d_sobra = document.getElementById("dinero_sobra");

    var s1=d_apertura.value+d_cobro_ef.value+d_cobro_tar.value;
    var rr=parseFloat(s1)
    d_total_v.value=rr.toFixed(2);

    var s2= -d_autoconsumo.value+d_ing_ef_caja.value-d_ret_ef_caja.value;

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
    d_entregado.value = t;


    var tempo=s1+s2-d_cobro_tar.value;
    d_entregar.value = tempo.toFixed(2);

    var sobra=k-tempo;
    if(sobra<0){
      //d_sobra.style.backgroundColor = "#ff9933";
      //color_saldo.style.backgroundColor = "#ff9933";
      d_sobra_txt.style.backgroundColor = "#ff9933";
      d_sobra_txt.innerHTML = "Falta dinero en caja";
    } 
    else{
      //d_sobra.style.backgroundColor = "#66ff66";
      //color_saldo.style.backgroundColor = "#66ff66";
      d_sobra_txt.style.backgroundColor = "#66ff66";
      d_sobra_txt.innerHTML = "Sobra dinero en caja";
    } 

    sobra=sobra.toFixed(2);
    d_sobra.value = sobra;

  }

  function isInt(n) {
    return n % 1 === 0;
  }

</script>

<?php include_once('layouts/footer.php'); ?>
