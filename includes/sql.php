<?php
  require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}

function find_conta($table) {
  global $db;
  if(tableExists($table))
  {
    return find_by_sql("SELECT p.date, p.conta FROM ".$db->escape($table)." p WHERE id=1 LIMIT 1");
  }
}

/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
    return false;
  }
  
  function authenticate_clave_caja($password='') {
    global $db;
    $current_user = current_user();
    $p_user = remove_junk(ucwords($current_user['username']));
    $sql  = sprintf("SELECT clave_caja FROM users WHERE username='{$p_user}' LIMIT 1");
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['clave_caja'] ){
        return true;
      }
    }
    return false;
  }

  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.unidades,p.buy_price,p.media_id,p.date,p.proveedor_id,";
    $sql  .=" c.name AS categorie,m.file_name AS image, k.name AS pro";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" LEFT JOIN proveedores k ON k.id = p.proveedor_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);
   }
  /*--------------------------------------------------------------*/
   /* Funcion para vinvular la base de datos de productos vender
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
   function join_categories_table(){
    global $db;
    $sql  =" SELECT p.id,p.name,p.media_id,";
   $sql  .=" m.file_name AS image";
   $sql  .=" FROM categories p";                    //Definir la base de datos necesaria
   #$sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);

  }
  function join_tampizza_table(){
    global $db;
    $sql  =" SELECT p.id,p.name,p.media_id,";
   $sql  .=" m.file_name AS image";
   $sql  .=" FROM tam_pizzas p";                    //Definir la base de datos necesaria
   #$sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);
  }

  function join_tipopizza_table(){
    global $db;
    $sql  =" SELECT p.id,p.name,p.tipo_descrip,p.media_id,";
   $sql  .=" m.file_name AS image";
   $sql  .=" FROM tipo_pizzas p";                    //Definir la base de datos necesaria
   #$sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);
  }

  function join_extrapizza_table(){
    global $db;
    $sql  =" SELECT p.id,p.name,p.media_id,";
   $sql  .=" m.file_name AS image";
   $sql  .=" FROM extra_pizzas p";                    //Definir la base de datos necesaria
   #$sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);
  }

  function join_pizzaespecilal_table(){
    global $db;
    $sql  =" SELECT p.id,p.name,p.tipo_descrip,p.media_id,";
   $sql  .=" m.file_name AS image";
   $sql  .=" FROM tipo_esp_pizzas p";                    //Definir la base de datos necesaria
   #$sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);
  }

  function join_ingredientes_table(){
    global $db;
    $sql  =" SELECT p.id,p.nombre, p.price, p.media_id,";
   $sql  .=" m.file_name AS image";
   $sql  .=" FROM catalogo_ingredientes p";                    //Definir la base de datos necesaria
   #$sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);
  }

  function join_bebidas_table(){
    global $db;
    $sql  =" SELECT p.id,p.size,p.flavor,p.media_id,";
   $sql  .=" m.file_name AS image";
   $sql  .=" FROM catalogo_bebidas p";                    //Definir la base de datos necesaria
   #$sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);
  }

  function buscar_precios_table($tama,$tipo,$sabor){
    global $db;
    $sql  ="SELECT p.price FROM catalogo_pizzas p WHERE p.size = '{$tama}' AND p.type = '{$tipo}' AND p.flavor = '{$sabor}' LIMIT 1";
   return $db->query($sql);
  }

  function buscar_preciosextra_table($tama,$extra){
    global $db;
    $sql  ="SELECT p.price FROM catalogo_extras p WHERE p.size = '{$tama}' AND p.flavor = '{$extra}' LIMIT 1";
   return $db->query($sql);
  }

  function buscar_preciosbebida_table($size,$flavor){
    global $db;
    $sql  ="SELECT p.price FROM catalogo_bebidas p WHERE p.size = '{$size}' AND p.flavor = '{$flavor}' LIMIT 1";
   return $db->query($sql);
  }

  function buscar_preciosingredientes_table($nombre){
    global $db;
    $sql  ="SELECT p.price FROM catalogo_ingredientes p WHERE p.nombre = '{$nombre}' LIMIT 1";
   return $db->query($sql);
  }
 /*--------------------------------------------------------------*/

  /* JUNTAR BD categorie
   /*--------------------------------------------------------------*/
   function join_productovender_table(){
    global $db;
    $sql  =" SELECT p.id,p.name,p.media_id,c.name";
   $sql  .=" AS categorie,m.file_name AS image";
   $sql  .=" FROM productovender p";                    //Definir la base de datos necesaria
   $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
   $sql  .=" ORDER BY p.id ASC";
   return find_by_sql($sql);

  }
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.name,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }

 function find_bajostock_product(){
  global $db;
  $sql   = " SELECT p.quantity,p.id,p.name,p.media_id,c.name AS categorie,";
  $sql  .= "m.file_name AS image FROM products p";
  $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
  $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
  $sql  .= " WHERE p.quantity <= 2";
  $sql  .= " ORDER BY p.id DESC";
  return find_by_sql($sql);
}

 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_pizzas($limit,$tama){
   global $db;
   $sql  = "SELECT s.sabor_pizza AS nam, COUNT(s.sabor_pizza) AS totalSold, SUM(s.qty) AS totalQty, SUM(s.price) AS totalprice";
   $sql .= " FROM venta_pizzas s WHERE s.tam_pizza='{$tama}'" ;
   $sql .= " GROUP BY s.sabor_pizza";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.orden,s.price,s.date,s.user";
  $sql .= " FROM venta_general s";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function datesSales ($start_date,$end_date,$tabla){ 
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  =" SELECT *";
  $sql .= " FROM $tabla c";
  $sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m-%d' ) BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " ORDER BY DATE(c.date) DESC";
  return $db->query($sql);
}

/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month,$day,$tabla){
  global $db;
  $sql  =" SELECT *";
  $sql .= " FROM $tabla c";
  $sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m-%d' ) = '{$year}-{$month}-{$day}'";
  $sql .= " ORDER BY DATE(c.date) DESC";
  return find_by_sql($sql);
}

function  costoExtra($tam){
  global $db;
  $sql  ="SELECT price FROM catalogo_extras";
  $sql .= " WHERE size='{$tam}' ORDER BY id DESC LIMIT 1";
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function monthlySales ($year,$month,$tabla){ 
  global $db;
  $sql  =" SELECT *";
  $sql .= " FROM $tabla c";
  $sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " ORDER BY DATE(c.date) DESC";
  return find_by_sql($sql);
}

 /*--------------------------------------------------------------*/
  /* Function for Finding valor de apertura y otros
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/


  function VentasRealizadas ($start_date,$tabla,$forma_pago){
    $current_user = current_user();
    $p_user = remove_junk(ucwords($current_user['username'])); 
    global $db;
    $start_date  = date("Y-m-d H:i:s", strtotime($start_date));
    $sql  =" SELECT *";
    $sql .= " FROM $tabla c";
    //$sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m-%d' ) = '{$start_date}' AND c.username='{$p_user}'";
    $sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m-%d %H:%i:%s' ) >= '{$start_date}' AND c.forma_pago='{$forma_pago}' AND c.user='{$p_user}'";
    $sql .= " ORDER BY DATE(c.date) DESC";
    return $db->query($sql);
  }


  function find_last_open_box(){
    $current_user = current_user();
    $p_user = remove_junk(ucwords($current_user['username']));
    global $db;

    $sql = $db->query("SELECT * FROM tabla_aperturas_cajas WHERE username='{$p_user}' ORDER BY id DESC LIMIT 1");
    if($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;

  }

  function find_sum_ingresos_caja($year,$month,$day){
    $current_user = current_user();
    $p_user = remove_junk(ucwords($current_user['username']));
    $sql  =" SELECT SUM(c.importe)";
    $sql  .=" FROM tabla_ingresos_retiros_cajas c WHERE  c.importe>=0 AND DATE_FORMAT(c.date, '%Y-%m-%d' ) >= '{$year}-{$month}-{$day}' AND c.username='{$p_user}'";
    return find_by_sql($sql);
  }

  function find_sum_retiros_caja($year,$month,$day){
    $current_user = current_user();
    $p_user = remove_junk(ucwords($current_user['username']));
    $sql  =" SELECT SUM(c.importe)";
    $sql  .=" FROM tabla_ingresos_retiros_cajas c WHERE  c.importe<0 AND DATE_FORMAT(c.date, '%Y-%m-%d' ) >= '{$year}-{$month}-{$day}' AND c.username='{$p_user}'";
    return find_by_sql($sql);
  }

  function delete_sum_ingresos_caja($year,$month,$day){
    global $db;
    $current_user = current_user();
    $p_user = remove_junk(ucwords($current_user['username']));
    $sql ="DELETE  FROM tabla_ingresos_retiros_cajas ";
    $sql  .= "WHERE importe>=0 AND DATE_FORMAT(date, '%Y-%m-%d' ) = '{$year}-{$month}-{$day}' AND username='{$p_user}'";  
    $db->query($sql);
  }

  function delete_sum_retiros_caja($year,$month,$day){
    global $db;
    $current_user = current_user();
    $p_user = remove_junk(ucwords($current_user['username']));
    $sql =" DELETE FROM tabla_ingresos_retiros_cajas ";
    $sql  .= "WHERE importe<0 AND DATE_FORMAT(date, '%Y-%m-%d' ) = '{$year}-{$month}-{$day}' AND username='{$p_user}'";  
    $db->query($sql);
  }

     /*--------------------------------------------------------------*/
   /* Function for Finding all valores de cierres
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
   function join_cierres_cajas(){
    global $db;
    $sql  =" SELECT c.id,c.dinero_apertura,c.cobros_en_caja,c.cobros_con_tarjeta,c.total_ventas,c.autoconsumo,c.ingreso_efectivo_en_caja,c.retiro_efectivo_en_caja,c.dinero_a_entregar,c.dinero_entregado,c.saldo,c.date,c.username";
    $sql  .=" FROM tabla_cierres_cajas c";
    $sql  .=" ORDER BY c.date DESC";
    return find_by_sql($sql);
  }
/*--------------------------------------------------------------*/
/* Function for Generate Daily cierres de caja report
/*--------------------------------------------------------------*/
function  daily_cierres_cajas($year,$month,$day){
  global $db;
  $sql  =" SELECT c.date, c.id,c.dinero_apertura,c.cobros_en_caja,c.cobros_con_tarjeta,c.total_ventas,c.autoconsumo,c.ingreso_efectivo_en_caja,c.retiro_efectivo_en_caja,c.dinero_a_entregar,c.dinero_entregado,c.saldo,c.username";
  $sql .= " FROM tabla_cierres_cajas c";
  $sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m-%d' ) = '{$year}-{$month}-{$day}'";
  return find_by_sql($sql);
}

function monthly_cierres_cajas ($year,$month){ 
  $sql  =" SELECT c.date, c.id,c.dinero_apertura,c.cobros_en_caja,c.cobros_con_tarjeta,c.total_ventas,c.autoconsumo,c.ingreso_efectivo_en_caja,c.retiro_efectivo_en_caja,c.dinero_a_entregar,c.dinero_entregado,c.saldo,c.username";
  $sql .= " FROM tabla_cierres_cajas c";
  $sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m' ) = '{$year}-{$month}'";
  return find_by_sql($sql);
}

function by_dates_cierres_cajas ($start_date,$end_date){ 
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  =" SELECT c.date, c.id,c.dinero_apertura,c.cobros_en_caja,c.cobros_con_tarjeta,c.total_ventas,c.autoconsumo,c.ingreso_efectivo_en_caja,c.retiro_efectivo_en_caja,c.dinero_a_entregar,c.dinero_entregado,c.saldo,c.username";
  $sql .= " FROM tabla_cierres_cajas c";
  $sql .= " WHERE DATE_FORMAT(c.date, '%Y-%m-%d' ) BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " ORDER BY DATE(c.date) DESC";
  return $db->query($sql);
}


function by_dates_Inventario ($start_date,$end_date,$product){ 
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  =" SELECT c.name, c.last_quantity, c.new_quantity, c.unidades, c.buy_price, c.gasto, c.date, c.username,";
  $sql  .=" k.name AS pro";
  $sql .= " FROM products_add_records c";
  $sql  .=" LEFT JOIN proveedores k ON k.id = c.proveedor_id";
  $sql .= " WHERE (DATE_FORMAT( c.date, '%Y-%m-%d' ) BETWEEN '{$start_date}' AND '{$end_date}') AND c.name='{$product}' AND c.gasto>='0'";
  $sql .= " ORDER BY DATE(c.date) DESC";
  return $db->query($sql);
}

   /*--------------------------------------------------------------*/
   function buscar_catalogo($tabla){
    global $db;
    $sql  =" SELECT *";
    $sql  .=" FROM $tabla";
    $sql  .=" ORDER BY id ASC";
    return find_by_sql($sql);
  }

  //Contador de produtos
  function contador_masas ($tama,$lista){ 
    global $db;
    $date    = make_date();
    $today  = date("Y-m-d", strtotime($date));
    $sql  =" SELECT sum(qty)";
    $sql .= " FROM $lista c";
    $sql .= " WHERE c.tam_pizza = '{$tama}' AND DATE_FORMAT(c.date, '%Y-%m-%d' ) = '{$today}' LIMIT 1";
    return $db->query($sql);
  }

  //Contador de produtos
  function contador_masas_sabor ($tama,$lista,$sabor){ 
    global $db;
    $date    = make_date();
    $today  = date("Y-m-d", strtotime($date));
    $sql  =" SELECT sum(qty)";
    $sql .= " FROM $lista c";
    $sql .= " WHERE c.tam_pizza = '{$tama}' AND DATE_FORMAT(c.date, '%Y-%m-%d' ) = '{$today}' AND c.sabor_pizza = '{$sabor}' LIMIT 1";
    return $db->query($sql);
  }


?>

