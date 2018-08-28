<?php
  $page_title = 'Catálogo de Extras';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $catalogoExtras = buscar_catalogo('catalogo_extras');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Catálogo de Extras</span>
      </strong>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 5%;">#</th>
              <th class="text-center" style="width: 10%;"> Tamaño</th>
              <th class="text-center" style="width: 10%;"> Ingrediente </th> 
              <th class="text-center" style="width: 10%;"> Precio </th>
              <th class="text-center" style="width: 10%;"> Acción </th>
            </tr>
          </thead>
          <tbody>
            <?php if ($catalogoExtras !=null):?>  
              <?php foreach ($catalogoExtras as $product):?>
                <tr>
                  <td class="text-center"> <?php echo remove_junk($product['id']);?></td>
                  <td class="text-center"> <?php echo remove_junk($product['size']); ?></td>
                  <td class="text-center"> <?php echo remove_junk($product['flavor']); ?></td>
                  <td class="text-center"> <?php echo remove_junk($product['price']); ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="catalogo_edit.php?id=<?php echo (int)$product['id'];?>&url=catalogo_extras.php&tabla=catalogo_extras" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-edit"></span>
                      </a>
                        <a href="catalogo_delete.php?id=<?php echo (int)$product['id'];?>&url=catalogo_extras.php&tabla=catalogo_extras" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
                        <span class="glyphicon glyphicon-trash"></span>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif?>  
          </tbody>
        </table>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
