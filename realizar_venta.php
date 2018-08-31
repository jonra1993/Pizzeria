<?php
  $page_title = 'Admin página de inicio';
  $selec="Selecciona el sabor del ingrediente";
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $categorias = join_categories_table();
   $tam_pizzas= join_tampizza_table();
   $sabor_pizzas=join_tipopizza_table();
   $extra_pizzas=join_extrapizza_table();
   $pizzas_espec=join_pizzaespecilal_table();
   $sabores = find_all('tipo_pizzas');
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5');

//  $array_tama=  array('mediana', 'familiar', 'extragrande'); 
//  $array_tipo= array("normal","especial"); 
//  $array_savor= array('mixta', 'carne','tocino', 'pollo','hawayana', 'napolitana','mexicana', 'criolla','tropical','vegana','vegetariana');

//  foreach ($tam_pizzas as $tama) { 
//    array_push($array_categ,remove_junk($tama['name']));
//  }
//  foreach ($sabor_pizzas as $sabor) { 
//     array_push($array_savor,$sabor['name']);
//   }
//   $aux= current($tam_pizzas[0]);
  // $g= "buscar_precios_table($array_tama[0],$array_tipo[0],$array_savor[1]);"
  
?>
<?php include_once('layouts/header.php'); ?>

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
              <a href="#" onclick="pizzas_normal('especial');" title="Seleccionar Pizza Especial"> 
              <img class="card-img-top img-responsive" src="uploads/products/pizza_especial.png" alt="">
              </a>
              <h4 class="card-title center"> Pizza Especial </h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="pizzas_normal('normal');" title="Seleccionar Pizza Normal"> 
              <img class="card-img-top img-responsive" src="uploads/products/pizza_normal.png" alt="">
              </a>
              <h4 class="card-title center"> Pizza Normal </h4>
            </div>
          </div>  
        </div>
        <!-- Sabor de pizza -->
        <div id="selc_pizzas_sabor" class="row justify-content-around" style="display: none;">
          <?php foreach ($sabor_pizzas as $tip) :?>
            <div class="col-md-3">
              <div class="card" style="width: 16rem;">
                <?php if($tip['media_id'] === '0'): ?>
                  <a href="#" onclick="sabor_pizza('<?php echo remove_junk($tip['name']); ?>','0','0');" title="Seleccionar Tipo"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="sabor_pizza('<?php echo remove_junk($tip['name']); ?>','0','0');" title="Seleccionar <?php echo remove_junk(ucfirst($tip['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $tip['image']; ?>" alt=""  style="height: 100px; display: block; margin-left: auto;margin-right: auto;">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($tip['name'])); ?> </h4>
                <p class="card-body"> Ingedientes: <?php echo remove_junk(ucfirst($tip['tipo_descrip'])); ?> </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Sabor de pizza PORCION-->
        <div id="selc_pizzas_sabor_PORCION" class="row justify-content-around" style="display: none;">
          <?php foreach ($sabor_pizzas as $tip) if ($tmp++ < 4){?>
            <div class="col-md-3">
              <div class="card" style="width: 16rem;">
                <?php if($tip['media_id'] === '0'): ?>
                  <a href="#" onclick="sabor_pizza('<?php echo remove_junk($tip['name']); ?>','0');" title="Seleccionar Tipo"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="sabor_pizza('<?php echo remove_junk($tip['name']); ?>','0');" title="Seleccionar <?php echo remove_junk(ucfirst($tip['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $tip['image']; ?>" alt=""  style="height: 100px; display: block; margin-left: auto;margin-right: auto;">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($tip['name'])); ?> </h4>
                <p class="card-body"> Ingedientes: <?php echo remove_junk(ucfirst($tip['tipo_descrip'])); ?> </p>
              </div>
            </div>
          <?php } ?>
        </div>
        <!-- Ingredientes Extras -->
        <div id="selc_extra" class="row" style="display: none;" >
          <div id="selc_extra2" class="row justify-content-around">
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
          <div id="fun_cont_extra" class="d-flex flex-row-reverse">
            <button type="button" class="btn btn-light" style="width: auto" onclick="avanzar_extra()">
              <i class="glyphicon glyphicon-arrow-right"></i>
              Continuar
            </button>
          </div>
        </div>

        <!-- Servirse o llevar-->
        <div id="selc_pizzas_forma" class="row justify-content-around"  style="display: none; ">
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="forma_servir('servirse');" title="Seleccionar Pizza Especial"> 
              <img class="card-img-top img-responsive" src="uploads/products/forma_servirse.png" alt="">
              </a>
              <h4 class="card-title center"> Para Servirse </h4>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <a href="#" onclick="forma_servir('llevar')" title="Seleccionar Llevar"> 
              <img class="card-img-top img-responsive" src="uploads/products/forma_llevar.png" alt="">
              </a>
              <h4 class="card-title center"> Para Llevar </h4>
            </div>
          </div>  
        </div>
        <!-- Opciones Pizza Especial -->
        <div id="selc_pizzas_especiales" class="row justify-content-around" style="display: none;">
          <?php foreach ($pizzas_espec as $especial) :?>
            <div class="col-md-3">
              <div class="card" style="width: 16rem;">
                <?php if($especial['media_id'] === '0'): ?>
                  <a href="#" onclick="sabor_pizza('<?php echo remove_junk($especial['name']); ?>','0','0');" title="Seleccionar Tipo"> 
                  <img class="card-img-top img-responsive" src="uploads/products/no_image.jpg" alt="">
                  </a>
                <?php else: ?>
                <a href="#" onclick="sabor_pizza('<?php echo remove_junk($especial['name']); ?>','0','0');" title="Seleccionar <?php echo remove_junk(ucfirst($especial['name'])); ?>"> 
                    <img class="card-img-top img-responsive" src="uploads/products/<?php echo $especial['image']; ?>" alt=""  style="height: 100px; display: block; margin-left: auto;margin-right: auto;">
                  </a>
                <?php endif; ?>
                <h4 class="card-title center"> <?php echo remove_junk(ucfirst($especial['name'])); ?> </h4>
                <p class="card-body"> Ingedientes: <?php echo remove_junk(ucfirst($especial['tipo_descrip'])); ?> </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- Pizza Personalizada -->
        <div id="selc_personalizada" class="row justify-content-around" style="display: none;">
          <form class="form-horizontal" action="#" onsubmit="ingre_especial();">
            <?php for ($x = 1; $x <= 4; $x++) { ?>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" style="width: 150px;">Ingrediente <?php echo $x ?></label>
                <div class="col-md-6">
                  <select class="form-control" id="ingred_<?php echo $x ?>" style="width: 400px;">
                    <option value=""><? echo $selec?> </option>
                      <?php  foreach ($sabores as $sab): ?>
                        <option value="<?php echo (int)$sab['id'] ?>">
                          <?php echo ucfirst($sab['name']) ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
            <?php }?>
            <button type="submit" name="add_cat" class="btn btn-primary">Continuar</button>
          </form>
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
              <td class="text-center" style="width: 100%;">$ <input class="text-center" id="sub_producto" name="subtotal" type="text"  style="width: 70%;" disabled value='0.00'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <th class="text-right">IVA <input class="text-center" id="valor_iva" name="iva" type="text"  style="width: 25%;" disabled value='0'> %</td>
              <td class="text-center" style="width: 100%;">$ <input class="text-center" id="iva" name="iva" type="text"  style="width: 70%;" disabled value='0.00'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <th class="text-right">TOTAL</td>
              <td class="text-center" style="width: 100%;">$ <input class="text-center" id="total_compra" name="total_compra" type="text"  style="width: 70%;" disabled value='0.00'></td>
            </tr>
          </tfoot>
        </table>
        <button id="final_compra" type="button" class="btn btn-danger btn-block" onclick="f_final_compra()"style="display:none;">Finalizar Compra</button>
        <div class="row" id="cont_vuelto" style="display: none;">
          <div class="row"  style="padding-top: 5%;">
            <div class="form-check text-center">
              <label class="form-check-label" style="margin-right: 15%;">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked onclick="forma_pago('efectivo');">
                Pago en Efectivo
              </label>
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2" onclick="forma_pago('tarjeta');">
                Pago con tarjeta
              </label>
            </div>
          </div>
          <img class="card-img-top img-responsive pb-2" id="im_tarjeta" src="fotos/tarjeta.png" alt="" style="width: 40%; margin:auto; display: none;">
          <div class="panel-body" id="tabla_vuelto">
            <table class="table table-striped table-hover table-condensed">
              <tbody> 
                <tr><td class="text-right">Efectivo</td><td class="text-center">$ <input id="in_efectivo" class="text-center" type="number" value="0.00" min="0" style="width: 25%;" onchange="actu_vuelto()"></td></tr>
                <tr><td class="text-right">Vuelto</td><td class="text-center">$ <input id="in_vuelto" class="text-center"  type="number" value="0.00" min="0" style="width: 25%;" disabled></td></tr>
              </tbody>
            </table>
          </div>
          <div class="text-center">
            <button id="f_continuar" type="button" class="btn btn-success" onclick="f_continuar(1)" >Continuar</button>
            <button id="f_cancelar" type="button" class="btn btn-danger" onclick="f_continuar(0)" >Cancelar Compra</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script >
var venta_aux=[];
// var array_tama=  ['mediana', 'familiar', 'extragrande']; 
// var array_tipo= ["normal","especial"]; 
// var array_savor= ['mixta', 'carne','tocino', 'pollo','hawayana', 'napolitana','mexicana', 'criolla','tropical','vegana','vegetariana'];
var categ, p_tama, p_tipo, p_extras, p_forma, pizza_vent='0';
var fila_id = 0;
var num_extras = 0;
var str_extra="";
var DOMAIN = "http://localhost/Pizzeria/";
  
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
// 0=> Ventana de tamano
// 1=> Ventana de tipo
// 2=> Ventana de sabor
// 3=> Ventana de extra

//-1)---Tamano PIZZA
function tam_pizzas(tama){
  p_tama=tama;
  var f = document.getElementById("selc_pizzas_tam"); //SE CIERRA:ventana actual

  if(tama!="porcion"){
    var e = document.getElementById("selc_pizzas_nor_esp"); //SE ABRE:ventana se abre
    var g = document.getElementById("selc_pizzas_sabor");  //SE CIERRA:ventana siguiente en regreso
    var g2 = document.getElementById("selc_pizzas_especiales");  //SE CIERRA:ventana siguiente en regreso
    centrar(e);
    f.style.display = 'none';
    g.style.display = 'none';
    g2.style.display = 'none';
    pizza_vent=1;   //Ventana de especial o normal
  }
  else{
    f.style.display = 'none';
    pizzas_normal(tama);
  }
  
}

//-2)---Tipo PIZZA
function pizzas_normal(tipo){
  var f = document.getElementById("selc_pizzas_nor_esp"); //SE CIERRA:ventana actual
  var g = document.getElementById("selc_extra"); //SE CIERRA:ventana siguiente en regreso
  if (tipo=="porcion") 
    var e = document.getElementById("selc_pizzas_sabor_PORCION");    //SE ABRE:ventana se abre 
  else if (tipo=="normal")
    var e = document.getElementById("selc_pizzas_sabor");    //SE ABRE:ventana se abre
  else
    var e = document.getElementById("selc_pizzas_especiales");    //SE ABRE:ventana se abre
  centrar(e);
  f.style.display = 'none';
  g.style.display = 'none';
  p_tipo=tipo;
  pizza_vent=2;   //Ventana de sabor
}

//-3)---Sabor PIZZA
function sabor_pizza(tipo,on_regres,ingre_especial){
  var precio=0;
  if (on_regres==0 && tipo!="personalizada") {
    if(tipo.search("personalizada")!=(-1))
      p_sabor="personalizada";              //Determinar piza especial sin ingredien
    else
      p_sabor=tipo;
    //Requrimiento de precio a BD se demora mas que la siguiente linea secuencial
    $.ajax({url: DOMAIN+"buscar_precio.php?p_tama="+p_tama+"&p_tipo="+p_tipo+"&p_sabor="+p_sabor, success: function(result){
      precio=Number(result);
      var descrip= categ+" "+p_tama+" "+p_tipo+" "+tipo;
      agregar_fila(descrip,precio);
      str_extra+=(ingre_especial.toString());
      // alert(str_extra);
      //Guardar venta ---------------------------------------------------------------------------
      var venta_pizza={id:fila_id,categ:categ,canti:1,tama:p_tama,tipo:p_tipo,sabor:p_sabor,extra:str_extra,forma:"123 ",precioP:precio};
      venta_aux.push(venta_pizza); 
    }}); 
  }
  if(tipo=="personalizada")
    var e = document.getElementById("selc_personalizada");
  else{
    var e = document.getElementById("selc_extra");
    var selc_personalizada = document.getElementById("selc_personalizada");
    selc_personalizada.style.display = 'none';  
  }

  var sabor_porcion = document.getElementById("selc_pizzas_sabor_PORCION");
  var extra = document.getElementById("selc_extra2");
  var continuar = document.getElementById("fun_cont_extra");
  
  
  var f = document.getElementById("selc_pizzas_sabor");
  var f2 = document.getElementById("selc_pizzas_especiales");
  var g = document.getElementById("selc_pizzas_forma"); //Ven sig cierra REGRESAR
  centrar(e);
  centrar(extra);
  centrar(continuar);
  // continuar.style.justifyContent= 'flex-end';
  //continuar.style.paddingRight= '3%';
  f.style.display = 'none';
  f2.style.display = 'none';
  g.style.display = 'none';
  sabor_porcion.style.display = 'none';
  pizza_vent=3;   //Ventana de servir
}

function ingre_extra(extra){
  num_extras++;
  str_extra+=(extra+",");
  // alert(str_extra);
  //Buscar precios de extras y cracion de fila en nota de venta
  $.ajax({url: DOMAIN+"buscar_precio_extra.php?p_tama="+p_tama+"&p_extra="+extra, success: function(result){
    // alert(result);
    precio=Number(result);
    var descrip= "Extra "+extra+" en pizza "+p_tama;
    agregar_fila(descrip,precio);
  }});
}

function forma_servir(forma) {
  p_forma=forma; 
  venta_aux.forEach(element => {
    //alert(element.id+","+(fila_id-num_extras));
    if (element.id==(Number(fila_id-num_extras))) {   //Es necesario contar el numero de xtras porq tambien generan filas
      element.forma=p_forma;
      // alert(p_forma);
    }
  });

  if (p_forma=="llevar"  && !(p_tama=="porcion")) {
    var descrip="Caja Pizza "+p_tama;
    agregar_fila(descrip, 1.0);
  }
  //Quitar  el contenedor al finalizar
  var e = document.getElementById("selc_pizzas_forma");
  var regr=document.getElementById("funcion_regresar"); 
  var g = document.getElementById("cont_categ");
  e.style.display = 'none';
  regr.style.display = 'none';
  g.style.pointerEvents="auto"; //Habilitar pulsacion
  var btn_finalizar = document.getElementById("final_compra");
  centrar(btn_finalizar);

  
}

function avanzar_extra() {
  // alert(str_extra);
  venta_aux.forEach(element => {
    if (element.id==(Number(fila_id-num_extras))) {   //Es necesario contar el numero de xtras porq tambien generan filas
      // alert(str_extra);
      element.extra=str_extra;
    }
  });
  var e = document.getElementById("selc_pizzas_forma");
  var f = document.getElementById("selc_extra");
  centrar(e);
  f.style.display = 'none';
  pizza_vent=4;   //Ventana de servir
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
    case 1:     //Ventana de tipo
      selec_categ(categ);   
      break;
    case 2:     //Ventana de sabor
      if(p_tama=="porcion"){
        var g = document.getElementById("selc_pizzas_sabor_PORCION");
        selec_categ(categ);
        g.style.display = 'none';
      } 
      else
        tam_pizzas(p_tama);
      break;
    case 3:     //Ventana de extra
      pizzas_normal(p_tipo);
      break;
    case 4:     //Ventana de servirse
      sabor_pizza(p_sabor,1,0);   //1 determina que esta regresando a la venta anterior
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
  var total=(cantidad*precio).toFixed(2);
  document.getElementById('total_'+id).value=total;
  venta_aux.forEach(element => {
    if (element.id==(Number(id))) {
      element.canti=cantidad;
      element.precioP=total;
      // alert(total);
    }
  });
  sum_productos();
}

function sum_productos() {
  var porc_iva=Number(document.getElementById('valor_iva').value)/100;
  var sum=0;
  for (i=1; i<=fila_id; i++) {
    if (document.getElementById('total_'+i)!=null) {
      var total=document.getElementById('total_'+i).value;
      sum+=Number(total);
    }
  }
  document.getElementById('sub_producto').value=sum.toFixed(2); 
  document.getElementById('iva').value=(porc_iva*sum).toFixed(2);
  var valor_iva=Number(document.getElementById('iva').value);
  document.getElementById('total_compra').value=(valor_iva+sum).toFixed(2);
}

function agregar_fila(descrip, prec) {
  fila_id++;
  var newRow = $("<tr id="+fila_id+">");
  var cols = "";
  cols += '<td class="text-center" style=width: 100%;"><input id="canti_'+fila_id+'" name="cantidad" type="number" value="1" min="1" style="width: 60%;" onchange="actu_precio('+fila_id+')"></td>';
  cols += '<td class="text-justify" style=width: 100%;">'+descrip+'</td>';
  cols += '<td class="text-center" style=width: 100%;">$ <input class="text-center" id="precio_'+fila_id+'" name="precio" type="text" style="width: 70%;" disabled value='+prec.toFixed(2)+'></td>';
  cols += '<td class="text-center" style=width: 100%;">$ <input class="text-center" id="total_'+fila_id+'" name="total" type="text"  style="width: 70%;" disabled value='+prec.toFixed(2)+'></td>';
  cols += '<td class="text-center" style=width: 100%;"> <span onclick="eliminar_fila('+fila_id+')"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></span></td>';

  newRow.append(cols);
  $("#tabla_factura").append(newRow);
  
  sum_productos();
  
}

function f_final_compra(){
  var nFilas = $("#tabla_factura tbody tr").length;
  if (nFilas==0) {
    alert("No existen productos en la factura");
    location.reload();
  }
  else{
    document.getElementById('cont_vuelto').style.display='block';
    // venta_aux.forEach(element => {
    //   if(element.categ=="Pizzas"){
    //     alert(element.extra);
    //     $.ajax({url: DOMAIN+"guardar_ventas.php?p_canti="+element.canti+"&p_tama="+element.tama+"&p_tipo="+element.tipo+"&p_sabor="+element.sabor+"&p_extras="+element.extra+"&p_forma="+element.forma+"&p_precio="+element.precioP
    //     });
    //   }
    // });
    

    //
  }
}

function ingre_especial(theForm){
  var ingre=0;
  var ingre_esp=[];
  for(k=1;k<=4;k++){
    var e = document.getElementById("ingred_"+k);
    var strUser = e.options[e.selectedIndex].text;
    if(strUser!='<? echo $selec?>'){
      ingre++;
      ingre_esp.push(strUser);
    }
  }
  if(ingre>=2){
    var str_esp= 'personalizada:';
    for(l=0;l<ingre_esp.length;l++)
      str_esp+=("1/"+ingre+" "+ingre_esp[l]+",");
    sabor_pizza(str_esp,0,ingre_esp);
  }
  else{
    ingre_esp=[];
    alert("Numero de ingredientes insuficientes");
  }
}

function actu_vuelto(){
  var total = document.getElementById('total_compra').value;
  // document.getElementById('total_compra').value=total.toFixed(2);
  
  var efectivo = document.getElementById('in_efectivo').value;
  document.getElementById('in_vuelto').value=(efectivo-total).toFixed(2);
  
}

function forma_pago(forma){
  tabla_vuelto=document.getElementById('tabla_vuelto');
  im_tarjeta=document.getElementById('im_tarjeta');
  if (forma=="efectivo") {
    tabla_vuelto.style.display='block';
    im_tarjeta.style.display='none';
  }
  else{
    tabla_vuelto.style.display='none';
    centrar(im_tarjeta);
  }
}

function f_continuar(conti){
  if(conti==1){
    venta_aux.forEach(element => {
      if(element.categ=="Pizzas"){
        alert(element.extra);
        $.ajax({url: DOMAIN+"guardar_ventas.php?p_canti="+element.canti+"&p_tama="+element.tama+"&p_tipo="+element.tipo+"&p_sabor="+element.sabor+"&p_extras="+element.extra+"&p_forma="+element.forma+"&p_precio="+element.precioP
        });
      }
    });
    window.open(DOMAIN+"admin.php","_self");
  }
  else
    window.open(DOMAIN+"admin.php","_self");
}

</script>

<?php include_once('layouts/footer.php'); ?>

