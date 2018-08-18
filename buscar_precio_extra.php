<?php
  require_once('includes/load.php');
 
  $tama = $_GET['p_tama'];
  $extra = $_GET['p_extra'];

  $precio=buscar_preciosextra_table($tama,$extra);
  foreach ($precio as $ggg){ echo ltrim(remove_junk($ggg['price'])); }
?>
  