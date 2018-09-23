<?php
  require_once('includes/load.php');
  
  function  GuardarVentasGenerales($num, $price, $pagado,$vuelto,$date, $user, $fP){

     $query  = "INSERT INTO venta_general (";        //Insertar la BD en donde se va a ingresar los datos
     $query .=" orden,price,pagado,vuelto,date,user,forma_pago";
     $query .=") VALUES (";
     $query .=" '{$num}', '{$price}', '{$pagado}','{$vuelto}', '{$date}', '{$user}', '{$fP}'";
     $query .="); ";

    global $db;
    if($db->query($query)){
        redirect('realizar_venta.php', false);         //Regresar a administrar productos a vender   
    } else {
      $session->msg('d',' Lo siento, registro falló.');
      redirect('realizar_venta.php', false);         //Regresar a administrar productos a vender
    }

  }

?>