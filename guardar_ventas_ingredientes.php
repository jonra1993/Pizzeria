<?php
  require_once('includes/load.php');
 
  $cantidad=$_GET['p_canti'];
  $nombre = $_GET['p_nombre'];
  $precio = $_GET['p_precio'];

  $date    = make_date();
  $query  = "INSERT INTO venta_ingredientes (";        //Insertar la BD en donde se va a ingresar los datos
  $query .=" qty,nombre_ingre,price,date";
  $query .=") VALUES (";
  $query .=" '{$cantidad}', '{$nombre}', '{$precio}', '{$date}'";
  $query .=")";
  $db->query($query)
?>
  