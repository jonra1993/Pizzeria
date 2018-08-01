<?php
/*
user admin clave admin

|--------------------------------------------------------------------------
| OWSA-INV V2
|--------------------------------------------------------------------------
| Author: Siamon Hasan
| Project Name: OSWA-INV
| Version: v2
| Offcial page: http://oswapp.com/
| facebook Page: https://www.facebook.com/oswapp
|
https://obedalvarado.pw/blog/sistema-inventario-open-source-php-mysql/
plantillas admin https://adminlte.io/

vende a $400 https://www.youtube.com/watch?v=QfI0kCpV0ZY
vende a $100 https://www.youtube.com/watch?v=LuL6ULvyGJI  se ve mejor

proyectos en ingles
https://www.youtube.com/watch?v=jk8L4_Wx40U   https://codersfolder.com/
https://www.webscript.info/user-posts/post?pid=118&post=inventory-management-system-using-php-mysqli-jquery-ajax-bootstrap



tutorial diseño de sistema completo
https://www.youtube.com/watch?v=zwm-1OAhLbQ&list=PLB_Wd4-5SGAYCmzk21-bvdVTTF6AkH3-T&index=1
*/
  ob_start();
  require_once('includes/load.php');                                    //importa archivos de include
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h1>Bienvenido</h1>
       <p>Iniciar sesión </p>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Usario</label>
              <input type="name" class="form-control" name="username" placeholder="Usario">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Contraseña</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Entrar</button>         <!-- submit permite que la accion de form se ejecute-->
        </div>
    </form>
</div>
<?php include_once('layouts/footer.php'); ?>
