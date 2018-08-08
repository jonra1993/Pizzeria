// Progrma de venta de productos 2
var categ, p_tama, p_tipo, p_extras, pizza_vent='0';
  
function selec_categ(nombre_cat) {
  if(nombre_cat=="Pizzas"){
    var g = document.getElementById("cont_categ");
    var e = document.getElementById("selc_pizzas_nor_esp");
    var f = document.getElementById("selc_pizzas_tam");
    var r=document.getElementById("funcion_regresar");
    centrar(f);
    centrar(r);
    r.style.justifyContent= 'left';
    r.style.paddingLeft= '3%';
    //quitar pantalla anterior
    e.style.display = 'none';
  }
  categ=nombre_cat;
  pizza_vent=0;   //Ventana de tamano
  g.style.pointerEvents="none";
}

function tam_pizzas(tama){
  if(tama!="Porcion"){
    var e = document.getElementById("selc_pizzas_nor_esp");
    var f = document.getElementById("selc_pizzas_tam");
    var g = document.getElementById("selc_pizzas_tipo");
    centrar(e);
    f.style.display = 'none';
    g.style.display = 'none';
  }
  p_tama=tama;
  pizza_vent=1;   //Ventana de especial o normal
}

function pizzas_normal(){
  var e = document.getElementById("selc_pizzas_tipo");
  var f = document.getElementById("selc_pizzas_nor_esp");
  var g = document.getElementById("selc_extra");
  centrar(e);
  f.style.display = 'none';
  g.style.display = 'none';
  pizza_vent=2;   //Ventana de tipo
}

function ingre_extra(tipo_pizza){
  var e = document.getElementById("selc_extra");
  var f = document.getElementById("selc_pizzas_tipo");
  centrar(e);
  f.style.display = 'none';
  p_tipo=tipo_pizza;
  pizza_vent=3;   //Ventana de extras

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
