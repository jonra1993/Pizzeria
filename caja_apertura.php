<?php
  $page_title = 'Apertura de caja';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>

<?php
$user = current_user();
if(isset($_POST['abrir_caja'])){
   $req_fields = array('dinero');
   validate_fields($req_fields);
   if(empty($errors)){
     $aux = remove_junk(ucwords($user['username']));
     $p_dinero = remove_junk($db->escape($_POST['dinero']));
     $p_user = remove_junk($db->escape($_POST['username']));
     $p_id = remove_junk($db->escape($_POST['id']));
     $p_bloqueo = true;

     $p_date    = make_date();

     $query  = "INSERT INTO tabla_aperturas_cajas (";        //Insertar la BD en donde se va a ingresar los datos
     $query .=" dinero_apertura,username,date";
     $query .=") VALUES (";
     $query .=" '{$p_dinero}', '{$aux}', '{$p_date}'";
     $query .="); ";


    if($db->query($query)){
      $session->msg('s',"Caja Abierta");
      $query2 = "UPDATE users SET ";        //Insertar la BD en la memoria de usuario
      $query2 .=" bloqueocaja = true WHERE id =";
      $query2 .=" '{$p_id}' ;";
      if($db->query($query2)) redirect('admin.php', false);
      else $session->msg('d',' Lo siento, registro memoria.');        
    } else {
      $session->msg('d',' Lo siento, registro falló.');
      redirect('caja_apertura.php', false);         //Regresar a administrar productos a vender
    }

   } else{
     $session->msg("d", $errors);
     redirect('caja_apertura.php',false);
   }
}
else{
  if($user['bloqueocaja']==true){
    $session->msg("s", 'La caja se encuentra abierta, cierrela primero!');
    redirect('admin.php', false); //ojo depende de q menu este user, admin o special no todos van a admin
    exit();
  }
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
              <input style="visibility: hidden" type="text" class="form-control" name="id" value=<?php echo remove_junk(ucwords($user['id'])); ?>>
              <input style="visibility: hidden" type="text" class="form-control" name="username" value=<?php echo remove_junk(ucwords($user['username'])); ?>>
              <button type="submit" name="abrir_caja" class="btn btn-danger">Aceptar</button>
              <button type="submit" name="no_abrir" class="btn btn-danger">Cancelar</button>

              <input style="visibility: hidden" type="text" class="form-control" name="username" value=<?php $x= current_user(); echo remove_junk(ucwords($user['bloqueocaja']));?>>

              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php 
include_once('layouts/footer.php'); 

?>
