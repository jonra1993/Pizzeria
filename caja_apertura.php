<?php
  $page_title = 'Apertura de caja';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>

<?php
 if(isset($_POST['abrir_caja'])){
   $req_fields = array('dinero');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_dinero = remove_junk($db->escape($_POST['dinero']));
     $p_date    = make_date();

     $query  = "INSERT INTO tabalaperturascaja (";        //Insertar la BD en donde se va a ingresar los datos
     $query .=" dinero_apertura,date";
     $query .=") VALUES (";
     $query .=" '{$p_dinero}', '{$p_date}'";
     $query .=")";

     if($db->query($query)){
       $session->msg('s',"Caja Abierta");
       redirect('admin.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('caja_apertura.php', false);         //Regresar a administrar productos a vender
     }

   } else{
     $session->msg("d", $errors);
     redirect('caja_apertura.php',false);
   }

 }
{
    $session->msg('d',' Operación cancelada.');
}

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Apertura de caja</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="caja_apertura.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <output type="text" class="form-control" name="fecha" placeholder="Descripción">
                    <?php 
                        date_default_timezone_set('America/Bogota'); $fecha= date("d/m/Y"); echo $fecha; //$hora= date("d/m/Y  g:i a"); 
                    ?>
                  </output>
               </div>
              </div>

              <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="decimal" class="form-control" name="dinero" placeholder="Importe de apertura">
                   </div>
                  </div>
               </div>
              </div>
              <button type="submit" name="abrir_caja" class="btn btn-danger">Aceptar</button>
              <button type="submit" name="no_abrir" class="btn btn-danger">Cancelar</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
