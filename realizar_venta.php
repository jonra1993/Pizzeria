<?php
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $categorias = join_categories_table();
   $tam_pizzas= join_tampizza_table();
   $sabor_pizzas=join_tipopizza_table();
   $extra_pizzas=join_extrapizza_table();
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5');

 //$g= buscar_precios_table('familiar','normal','mixta');
 //Array de copciones de pizza
 $array_tama=  array('mediana', 'familiar', 'extragrande'); 
 $array_tipo= array("normal","especial"); 
 $array_savor= array('mixta', 'carne','tocino', 'pollo','hawayana', 'napolitana','mexicana', 'criolla','tropical','vegana','vegetariana');

//  foreach ($tam_pizzas as $tama) { 
//    array_push($array_categ,remove_junk($tama['name']));
//  }
//  foreach ($sabor_pizzas as $sabor) { 
//     array_push($array_savor,$sabor['name']);
//   }
//   $aux= current($tam_pizzas[0]);
  // $g= "buscar_precios_table($array_tama[0],$array_tipo[0],$array_savor[1]);"
  
  $g= buscar_precios_table($array_tama[0],$array_tipo[0],$array_savor[1]);
?>
<?php include_once('layouts/header.php'); ?>
<?php
 if(isset($_GET['pizz_tam'])){
    $p_tam  = $_GET['pizz_tam'];
    $p_tipo  = $_GET['pizz_tipo'];
    $p_sabor  = $_GET['pizz_sabor'];
    $p_extra  = $_GET['pizz_extra'];
    $p_form   = $_GET['pizz_forma'];
    $g= buscar_precios_table($p_tam,$p_tipo,$p_sabor);
  }
?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <!--.......Cuadrados de visualizacion......-->
  <div class="row">
  <!--Seleccion de Productos-->
  <div class="col-md-7">
    <div id="cont_categ" class="row">
    <!--Categorias-->
      <?php foreach ($categorias as $cat):?>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <?php if($cat['media_id'] === '0'): ?>
              <a href="#" onclick="selec_categ('<?php echo remove_junk(ucfirst($cat['name'])); ?>');" title="Seleccionar Categoria"> 
               <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
              </a>
            <?php else: ?>
          
                <a class="text-center" href="#"  onclick="selec_categ('<?php echo remove_junk(ucfirst($cat['name'])); ?>');" title="Seleccionar Categoria"> 
                  <img class="card-img-top img-responsive" src="uploads/products/<?php echo $cat['image']; ?>" alt=""style="height: 130px; display: block; margin-left: auto;margin-right: auto;">
                </a>
                
            <?php endif; ?>
            <h4 class="card-title center"> <?php echo remove_junk(ucfirst($cat['name'])); ?> </h4>    <!--Lee nombres de categrias-->
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Contenedor de productos -->
    <div class="row">
      <div id="selec_productos" class="container-fluid text-center" style="background-color: #A3ABA7;">
        <!-- regresar -->
        <div id="funcion_regresar" class="row" style="display: none;">
          <button type="button" class="btn btn-success" style="width: auto" onclick="regresar_carac()">
            <i class="glyphicon glyphicon-arrow-left"></i>
          Regresar
          </button>
        </div>
        <!-- Presentacion de opciones -->
        <div id="selc_pizzas_tam" class="row" style="display: none;">
          <?php foreach ($tam_pizzas as $tam):?>
            <div class="col-sm-3">
              <div class="card" style="width: 16rem;">
                <?php if($tam['media_id'] === '0'): ?>
                  <a href="#" onclick="tam_pizzas('<?php echo remove_junk($tam['name']); ?>');" title="Seleccionar Producto"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="tam_pizzas('<?php echo remove_junk($tam['name']); ?>');" title="Seleccionar <?php echo remove_junk(ucfirst($tam['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $tam['image']; ?>" alt="">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($tam['name'])); ?> </h4>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Pizza especial o normal -->
        <div id="selc_pizzas_nor_esp" class="row justify-content-around"  style="display: none; ">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="pizzas_espec();" title="Seleccionar Pizza Especial"> 
              <img class="card-img-top img-responsive" src="uploads/products/pizza_especial.png" alt="">
              </a>
              <h4 class="card-title center"> Pizza Especial </h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="pizzas_normal();" title="Seleccionar Pizza Normal"> 
              <img class="card-img-top img-responsive" src="uploads/products/pizza_normal.png" alt="">
              </a>
              <h4 class="card-title center"> Pizza Normal </h4>
            </div>
          </div>  
        </div>
        <!-- Tipo de pizza -->
        <div id="selc_pizzas_tipo" class="row justify-content-around" style="display: none;">
          <?php foreach ($sabor_pizzas as $tip):?>
            <div class="col-md-3">
              <div class="card" style="width: 16rem;">
                <?php if($tip['media_id'] === '0'): ?>
                  <a href="#" onclick="tip_pizza('<?php echo remove_junk($tip['name']); ?>');" title="Seleccionar Tipo"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="tip_pizza('<?php echo remove_junk($tip['name']); ?>');" title="Seleccionar <?php echo remove_junk(ucfirst($tip['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $tip['image']; ?>" alt=""  style="height: 100px; display: block; margin-left: auto;margin-right: auto;">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($tip['name'])); ?> </h4>
                <p class="card-body"> Ingedientes: <?php echo remove_junk(ucfirst($tip['tipo_descrip'])); ?> </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Ingredientes Extras -->
        <div id="selc_extra" class="row justify-content-around" style="display: none;">
          <?php foreach ($extra_pizzas as $extra):?>
            <div class="col-md-3">
              <div class="card" style="width: 18rem;">
                <?php if($tip['media_id'] === '0'): ?>
                  <a href="#" onclick="ingre_extra('<?php echo remove_junk($extra['name']); ?>');" title="Seleccionar Extra"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="ingre_extra('<?php echo remove_junk($extra['name']); ?>');" title="Seleccionar <?php echo remove_junk(ucfirst($extra['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $extra['image']; ?>" alt=""   style="height: 100px; display: block; margin-left: auto;margin-right: auto;">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($extra['name'])); ?> </h4>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Servirse o llevar-->
        <div id="selc_pizzas_forma" class="row justify-content-around"  style="display: none; ">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="forma_servir('Servirse');" title="Seleccionar Pizza Especial"> 
              <img class="card-img-top img-responsive" src="uploads/products/forma_servirse.png" alt="">
              </a>
              <h4 class="card-title center"> Para Servirse </h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="forma_servir('Llevar')" title="Seleccionar Llevar"> 
              <img class="card-img-top img-responsive" src="uploads/products/forma_llevar.png" alt="">
              </a>
              <h4 class="card-title center"> Para Llevar </h4>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
  <!--Factura-->
  <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th-list"></span>
          <span id="txtHint">Comprobante venta</span>
        </strong>
      </div>
      <div class="panel-body">
        <table id="tabla_factura" class="table table-striped table-hover table-condensed">
          <thead>
            <tr>
              <th class="text-center" style="width:10%">Cantidad</th>
              <th class="text-justify" style="width:40%">Descrip</th>
              <th class="text-center" style="width:20%">Precio</th>
              <th class="text-center" style="width:20%">Total</th>
              <th class="text-center" style="width:10%"></th>
            </tr>
          </thead>
          <tbody id="tb_factura" >
            
          </tbody>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <th class="text-right">Subtotal</td>
              <td class="text-center">$ <input class="text-center" id="sub_producto" name="subtotal" type="text"  style="width: 70%;" disabled value='0.00'></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<script >
var venta_aux=[];
var array_tama=  ['mediana', 'familiar', 'extragrande']; 
var array_tipo= ["normal","especial"]; 
var array_savor= ['mixta', 'carne','tocino', 'pollo','hawayana', 'napolitana','mexicana', 'criolla','tropical','vegana','vegetariana'];
var categ, p_tama, p_tipo, p_extras, p_forma, pizza_vent='0';
var fila_id = 0;
  
function selec_categ(nombre_cat) {
  var g=document.getElementById("cont_categ"); //Cotenedor catego boqueo selecion
  var regr=document.getElementById("funcion_regresar"); //Funcion regresar
  centrar(regr);
  //Ajustar boton regresar
  regr.style.justifyContent= 'left';
  regr.style.paddingLeft= '3%';

  if(nombre_cat=="Pizzas"){
    var e = document.getElementById("selc_pizzas_nor_esp"); //Sig Pizzas tipo
    var f = document.getElementById("selc_pizzas_tam"); //Actual Pizzas Tamano
    //Cetrar layout a visualizar
    centrar(f);
    //Regresar a pantalla anterior
    e.style.display = 'none';
  }
  else if (nombre_cat=="Extras") {
    //var e = document.getElementById("selc_pizzas_nor_esp"); //Siguinte
    var f = document.getElementById("selc_extra");   //Actual
    centrar(f);
    r.style.justifyContent= 'left';
    r.style.paddingLeft= '3%';
    //quitar pantalla anterior
    //e.style.display = 'none';
    
  }
  categ=nombre_cat;
  pizza_vent=0;   //Ventana de tamano
  g.style.pointerEvents="none";   //Bloqueo de categoria
}
//---------- Categoria PIZZAS --------------
//-1)---Tamano PIZZA
function tam_pizzas(tama){
  if(tama!="Porcion"){
    var e = document.getElementById("selc_pizzas_nor_esp"); //ventana se abre
    var f = document.getElementById("selc_pizzas_tam"); //ventana actual q se cierra
    var g = document.getElementById("selc_pizzas_tipo");  //ventana siguiente a cerrar en regreso
    centrar(e);
    f.style.display = 'none';
    g.style.display = 'none';
  }
  p_tama=tama;
  pizza_vent=1;   //Ventana de especial o normal
}

//-2)---Tipo PIZZA
function pizzas_normal(){
  var e = document.getElementById("selc_pizzas_tipo");    //Ven se abre
  var f = document.getElementById("selc_pizzas_nor_esp"); //Ven actual se cierra
  var g = document.getElementById("selc_pizzas_forma"); //Ven sig cierra REGRESAR
  centrar(e);
  f.style.display = 'none';
  g.style.display = 'none';
  p_tipo='normal';
  pizza_vent=2;   //Ventana de tipo
}

//-3)---Sabor PIZZA
function tip_pizza(tipo){
  var e = document.getElementById("selc_pizzas_forma");
  var f = document.getElementById("selc_pizzas_tipo");
  centrar(e);
  f.style.display = 'none';
  p_sabor=tipo;
  pizza_vent=3;   //Ventana de servir
}

function forma_servir(forma) {
  p_forma=forma; 
  
  var precio="<?php foreach ($g as $ggg){ echo remove_junk($ggg['price']); }?>";
  var actu='canti_'+fila_id+',precio_'+fila_id+',total'+fila_id;
  var DOMAIN = "http://localhost/Pizzeria/";

  // "buscar_precio.php?p_tama="+p_tama+"&p_tipo=normal&p_sabor="+p_sabor

  $.ajax({url: DOMAIN+"buscar_precio.php?p_tama="+p_tama+"&p_tipo=normal&p_sabor="+p_sabor, success: function(result){
        alert("hh: "+result);
    }});

  // xhttp = new XMLHttpRequest();
  // xhttp.onreadystatechange = function() {
  //   if (this.readyState == 4 && this.status == 200) {
  //     //console.log(this.responseText)
  //     //document.getElementById("txtHint").innerHTML = this.responseText;
  //   }
  // };
  
  // xhttp.open("GET", "buscar_precio.php?p_tama="+p_tama+"&p_tipo=normal&p_sabor="+p_tipo, true);
  // xhttp.send();
  fila_id++;
  var newRow = $("<tr id="+fila_id+">");
  var cols = "";
  cols += '<td class="text-center" style=width: 100%;"><input id="canti_'+fila_id+'" name="cantidad" type="number" value="1" min="1" style="width: 60%;" onchange="actu_precio('+fila_id+')"></td>';
  cols += '<td class="text-justify" style=width: 100%;">'+categ+" "+p_tama+" "+p_sabor+" "+p_tipo+" "+p_forma+'</td>';
  cols += '<td class="text-center" style=width: 100%;">$ <input class="text-center" id="precio_'+fila_id+'" name="precio" type="text" style="width: 70%;" disabled value='+precio+'></td>';
  cols += '<td class="text-center" style=width: 100%;">$ <input class="text-center" id="total_'+fila_id+'" name="total" type="text"  style="width: 70%;" disabled value='+precio+'></td>';
  cols += '<td class="text-center" style=width: 100%;"> <span onclick="eliminar_fila('+fila_id+')"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></span></td>';

  newRow.append(cols);
  $("table.table-striped.table-hover.table-condensed").append(newRow);
  var venta_pizza={categ:categ,tama:p_tama,tipo:p_tipo,sabor:p_sabor,forma:p_forma};
  venta_aux.push(venta_pizza);
  //var win = window.open("realizar_venta.php?"+"num_fila="+fila_id+"$"+"pizz_tam="+p_tama+"&"+"pizz_tipo=normal"+"$"+"pizz_sabor="+p_tipo+"&"+"pizz_extra="+p_extras+"&"+"pizz_forma="+p_forma,"_self");
  sum_productos();
 }

function centrar(id){
  id.style.display = 'flex';
  id.style.paddingTop='2%';
  id.style.alignItems='center';
  id.style.flexWrap= 'wrap';
  id.style.justifyContent= 'center';
}

function regresar_carac(){
  switch (pizza_vent) {
    case 1:
      selec_categ(categ);   
      break;
    case 2:
      tam_pizzas(p_tama)
      break;
    case 3:
      pizzas_normal()
      break;
    case 4:
      tip_pizza(p_tipo);
      break;
    case 0:
      var g = document.getElementById("cont_categ");
      var f = document.getElementById("selc_pizzas_tam");
      var r = document.getElementById("funcion_regresar");
      g.style.pointerEvents="auto"; //Habilitar categorias
      f.style.display = 'none';     //Desaparecer caracteristicas pizzas
      r.style.display = 'none';
      break;
  }
}

function eliminar_fila(tr_id) {
  //Eliminar fila
  $('#tabla_factura tbody tr#'+tr_id).remove();
  sum_productos();
}

function actu_precio(id){
  var cantidad=document.getElementById('canti_'+id).value;
  var precio=document.getElementById('precio_'+id).value;
  document.getElementById('total_'+id).value=(cantidad*precio).toFixed(2);
  sum_productos();
}

function sum_productos() {
  var sum=0;
  for (i=1; i<=fila_id; i++) {
    if (document.getElementById('total_'+i)!=null) {
      var total=document.getElementById('total_'+i).value;
      sum+=Number(total);
    }
  }
  console.log(sum);
  document.getElementById('sub_producto').value=sum.toFixed(2); 
}

//---------- Categoria EXTRAS --------------
function ingre_extra(extra){
  //var e = document.getElementById("selc_pizzas_forma");
  var f = document.getElementById("selc_extra");
  //centrar(e);
  f.style.display = 'none';
  p_extras=extra;
}
</script>

<?php include_once('layouts/footer.php'); ?>

