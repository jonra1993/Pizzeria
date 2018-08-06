// Progrma de venta de productos
var sel_pizza_sec="Pizzas";
  
function selec_categ(nombre_cat) {
  if(nombre_cat=="Pizzas"){
    var e = document.getElementById("selc_pizzas");
    var f = document.getElementById("selc_pizzas_tam");
    if(e.style.display == 'block'){
      e.style.display = 'none';
      f.style.display = 'none';
    }
    else{
      e.style.display = 'block';
      f.style.display = 'block';
    }
  }
  else 
  {

  }
}

function tam_pizzas(tama){
  if(tama!="Porcion"){
    var e = document.getElementById("selc_pizzas_tipo");
    var f = document.getElementById("selc_pizzas_tam");
    e.style.display = 'block';
    f.style.display = 'none';
  }
}
