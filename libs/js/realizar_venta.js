// Progrma de venta de productos 2
var sel_pizza_sec="Pizzas";
  
function selec_categ(nombre_cat) {
  if(nombre_cat=="Pizzas"){
    var f = document.getElementById("selc_pizzas_tam");
    if(f.style.display == 'block'){
      f.style.display = 'none';
    }
    else{
      f.style.display = 'block';
    }
  }
  else 
  {

  }
}

function tam_pizzas(tama){
  if(tama!="Porcion"){
    var e = document.getElementById("selc_pizzas_nor_esp");
    var f = document.getElementById("selc_pizzas_tam");
    e.style.display = 'block';
    f.style.display = 'none';
  }
}

function pizzas_normal(){
  var e = document.getElementById("selc_pizzas_tipo");
  var f = document.getElementById("selc_pizzas_nor_esp");
  e.style.display = 'block';
  f.style.display = 'none';

}
