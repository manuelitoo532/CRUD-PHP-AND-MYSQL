<?php

if(!empty($_POST['btnModificar'])){
  $categoria=$_POST['txtCategoria'];
  $producto=$_POST['txtProducto'];
  $precio=$_POST['txtPrecio'];
  $id=$_POST['txtId'];

  if (!empty($categoria) && !empty($producto) && !empty($precio)){
    $modificar=$conexion->query("update productos set id_categoria='$categoria', Producto='$producto', precio='$precio' where id_producto='$id'");
    if ($modificar == true) {
      echo '<div class="alert alert-success">Registro actualizado</div>';
    } else {
      echo '<div class="alert alert-danger">Error al actualizar</div>';
    }
    
  } else {
    echo '<div class="alert alert-danger">Error al registrar los datos.</div>';
  }?>
   <script>
  window.history.replaceState(null, null, window.location.pathname);
 </script>
<?php
}
?>