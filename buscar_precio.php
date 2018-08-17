<?php
  $dbhost = "localhost";
  $dbuser = "visor";
  $dbpass = "12345";
  $dbname = "oswa_inv";

  //Connect to MySQL Server
  mysql_connect($dbhost, $dbuser, $dbpass);
    //Select Database
  mysql_select_db($dbname) or die(mysql_error());
    // Retrieve data from Query String
  $tama = $_GET['p_tama'];
  $tipo = $_GET['p_tipo'];
  $sabor = $_GET['p_sabor'];

  echo $tama;

  // $tama= mysql_real_escape_string($tama);
  // $tipo= mysql_real_escape_string($tipo);
  // $sabor= mysql_real_escape_string($sabor);

  // $sql  ="SELECT p.price FROM catalogo_pizzas p WHERE p.size = '{$tama}' AND p.type = '{$tipo}' AND p.flavor = '{$sabor}' LIMIT 1";
  // $qry_result = mysql_query($sql) 

  // $precio=buscar_precios_table($tama,$tipo,$sabor);

  //echo "Precio ";
  
  // function buscar_precios_table($tama,$tipo,$sabor){
  //   global $db;
  //   $sql  ="SELECT p.price FROM catalogo_pizzas p WHERE p.size = '{$tama}' AND p.type = '{$tipo}' AND p.flavor = '{$sabor}' LIMIT 1";
  //   $qry_result = mysql_query($query) 
  //  return $db->query($sql);
  // }
?>
  