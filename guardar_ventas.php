<?php
  require_once('includes/load.php');
 
  $cantidad=$_GET['p_canti'];
  $tama = $_GET['p_tama'];
  $tipo = $_GET['p_tipo'];
  $sabor = $_GET['p_sabor'];
  $forma = $_GET['p_forma'];

  $date    = make_date();
  $query  = "INSERT INTO venta_pizzas (";        //Insertar la BD en donde se va a ingresar los datos
  $query .=" qty,tam_pizza,tipo_pizza,sabor_pizza,llevar_pizza,date";
  $query .=") VALUES (";
  $query .=" '{$cantidad}', '{$tama}', '{$tipo}', '{$sabor}', '{$forma}', '{$date}'";
  $query .=")";
  $db->query($query)
?>
  