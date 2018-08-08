// Progrma de venta de productos 2
var sel_pizza_sec="Pizzas";
  
function selec_categ(nombre_cat) {
  if(nombre_cat=="Pizzas"){
    var f = document.getElementById("selc_pizzas_tam");
    centrar(f);
  }
}

function tam_pizzas(tama){
  if(tama!="Porcion"){
    var e = document.getElementById("selc_pizzas_nor_esp");
    var f = document.getElementById("selc_pizzas_tam");
    centrar(e);
    f.style.display = 'none';
  }
}

function pizzas_normal(){
  var e = document.getElementById("selc_pizzas_tipo");
  var f = document.getElementById("selc_pizzas_nor_esp");
  centrar(e);
  f.style.display = 'none';

}

function ingre_extra(tipo_pizza){
  var e = document.getElementById("selc_extra");
  var f = document.getElementById("selc_pizzas_tipo");
  centrar(e);
  f.style.display = 'none';

}

function centrar(id){
  id.style.display = 'flex';
  id.style.paddingTop='2%';
  id.style.alignItems='center';
  id.style.flexWrap= 'wrap';
  id.style.justifyContent= 'center';
}
