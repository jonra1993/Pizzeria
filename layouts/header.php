<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Sistema simple de inventario";?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    
    <link href="assets/global/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        
        <!-- END GLOBAL MANDATORY STYLES -->

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="libs/css/main.css" />
    <!-- tablas-->
  <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
       
        
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />


        <!-- aniacion -->
        <link href="assets/animacion.css" rel="stylesheet" type="text/css" id="style_color" /> 

        <!-- opcional <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" /> 
        -->
        
        <script src="./ajax/jquery.min.js"></script>

        <!--libreria de hosting -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
        <!-- libreria rara -->
      <!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script> -->
        <link href="https://fonts.googleapis.com/css?family=Bungee|Cambo|Finger+Paint|Frijole|Shadows+Into+Light" rel="stylesheet">
      <!--  media queris-->
       <link href="assets/modalmovil.css" rel="stylesheet" type="text/css" /> 
       
  </head>

  <!-- BEGIN HEADER -->
  <?php  if ($session->isUserLoggedIn(true)): ?>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-header navbar navbar-fixed-top">    
      <!-- BEGIN HEADER INNER -->
      <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
                <img src="./fotos/logo.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="pull-right clearfix">
              <ul class="info-menu list-inline list-unstyled">
                <li class="profile">
                  <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                    <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
                    <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="nav-item start "><a class="nav-link" href="profile.php?id=<?php echo (int)$user['id'];?>"><i class="glyphicon glyphicon-user"></i>Perfil</a></li>
                    <li class="nav-item start "><a class="nav-link" href="edit_account.php" title="edit account"><i class="glyphicon glyphicon-cog"></i>Configuración</a></li>
                    <li class="nav-item start " class="last"><a class="nav-link" href="logout.php"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                  </ul>
                </li>
              </ul>
            </div>

        <div class="top-menu">
          <div class="pull-right clearfix">
            <ul class="info-menu list-inline list-unstyled">
              <li class="profile">
                <a href="#" class="nav-link nav-toggle">
                  <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
                  <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item start "><a class="nav-link" href="profile.php?id=<?php echo (int)$user['id'];?>"><i class="glyphicon glyphicon-user"></i>Perfil</a></li>
                  <li class="nav-item start "><a class="nav-link" href="edit_account.php" title="edit account"><i class="glyphicon glyphicon-cog"></i>Configuración</a></li>
                  <li class="nav-item start " class="last"><a class="nav-link" href="logout.php"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                </ul>
              </li>
            </ul>
          </div>  

        </div>

      </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
      <!-- END HEADER INNER -->
    <div class="clearfix"> </div>
    <div class="page-container">
      <!-- START SIDEBAR -->
      <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
          <?php if($user['user_level'] === '1'): ?>
            <!-- admin menu -->
          <?php include_once('admin_menu.php');?>       <!--Importa opciones de administrador-->

          <?php elseif($user['user_level'] === '2'): ?>
            <!-- Special user -->
          <?php include_once('special_menu.php');?>     <!--Importa opciones de usuario Especial-->

          <?php elseif($user['user_level'] === '3'): ?>
            <!-- User menu -->
          <?php include_once('user_menu.php');?>        <!--Importa opciones de Usuario-->
          <?php endif;?>
        </div>
      </div> 
      <!-- END SIDEBAR -->
      <?php endif;?>
      <!-- BEGIN CONTENT -->
      <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">