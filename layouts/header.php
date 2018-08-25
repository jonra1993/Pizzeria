<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Sistema simple de inventario";?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/adminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/adminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/adminLTE/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. CAMBIA EL TEMA DE FONDO-->
    <link rel="stylesheet" href="assets/adminLTE/dist/css/skins/_all-skins.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/adminLTE/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/adminLTE/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css">

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->
        
  </head>

  <!-- BEGIN HEADER -->
  <?php  //if ($session->isUserLoggedIn(true)): ?>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">   
      <!-- BEGIN HEADER INNER -->
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="user-image">
                  <span span class="hidden-xs"><?php echo remove_junk(ucfirst($user['name'])); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li ><a href="profile.php?id=<?php echo (int)$user['id'];?>"><i class="glyphicon glyphicon-user"></i>Perfil</a></li>
                  <li ><a href="edit_account.php" title="edit account"><i class="glyphicon glyphicon-cog"></i>Configuración</a></li>
                  <li ><a href="logout.php"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                </ul>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
        <!-- END HEADER INNER -->
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
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
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <?php// endif;?>  
          <!-- Main content -->
      <div class="content-wrapper">
        <section class="content">