<?php
  require_once('includes/load.php');
 
  $cantidad=$_GET['p_canti'];
  $tama = $_GET['p_tama'];
  $sabor = $_GET['p_sabor'];
  $precio = $_GET['p_precio'];

  $date    = make_date();
  $query  = "INSERT INTO venta_bebidas (";        //Insertar la BD en donde se va a ingresar los datos
  $query .=" qty,tam_bebida,sabor_bebida,price,date";
  $query .=") VALUES (";
  $query .=" '{$cantidad}', '{$tama}', '{$sabor}', '{$precio}', '{$date}'";
  $query .=")";
  $db->query($query)
?>
  