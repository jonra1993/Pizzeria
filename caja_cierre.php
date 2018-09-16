<?php
  $page_title = 'Cierre de caja';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
 $year  = date('Y');
 $month = date('m');
 $day = date('d');

$user = current_user();
$open=find_last_open_box();
$ingresos_cajas = find_sum_ingresos_caja($year,$month,$day);
$retiros_cajas=find_sum_retiros_caja($year,$month,$day);

//ventas ene fectivo
$ventasPizzas = VentasRealizadas($open['date'],'venta_pizzas','efectivo');
//$ventasBebidas = VentasRealizadas($open['date'],'venta_bebidas','efectivo');
//$ventasIngredientes = VentasRealizadas($open['date'],'venta_ingredientes','efectivo');

$total1=0;
$total2=0;
$total3=0;

foreach ($ventasPizzas as $vP){
  $p_llevar=0;
  if(remove_junk($vP['llevar_pizza'])=='llevar'){
    if(remove_junk($sale['tam_pizza'])=='familiar'||remove_junk($sale['tam_pizza'])=='extragrande') $p_llevar=1.25;
    else $p_llevar=1.00;
  }
  $val_e=0;
  $p_extras = explode(",", $vP['extras']);
  if(!$p_extras==''){
    $cos=costoExtra($vP['tam_pizza']);
    $val_e=$cos[0]['price']*(count($p_extras)-1);  //resta 1 porque hay una comma luego de extras
    
  }
  $total1=$total1+(float)remove_junk($vP['price'])+$p_llevar+$val_e;
}
/*foreach ($ventasBebidas as $vB){
  $total2=$total2+(float)remove_junk($vB['price']);
}
foreach ($ventasIngredientes as $vI){
  $total3=$total3+(float)remove_junk($vI['price']);
}*/

$ventasRealizadas_e=$total1+$total2+$total3;

//ventas con tarjeta
$ventasPizzas_t = VentasRealizadas($open['date'],'venta_pizzas','tarjeta');
//$ventasBebidas_t = VentasRealizadas($open['date'],'venta_bebidas','tarjeta');
//$ventasIngredientes_t = VentasRealizadas($open['date'],'venta_ingredientes','tarjeta');

$total1=0;
$total2=0;
$total3=0;

foreach ($ventasPizzas_t as $vP){
  $p_llevar=0;
  if(remove_junk($vP['llevar_pizza'])=='llevar'){
    if(remove_junk($vP['tam_pizza'])=='extragrande') $p_llevar=1.25;
    else $p_llevar=1.00;
  }
  $val_e=0;
  $p_extras = explode(",", $vP['extras']);
  if(!$p_extras==''){
    $cos=costoExtra($vP['tam_pizza']);
    $val_e=$cos[0]['price']*(count($p_extras)-1);  //resta 1 porque hay una comma luego de extras
    
  }
  $total1=$total1+(float)remove_junk($vP['price'])+$p_llevar+$val_e;
}
/*foreach ($ventasBebidas_t as $vB){
  $total2=$total2+(float)remove_junk($vB['price']);
}
foreach ($ventasIngredientes_t as $vI){
  $total3=$total3+(float)remove_junk($vI['price']);
}*/
//falata sumar cajas y extras
$ventasRealizadas_t=$total1+$total2+$total3;




foreach($ingresos_cajas as $tempo){
  $ingresos_caja=remove_junk(ucwords($tempo['SUM(c.importe)']));
}
if($ingresos_caja<=0){
  $ingresos_caja=0;
}

$retiros_caja=0;
foreach($retiros_cajas as $tempo2){
  $retiros_caja=remove_junk(ucwords($tempo2['SUM(c.importe)']));
}
if($retiros_caja>=0)$retiros_caja=0;
else $retiros_caja=-$retiros_caja;


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
      $session->msg('s',"Caja cerrada correctamente");
      $p_id = remove_junk(ucwords($user['id']));
      $query2 = "UPDATE users SET ";        //Insertar la BD en la memoria de usuario
      $query2 .=" bloqueocaja = 0 WHERE id =";
      $query2 .=" '{$p_id}' ;";
      if($db->query($query2)){
        delete_sum_retiros_caja($year,$month,$day);
        delete_sum_ingresos_caja($year,$month,$day);
        redirect('admin.php', false);
      } 
      //if($db->query($query2)) redirect('agenpdp.php', false);
      else $session->msg('d',' Lo siento, registro memoria.');        
    } 
    else {
      $session->msg('d',' Lo siento, registro falló.');
      redirect('caja_cierre.php', false);  
    }

   } else{
     $session->msg("d", $errors);
     redirect('caja_cierre.php',false);
   }
}
if(isset($_POST['no_cerrar'])) $a=1;//redirect('admin.php', false);

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
        <form method="post" action="caja_cierre.php" class="clearfix" id="get_order_data">
          <table class="table table-bordered table-striped table-hover">
            <thead>                                                             <!--Cabecera dentro de la tabla-->
                <tr>
                    <th>Descripción</th><th class="text-center" style="width: 100px;">    Valor    </th>
                </tr>
            </thead>
            <tbody>                                                              <!--Cuerpo dentro de la tabla-->
              <tr><td>Apertura de caja</td><td class="text-center" >
                <input readonly type="number" style="text-align:center" id="apertura_caja" name="apertura_caja" value='0' />
              </td></tr>
              <tr><td>Cobros en efectivo</td><td class="text-center ">
                <input readonly type="number" style="text-align:center" id="cobros_efectivo" name="cobros_efectivo" value='0' />
              </td></tr>
              <tr><td>Cobros con tarjeta</td><td class="text-center">
                <input readonly type="number" style="text-align:center" id="cobros_tarjeta" name="cobros_tarjeta" value='0'/>
              </td></tr>
              <tr><td style="background-color:#0099ff">Total vendido</td><td class="text-center">
                <input type="number" readonly style="text-align:center"   id="total_ventas" name="total_ventas" value=''  style="color:#0099ff"/>
              </td></tr>
              <tr><td>Autoconsumo</td><td class="text-center">
                <input type="number" readonly style="text-align:center"  id="autoconsumo"  name="autoconsumo" value="0"/>
              </td></tr>
              <tr><td>Ingreso de efectivo en caja</td><td class="text-center">
                <input readonly type="number" style="text-align:center" id="ingreso_ef_caja" name="ingreso_ef_caja" value='0'/>
              </td></tr>
              <tr><td>Retiro de efectivo en caja</td><td class="text-center">
                <input readonly type="number" style="text-align:center" id="retiro_ef_caja" name="retiro_ef_caja" value='0'/>
              </td></tr>
              <tr><td style="background-color:#0099ff">Dinero a entregar</td><td class="text-center">
                <input type="number" readonly style="text-align:center"  id="dinero_entregar" name="dinero_entregar"/>
              </td></tr>
              <tr><td  style="background-color:#0099ff">Dinero entregado</td><td class="text-center" >
                <input type="number" readonly style="text-align:center"  id="dinero_entregado" name="dinero_entregado"/>
              </td></tr>
              <tr id="color_saldo"><td id="dinero_sobra_txt">a</td><td class="text-center">
                <input type="number" readonly style="text-align:center"  id="dinero_sobra" name="dinero_sobra"/>
              </td></tr>
            </tbody>
          </table>
          <button type="submit" name="cerrar_caja" class="btn btn-success" id="cerradura">Cerrar Caja</button>
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
            <tr><td>$1</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="un_d"type="number"></td></tr>
            <tr><td>$5</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cinco_d"type="number"></td></tr>
            <tr><td>$10</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0"  min="0" id="diez_d" type="number"></td></tr>
            <tr><td>$20</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="veinte_d" type="number"></td></tr>
            <tr><td>$50</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cincuenta_d" type="number"></td></tr>
            <tr><td>$100</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cien_d" type="number"></td></tr>
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
            <tr><td>1 ctv</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="un_c" type="number"></td></tr>
            <tr><td>5 ctv</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cinco_c" type="number"></td></tr>
            <tr><td>10 ctv</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="diez_c" type="number"></td></tr>
            <tr><td>25 ctv</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0"  min="0" id="veinte_c" type="number"></td></tr>
            <tr><td>50 ctv</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cincuenta_c"type="number"></td></tr>
            <tr><td>$1</td><td class="text-center"><input onkeypress="isInputNumber(event)" style="width: 100px;" onchange="myFunction()"  pattern="\d*" value="0" min="0" id="cien_c"type="number"></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<script>

  $(document).ready(function(){
    var d_apertura =Number("<?php echo remove_junk(ucwords($open['dinero_apertura']));?>");
    var d_ing_ef_caja=Number("<?php echo $ingresos_caja;?>");
    var d_ret_ef_caja = Number("<?php echo $retiros_caja;?>");
    var cobros_efe = Number("<?php echo $ventasRealizadas_e;?>");
    var cobros_tar = Number("<?php echo $ventasRealizadas_t;?>");
    document.getElementById("retiro_ef_caja").value=d_ret_ef_caja.toFixed(2);
    document.getElementById("ingreso_ef_caja").value=d_ing_ef_caja.toFixed(2);
    document.getElementById("apertura_caja").value=d_apertura.toFixed(2);
    document.getElementById("cobros_efectivo").value=cobros_efe.toFixed(2);
    document.getElementById("cobros_tarjeta").value=cobros_tar.toFixed(2);
    myFunction();
  });

	$("#cerradura").click(function(){
    var user = "<?php echo $user['username']; ?>";
    var date = "<?php echo make_date(); ?>";
    var d = new Date();
    var date1=d.getFullYear().toString()+"_"+d.getMonth().toString()+"_"+d.getDate().toString()+"_"+d.getHours().toString()+"_"+d.getMinutes().toString();
    
    var data = $("#get_order_data").serialize(); 
    //var win = window.open("caja_c_reporte.php?"+data+"&"+"user="+user+"&"+"date1="+date1+"&"+"date="+date,"_blank"); // will open new tab on document ready
    //win.focus();
	});

  function isInputNumber(evt){
      
      var ch = String.fromCharCode(evt.which);
      
      if(!(/[0-9]/.test(ch))){
          evt.preventDefault();
      }
      
  }
  
  function myFunction() {
    var color_saldo = document.getElementById("color_saldo");

    var d_apertura = Number(document.getElementById("apertura_caja").value);
    var d_cobro_ef = Number(document.getElementById("cobros_efectivo").value);
    var d_cobro_tar = Number(document.getElementById("cobros_tarjeta").value);
    var d_total_v = document.getElementById("total_ventas");
    var d_autoconsumo = Number(document.getElementById("autoconsumo").value);
    var d_ing_ef_caja = Number(document.getElementById("ingreso_ef_caja").value);
    var d_ret_ef_caja = Number(document.getElementById("retiro_ef_caja").value);

    var d_entregado = document.getElementById("dinero_entregado");
    var d_entregar = document.getElementById("dinero_entregar");
    var d_sobra_txt = document.getElementById("dinero_sobra_txt");
    var d_sobra = document.getElementById("dinero_sobra");

    var s1=d_cobro_ef+d_cobro_tar;
    d_total_v.value=s1.toFixed(2);

    var s2= -d_autoconsumo+d_ing_ef_caja-d_ret_ef_caja;

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


    var tempo=s1+s2-d_cobro_tar+d_apertura;
    var tempo=parseFloat(tempo)
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
